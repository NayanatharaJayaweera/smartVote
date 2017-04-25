<?php

//Defining variables for the database

$dbhost="localhost";
$dbuser="root";
$dbpassword="";
$dbname="smartVote";

//function to connect to the database
$db = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);



if ($db) {

}
else {

print "Unsuccessful Database connection <br>";

}





?>