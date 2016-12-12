<?php 

	/* Configurazioni */
	
	include("admin/php/connessione_sql.php"); // Connessione DB
  require('PHPMailer-master/PHPMailerAutoload.php');
	
	// Altre configurazioni...

	/* Navigazione */

	if (isset($_GET["pag"])) { // Se il parametro pagina è settato
	
		$pag = $_GET["pag"]; // Allora inizializzalo
		
	} else {  // Altrimenti inizializzazione default
		
		$pag = "";  
		
	}
	
	
	if (isset($_GET["art"])) { // Se il parametro art è settato
	
		$art = $_GET["art"]; // Allora inizializzalo
		
	} else {  // Altrimenti inizializzazione default
		
		$art = "";  
		
	}
	
	if (isset($_GET["box"])) { // Se il parametro art è settato
	
		$box = $_GET["box"]; // Allora inizializzalo
		
	} else {  // Altrimenti inizializzazione default
		
		$box = "";  
		
	}
	
	// Impostazione Timezone e Codifica Caratteri

	@date_default_timezone_set('Europe/Rome');
	@setlocale(LC_ALL, 'it_IT');
	@setlocale(LC_TIME, 'ita', 'it_IT.utf8');
	
	//------- SESSIONE -------------

	session_start(); // Avvia sessione
	
	if ( empty($_SESSION['code']) ){

          $_SESSION["code"] = session_id();
          
          $_SESSION['vista'] = '0';
     
     }else{
          
          $_SESSION['vista'] = '1'; 
     } 
	
	include("include/config/function.php"); // Inclusione Funzioni Popolamento Pagina
	
	// Impostazioni URL  - Script / Links
	
	if ($countPagina >= 1) { // Se esiste almeno un record	
	
		while ($rowPaginaHt = $rPagina->fetch_array()): // Finchè sono presenti pagine
			
				if ($rowPaginaHt["pagina_dipendenza_id"] == "accordion") { // Se la pagina è un accordion
				
					$sqlArticolo = "SELECT * FROM `articolo` WHERE `articolo_pagina_id` = '".$rowPaginaHt["pagina_id"]."' "; // Estrae gli articoli "pagine" dalla tabella
					$rArticolo = $mysqli->query($sqlArticolo); // Assegna la query
					$countArticolo =  $rArticolo->num_rows; // Conteggio records
					
					if ($countArticolo >= 1): // Se esiste almeno un record
					
						while ($rowArticolo = $rArticolo->fetch_array()): // Allora finchè esistono pagine
					
							$siteurl = "http://www.laboratorio-a.com/archeproject/"; // Allora inizializza l'url	
							
						endwhile;
						
					endif;
					
				} else { // Altrimenti default 
					
					$siteurl = "";	
					
				}
				
		endwhile;
	
	}
	  
 	// Impostazioni URL  - Immagini
 
 	//$siteurl_base = "http://www.blancdesir.eu/"; // Inizializzazione URL base
	$siteurl_base = "http://www.laboratorio-a.com/archeproject/";

//////////////////////////////////////////////// ACCEDI ////////////////////////////////////////////// 

if(isset($_POST["login"])):

    $_SESSION["user"] = $_POST['user'];
    $_SESSION["psw"]  = $_POST['psw'];

     
    $result = $mysqli->query("SELECT * FROM `cliente` WHERE cliente_user = '".$_SESSION["user"]."' AND cliente_password = '".$_SESSION["psw"]."' ");
    
	$loginCli = $result->num_rows;
	
	
	if( $loginCli < 1) : 
	 
	   // header("Location: http://localhost/archeproject/login");
   
     else: 


     

      $sqlCliente = "SELECT * FROM `cliente` WHERE cliente_user = '".$_SESSION["user"]."' AND cliente_password = '".$_SESSION["psw"]."' ";
      $resultLogin = $mysqli->query($sqlCliente);
	  
       while ($rowLogin = $resultLogin->fetch_array()): 
	  
        $idutente = $rowLogin['cliente_id'];

        $nomeutente = $rowLogin['cliente_nome'];
		
    
       endwhile;
	
      $_SESSION['id_utente'] = $idutente;
	
      $_SESSION['nome_utente'] = $nomeutente;
	  
	 endif;
     
     $_SESSION['id_utente'];
     $_SESSION['nome_utente'];
	 header("Location: http://www.laboratorio-a.com/archeproject/account");
	 
