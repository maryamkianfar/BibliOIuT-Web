<?php
	include(getcwd().'/model/BDD/query_search_data.inc.php');
	include_once(getcwd().'/config/connectionsToDatabase.php');
	
	function __autoload($name)
	{
		if (file_exists('model/_class/'.$name.'.class.php'))
		{
			require_once('model/_class/'.$name.'.class.php');
		}
	}
	
	function download($fileName) {
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename='.basename($fileName) );
		header('Accept-Ranges: bytes');
		header('Content-Length: '.filesize($fileName) );
		readfile($fileName);
		exit(); 
	}
     
    $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n"
    	 . '<BUXML version="alpha" format="InfoBUXML" />' . "\n"
    	 . '<descriptif> Vue proposant la consultation XML pour une application tierce. Affichez le code source.</descriptif>' . "\n";
    
    $idEtudiant = $_GET['idEtu'];
    
    $Membre = new Membre($dbh,'','',$idEtudiant);
    
    $xml = $xml . '<membre nom="' . $Membre->getNom() . '" prenom="' . $Membre->getPrenom() . '" >' . "\n"
    			. '<promo diplome="' . $Membre->getDiplome() . '" annee="' . $Membre->getAnnee() . '" />' . "\n";
    
    $xml = $xml . '</membre>' . "\n";
    
    /* Requetes emprunts */
    $answer = $dbh->prepare($query_xml_LivreEmprunte);
    $answer->bindValue('fkidMembre',$Membre->_idMembre,PDO::PARAM_INT);
	$answer->execute();
	
	/* Recuperation dans un tableau et Edition du xml */
	$xml = $xml . '<emprunts>' . "\n";
	while ($donneesEmprunte = $answer->fetch(PDO::FETCH_ASSOC))
	{
		$xml = $xml . '<livre id="' . $donneesEmprunte['idLivre'] . '" titre="' . $donneesEmprunte['titreLivre'] . '" auteur="' . $donneesEmprunte['auteurLivre'] . '" />' . "\n";
	}
	$xml = $xml . '</emprunts>' . "\n";

    
    /* Requetes Reservations */
    $answer1 = $dbh->prepare($query_xml_LivreReserve);
    $answer1->bindValue('fkidMembre',$Membre->_idMembre,PDO::PARAM_INT);
	$answer1->execute();
			
	/* Recuperation dans un tableau*/
	$xml = $xml . '<reservations>' . "\n";
	while ($donneesReserve = $answer1->fetch(PDO::FETCH_ASSOC))
	{
		$xml = $xml . '<livre id="' . $donneesReserve['idLivre'] . '" titre="' . $donneesReserve['titreLivre'] . '" auteur="' . $donneesReserve['auteurLivre'] . '" />' . "\n";
	}
	$xml = $xml . '</reservations>' . "\n";
	$xml = $xml . '</membre>' . "\n";
	
    /* envoie du source XML */
    print($xml);

    $filename = '/view/generated/'.$Membre->_idMembre.$Membre->_nomMembre.'.xml';
    $fp = fopen(getcwd().$filename, 'w+');
    fputs($fp, $xml);
    fclose($fp);

    echo 'Export XML effectue !<br><a href=".'.$filename.'">Voir le fichier ici</a>';
    
    //download(getcwd().$filename);
?>
