<?php
include(getcwd().'/model/BDD/query_construct_class.inc.php');
include_once(getcwd().'/config/connectionsToDatabase.php');

function __autoload($name)
{
	if (file_exists('model/_class/'.$name.'.class.php'))
	{
		require_once('model/_class/'.$name.'.class.php');
	}
}

$Membre = new Membre ($dbh,'Duchatea','Duchatea',0);
print_r($Membre, false);
echo "<pre>\n</pre>";

$Emprunt = new Emprunt ($dbh,1);
print_r($Emprunt, false);
echo "<pre>\n</pre>";

$Livre = new Livre($dbh,1);
print_r($Livre, false);
echo "<pre>\n</pre>";

$Reservation = new Reservation($dbh,1,1);
print_r($Reservation,false);
echo "<pre>\n</pre>";

deconnectionToDatabase($dbh);
?>