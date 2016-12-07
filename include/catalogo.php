<?php

	if( $_SERVER['SERVER_NAME'] == "localhost" ){	
	    $host="62.149.150.246";
        $user="Sql903871";
        $password="ia1wckpzg3";
        $db="Sql903871_4";

	}else{

		$host="";
		$user="";
		$password="";
		$db="";
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
	
<h2 id="titolo_popup"> <!--Avviso-->

	CLICCA SULLA X o sul menu in alto PER CHIUDERE QUESTA PAGINA E TORNARE AL SITO

</h2>

<div id="chiudi_popup"> <!--Chiudi-->
</div>

<!--Inizio Corpo-->

<article id="summary_popup">
        
	<!--Inizio Titoli-->

	<hgroup>

		<h7> 

			Descrizione

		</h7>

		<?php

			$sqlArticoloPdf = "SELECT * FROM `match_azienda_categoria_articolo` LEFT JOIN `azienda` ON `match_azienda_categoria_articolo`.match_azienda_id = `azienda`.azienda_id WHERE match_categoria_id = '".$_POST['categoria']."' AND `azienda`.azienda_id = ".$_POST["azienda"]."";
			$rArticoloPdf = $mysqli->query($sqlArticoloPdf);
			$countArticoloPdf  = $rArticoloPdf->num_rows;

			if($countArticoloPdf  >= 1):

				while ( $rowArticoloPdf = $rArticoloPdf->fetch_array()):

		?>

		<h2 id="titolo_catalogo">

			<?php echo $rowArticoloPdf["azienda_nome"]; ?>

		</h2>

	</hgroup>

	<!--Fine Titoli-->

	<!--Inizio Descrizione-->

	<p id="descrizione_catalogo">

		Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore 
et dolore magna aliqua. Ut enim ad minim veniam, quisnostrum exercitationem ullam corporis 
suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit 
in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 

	</p>

	<!--Fine Descrizione-->
	
	<?php

			endwhile;
					  
		endif;

	?>

</article>

<!--Fine Corpo-->

<!--Inizio Download Contestuale-->

<aside id="popup_download_contestuale" class="deseleziona">

	<!--Inizio Titoli-->

	<hgroup>

		<h7>

			Download Contestuale

		</h7>

	</hgroup>

	<!--Fine Titoli-->
	
	<?php
	
		$sqlArticoloPdf = "SELECT * FROM `articolo` WHERE  articolo_azienda_id = '".$_POST["azienda"]."' AND articolo_categoria_id = '".$_POST["categoria"]."' ORDER BY articolo_titolo ASC ";
	    $rArticoloPdf = $mysqli->query($sqlArticoloPdf);
	    $countArticoloPdf  = $rArticoloPdf->num_rows;
		
	    if($countArticoloPdf  >= 1):
		
			while ( $rowArticoloPdf = $rArticoloPdf->fetch_array()):
	
				$sqlImmagine = "SELECT * FROM `immagine` WHERE immagine_articolo_id = '".$rowArticoloPdf["articolo_id"]."' ORDER BY `immagine_ordinamento` ASC";
				$rImmagine = $mysqli->query($sqlImmagine);
				$countImmagine =  $rImmagine->num_rows;

				if( $countImmagine >= 1 ):

					while ( $rowImmagine = $rImmagine->fetch_array()):

						if(  $rowImmagine["immagine_tipo"] == "application/pdf" ): 

							$linkDocument = $rowImmagine["immagine_label"];

						endif;
	
	?>

	<!--Inizio Voci-->

	<a class="download_contestuale" href="<?php echo "http://localhost/archeproject/img/".$linkDocument; ?>" title="<?php $pdf = str_replace("<p>", "", $linkDocument); $pdf = str_replace("</p>", "", $pdf); echo $pdf; ?>" rel="casa_1" target="_blank">

		<span class="etichetta_download">

			Download

		</span>

	</a>

	<!--Fine Voci-->
	
	<?php
	
					endwhile;
	
				endif;
	
			endwhile;

		endif;  
	
	?>

</aside>

<!--Fine Download Contestuale-->