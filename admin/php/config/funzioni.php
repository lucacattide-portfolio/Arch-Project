<?php 

/* LISTA QUERY DIVISE PER PAGINE */

if($pag == "account"):

	$sqlAccount = "SELECT * FROM `admin`"; 

	$rAccount = $mysqli->query($sqlAccount);

	$countAccount =  $rAccount->num_rows;

endif;

if($pag == "pagina" || $pag == "" ):

	$sqlPagina = "SELECT * FROM `pagina`"; 

	$rPagina = $mysqli->query($sqlPagina);
	
	$sqlPagina2 = "SELECT * FROM `pagina`"; 

	$rPagina2 = $mysqli->query($sqlPagina);
	
	$sqlPagina3 = "SELECT * FROM `pagina`"; 

	$rPagina3 = $mysqli->query($sqlPagina);

	$countPagina =  $rPagina->num_rows;

endif;

if($pag == "categorie"):

	$sqlCategoria = "SELECT * FROM `categoria`"; 

	$rCategoria = $mysqli->query($sqlCategoria);

	$countCategoria = $rCategoria->num_rows;

endif;

if( $pag == "crea-pagina" ):

   $sqlArticolo = "SELECT * FROM `articolo` WHERE `articolo_pagina_id` = '".$_GET["id"]."' ";
   
   $rArticolo = $mysqli->query($sqlArticolo);
   
   $countArticolo =  $rArticolo->num_rows;
   
endif;


if($pag == "clienti"):

	$sqlClienti = "SELECT * FROM `cliente` ORDER BY cliente_nome ASC"; 

	$rClienti = $mysqli->query($sqlClienti);

	$countClienti = $rClienti->num_rows;

endif;


if($pag == "clienti-account"):

	$sqlClientiAccount = "SELECT * FROM `cliente` WHERE cliente_id = '".$_GET["id"]."' "; 

	$rClientiAccount = $mysqli->query($sqlClientiAccount);

	$countClientiAccount = $rClientiAccount->num_rows;


    $sqlAzienda = "SELECT * FROM `azienda` ORDER BY azienda_nome ASC"; 

	$rAzienda = $mysqli->query($sqlAzienda);

	$countAzienda = $rAzienda->num_rows;

endif;


if($pag == "aziende"):

	$sqlAzienda = "SELECT * FROM `azienda` ORDER BY azienda_nome ASC"; 

	$rAzienda = $mysqli->query($sqlAzienda);

	$countAzienda = $rAzienda->num_rows;

endif;


if($pag == "aziende-account"):

	$sqlAziendaAccount = "SELECT * FROM `azienda` WHERE azienda_id = '".$_GET["id"]."' "; 

	$rAziendaAccount = $mysqli->query($sqlAziendaAccount);

	$countAziendaAccount = $rAziendaAccount->num_rows;

endif;



?>