<!--Inizio Activities-->

<!--Inizio Menu Contestuale-->
    
<!--<a class="menu_activities deseleziona occulta" href="#" title="Incontro" rel="incontro">

    <span class="numero">
    
        1
    
    </span>
    <span class="voce">
    
        Incontro
    
    </span>

</a>
<a class="menu_activities deseleziona occulta" href="#" title="Rilievo" rel="rilievo">

    <span class="numero">
    
        2
    
    </span>
    <span class="voce">
    
        Rilievo
    
    </span>

</a>
<a class="menu_activities deseleziona occulta" href="#" title="Progettazione Preliminare" rel="preliminare">

    <span class="numero">
    
        3
    
    </span>
    <span class="voce">
    
        Progettazione Preliminare
    
    </span>

</a>
<a class="menu_activities deseleziona occulta" href="#" title="Progettazione Definitiva" rel="definitiva">

    <span class="numero">
    
        4
    
    </span>
    <span class="voce">
    
        Progettazione Definitiva
    
    </span>

</a>
<a class="menu_activities deseleziona occulta" href="#" title="Progettazione Esecutiva" rel="esecutiva">

    <span class="numero">
    
        5
    
    </span>
    <span class="voce">
    
        Progettazione Esecutiva
    
    </span>

</a>
-->
<!--Fine Menu Contestuale-->

<?php

		$i = 1; // Inizializzazione Contatore
	
		if( $countArticolo >= 1 ):

			$sqlArticoloActivitiesInt = "SELECT * FROM `articolo` WHERE articolo_pagina_id = ".$paginaId." AND articolo_visibile = 1 LIMIT 0,1 "; // Assegnazione Query Pagina DB
			$rArtActivitiesInt = $mysqli->query($sqlArticoloActivitiesInt);

			while ($articolo = $rArtActivitiesInt->fetch_array()): 

				$sqlImgActivities = "SELECT * FROM `immagine` WHERE immagine_articolo_id = ".$articolo["articolo_id"]." AND immagine_tipo != 'application/pdf' ";
				$rImgActivities = $mysqli->query($sqlImgActivities);
				$countImgActivities =  $rImgActivities->num_rows;

				if( $countImgActivities >= 1):

					 while ($immagineActivities = $rImgActivities->fetch_array()):

					   $immagineLabelActivities = $immagineActivities["immagine_label"];

					 endwhile;

				else:  

					$immagineLabelActivities = '';

				endif;

			?>
	
<!--Inizio Summary-->

<section id="activities_summary" class="summary">

	<!--Inizio Container-->

	<div class="intestazione">

        <!--Inizio Titoli-->
        
        <hgroup>
        
            <h7>
            
                Summary
                
            </h7>
            <h1 class="titolo_summary animated fadeInDown"> <!--Titolo-->
            
                <?php echo $articolo["articolo_titolo"]; ?>
                
            </h1>
            <h2 class="sottotitolo_summary animated fadeInUp"> <!--Sottotitolo-->
            
                <?php echo $articolo["articolo_sottotitolo"]; ?>
            
            </h2>
        
        </hgroup>
        
        <!--Fine Titoli-->
        
        <div class="dingbat animated fadeInUp"> <!--Dingbat-->
        </div>
        
        <!--Inizio Corpo-->
        
        <article class="corpo_summary animated fadeInUp">
        
            <h7>
            
                Corpo
                
            </h7>
                            
            <?php echo $articolo["articolo_testo"]; ?>
                    
        </article>
        
        <!--Fine Corpo-->
    
    </div>
    
	<!--Fine Container-->
    
</section>

<!--Fine Summary-->
	
<?php
				
			endwhile;

			$sqlArticoloActivities = "SELECT * FROM `articolo` WHERE articolo_pagina_id = ".$paginaId." AND articolo_visibile = 1 LIMIT 1,$countArticolo "; // Assegnazione Query Pagina DB
			$rArtActivities = $mysqli->query($sqlArticoloActivities);

			while ($articoloActivities = $rArtActivities->fetch_array()): 

				$sqlImgActivities = "SELECT * FROM `immagine` WHERE immagine_articolo_id = ".$articoloActivities["articolo_id"]." AND immagine_tipo != 'application/pdf' ";
				$rImgActivities = $mysqli->query($sqlImgActivities);
				$countImgActivities =  $rImgActivities->num_rows;

				if( $countImgActivities >= 1):

					 while ($immagineActivities = $rImgActivities->fetch_array()):

					   $immagineLabelActivities = $immagineActivities["immagine_label"];

					 endwhile;

				else:  

					$immagineLabelActivities = '';

				endif;



