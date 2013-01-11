<?php
	include(getcwd().'/model/BDD/query_construct_class.inc.php');
	include_once(getcwd().'/config/connectionsToDatabase.php');

	session_start();
	date_default_timezone_set('UTC');

	/* Autoloader */
	function __autoload($name)
	{
		if (file_exists('model/_class/'.$name.'.class.php'))
		{
			require_once('model/_class/'.$name.'.class.php');
		}
	}

    spl_autoload_register('__autoload');
  
    
	//Tableau repertoriant les pages
	$tablink = array('Accueil.html', 'RechercheLivre.html','RechercheAvancee.html','Contact.html','Deconnexion.html', 'AfficheLivre.html', 'AfficheEtudiant.html');
	
	//Tableau repertoriant le nom des pages
	$tableau = array('Accueil', 'Recherche Livre','Recherche Avancee','Contact','Deconnexion','Fiche Livre','Profil Etudiant');

	
	//Recuperation page ou idEt du GET
	if (!empty($_GET['page']))
	{
		$titre = $_GET['page'];
		
		for($i=0;$i<7;$i++)
			if(!strcmp($tablink[$i], $titre))
			{
				$titre = $tableau[$i];
				$i = 8;
			}
		if($i == 8)
			$titre = '404 NOT FOUND';
	}
	else if (!empty($_GET['idEtu']))
		$titre = 'Generation XML';
	else
		$titre = 'Bienvenu';
	
	//Recuperation Login en POST
	if ( isset($_POST['passwd']) && isset($_POST['login']) )
		{
			$Membre = new Membre ($dbh,$_POST['passwd'],$_POST['login'],0);
			if ( isset($Membre->_idMembre) ){
				$titre = 'Accueil';
				$_SESSION['loggedin'] = $Membre->_idMembre;
				if ($Membre->_droit == 0){
					$_SESSION['etudiant'] = $Membre->_idMembre;
					}
			}
			else 
				$titre = 'Connexion Refusé';
		}
	else if (isset($_SESSION['loggedin']))
			$Membre = new Membre ($dbh,'','',$_SESSION['loggedin']);

	/* Dans le cadre de la generation xml pas de balise html head body */
	if (empty($_GET['idEtu']))
			include(getcwd().'/view/head.php');
 
	/* Chargement du container dans le cas d'une page inconnue */
	if ($titre == '404 NOT FOUND'){
		include(getcwd().'/view/header.html');
		include(getcwd().'/view/notfound.html');
	}
	
	/* Chargement du container dans le cas de la génération XML */
	if ($titre == 'Generation XML'){
		include(getcwd().'/controler/generatexml.php');
	}
	
	/* Chargement du container dans le cas non conncecté index.php */
	if ($titre == 'Bienvenu'){
		include(getcwd().'/view/header.html');
		include(getcwd().'/view/connexion.html');
	}
	
	/* Chargement du container dans le cas non conncecté index.php */
	if ($titre == 'Fiche Livre'){
		if (isset($_SESSION['etudiant'])){
			include(getcwd().'/view/headeretu.html');
		}
		else
		{	
			include(getcwd().'/view/headerperso.html');
		}
		include(getcwd().'/view/AfficheLivre.html');
	}
	
	if ($titre == 'Accueil'){
		if (isset($_SESSION['etudiant'])){
			include(getcwd().'/view/headeretu.html');
		}
		else
		{	
			include(getcwd().'/view/headerperso.html');
		}
		include(getcwd().'/view/Accueil.html');
	}
	
	if (isset($_SESSION['etudiant']))
	{
		if ($titre == 'Profil Etudiant'){
			include(getcwd().'/view/headeretu.html');
			include(getcwd().'/view/AfficheEtudiant.php');
		}
		
		/* Chargement du container dans le cas d'une recherche par l'étudiant */
		if ($titre == 'Recherche Livre'){
			include(getcwd().'/view/headeretu.html');
			include(getcwd().'/view/RechercheLivre.html');
		}

		/* Chargement du container dans le cas de la page contact*/
		if ($titre == 'Contact'){
			include(getcwd().'/view/headeretu.html');
			include(getcwd().'/view/Contact.html');
		}
	}
	else
	{
		/* Chargement du container dans le cas d'une recherche par le personnel */
		if ($titre == 'Recherche Avancee'){
			include(getcwd().'/view/headerperso.html'); // or ETU en fx connection
			include(getcwd().'/view/RechercheAvancee.html');
		}
	}
	
	
	/* Chargement du container dans le cas d'une déconnection */
	if ($titre == 'Deconnexion')
	{
		session_destroy();
		include(getcwd().'/view/header.html');
		include(getcwd().'/view/connexion.html');
	}
	
	/* Dans le cadre de la generation xml pas de balise html head body */
	if (empty($_GET['idEtu']))
		include(getcwd().'/view/footer.html');
		
	deconnectionToDatabase($dbh);
 ?>