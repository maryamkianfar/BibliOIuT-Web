<?php

class Livre 
{
	public $_idLivre;
	public $_titreLivre;
	public $_auteurLivre;
	//public $_dateAchat;
	public $_couvertureLivre;
	public $_tagLivre;

    public
        function __construct ($bdd,$idLivre)
        {
	        include(getcwd().'/model/BDD/query_construct_class.inc.php');
	        include_once(getcwd().'/config/connectionsToDatabase.php');
            
            /* Recherche du Livre */
            $answer = $bdd->prepare($query_get_Livre);
			$answer->bindValue('idLivre',$idLivre,PDO::PARAM_INT);
			$answer->execute();
			
			/* Recuperation dans un tableau et Edition de l'objet*/
			$donnees = $answer->fetch();
			if (!empty($donnees))
			{
				$this->_idLivre = $idLivre;
				$this->_titreLivre = $donnees['titreLivre'];
				$this->_auteurLivre = $donnees['auteurLivre'];
				//$this->_couvertureLivre = $donnees['couvertureLivre'];
			}
			else
			{
				echo 'Error query';
			}
			
			while ($donnees = $answer->fetch())
			{
				$this->_tagLivre = $this->_tagLivre.' '.$donnees['motTag'];
			}
		}


	/*Accesseur*/
}

?>