$sqlImgActivities2 = "SELECT * FROM `immagine` WHERE immagine_articolo_id = ".$articoloActivities["articolo_id"]." AND immagine_tipo = 'application/pdf' ";
					$rImgActivities2 = $mysqli->query($sqlImgActivities2);
					$countImgActivities2 =  $rImgActivities2->num_rows;

					if( $countImgActivities2 >= 1):

						 while ($immagineActivities2 = $rImgActivities2->fetch_array()):

						   $immagineLabelActivities2 = $immagineActivities2["immagine_label"];

							 endwhile;
					else:  

					$immagineLabelActivities2 = '';
					
					endif;

?>

<!--Inizio Menu Contestuale-->

<a class="menu_activities deseleziona occulta" href="#" title="<?php 
															   
															   $titolo = str_replace("<p>", "", $articoloActivities["articolo_titolo"]); $titolo = str_replace("</p>", "", $titolo); 
															   
															   echo $titolo; 
															   
															   ?>" rel="<?php 
																		
																		$rel = str_replace(" ", "_", $titolo); 
																		$rel = strtolower($rel);
																		
																		echo $rel; ?>">

    <span class="numero">
    
        <?php echo $i; ?>
    
    </span>
    <span class="voce">
    
        <?php echo $articoloActivities["articolo_titolo"]; ?>
    
    </span>

</a>

<!--Fine Menu Contestuale-->