endif;

     

//////////////////////////////////////////////// REGISTRATI ////////////////////////////////////////////// 
if(isset($_POST["registrati"])):

	$sqlRegister="INSERT INTO `cliente`(`cliente_id`, `cliente_nome`, `cliente_cognome`, `cliente_ragione_sociale`, `cliente_indirizzo`, `cliente_cap`, `cilente_citta`, `cliente_provincia`, `cliente_stato`, `cliente_email`, `cliente_telefono`, `cliente_fax`, `cliente_partita_iva`, `cliente_codice_fiscale`, `cliente_tipologia`, `cliente_data_creazione`, `cliente_data_modifica`, `cliente_user`, `cliente_password`, `cliente_note`) VALUES (NULL,'".$mysqli->real_escape_string($_POST["nome_registrazione"])."','".$mysqli->real_escape_string($_POST["cognome_registrazione"])."','".$mysqli->real_escape_string($_POST["ragione_registrazione"])."','".$mysqli->real_escape_string($_POST["indirizzo_registrazione"])."','".$mysqli->real_escape_string($_POST["cap_registrazione"])."','".$mysqli->real_escape_string($_POST["citta_registrazione"])."','".$mysqli->real_escape_string($_POST["provincia_registrazione"])."','".$mysqli->real_escape_string($_POST["stato_registrazione"])."','".$mysqli->real_escape_string($_POST["email_registrazione"])."','".$mysqli->real_escape_string($_POST["telefono_registrazione"])."','','".$mysqli->real_escape_string($_POST["iva_registrazione"])."','".$mysqli->real_escape_string($_POST["fiscale_registrazione"])."','utente','".date("Y-m-d H:i:s")."','".date("Y-m-d H:i:s")."','".$mysqli->real_escape_string($_POST["email_registrazione"])."','".$mysqli->real_escape_string($_POST["password_registrazione"])."','')";
    if($mysqli->query($sqlRegister)): 
	  
      $mail = new PHPMailer;
      
      $mail = new PHPMailer;

		  $mail->setFrom('info@archeproject.it', 'ARCH & PROJECT');
		  $mail->CharSet= 'UTF-8';
		  $mail->addAddress('luca@laboratorio-a.it', 'Luca Cattide');     // Add a recipient
		  $mail->addAddress('luca@laboratorio-a.it');               // Name is optional
		  /* $mail->addReplyTo('info@example.com', 'Information');
		  $mail->addCC('cc@example.com');
		  $mail->addBCC('bcc@example.com');*/

		  /*$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		  */

          $body = file_get_contents('mail/mail.php');
          $body = eregi_replace("[\]",'',$body);

		  $mail->isHTML(true);                                  // Set email format to HTM

		  $mail->Subject = 'Conferma registrazione - Arch & Project';
		  $mail->msgHTML($body);


		  if(!$mail->send()) {
			  $pReg = "UTENTE REGISTRATO"; 
			  echo 'Message could not be sent.';
			  echo 'Mailer Error: ' . $mail->ErrorInfo;
		  }else{
			  
			  
		  } 

	else:
	  $pReg = "Errore! Riprova";   
	endif;  


