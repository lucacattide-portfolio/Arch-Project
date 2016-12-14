<!--Inizio Projects-->
    
<section id="kitchen" class="projects_specifiche">

	<h7> <!--Titolo-->
    
    	Kitchen
    
    </h7>
    
    <!--Inizio Download Contestuale-->
    
    <aside id="download_contestuale" class="deseleziona">
    
    	<!--Inizio Titoli-->
        
        <hgroup>
        
            <h7>
            
                Download Contestuale
                
            </h7>
           
    	</hgroup>
        
        <!--Fine Titoli-->
        
        <!--Inizio Voci-->
        
        <?php
		
		  	if ($art == ""): // Default

				$sqlArticolo4 = "SELECT * FROM `articolo` WHERE articolo_pagina_id = ".$paginaId." AND articolo_visibile = 1 LIMIT 0,1 "; // Assegnazione Query Pagina DB

		  	else: // Altrimenti singole pagine

				$sqlArticolo4 = "SELECT * FROM `articolo` WHERE articolo_pagina_id = ".$paginaId." AND articolo_id = ".$art." AND articolo_visibile = 1  ";

		  	endif;  
		
		    $rArt4 = $mysqli->query($sqlArticolo4);
    		$countArticolo4 =  $rArt4->num_rows;
		
			if( $countArticolo4 >= 1  ):

				while ($articolo4 = $rArt4->fetch_array()): // Finchè sono presenti record
		
				$sqlImgHome = "SELECT * FROM `immagine` WHERE immagine_articolo_id = ".$articolo4["articolo_id"]." AND immagine_tipo = 'application/pdf' ORDER BY immagine_id DESC ";
				$rImgHome = $mysqli->query($sqlImgHome);
				$countImgHome =  $rImgHome->num_rows;
				$immagineLabelHome = null;

				if( $countImgHome >= 1):

					 while ($immagineHome = $rImgHome->fetch_array()):

						$immagineLabelHome = $immagineHome["immagine_label"];
		
		?>
		
		<a class="download_contestuale occulta" href="<?php echo $siteurl_base."img/".$immagineLabelHome; ?>" title="<?php echo $immagineLabelHome; ?>" rel="<?php echo $immagineHome["immagine_id"]; ?>" target="_blank">
            
            <span class="etichetta_download">
            
                Download
            
            </span>
            
		</a>
   
   		<?php
		
					endwhile;

				endif;
											
				endwhile;
											
			endif;
		
		?>
        
        <!--Fine Voci-->
        
    </aside>
    
    <!--Fine Download Contestuale-->
    
	<!--Inizio Menu Contestuale-->
    
    <nav id="menu_projects" class="deseleziona">
    
    	<!--Inizio Titoli-->
        
        <hgroup>
        
            <h7>
            
                Menu Contestuale
                
            </h7>
            <h1 class="titolo_contestuale animated slideInRight">
            
                Kitchen
                
            </h1>
    	
    	</hgroup>
        
        <!--Fine Titoli-->
        
        <!--Inizio Voci-->
    
       	<?php 
		
			$sqlArticolo2 = "SELECT * FROM `articolo` WHERE articolo_pagina_id = ".$paginaId." AND articolo_visibile = 1  "; // Assegnazione Query Pagina DB
			$rArt2 = $mysqli->query($sqlArticolo2);
    		$countArticolo2 =  $rArt2->num_rows;
		
			if( $countArticolo2 >= 1  ):

				while ($articolo = $rArt2->fetch_array()): // Finchè sono presenti record
		
		?>
       
        <a class="menu_projects occulta" href="<?php echo $siteurl_base.$articolo["articolo_url"]; ?>" title="<?php $title= str_replace ("<p>", "", $articolo["articolo_titolo"]); $title= str_replace ("</p>", "", $title); echo strip_tags($title); ?>" rel="<?php echo $articolo["articolo_id"]; ?>">
        
            <span class="lettera <?php 

									if ($_GET["art"] == $articolo["articolo_id"]): 

										echo "lettera_attiva"; 

									endif;

								?>">
            
                <?php echo $articolo["articolo_sottotitolo"]; ?>
            
            </span>
        
        </a>
        
        <?php
		
				endwhile;
		
			endif;
        
        ?>
        
        <!--Fine Voci-->
        
    </nav>
    
    <!--Fine Menu Contestuale-->
            
    <!--Inizio Slider-->
    
    <div id="progetto_slides" class="slideshow animated fadeIn">
    
    	<?php
		
			  if ($art == ""): // Default
	
				$sqlArticolo3 = "SELECT * FROM `articolo` WHERE articolo_pagina_id = ".$paginaId." AND articolo_visibile = 1 LIMIT 0,1 "; // Assegnazione Query Pagina DB

			  else: // Altrimenti singole pagine

				$sqlArticolo3 = "SELECT * FROM `articolo` WHERE articolo_pagina_id = ".$paginaId." AND articolo_id = ".$art." AND articolo_visibile = 1  ";

			  endif;  
		
			  $rArt3 = $mysqli->query($sqlArticolo3);
    		  $countArticolo3 =  $rArt3->num_rows;
		
			  if( $countArticolo3 >= 1  ):

				while ($articolo3 = $rArt3->fetch_array()): // Finchè sono presenti record
		
		?>
    
    	<!--Inzio Foto-->
    
    	<div class="slides-container">
    	
    		<?php
			
				$fotoId = $articolo3["articolo_id"];
				$sqlImgHome = "SELECT * FROM `immagine` WHERE immagine_articolo_id = ".$fotoId." AND immagine_tipo != 'application/pdf' ORDER BY immagine_id DESC ";
				$rImgHome = $mysqli->query($sqlImgHome);
				$countImgHome =  $rImgHome->num_rows;
				$immagineLabelHome = null;

				if( $countImgHome >= 1):

					 while ($immagineHome = $rImgHome->fetch_array()):
			
						$immagineLabelHome = $immagineHome["immagine_label"];
			
			?>
					   
		    <div class="foto" style="background-image: url(<?php echo $siteurl_base."img/".$immagineLabelHome; ?>);"> <!--Immagine-->
            </div>
            
            <?php

					 endwhile;

				endif;
    
			?>
    		
  		</div>
        
        <!--Fine Foto-->
        
        <!--Inizio Descrizione-->
        
        <article class="descrizione">
        
        	<!--Inizio Titoli-->
        
        	<hgroup>
            
                <h7>
                
                    Descrizione
                
                </h7>
                <h2 class="titolo_descrizione animated fadeInLeft"> <!--Titolo-->
            
                    <?php echo $articolo3["articolo_titolo"]; ?>
            
                </h2>
        
        	</hgroup>
            
            <!--Fine Titoli-->
                
            <!--Inizio Corpo-->    
                
            <p class="corpo_descrizione animated fadeInLeft"> 
            
            	<?php 
				
					$testo = str_replace("<p>", "", $articolo3["articolo_testo"]);
					$testo = str_replace("</p>", "", $testo);
				
					echo strip_tags($testo); 
				
				?>
            
            </p>
            
            <!--Fine Corpo-->
            
            <!--Inizio Navigazione-->
        
            <nav class="slides-navigation deseleziona animated fadeInRight">
        
                <a href="#" class="prev">Prev</a>
                <a href="#" class="next">Next</a>
        
            </nav>
            
            <!--Fine Navigazione-->
        
        </article>
        
        <!--Fine Descrizione-->
        
        <?php
		
				endwhile;
		
			endif;
		
		?>
    
    </div>
    
    <!--Fine Slider-->

</section>

<!--Fine Projects-->