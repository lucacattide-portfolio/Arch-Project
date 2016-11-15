<?php 
 
 include("../connessione_sql.php");
 
 /* DATA FUSO ORARIO */
  date_default_timezone_set('Europe/Rome');
 
 /* CARICA IMMAGINI ***********************************/
function imgUp($img){
	
  //imposta directory img 
  $target_pathA = "../../../img/";
  $temp = explode(".",$img['name']);
  $newfilename = rand(1,99999) . '.' .end($temp);
  $target_pathA = $target_pathA.basename($newfilename);	 
 
   //upload img
   if( is_uploaded_file($img["tmp_name"]) ) {
	  move_uploaded_file($img["tmp_name"], $target_pathA) or die("Impossibile spostare il file, controlla l'esistenza o i permessi della directory dove fare l'upload. ");
	  $img = $newfilename;
   }
   else{
	  $img = ""; 
   }
 return $img;
} 
/* END CARICA IMMA
 
 
/*CREAZIONE DI NUOVO AMMINISTRATORE DB BACKEND*/

/*ACCOUNT PAGE ***************************************************************/

/* CREA AMMINISTRATORE DB BACKEND ***************/

if(isset($_POST["account"])):

   if((!empty($_POST["username2"])) && (!empty($_POST["password2"]))):
	   /* PERMESSI DI ACCESSO */
	   $liv = $_POST["liv"];
	   $livello = $_POST["livello"];
	   /* SET LIVELLO SE LIVELLO NON E' CORRETTO */
	   if( $liv <= $livello ): $livello = $liv+1; endif;
	   /* SET QUERY */
	   $sqlAccount = "INSERT INTO `admin`(`admin_id`, `admin_user`, `admin_password`, `admin_accesso`, `admin_data_creazione`) VALUES (NULL,'".$mysqli->real_escape_string($_POST["username2"])."','".$mysqli->real_escape_string($_POST["password2"])."','".$livello."','".date("Y-m-d H:i:s")."' )";  
	   if($mysqli->query($sqlAccount)): 
		  echo "Utente creato";
		else:
		  echo "Errore! Riprova";   
		endif;  
	  
	else: 
   
	  echo "Errore! Compila tutti i campi";    
   
   endif;
   
endif;
/* END CREA AMMINISTRATORE DB BACKEND ***************/
  
/* MODIFICA AMMINISTRATORE DB BACKEND ***************/
if(isset($_POST["modificAccount"])):
 /* PERMESSI DI ACCESSO */
 $liv = $_POST["liv"];
 $livello = $_POST["livello"];
 $id = $_POST["admin_id"];
 /* SET LIVELLO SE LIVELLO NON E' CORRETTO */
 if( $livello < $liv ): $livello = $liv+1; endif;
 /* SET QUERY */
 $sqlAccount = "UPDATE `admin` SET `admin_accesso`='".$livello."' WHERE `admin_id` = $id ";  
 if($mysqli->query($sqlAccount)): 
	echo "Modifiche salvate";
  else:
	echo "Errore! Riprova";      
  endif;  	 
endif;
/* END MODIFICA AMMINISTRATORE DB BACKEND ***************/
  
/* ELIMINA AMMINISTRATORE DB BACKEND ***************/
if(isset($_POST["eliminAccount"])):
  $id = $_POST["admin_id"];
  $sqlElAccount = "DELETE FROM `admin` WHERE admin_id = $id";
  if($mysqli->query($sqlElAccount)): 
	echo "Account eliminato"; 
  else:
   echo "Errore! Riprova";   
  endif; 
endif;
/* END ELIMINA AMMINISTRATORE DB BACKEND ***************/

/* ENDACCOUNT PAGE ***********************************************************/ 


/* PAGE **********************************************************************/ 

