<?php
//Login v0.5 beta
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

// The SQL query
$query = "SELECT * FROM $table WHERE Name = '$RegName'";
$result = mysql_query($query);


//Check PassWord
$Pass = mysql_result($result,0,"PassWord");

//Check Name
$numR = mysql_num_rows($result);

// If the number of rows is not equal to one then it prints out an error statement - Name not in Database.

if($Pass == $PassWord) {    
  if ($numR == 1) { 
    print "Status=::[ CONNECTE : $RegName ]::";
    print "&Etat=3";
  }
  else {
    print "Status=::[ CONNECTION REFUSEE ]::";
    print "&Etat=4";
  }
}
else {
print "&Status=::[ CONNECTION REFUSEE ]::";
print "&Etat=4";
}

?>