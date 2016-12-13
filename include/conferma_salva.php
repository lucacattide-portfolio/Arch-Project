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

  if(isset($_POST["modificaREg"])):

    $nome = $mysqli->real_escape_string($_POST["nome_utente_modifica"]);
    $cognome = $mysqli->real_escape_string($_POST["cognome_utente"]);
    $ragione = $mysqli->real_escape_string($_POST["ragione_utente_admin"]);
    $indirizzo = $mysqli->real_escape_string($_POST["indirizzo_utente_admin"]);
    $cap = $mysqli->real_escape_string($_POST["cap_utente_admin"]);
    $provincia = $mysqli->real_escape_string($_POST["provincia_utente_admin"]);
    $email = $mysqli->real_escape_string($_POST["email_utente_admin"]);
    $telefono = $mysqli->real_escape_string($_POST["telefono_utente_admin"]);
    $iva = $mysqli->real_escape_string($_POST["iva_utente_admin"]);
    $fiscale = $mysqli->real_escape_string($_POST["fiscale_utente_admin"]);
    $sqlArticolo = "UPDATE `cliente` SET `cliente_nome`='".$nome."', `cliente_cognome`='".$cognome."',`cliente_ragione_sociale`='".$ragione."',`cliente_indirizzo`='".$indirizzo."',`cliente_cap`='".$cap."', `cliente_provincia`='".$provincia."', `cliente_email`='".$email."', `cliente_telefono`='".$telefono."', `cliente_partita_iva`='".$iva."', `cliente_codice_fiscale`='".$fiscale."', `cliente_data_modifica`='".date("Y-m-d H:i:s")."' WHERE `cliente_id` = '".$_POST["id_utente"]."' ";
	
    if($mysqli->query($sqlArticolo)):

      echo "<p id='conferma_salva'>Modifiche salvate.</p>";

    else:

    endif;

  endif;

?>