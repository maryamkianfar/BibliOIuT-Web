<?php
/* Requetes nécessaire à la recherche de données */

$query_xml_Emprunt = "	SELECT *
						FROM Emprunt
						WHERE `Emprunt`.`fk_idMembre` = :fkidMembre ;";

$query_xml_LivreReserve = "	SELECT `Livre`.`idLivre` , `Livre`.`titreLivre` , `Livre`.`auteurLivre`
							FROM Livre, Reservation
							WHERE `Livre`.`idLivre` = `Reservation`.`fk_idLivre`
							AND `Reservation`.`fk_idMembre` = :fkidMembre ;";

$query_xml_LivreEmprunte = "SELECT `Livre`.`idLivre`, `Livre`.`titreLivre`, `Livre`.`auteurLivre`
							FROM Livre, Emprunt
							WHERE `Livre`.`fk_idEmprunt` = `Emprunt`.`idEmprunt` 
							AND `Emprunt`.`fk_idMembre` = :fkidMembre ;";

$query_xml_gen  = '	SELECT	*
					FROM Membre, Etudiant
					WHERE `Membre`.`fk_idEtudiant`=`Etudiant`.`idEtudiant`
					AND	`Membre`.`fk_idEtudiant` = :fkidEtudiant ;';
?>
