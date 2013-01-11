<?php
	//Tableau repertoriant les pages
	$tablink = array('Acceuil.html', 'RechercheEmprunt.html','RechercheLivre.html','Contact.html','Deconnexion.html');
	$tableau = array('Acceuil', 'Recherche Emprunt','Recherche Livre','Contact','Deconnexion');
	
	//Recuperation du GET
	if (!empty($_GET['page']))
	{
		$titre = $_GET['page'];
		
		for($i=0;$i<5;$i++)
			if(!strcmp($tablink[$i], $titre))
			{
				$titre = $tableau[$i];
				$i = 6;
			}
		if($i == 5)
			$titre = '404 NOT FOUND';
	}
	else if (!empty($_GET['idEt']))
		$titre = 'Generation XML';
	else
		$titre = '404 NOT FOUND';
	
	
	if (empty($_GET['idEt']))
			include(getcwd().'/view/head.php');
 
	if ($titre == '404 NOT FOUND'){
		include(getcwd().'/view/header.html');
		include(getcwd().'/view/notfound.html');
	}
	
	if ($titre == 'Generation XML'){
		include(getcwd().'/controler/generatexml.php');
	}
	
	if ($titre == 'Accueil'){
		include(getcwd().'/view/header.html');
		include(getcwd().'/view/connexion.html');
	}


	if ($titre == 'Recherche Emprunt'){
		include(getcwd().'/view/headerperso.html');
		include(getcwd().'/view/rechercheemprunt.html');
	}

	
	if ($titre == 'Recherche Livre'){
		include(getcwd().'/view/headerperso.html'); // or ETU en fx connection
		include(getcwd().'/view/recherchelivre.html');
	}

  
	if ($titre == 'Contact'){
		include(getcwd().'/view/headeretu.html');
		include(getcwd().'/view/contact.html');
	}

	if (empty($_GET['idEt']))
		include(getcwd().'/view/footer.html');
 ?>