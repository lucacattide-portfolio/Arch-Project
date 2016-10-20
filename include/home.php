<!--Inizio Home-->
    
<section id="home">

	<h7> <!--Titolo-->
    
    	Home
    
    </h7>
    
    <a href="<?php echo $siteurl_."home"; ?>" title="<?php echo $paginaMetaTitle; ?>">
     
        <div id="logo"> <!--Logo-->
        </div>
    
    </a>   
        
    <?php
	
		$pagHome = "SELECT * FROM `pagina` LIMIT 1,4"; // Assegnazione Query Pagina DB
		$rPagHome = $mysqli->query($pagHome); // Pagina 
		$countPagHome =  $rPagHome->num_rows; // Conteggio Record Pagina
	
		if( $countPagHome >= 1  ):
	
			$i = 1; // Inizializzazione Contatore
			
			while ($nomePagHome = $rPagHome->fetch_array()): // Finchè sono presenti record
			
			   	$sqlImgHome = "SELECT * FROM `immagine` WHERE immagine_id = ".$nomePagHome["pagina_immagine_id"]." ORDER BY immagine_id DESC LIMIT 0,1  ";
				$rImgHome = $mysqli->query($sqlImgHome);
				$countImgHome =  $rImgHome->num_rows;
				$immagineLabelHome = null;
				
				if( $countImgHome >= 1):
				
					 while ($immagineHome = $rImgHome->fetch_array()):
					  
					   $immagineLabelHome = $immagineHome["immagine_label"];
					 
					 endwhile;
				else:  
				
					$immagineLabelHome = '';
				
				endif;
			
				if ($i == 1) {
	
	?>
    
    <!--Inizio Projects-->
    
    <a class="box_link" href="<?php echo $siteurl_base.$nomePagHome["pagina_url"]; ?>" title="<?php echo $nomePagHome["pagina_meta_title"]; ?>">
    
        <div id="<?php echo $nomePagHome["pagina_url"]; ?>" class="box_home"> <!--Box Sezione-->
			<div class="box_foto" style="background-image: url(<?php echo $siteurl_base."img/".$immagineLabelHome; ?>); ">
                <div class="box_cornice"> <!--Cornice-->
                </div>
                <div class="box_sfondo"> <!--Sfondo-->
                
                    <h2 class="box_titolo"> <!--Titolo-->
                    
                        <?php echo $nomePagHome["pagina_url"]; ?>
                    
                    </h2>
                
                </div>
            </div>
        </div>
    
    </a>
    
    <!--Fine Projects-->
    
    <?php
	
				} elseif ($i == 2) {
					
	?>
    
    <!--Inizio Activities-->
    
    <a class="box_link" href="<?php echo $siteurl_base.$nomePagHome["pagina_url"]; ?>" title="<?php echo $nomePagHome["pagina_meta_title"]; ?>">
        
        <div id="<?php echo $nomePagHome["pagina_url"]; ?>" class="box_home"> <!--Box Sezione-->
			<div class="box_foto" style="background-image: url(<?php echo $siteurl_base."img/".$immagineLabelHome; ?>); ">
                <div class="box_cornice"> <!--Cornice-->
                </div>
                <div class="box_sfondo"> <!--Sfondo-->
                
                    <h2 class="box_titolo"> <!--Titolo-->
                    
                         <?php echo $nomePagHome["pagina_url"]; ?>
                    
                    </h2>
                
                </div>
            </div>
        </div>
    
    </a>
    
    <!--Fine Activities-->
    
    <?php
	
				} elseif ($i == 3) {
					
	?>
    
    <!--Inizio Showroom-->
    
    <a class="box_link" href="<?php echo $siteurl_base.$nomePagHome["pagina_url"]; ?>" title="<?php echo $nomePagHome["pagina_meta_title"]; ?>">
    
        <div id="<?php echo $nomePagHome["pagina_url"]; ?>" class="box_home"> <!--Box Sezione-->
			<div class="box_foto" style="background-image: url(<?php echo $siteurl_base."img/".$immagineLabelHome; ?>); ">
                <div class="box_cornice"> <!--Cornice-->
                </div>
                <div class="box_sfondo"> <!--Sfondo-->
                
                    <h2 class="box_titolo"> <!--Titolo-->
                    
                         <?php echo $nomePagHome["pagina_url"]; ?>
                    
                    </h2>
                
                </div>
            </div>
        </div>
    
    </a>
    
    <!--Fine Showroom-->
    
    <?php
	
				} elseif ($i == 4) {
					
	?>
    
    <!--Inizio Contacts-->
    
    <a class="box_link" href="<?php echo $siteurl_base.$nomePagHome["pagina_url"]; ?>" title="<?php echo $nomePagHome["pagina_meta_title"]; ?>">
    
        <div id="<?php echo $nomePagHome["pagina_url"]; ?>" class="box_home"> <!--Box Sezione-->
			<div class="box_foto" style="background-image: url(<?php echo $siteurl_base."img/".$immagineLabelHome; ?>); ">
                <div class="box_cornice"> <!--Cornice-->
                </div>
                <div class="box_sfondo"> <!--Sfondo-->
                
                    <h2 class="box_titolo"> <!--Titolo-->
                    
                         <?php echo $nomePagHome["pagina_url"]; ?>
                    
                    </h2>
                
                </div>
            </div>
        </div>
    
    </a>
    
    <!--Fine Contacts-->
    
    <?php
	
				}
	
				$i++;
	
			endwhile;
			
		endif;
		
	?>

</section>

<!--Fine Home-->