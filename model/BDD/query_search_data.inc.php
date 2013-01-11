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

$query_search_Livre = "	SELECT `titreLivre` , `auteurLivre` , `motTag`, `fk_idEmprunt`
						FROM Livre, Tag
						WHERE `Livre`.`idLivre` = `Tag`.`fk_idLivre`
						AND `Livre`.`titreLivre` LIKE :string
						OR `Livre`.`auteurLivre` LIKE :string
						OR `Tag`.`motTag` LIKE :string
						GROUP BY `titreLivre`;";

$query_search_Etudiant = "	SELECT `nomMembre` , `prenomMembre` , count(`Emprunt`.`fk_idMembre`), count(`Reservation`.`fk_idMembre`)
							FROM Membre, Reservation, Emprunt
							WHERE `Membre`.`idMembre` = `Reservation`.`fk_idMembre`
							AND `Membre`.`idMembre` = `Emprunt`.`fk_idMembre`
							AND `Membre`.`nomMembre` LIKE 'Amanzou'
							OR `Membre`.`prenomMembre` LIKE 'Amanzou';";
							
?>