/* AGGIUNGI NUOVA PAGINA DB BACKEND ***************/
if(isset($_POST["nuovaPagina"])):
   $nextId = 0;
   //UPLOAD IMGS ///////////////////////////////////////////////////
   if( isset($_FILES['file']) ):
	   foreach ($_FILES['file']['tmp_name'] as $key => $val ):
		   $target_pathA = "../../../img/";
		   $temp = explode(".",$_FILES['file']['name'][$key]);
		   // CHANGE NAME IMG /////////////////////////////////
		   $newfilename = rand(1,99999) . '.' .end($temp);
		   $target_pathA = $target_pathA.basename($newfilename);	 
		   //UPLOAD IMG IN FOLDER DEFINED //////////////////////////////////
		   if( is_uploaded_file($_FILES['file']['tmp_name'][$key]) ):
			  move_uploaded_file($_FILES['file']['tmp_name'][$key], $target_pathA) or die("Impossibile spostare il file, controlla l'esistenza o i permessi della directory dove fare l'upload. ");
			  $img = $newfilename;
			  /// QUERY IMG ///////////////////////////////////////////////
			  $sql="INSERT INTO `immagine`(`immagine_id`, `immagine_label`, `immagine_data_creazione`, `immagine_data_modifica`, `immagine_articolo_id`, `immagine_tipo`, `immagine_ordinamento`) VALUES (NULL,'".$img."','".date("Y-m-d H:i:s")."','','', '".$_FILES['file']['type'][$key]."', '')";
			  $mysqli->query($sql);
			  $nextId = $mysqli->insert_id; 
		   //CLOSE UPLOAD IMG IN FOLDER DEFINED //////////////////////////////////	  
		   endif;
		// CLOSE FOREACH ///////////////////// 
		endforeach; 
	endif;


	$sqlPagina = "INSERT INTO `pagina`(`pagina_id`, `pagina_url`, `pagina_riferimento`, `pagina_meta_title`, `pagina_meta_description`, `pagina_meta_tag`, `pagina_immagine_id`, `pagina_gallery_id`, `pagina_lingua`, `pagina_data_creazione`, `pagina_data_modifica`, `pagina_dipendenza_id`, `pagina_ordinamento`, `pagina_categoria_id`) VALUES (NULL,'".$mysqli->real_escape_string($_POST["pagina_url"])."','".$mysqli->real_escape_string($_POST["pagina_riferimento"])."','".$mysqli->real_escape_string($_POST["pagina_meta_title"])."','".$mysqli->real_escape_string($_POST["pagina_meta_description"])."','".$mysqli->real_escape_string($_POST["pagina_meta_tag"])."','".$nextId."','','','".date("Y-m-d H:i:s")."','".date("Y-m-d H:i:s")."','".$mysqli->real_escape_string($_POST["pagina_dipendenza_id"])."','0','0')";
	if($mysqli->query($sqlPagina)): 
	  echo "Pagina creata"; 
	else:
	  echo "Errore! Riprova";   
	endif;  	
endif;
/* END AGGIUNGI NUOVA PAGINA DB BACKEND ***************/