endif;



   /* AGGIUNGI ARTICOLO DB BACKEND *******************/
	if(isset($_POST["nuovoArticolo"])):
	   if(empty($_POST["articolo_data_modifica"])): $dateModifica = ""; else: $dateModifica = date("Y-m-d", strtotime($_POST["articolo_data_modifica"]));  endif;
	   if(isset($_POST["articolo_categoria_id"])): $categoriaId = $_POST["articolo_categoria_id"]; else: $categoriaId = ""; endif;
	   if(isset($_POST["articolo_img_id"])): $disponibile = $_POST["articolo_img_id"]; else: $disponibile = "0"; endif;
	   if(isset($_POST["articolo_gallery_id"])): $evidenza = $_POST["articolo_gallery_id"]; else: $evidenza = "2"; endif;
	   if(isset($_POST["articolo_cliente_id"])): $clienteId = $_POST["articolo_cliente_id"]; else: $clienteId = ""; endif;
	   if(isset($_POST["articolo_azienda_id"])): $aziendaId = $_POST["articolo_azienda_id"]; else: $aziendaId = ""; endif;
	   if(isset($_POST["articolo_visibile"])): $articoloVisivile = $_POST["articolo_visibile"]; else: $articoloVisivile = "1"; endif;
	   if(isset($_POST["articolo_pagina_id"])): $articoloPaginaId = $_POST["articolo_pagina_id"]; else: $articoloPaginaId = ""; endif;
	   if(isset($_POST["articolo_testo"])): $articoloTesto = $_POST["articolo_testo"]; else: $articoloTesto = ""; endif;
	   if(isset($_POST["articolo_sottotitolo"])): $articoloSottotitolo = $_POST["articolo_sottotitolo"]; else: $articoloSottotitolo = ""; endif;
	   if(isset($_POST["articolo_titolo"])): $articoloTitolo = $_POST["articolo_titolo"]; else: $articoloTitolo = ""; endif;
	  // query insert nuovo articolo 
	  $sqlArticolo = "INSERT INTO `articolo`(`articolo_id`,`articolo_pagina_id`,`articolo_cliente_id`,`articolo_azienda_id`,`articolo_titolo`,`articolo_sottotitolo`,`articolo_testo`,`articolo_url`,`articolo_img_id`,`articolo_gallery_id`,`articolo_data_creazione`,`articolo_data_modifica`,`articolo_lingua`,`articolo_ordinamento`,`articolo_categoria_id`,`articolo_visibile`) VALUES ( NULL,'".$mysqli->real_escape_string($articoloPaginaId)."','".$mysqli->real_escape_string($clienteId)."','".$mysqli->real_escape_string($aziendaId)."','".$mysqli->real_escape_string($articoloTitolo)."','".$mysqli->real_escape_string($articoloSottotitolo)."','".$mysqli->real_escape_string($articoloTesto)."','".$mysqli->real_escape_string($_POST["articolo_url"])."','".$disponibile."','".$evidenza."','".date("Y-m-d H:i:s")."','".$dateModifica."','','','".$mysqli->real_escape_string($categoriaId)."','".$mysqli->real_escape_string($articoloVisivile)."')";
	  if($mysqli->query($sqlArticolo)):  
		   $nextId = $mysqli->insert_id;
		   //UPLOAD IMGS ///////////////////////////////////////////////////
		   foreach ($_FILES['file']['tmp_name'] as $key => $val ):
			   $target_pathA = "img/";
			   $temp = explode(".",$_FILES['file']['name'][$key]);
			   // CHANGE NAME IMG /////////////////////////////////
			   $newfilename = rand(1,99999) . '.' .end($temp);
			   $target_pathA = $target_pathA.basename($newfilename);	 
			   //UPLOAD IMG IN FOLDER DEFINED //////////////////////////////////
			   if( is_uploaded_file($_FILES['file']['tmp_name'][$key]) ):
				  move_uploaded_file($_FILES['file']['tmp_name'][$key], $target_pathA) or die("Impossibile spostare il file, controlla l'esistenza o i permessi della directory dove fare l'upload. ");
				  $img = $newfilename;
				  /// QUERY IMG ///////////////////////////////////////////////
				  $sql="INSERT INTO `immagine`(`immagine_id`, `immagine_label`, `immagine_data_creazione`, `immagine_data_modifica`, `immagine_articolo_id`, `immagine_tipo`, `immagine_ordinamento`) VALUES (NULL,'".$img."','".date("Y-m-d H:i:s")."','','".$nextId."', '".$_FILES['file']['type'][$key]."', '')";
				  $mysqli->query($sql); 
			   //CLOSE UPLOAD IMG IN FOLDER DEFINED //////////////////////////////////	  
			   endif;
			// CLOSE FOREACH ///////////////////// 
			endforeach;
		echo "Articolo Inserito!"; 
	  else:
		echo "ERRORE: RIPROVA";   
	  endif;
	endif;
	/* END AGGIUNGI ARTICOLO DB BACKEND *******************/	


