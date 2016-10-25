<?php

if( $_SERVER['SERVER_NAME'] == "localhost" ){	
	$host="localhost";
    $user="luca";
    $password="";
    $db="archeproject";
	
}else{
    $host="62.149.150.224";
    $user="Sql801965";
    $password="3j1ll9elpe";
    $db="Sql801965_1";
}

// mi connetto al database
$con = mysqli_connect($host,$user,$password,$db);

// Check connection
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$mysqli = new mysqli($host, $user, $password, $db);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
}

?>