/* MODIFICA PAGINA DB BACKEND ***************/
if(isset($_POST["modificaPagina"])):

  $nextId = 0;
  
  //UPLOAD IMGS //////////////////////////////////////////////////
   if( isset($_FILES['file']) ):
	   foreach ($_FILES['file']['tmp_name'] as $key => $val ):
		   $target_pathA = "../../../img/";
		   $temp = explode(".",$_FILES['file']['name'][$key]);
		   // CHANGE NAME IMG /////////////////////////////////
		   $newfilename = rand(1,99999) . '.' .end($temp);
		   $target_pathA = $target_pathA.basename($newfilename);	 
		   //UPLOAD IMG IN FOLDER DEFINED //////////////////////////////////
		   if( is_uploaded_file($_FILES['file']['tmp_name'][$key]) ):
			  move_uploaded_file($_FILES['file']['tmp_name'][$key], $target_pathA) or die("Impossibile spostare il file, controlla l'esistenza o i permessi della directory dove fare l'upload. ");
			  $img = $newfilename;
			  /// QUERY IMG ///////////////////////////////////////////////
			  $sql="INSERT INTO `immagine`(`immagine_id`, `immagine_label`, `immagine_data_creazione`, `immagine_data_modifica`, `immagine_articolo_id`, `immagine_tipo`, `immagine_ordinamento`) VALUES (NULL,'".$img."','".date("Y-m-d H:i:s")."','','', '".$_FILES['file']['type'][$key]."', '')";
			  $mysqli->query($sql);
			  $nextId = $mysqli->insert_id; 
		   //CLOSE UPLOAD IMG IN FOLDER DEFINED //////////////////////////////////	  
		   endif;
		// CLOSE FOREACH ///////////////////// 
		endforeach; 
	endif;

  if($nextId != 0):
	  $sqlPagina = "UPDATE `pagina` SET `pagina_url`='".$mysqli->real_escape_string($_POST["pagina_url"])."',`pagina_riferimento`='".$mysqli->real_escape_string($_POST["pagina_riferimento"])."',`pagina_meta_title`='".$mysqli->real_escape_string($_POST["pagina_meta_title"])."',`pagina_meta_description`='".$mysqli->real_escape_string($_POST["pagina_meta_description"])."',`pagina_meta_tag`='".$mysqli->real_escape_string($_POST["pagina_meta_tag"])."',`pagina_immagine_id`='".$nextId."',`pagina_data_modifica`='".date("Y-m-d H:i:s")."',`pagina_dipendenza_id`='".$mysqli->real_escape_string($_POST["pagina_dipendenza_id"])."' WHERE `pagina_id` = '".$mysqli->real_escape_string($_POST["pagina_id"])."' ";
  else:
	  $sqlPagina = "UPDATE `pagina` SET `pagina_url`='".$mysqli->real_escape_string($_POST["pagina_url"])."',`pagina_riferimento`='".$mysqli->real_escape_string($_POST["pagina_riferimento"])."',`pagina_meta_title`='".$mysqli->real_escape_string($_POST["pagina_meta_title"])."',`pagina_meta_description`='".$mysqli->real_escape_string($_POST["pagina_meta_description"])."',`pagina_meta_tag`='".$mysqli->real_escape_string($_POST["pagina_meta_tag"])."',`pagina_data_modifica`='".date("Y-m-d H:i:s")."',`pagina_dipendenza_id`='".$mysqli->real_escape_string($_POST["pagina_dipendenza_id"])."' WHERE `pagina_id` = '".$mysqli->real_escape_string($_POST["pagina_id"])."' ";
  endif;
  
  if($mysqli->query($sqlPagina)): 
	echo "Pagina modificata"; 
  else:
	echo "Errore! Riprova";     
  endif; 
endif;
/* END MODIFICA PAGINA DB BACKEND ***************/ 


/* ELIMINA PAGINA DB BACKEND *******************/
if(isset($_POST["eliminPagina"])):
  $sqlPagina = "DELETE FROM `pagina` WHERE `pagina_id` = '".$mysqli->real_escape_string($_POST["pagina_id"])."' ";
  if($mysqli->query($sqlPagina)): 
	echo "Pagina eliminata"; 
  else:
   echo "Errore! Riprova";   
  endif; 
endif;
/* END ELIMINA PAGINA DB BACKEND ***************/ 

/* END PAGE ******************************************************************/ 
  
