<?php
//Register v0.5 beta
//Chargement
require 'include.php3';

//Reformatage des variables

//Mettre tout en caractères majuscules
$RegName = strtoupper ($RegName);
$PassWord = strtoupper ($PassWord);

//Enlever les symboles
$RegName = ereg_replace("[^A-Za-z0-9 ]", "", $RegName);
$PassWord = ereg_replace("[^A-Za-z0-9 ]", "", $PassWord);

//Connection à la base de données
$Connect = mysql_connect($DBhost, $DBuser, $DBpass)
or die("&Status=::[ ECHEC DE LA CONNECTION ]::&Etat=2");
mysql_select_db("$DBName");

$datum = date("d/m/Y");
$query = "INSERT INTO $table (Name, PassWord) VALUES ('$RegName' , '$PassWord')";
$result = mysql_query($query);

// Gets the number of rows affected by the query as a check.
$numR = mysql_affected_rows($Connect);

if ($numR == 0) {
print "Status=Failure Please Fill out all Fields - Register Again";
}
else if ($numR == 1) {
print "Status=::[ ENREGISTRE AVEC SUCCES ]::";
print "&Etat=1";
}
else {
print "Status=::[ CE PSEUDO EXISTE DEJA ]::";
print "&Etat=2";
}
//require 'controller.php'; //for debug modus only
?>
