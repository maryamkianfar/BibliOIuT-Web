BibliOIuT-Web
=============

## Introduction
Un site en MVC proposant un système de gestion d'emprunt à la bibliothèque de l'IUT. Le site devra fonctionner sur différents support : PC/PDA/Smartphone.

## Prerequisites
Un environnement de développement : phpmyadmin, mysql

## Installation
### Download and install the package
* Download zip file from gitHub [here](https://github.com/amineamanzou/BibliOIuT-Web)
* Unzip it in your web folder.
* Créer la base de donnée : biblioiut
* Importer le fichier : /model/BDD/ExportDB_Biblioiut.sql pour génerer la base de donnée
* Ne pas oublier de modifier config_pdo.php avec vos logins localhost.

### Modifiez les permissions pour autoriser l'ecriture de fichier xml
```bash
cd BibliOIuT-Web
chmod -R 700 ./
[...]
```

## Ready !
Vous pouvez maintenant tester le site.
Toute remarque, amélioration et tout commit est le bienvenu.

### Example
```bash
[...]
```