/* ARTICOLO **********************************************************************/
  
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
		   $target_pathA = "../../../img/";
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
  
  
/* MODIFICA ARTICOLO DB BACKEND *******************/
if(isset($_POST["modificaArticolo"])): 
	$id = $_POST["articolo_id"];
	$dateModifica = date("Y-m-d H:i:s", strtotime($_POST["articolo_data_modifica"]));
	if(isset($_POST["articolo_img_id"])): $disponibile =  $_POST["articolo_img_id"]; else: $disponibile = "0"; endif;
	if(isset($_POST["articolo_categoria_id"]) ):  $categoria = $_POST["articolo_categoria_id"];  else:  $categoria = "";  endif;
	if(isset($_POST["articolo_gallery_id"])): $evidenza = $_POST["articolo_gallery_id"]; else: $evidenza = "2"; endif;
	$sqlModificaArticolo =" UPDATE `articolo` SET `articolo_titolo`='".$mysqli->real_escape_string($_POST["articolo_titolo"])."',`articolo_sottotitolo`='".$mysqli->real_escape_string($_POST["articolo_sottotitolo"])."',`articolo_testo`='".$mysqli->real_escape_string($_POST["articolo_testo"])."',`articolo_url`='".$mysqli->real_escape_string($_POST["articolo_url"])."',`articolo_img_id`='".$disponibile."',`articolo_gallery_id`='".$evidenza."', `articolo_data_modifica`='".$dateModifica."', `articolo_categoria_id`='".$categoria."',`articolo_visibile`='".$mysqli->real_escape_string($_POST["articolo_visibile"])."' WHERE `articolo_id` = $id ";	
	if($mysqli->query($sqlModificaArticolo)):  
	   $nextId = $id;
	   //UPLOAD IMGS ///////////////////////////////////////////////////
	   foreach ($_FILES['file']['tmp_name'] as $key => $val ):
		   $target_pathA = "../../../img/";
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
		//ELIMINA IMGS ///////////////////////////////////////////////////
		if(!empty($_POST['immagine_id'])):
			foreach ($_POST['immagine_id'] as $key => $val ): 
				$sqlElImmagine = "DELETE FROM `immagine` WHERE immagine_id = ".$val."";
				$mysqli->query($sqlElImmagine);
			endforeach;
		//END ELIMINA IMGS ///////////////////////////////////////////////////	  
		endif;
		//ORDINAMENTO IMGS ///////////////////////////////////////////////////
		if(isset($_POST['immagine_ordinamento'])):
			foreach ($_POST['immagine_ordinamento'] as $key => $val ): 
				$sqlUpdateImmagine = "UPDATE `immagine` SET `immagine_ordinamento` = '".$key."' WHERE `immagine_id` = ".$val."";
				$mysqli->query($sqlUpdateImmagine);
			//ORDINAMENTO IMGS ///////////////////////////////////////////////////  
			endforeach;
		endif;
		
		//ELIMINA ARTICOLO //////////////////////////////////////////////////
		
		if(isset($_POST["eliminaArticolo"])):
		   $sqlElArt = "DELETE FROM `articolo` WHERE articolo_id = ".$id."";
		   $mysqli->query($sqlElArt);
		   echo "Articolo Eliminato";
		else:
		  echo " Articolo Modificato!"; 
		endif;
		
	
  else:
	echo "ERRORE: RIPROVA";   
  endif;
/* END MODIFICA ARTICOLO DB BACKEND *******************/
endif;

/* END ARTICOLO **********************************************************************/

/* CATEGORIA **********************************************************************/
  
/* NUOVA CATEGORIA **********************************************************/
if(isset($_POST["nuovaCategoria"])): 
   $nextId = 0;
   //UPLOAD IMGS ///////////////////////////////////////////////////
   if( isset($_FILES['file']) ):
	   foreach ($_FILES['file']['tmp_name'] as $key => $val ):
		   $target_pathA = "../../../img/";
		   $temp = explode(".",$_FILES['file']['name'][$key]);
		   // CHANGE NAME IMG /////////////////////////////////
		   $newfilename = rand(1,99999) . '.' .end($temp);
		   $target_pathA = $target_pathA.basename($newfilename);	 
		   //UPLOAD IMG IN FOLDER DEFINED //////////////////////////////////
		   if( is_uploaded_file($_FILES['file']['tmp_name'][$key]) ):
			  move_uploaded_file($_FILES['file']['tmp_name'][$key], $target_pathA) or die("Impossibile spostare il file, controlla l'esistenza o i permessi della directory dove fare l'upload. ");
			  $img = $newfilename;
			  /// QUERY IMG ///////////////////////////////////////////////
			  $sql="INSERT INTO `immagine`(`immagine_id`, `immagine_label`, `immagine_data_creazione`, `immagine_data_modifica`, `immagine_articolo_id`, `immagine_tipo`, `immagine_ordinamento`) VALUES (NULL,'".$img."','".date("Y-m-d H:i:s")."','','', '".$_FILES['file']['type'][$key]."', '')";
			  $mysqli->query($sql);
			  $nextId = $mysqli->insert_id; 
		   //CLOSE UPLOAD IMG IN FOLDER DEFINED //////////////////////////////////	  
		   endif;
		// CLOSE FOREACH ///////////////////// 
		endforeach; 
	endif;



  $sqlCategoria = "INSERT INTO `categoria`(`categoria_id`, `categoria_nome`, `categoria_url`, `categoria_articolo_id`, `categoria_immagine_id`, `categoria_gallery_id`, `categoria_data_creazione`, `categoria_data_modific`) VALUES (NULL,'".$mysqli->real_escape_string($_POST["categoria_nome"])."','".$mysqli->real_escape_string($_POST["categoria_url"])."','".$nextId."','','','".date("Y-m-d H:i:s")."','')";
  if($mysqli->query($sqlCategoria)):
	 echo "Categoria Aggiunta!";
  else:
	 echo "ERRORE: RIPROVA";   
  endif;   
