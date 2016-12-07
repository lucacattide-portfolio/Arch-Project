<?php

if( $_SERVER['SERVER_NAME'] == "localhost" ){	
	$host="62.149.150.246";
    $user="Sql903871";
    $password="ia1wckpzg3";
    $db="Sql903871_4";
	
}else{
	
    $host="62.149.150.246";
    $user="Sql903871";
    $password="ia1wckpzg3";
    $db="Sql903871_4";
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