//////////////////////////////////////////////// REGISTRATI ////////////////////////////////////////////// 
if(isset($_POST["modificaREg"])):


    $sqlArticolo = "UPDATE `cliente` SET `cliente_nome`='".$mysqli->real_escape_string($_POST["nome_utente_modifica"])."', `cliente_cognome`='".$mysqli->real_escape_string($_POST["cognome_utente"])."',`cliente_ragione_sociale`='".$mysqli->real_escape_string($_POST["ragione_utente_admin"])."',`cliente_indirizzo`='".$mysqli->real_escape_string($_POST["indirizzo_utente_admin"])."',`cliente_cap`='".$mysqli->real_escape_string($_POST["cap_utente_admin"])."', `cliente_provincia`='".$mysqli->real_escape_string($_POST["provincia_utente_admin"])."', `cliente_email`='".$mysqli->real_escape_string($_POST["email_utente_admin"])."', `cliente_telefono`='".$mysqli->real_escape_string($_POST["telefono_utente_admin"])."', `cliente_partita_iva`='".$mysqli->real_escape_string($_POST["iva_utente_admin"])."', `cliente_codice_fiscale`='".$mysqli->real_escape_string($_POST["fiscale_utente_admin"])."', `cliente_data_modifica`='".date("Y-m-d H:i:s")."' WHERE `cliente_id` = '".$_SESSION["id_utente"]."' ";
	
    if($mysqli->query($sqlArticolo)):

    else:

    endif;


endif;


//////////////////////////////////////////////// LOGOFF ////////////////////////////////////////////// 

      /* condizione di logoff per uscire dall' admin */
	  if(isset($_GET["logoff"])):

		// Desetta tutte le variabili di sessione.
		session_unset();
		// Infine , distrugge la sessione.
		session_destroy();

	  endif;

?>

<!doctype html> <!--Dichairazione DOCTYPE-->

<!--Inizio HTML-->

<html>

    <!--Inizio Head-->

	<head>

		<?php 
		
			include ("include/config/meta.php"); // Inclusione Meta Tags
			
		?>

		<!--Inclusione CSS-->

		<!--Inizio CSS-->
        
        <link rel="stylesheet" href="css/style.css"> <!--CSS Main-->
        <link rel="icon" href="favicon.png" type="image/png" /> <!--FavIcon-->
        
	</head>
    
    <!--Fine Head-->
    
    <!--Inizio Body-->

	<body>
            
	  <?php 
	  
      	include ("include/config/banner_cookies.php"); // Inclusione Banner Cookies
        include ("include/config/header.php"); // Inclusione Header
      
      	/*-- BODY -------------------------------------------------------------------*/


        if( $pag == "" ): // PAGINA DEFAULT "INDEX.PHP"
		
		  include "include/home.php";
		  
	    elseif($pag != ""): // CICLO PAGINE	   
		
		  $sqlPaginaLoop = "SELECT * FROM `pagina`"; 
		 
		  $rPaginaL = $mysqli->query($sqlPaginaLoop);
		
	     while ($rowPag = $rPaginaL->fetch_array()): 
		   
		   if( $pag == $rowPag['pagina_id'] ):
		   
		  		 include "include/".$rowPag['pagina_riferimento']."";   
				 
		    endif;		 
		    
		 endwhile;
		
		endif;
		

        /*-- END BODY ------------------------------------------------------------------*/
		
		include ("include/config/footer.php"); // Inclusione Footer
         
      ?>
            
    </body>
    
    <!--Fine Body -->
    
    <!--Inizio Footer-->
    
    <?php 
	
     	/************   FOOTER JS   ******************/
	  
     	include ("include/config/scripts.php"); // Inclusione JavaScript
		
    ?>
    
    <!--Fine Footer-->

</html>