endif;
/* END NUOVA CATEGORIA **********************************************************/
  
/* MODIFICA CATEGORIA **********************************************************/
if(isset($_POST["modificaCategoria"])): 

  $nextId = 0;
  
  //UPLOAD IMGS //////////////////////////////////////////////////
   if( isset($_FILES['file']) ):
	   foreach ($_FILES['file']['tmp_name'] as $key => $val ):
		   $target_pathA = "../../../img/";
		   $temp = explode(".",$_FILES['file']['name'][$key]);
		   // CHANGE NAME IMG /////////////////////////////////
		   $newfilename = rand(1,99999) . '.' .end($temp);
		   $target_pathA = $target_pathA.basename($newfilename);	 
		   //UPLOAD IMG IN FOLDER DEFINED //////////////////////////////////
		   if( is_uploaded_file($_FILES['file']['tmp_name'][$key]) ):
			  move_uploaded_file($_FILES['file']['tmp_name'][$key], $target_pathA) or die("Impossibile spostare il file, controlla l'esistenza o i permessi della directory dove fare l'upload. ");
			  $img = $newfilename;
			  /// QUERY IMG ///////////////////////////////////////////////
			  $sql="INSERT INTO `immagine`(`immagine_id`, `immagine_label`, `immagine_data_creazione`, `immagine_data_modifica`, `immagine_articolo_id`, `immagine_tipo`, `immagine_ordinamento`) VALUES (NULL,'".$img."','".date("Y-m-d H:i:s")."','','', '".$_FILES['file']['type'][$key]."', '')";
			  $mysqli->query($sql);
			  $nextId = $mysqli->insert_id; 
		   //CLOSE UPLOAD IMG IN FOLDER DEFINED //////////////////////////////////	  
		   endif;
		// CLOSE FOREACH ///////////////////// 
		endforeach; 
	endif;
  

  if(  $nextId != 0 ):
	  $sqlModificaCategoria = "UPDATE `categoria` SET `categoria_nome`='".$mysqli->real_escape_string($_POST["categoria_nome"])."', `categoria_url`='".$mysqli->real_escape_string($_POST["categoria_url"])."',  `categoria_articolo_id` = ".$nextId."  WHERE `categoria_id` = '".$_POST["categoria_id"]."'";
  else:
	  $sqlModificaCategoria = "UPDATE `categoria` SET `categoria_nome`='".$mysqli->real_escape_string($_POST["categoria_nome"])."', `categoria_url`='".$mysqli->real_escape_string($_POST["categoria_url"])."'  WHERE `categoria_id` = '".$_POST["categoria_id"]."'";
  endif;

  if($mysqli->query($sqlModificaCategoria)):
	 echo "Categoria Modificata!";
  else:
	 echo "ERRORE: RIPROVA";   
   endif;
endif; 
/* END MODIFICA CATEGORIA **********************************************************/
  
/* ELIMINA CATEGORIA **********************************************************/
if(isset($_POST["eliminaCategoria"])): 
  $sqlElCategoria = "DELETE FROM `categoria` WHERE categoria_id = ".$_POST["categoria_id"]."";
  if($mysqli->query($sqlElCategoria)):
	 echo "Categoria Eliminata!";
  else:
	 echo "ERRORE: RIPROVA";   
   endif;

endif; 
/* END ELIMINA CATEGORIA **********************************************************/
  
  
/* END CATEGORIA **********************************************************************/

/* AZIENDA **********************************************************************/