<?php
	
				if ($i == 1) {
					
?>

<!--Inizio Incontro-->

<section id="activities_incontro" class="summary" rel="incontro">

    <!--Inizio Foto-->
    
    <div class="foto_activities" style="background-image:url(<?php echo $siteurl_base;  ?>img/<?php echo $immagineLabelActivities; ?>);" rel="<?php 
															   
										   $rel = str_replace("<p>", "", $articoloActivities["articolo_titolo"]); 
										   $rel = str_replace("</p>", "", $titolo); 
										   $rel = str_replace(" ", "_", $titolo); 
										   $rel = strtolower($rel);

										   echo $rel;
					
										   ?>">
										   
    </div>
    
    <!--Fine Foto-->

    <!--Inizio Paragrafo-->
    
    <div class="paragrafo_activities" rel="<?php 
															   
										   $rel = str_replace("<p>", "", $articoloActivities["articolo_titolo"]); 
										   $rel = str_replace("</p>", "", $titolo); 
										   $rel = str_replace(" ", "_", $titolo); 
										   $rel = strtolower($rel);

										   echo $rel;
					
										   ?>">
    
        <!--Inizio Contenuti-->
        
        <div class="contenuti">  
    
            <!--Inizio  Titoli-->
            
            <hgroup>
            
            <span class="paragrafo"> <!--Paragrafo-->
            
                0<?php echo $i; ?>
            
            </span>
            <h2 class="titolo_paragrafo"> <!--Titolo-->
            
                <?php echo $articoloActivities["articolo_titolo"]; ?>    
                
            </h2>
            
            <div class="dingbat_1"> <!--Dingbat-->
            </div>
            
            <h2 class="sottotitolo_paragrafo"> <!--Sottotitolo-->
            
                <!--Inizio Elenco Sottotitolo-->
               
                <!--
                <ul>
                
                    <li>
                    
                        Definizione delle premesse e della fattibilità
                
                    </li>
                    <li>
                    
                        Planimetria catastale
                
                    </li>
                    <li>
                    
                        Foto
                
                    </li>
                
                </ul>
                -->
                
                <?php echo $articoloActivities["articolo_sottotitolo"]; ?>
                
                <!--Fine Elenco Sottotitolo-->
            
            </h2>
            
            </hgroup>
            
            <!--Fine Titoli-->
                        
            <!--Inizio Corpo-->
            
            <article class="corpo_paragrafo">
            
                <h7>
                
                    Paragrafo
                    
                </h7>
                
                <?php echo $articoloActivities["articolo_testo"]; ?>
                
                <?php
					
					if (!empty($immagineLabelActivities2)):

				?>
                
                <!--Inizio Download-->  
                  
                <a class="download_1 deseleziona" href="<?php echo $siteurl_base."img/".$immagineLabelActivities2; ?>" title="<?php $titoloPdf = str_replace("<p>", "", $immagineLabelActivities2); $titoloPdf = str_replace("</p>", "", $titoloPdf); echo $titoloPdf; ?>" tabindex="p" target="_blank"> <!--PDF-->
                
                    <span class="etichetta">
                    
                        Download
                    
                    </span>
                    <span class="estensione">
                    
                        pdf
                        
                    </span>
                    <span class="icona">
                    </span>
                
                </a>
                
                <?php
					
					endif;
					
				?>
               <!-- <a class="download_1 deseleziona" href="#" title="Download" tabindex="j"> <!--JPG--
                
                    <span class="etichetta">
                    
                        Download
                    
                    </span>
                    <span class="estensione">
                    
                        jpg
                        
                    </span>
                    <span class="icona">
                    </span>
                
                </a>-->
                       
                <!--Fine Download-->  
                
            </article>
            
            <!--Fine Corpo-->
        
        </div>
        
        <!--Fine Contenuti-->
    
    </div>
    
    <!--Fine Paragrafo-->


</section>

<!--Fine Incontro-->

<?php
	
				} elseif ($i == 2) {
					
?>

<!--Inizio Rilievo-->

<section id="activities_rilievo" class="summary" rel="<?php 
															   
										   $rel = str_replace("<p>", "", $articoloActivities["articolo_titolo"]); 
										   $rel = str_replace("</p>", "", $titolo); 
										   $rel = str_replace(" ", "_", $titolo); 
										   $rel = strtolower($rel);

										   echo $rel;
					
										   ?>">

    <!--Inizio Foto-->
    
    <div class="foto_activities" style="background-image:url(<?php echo $siteurl_base;  ?>img/<?php echo $immagineLabelActivities; ?>);" rel="rilievo">
    </div>
    
    <!--Fine Foto-->

    <!--Inizio Paragrafo-->
    
    <div class="paragrafo_activities" rel="<?php 
															   
										   $rel = str_replace("<p>", "", $articoloActivities["articolo_titolo"]); 
										   $rel = str_replace("</p>", "", $titolo); 
										   $rel = str_replace(" ", "_", $titolo); 
										   $rel = strtolower($rel);

										   echo $rel;
					
										   ?>">
    
        <!--Inizio Contenuti-->
        
        <div class="contenuti">  
    
            <!--Inizio  Titoli-->
            
            <hgroup>
            
            <span class="paragrafo"> <!--Paragrafo-->
            
                0<?php echo $i; ?>
            
            </span>
            <h2 class="titolo_paragrafo"> <!--Titolo-->
            
                <?php echo $articoloActivities["articolo_titolo"]; ?>    
                
            </h2>
            
            <div class="dingbat_2"> <!--Dingbat-->
            </div>
            
            <h2 class="sottotitolo_paragrafo"> <!--Sottotitolo-->
            
                <!--Inizio Elenco Sottotitolo-->
                <!--
                <ul>
                
                    <li>
                    
                        Elaborazione grafici                
                    
                    </li>
                    <li>
                    
                        Stato di fatto
                
                    </li>
                    <li>
                    
                        Foto di Stato di fatto
                
                    </li>
                
                </ul>
                -->
                
                <?php echo $articoloActivities["articolo_sottotitolo"]; ?>
                
                <!--Fine Elenco Sottotitolo-->
            
            </h2>
            
            </hgroup>
            
            <!--Fine Titoli-->
                        
            <!--Inizio Corpo-->
            
            <article class="corpo_paragrafo">
            
                <h7>
                
                    Paragrafo
                    
                </h7>
                
                <?php echo $articoloActivities["articolo_testo"]; ?>
                
                <?php
					
					if (!empty($immagineLabelActivities2)):

				?>
                
                <!--Inizio Download-->  
                  
                <a class="download_1 deseleziona" href="<?php echo $siteurl_base."img/".$immagineLabelActivities2; ?>" title="<?php $titoloPdf = str_replace("<p>", "", $immagineLabelActivities2); $titoloPdf = str_replace("</p>", "", $titoloPdf); echo $titoloPdf; ?>" tabindex="p" target="_blank"> <!--PDF-->
                
                    <span class="etichetta">
                    
                        Download
                    
                    </span>
                    <span class="estensione">
                    
                        pdf
                        
                    </span>
                    <span class="icona">
                    </span>
                
                </a>
                
                <?php
					
					endif;
					
				?>
                <!--<a class="download deseleziona" href="#" title="Download" tabindex="j"> <!--JPG--
                
                    <span class="etichetta">
                    
                        Download
                    
                    </span>
                    <span class="estensione">
                    
                        jpg
                        
                    </span>
                    <span class="icona">
                    </span>
                
                </a>-->
                       
                <!--Fine Download-->  
                       
            </article>
            
            <!--Fine Corpo-->
        
        </div>
        
        <!--Fine Contenuti-->
    
    </div>
    
    <!--Fine Paragrafo-->


</section>

<!--Fine Rilievo-->

<?php
	
				} elseif ($i == 3) {
					
?>

<!--Inizio Preliminare-->

<section id="activities_preliminare" class="summary" rel="<?php 
															   
										   $rel = str_replace("<p>", "", $articoloActivities["articolo_titolo"]); 
										   $rel = str_replace("</p>", "", $titolo); 
										   $rel = str_replace(" ", "_", $titolo); 
										   $rel = strtolower($rel);

										   echo $rel;
					
										   ?>">

    <!--Inizio Foto-->
    
    <div class="foto_activities" style="background-image:url(<?php echo $siteurl_base;  ?>img/<?php echo $immagineLabelActivities; ?>);" rel="<?php 
															   
										   $rel = str_replace("<p>", "", $articoloActivities["articolo_titolo"]); 
										   $rel = str_replace("</p>", "", $titolo); 
										   $rel = str_replace(" ", "_", $titolo); 
										   $rel = strtolower($rel);

										   echo $rel;
					
										   ?>">
    </div>
    
    <!--Fine Foto-->

    <!--Inizio Paragrafo-->
    
    <div class="paragrafo_activities" rel="<?php 
															   
										   $rel = str_replace("<p>", "", $articoloActivities["articolo_titolo"]); 
										   $rel = str_replace("</p>", "", $titolo); 
										   $rel = str_replace(" ", "_", $titolo); 
										   $rel = strtolower($rel);

										   echo $rel;
					
										   ?>">
    
        <!--Inizio Contenuti-->
        
        <div class="contenuti">  
    
            <!--Inizio  Titoli-->
            
            <hgroup>
            
            <span class="paragrafo"> <!--Paragrafo-->
            
                0<?php echo $i; ?>
            
            </span>
            <h2 class="titolo_paragrafo"> <!--Titolo-->
            
                <?php echo $articoloActivities["articolo_titolo"]; ?>   
                
            </h2>
            
            <div class="dingbat_2"> <!--Dingbat-->
            </div>
            
            <h2 class="sottotitolo_paragrafo"> <!--Sottotitolo-->
            
                <!--Inizio Elenco Sottotitolo-->
                <!--
                <ul>
                
                    <li>
                    
                        Elaborazione grafici
                
                    </li>
                    <li>
                    
                       Planimetria arredata
                
                    </li>
                    <li>
                    
                        Relazione
                
                    </li>
                    <li>
                    
                        Obbiettivi
                
                    </li>
                    <li>
                    
                        Indicazione progetto e materiali
                
                    </li>
                    <li>
                    
                        Stima di spesa
                
                    </li>
                
                </ul>
                -->
                
                <?php echo $articoloActivities["articolo_sottotitolo"]; ?>
                
                <!--Fine Elenco Sottotitolo-->
            
            </h2>
            
            </hgroup>
            
            <!--Fine Titoli-->
                        
            <!--Inizio Corpo-->
            
            <article class="corpo_paragrafo">
            
                <h7>
                
                    Paragrafo
                    
                </h7>
                
                <?php echo $articoloActivities["articolo_testo"]; ?>   
                
                <?php
					
					if (!empty($immagineLabelActivities2)):

				?>
                
                <!--Inizio Download-->  
                  
                <a class="download_1 deseleziona" href="<?php echo $siteurl_base."img/".$immagineLabelActivities2; ?>" title="<?php $titoloPdf = str_replace("<p>", "", $immagineLabelActivities2); $titoloPdf = str_replace("</p>", "", $titoloPdf); echo $titoloPdf; ?>" tabindex="p" target="_blank"> <!--PDF-->
                
                    <span class="etichetta">
                    
                        Download
                    
                    </span>
                    <span class="estensione">
                    
                        pdf
                        
                    </span>
                    <span class="icona">
                    </span>
                
                </a>
                
                <?php
					
					endif;
					
				?>
                <!--<a class="download deseleziona" href="#" title="Download" tabindex="j"> <!--JPG--
                
                    <span class="etichetta">
                    
                        Download
                    
                    </span>
                    <span class="estensione">
                    
                        jpg
                        
                    </span>
                    <span class="icona">
                    </span>
                
                </a>-->
                       
                <!--Fine Download-->  
            
            </article>
            
            <!--Fine Corpo-->
        
        </div>
        
        <!--Fine Contenuti-->
    
    </div>
    
    <!--Fine Paragrafo-->

</section>

<!--Fine Preliminare-->

<?php
	
				} elseif ($i == 4) {
					
?>

<!--Inizio Definitiva-->

<section id="activities_definitiva" class="summary" rel="<?php 
															   
										   $rel = str_replace("<p>", "", $articoloActivities["articolo_titolo"]); 
										   $rel = str_replace("</p>", "", $titolo); 
										   $rel = str_replace(" ", "_", $titolo); 
										   $rel = strtolower($rel);

										   echo $rel;
					
										   ?>">

    <!--Inizio Foto-->
    
    <div class="foto_activities" style="background-image:url(<?php echo $siteurl_base;  ?>img/<?php echo $immagineLabelActivities; ?>);" rel="<?php 
															   
										   $rel = str_replace("<p>", "", $articoloActivities["articolo_titolo"]); 
										   $rel = str_replace("</p>", "", $titolo); 
										   $rel = str_replace(" ", "_", $titolo); 
										   $rel = strtolower($rel);

										   echo $rel;
					
										   ?>">
    </div>
    
    <!--Fine Foto-->

    <!--Inizio Paragrafo-->
    
    <div class="paragrafo_activities" rel="<?php 
															   
										   $rel = str_replace("<p>", "", $articoloActivities["articolo_titolo"]); 
										   $rel = str_replace("</p>", "", $titolo); 
										   $rel = str_replace(" ", "_", $titolo); 
										   $rel = strtolower($rel);

										   echo $rel;
					
										   ?>">
    
        <!--Inizio Contenuti-->
        
        <div class="contenuti">  
    
            <!--Inizio  Titoli-->
            
            <hgroup>
            
            <span class="paragrafo"> <!--Paragrafo-->
            
                0<?php echo $i; ?>
            
            </span>
            <h2 class="titolo_paragrafo"> <!--Titolo-->
            
                <?php echo $articoloActivities["articolo_titolo"]; ?>    
                
            </h2>
            
            <div class="dingbat_2"> <!--Dingbat-->
            </div>
            
            <h2 class="sottotitolo_paragrafo"> <!--Sottotitolo-->
            
                <!--Inizio Elenco Sottotitolo-->
                <!--
                <ul>
                
                    <li>
                    
                        Planimetria definitiva       
                    
                    </li>
                    <li>
                    
                        Scelta materiali
                
                    </li>
                    <li>
                    
                        Tavola impianti
                
                    </li>
                    <li>
                    
                        CME
                
                    </li>
                    <li>
                    
                        P. Sicurezza
                
                    </li>
                
                </ul>
                -->
                
                <?php echo $articoloActivities["articolo_sottotitolo"]; ?>
                
                <!--Fine Elenco Sottotitolo-->
            
            </h2>
            
            </hgroup>
            
            <!--Fine Titoli-->
                        
            <!--Inizio Corpo-->
            
            <article class="corpo_paragrafo">
            
                <h7>
                
                    Paragrafo
                    
                </h7>
                                  
                <?php echo $articoloActivities["articolo_testo"]; ?>
                                  
                <?php
					
					if (!empty($immagineLabelActivities2)):

				?>
                
                <!--Inizio Download-->  
                  
                <a class="download_1 deseleziona" href="<?php echo $siteurl_base."img/".$immagineLabelActivities2; ?>" title="<?php $titoloPdf = str_replace("<p>", "", $immagineLabelActivities2); $titoloPdf = str_replace("</p>", "", $titoloPdf); echo $titoloPdf; ?>" tabindex="p" target="_blank"> <!--PDF-->
                
                    <span class="etichetta">
                    
                        Download
                    
                    </span>
                    <span class="estensione">
                    
                        pdf
                        
                    </span>
                    <span class="icona">
                    </span>
                
                </a>
                
                <?php
					
					endif;
					
				?>
                <!--<a class="download deseleziona" href="#" title="Download" tabindex="j"> <!--JPG--
                
                    <span class="etichetta">
                    
                        Download
                    
                    </span>
                    <span class="estensione">
                    
                        jpg
                        
                    </span>
                    <span class="icona">
                    </span>
                
                </a>-->
                       
                <!--Fine Download-->  
                                   
            </article>
            
            <!--Fine Corpo-->
        
        </div>
        
        <!--Fine Contenuti-->
    
    </div>
    
    <!--Fine Paragrafo-->


</section>

<!--Fine Definitiva-->

<?php
	
				} elseif ($i == 5) {
					
?>

<!--Inizio Esecutiva-->

<section id="activities_esecutiva" class="summary" rel="<?php 
															   
										   $rel = str_replace("<p>", "", $articoloActivities["articolo_titolo"]); 
										   $rel = str_replace("</p>", "", $titolo); 
										   $rel = str_replace(" ", "_", $titolo); 
										   $rel = strtolower($rel);

										   echo $rel;
					
										   ?>">

    <!--Inizio Foto-->
    
    <div class="foto_activities" style="background-image:url(<?php echo $siteurl_base;  ?>img/<?php echo $immagineLabelActivities; ?>);" rel="<?php 
															   
										   $rel = str_replace("<p>", "", $articoloActivities["articolo_titolo"]); 
										   $rel = str_replace("</p>", "", $titolo); 
										   $rel = str_replace(" ", "_", $titolo); 
										   $rel = strtolower($rel);

										   echo $rel;
					
										   ?>">
    </div>
    
    <!--Fine Foto-->

    <!--Inizio Paragrafo-->
    
    <div class="paragrafo_activities" rel="<?php 
															   
										   $rel = str_replace("<p>", "", $articoloActivities["articolo_titolo"]); 
										   $rel = str_replace("</p>", "", $titolo); 
										   $rel = str_replace(" ", "_", $titolo); 
										   $rel = strtolower($rel);

										   echo $rel;
					
										   ?>">
    
        <!--Inizio Contenuti-->
        
        <div class="contenuti">  
    
            <!--Inizio  Titoli-->
            
            <hgroup>
            
            <span class="paragrafo"> <!--Paragrafo-->
            
                0<?php echo $i; ?>
            
            </span>
            <h2 class="titolo_paragrafo"> <!--Titolo-->
            
                <?php echo $articoloActivities["articolo_titolo"]; ?>
                
            </h2>
            
            <div class="dingbat_1"> <!--Dingbat-->
            </div>
            
            <h2 class="sottotitolo_paragrafo"> <!--Sottotitolo-->
            
                <!--Inizio Elenco Sottotitolo-->
                <!--
                <ul>
                
                    <li>
                    
                        Tavole prospetti
                
                    </li>
                
                </ul>
                -->
                
                <?php echo $articoloActivities["articolo_sottotitolo"]; ?>
                
                <!--Fine Elenco Sottotitolo-->
            
            </h2>
            
            </hgroup>
            
            <!--Fine Titoli-->
                        
            <!--Inizio Corpo-->
            
            <article class="corpo_paragrafo">
            
                <h7>
                
                    Paragrafo
                    
                </h7>

                <?php echo $articoloActivities["articolo_testo"]; ?> 
                
                <?php
					
					if (!empty($immagineLabelActivities2)):

				?>
                
                <!--Inizio Download-->  
                  
                <a class="download_1 deseleziona" href="<?php echo $siteurl_base."img/".$immagineLabelActivities2; ?>" title="<?php $titoloPdf = str_replace("<p>", "", $immagineLabelActivities2); $titoloPdf = str_replace("</p>", "", $titoloPdf); echo $titoloPdf; ?>" tabindex="p" target="_blank"> <!--PDF-->
                
                    <span class="etichetta">
                    
                        Download
                    
                    </span>
                    <span class="estensione">
                    
                        pdf
                        
                    </span>
                    <span class="icona">
                    </span>
                
                </a>
                
                <?php
					
					endif;
					
				?>
                <!--<a class="download_1 deseleziona" href="#" title="Download" tabindex="j"> <!--JPG--
                
                    <span class="etichetta">
                    
                        Download
                    
                    </span>
                    <span class="estensione">
                    
                        jpg
                        
                    </span>
                    <span class="icona">
                    </span>
                
                </a>-->
                       
                <!--Fine Download-->  
                
            </article>
            
            <!--Fine Corpo-->
        
        </div>
        
        <!--Fine Contenuti-->
    
    </div>
    
    <!--Fine Paragrafo-->

</section>

<!--Fine Esecutiva-->

<?php

			}

			$i++;

		endwhile;

	endif;

?>

<!--Inizio Torna Su-->

<aside id="torna_su" class="ruota">

    <h7>
    
        Torna Su
        
    </h7>

</aside>

<!--Fine Torna Su-->

<!--Fine Activities-->