/* AGGIUNGI NUOVA AZIENDA ***************/
if(isset($_POST["nuovaAzienda"])):
	 if(isset($_POST["azienda_nome"])): $aziendaNome = $_POST["azienda_nome"]; else: $aziendaNome = ""; endif;
	 if(isset($_POST["azienda_email"])): $aziendaEmail = $_POST["azienda_email"]; else: $aziendaEmail = ""; endif;
	 if(isset($_POST["azienda_partita_iva"])): $aziendaPartitaIva = $_POST["azienda_partita_iva"]; else: $aziendaPartitaIva = ""; endif;
	 if(isset($_POST["azienda_indirizzo"])): $aziendaIndirizzo = $_POST["azienda_indirizzo"]; else: $aziendaIndirizzo = ""; endif;
	 if(isset($_POST["azienda_cap"])): $aziendaCap = $_POST["azienda_cap"]; else: $aziendaCap = ""; endif;
	 if(isset($_POST["azienda_provincia"])): $aziendaProvincia = $_POST["azienda_provincia"]; else: $aziendaProvincia = ""; endif;
	 if(isset($_POST["azienda_telefono"])): $aziendaTelefono = $_POST["azienda_telefono"]; else: $aziendaTelefono = ""; endif;
	 $sqlAzienda = "INSERT INTO `azienda`(`azienda_id`, `azienda_nome`, `azienda_email`, `azienda_partita_iva`, `azienda_indirizzo`, `azienda_cap`, `azienda_provincia`, `azienda_stato`, `azienda_telefono`, `azienda_data_creazione`, `azienda_data_modifica`) VALUES (NULL,'".$mysqli->real_escape_string($aziendaNome)."','".$mysqli->real_escape_string($aziendaEmail)."','".$mysqli->real_escape_string($aziendaPartitaIva)."','".$mysqli->real_escape_string($aziendaIndirizzo)."','".$mysqli->real_escape_string($aziendaCap)."','".$mysqli->real_escape_string($aziendaProvincia)."','Italia','".$mysqli->real_escape_string($aziendaTelefono)."','".date("Y-m-d H:i:s")."','')";
	 if($mysqli->query($sqlAzienda)):
	 $nextId = $mysqli->insert_id;
	   if(isset($_POST['match_categoria_id']) ):
				foreach ($_POST['match_categoria_id'] as $key => $val ):
					$sqlMatch = "INSERT INTO `match_azienda_categoria_articolo`(`id_match`, `match_azienda_id`, `match_categoria_id`, `match_articolo_id`) VALUES (NULL,'".$nextId."','".$val."','')";
					$mysqli->query($sqlMatch);
				endforeach;
			echo "Contenuti Azienda aggiunti!";	 
		else:
			echo "Azienda aggiunta!";
	    endif;	
	 else:
	   echo "ERRORE: RIPROVA";   
	 endif;
endif; 
/* END NUOVA AZIENDA **********************************************************/

/* MODIFICA AZIENDA ***************/
if(isset($_POST["modificaAzienda"])):
	 if(isset($_POST["azienda_nome"])): $aziendaNome = $_POST["azienda_nome"]; else: $aziendaNome = ""; endif;
	 if(isset($_POST["azienda_email"])): $aziendaEmail = $_POST["azienda_email"]; else: $aziendaEmail = ""; endif;
	 if(isset($_POST["azienda_partita_iva"])): $aziendaPartitaIva = $_POST["azienda_partita_iva"]; else: $aziendaPartitaIva = ""; endif;
	 if(isset($_POST["azienda_indirizzo"])): $aziendaIndirizzo = $_POST["azienda_indirizzo"]; else: $aziendaIndirizzo = ""; endif;
	 if(isset($_POST["azienda_cap"])): $aziendaCap = $_POST["azienda_cap"]; else: $aziendaCap = ""; endif;
	 if(isset($_POST["azienda_provincia"])): $aziendaProvincia = $_POST["azienda_provincia"]; else: $aziendaProvincia = ""; endif;
	 if(isset($_POST["azienda_telefono"])): $aziendaTelefono = $_POST["azienda_telefono"]; else: $aziendaTelefono = ""; endif;
	 $sqlModificaAzienda="UPDATE `azienda` SET `azienda_nome`='".$mysqli->real_escape_string($aziendaNome)."',`azienda_email`='".$mysqli->real_escape_string($aziendaEmail)."',`azienda_partita_iva`='".$mysqli->real_escape_string($aziendaPartitaIva)."',`azienda_indirizzo`='".$mysqli->real_escape_string($aziendaIndirizzo)."',`azienda_cap`='".$mysqli->real_escape_string($aziendaCap)."',`azienda_provincia`='".$mysqli->real_escape_string($aziendaProvincia)."',`azienda_telefono`='".$mysqli->real_escape_string($aziendaTelefono)."',`azienda_data_modifica`='".date("Y-m-d H:i:s")."' WHERE `azienda_id` = '".$_POST["azienda_id"]."' ";
     if($mysqli->query($sqlModificaAzienda)):
	 	if(isset($_POST['match_categoria_id']) ):
		        foreach ($_POST['match_categoria_id'] as $key => $val ):
					$sqlDeleteMatch = "DELETE FROM `match_azienda_categoria_articolo` WHERE `match_azienda_id` = '".$_POST["azienda_id"]."'  AND `match_articolo_id` = 0  ";
					$mysqli->query($sqlDeleteMatch);
				endforeach; 
				foreach ($_POST['match_categoria_id'] as $key => $val ):
					$sqlMatch = "INSERT INTO `match_azienda_categoria_articolo`(`id_match`, `match_azienda_id`, `match_categoria_id`, `match_articolo_id`) VALUES (NULL,'".$_POST["azienda_id"]."','".$val."','')";
					$mysqli->query($sqlMatch);
				endforeach; 
			echo "Contenuti Azienda aggiornati!";	 
		else:
			echo "Azienda aggiornata!";
	    endif;
		// ELIMINA ARTICOLO /////////////////////////////////////////////////
		if(isset($_POST["eliminaArticolo"])):
		   $sqlElArt = "DELETE FROM `articolo` WHERE articolo_id = ".$_POST["articolo_id"]."";
		   $mysqli->query($sqlElArt);
		   echo " Articolo Eliminato";
		else:
		  echo " Articolo Modificato!"; 
		endif;
		// END ELIMINA ARTICOLO /////////////////////////////////////////////////
	 else:
	    echo "ERRORE: RIPROVA";   
	 endif;
/* END MODIFICA AZIENDA ***************/
endif;


/* MODIFICA AZIENDA ***************/
if(isset($_POST["eliminaAzienda"])):
    $sqlDeleteAzienda = "DELETE FROM `azienda` WHERE azienda_id = '".$_POST["azienda_id"]."' ";
	if($mysqli->query($sqlDeleteAzienda)):
	  echo "Azienda Eliminata!";
	else:
	  echo "ERRORE: RIPROVA";  
	endif;
/* END MODIFICA AZIENDA ***************/
endif;

/* END AZIENDA **********************************************************************/

if(isset($_POST["clienteRiviste"])):
      
      // COMBINA RISULTATI
      $arrayCombine = array_combine($_POST['articolo_id'], $_POST['visibile']);

      // QUERY DI VERIFICA

	  foreach ( $arrayCombine as $key => $val ):
        
         $sqlVerifica = "SELECT * FROM `match_cliente_cataloghi` WHERE `match_cli_cat_articolo_id` = '".$key."' ";
         $rVerifica = $mysqli->query($sqlVerifica);
         $countVerifica  = $rVerifica->num_rows;
		 if($countVerifica  >= 1):
           
            //upload
            $sqlUpload = "UPDATE `match_cliente_cataloghi` SET `match_cli_cat_visibile`= '".$val."' WHERE `match_cli_cat_articolo_id` = '".$key."' ";
			if($mysqli->query($sqlUpload)):
			  echo "Stato di pubblicazione aggiornato!<br>";
			else:
			  echo "ERRORE: RIPROVA";  
			endif;

         else:

           //insert
           $sqlInsert = "INSERT INTO `match_cliente_cataloghi`(`id_match_cli_cat`, `match_cli_cat_cliente_id`, `match_cli_cat_articolo_id`, `match_cli_cat_visibile`) VALUES (NULL,'".$_POST["cliente_id"]."','".$key."','".$val."')";
           if($mysqli->query($sqlInsert)):
			  echo "Stato di pubblicazione aggiunto!<br>";
			else:
			  echo "ERRORE: RIPROVA";  
			endif;

		endif;

			

	  endforeach;
       


endif;


/* CLIENTI **********************************************************************/


/* END CLIENTI **********************************************************************/


?>