<!--Inizio Projects-->
    
<section id="progetti">

	<h7> <!--Titolo-->
    
    	Projects
    
    </h7>
            
    <?php
	
		$pagProjects = "SELECT * FROM `pagina` LIMIT 6,11"; // Assegnazione Query Pagina DB
		$rPagProjects = $mysqli->query($pagProjects); // Pagina 
		$countPagProjects =  $rPagProjects->num_rows; // Conteggio Record Pagina
	
		if( $countPagProjects >= 1  ):
	
			$i = 1; // Inizializzazione Contatore
			
			while ($nomePagProjects = $rPagProjects->fetch_array()): // Finchè sono presenti record
			
			   	$sqlImgProjects = "SELECT * FROM `immagine` WHERE immagine_id = ".$nomePagProjects["pagina_immagine_id"]." ORDER BY immagine_id DESC LIMIT 0,1  ";
				$rImgProjects = $mysqli->query($sqlImgProjects);
				$countImgProjects =  $rImgProjects->num_rows;
				$immagineLabelProjects = null;
				
				if( $countImgProjects >= 1):
				
					 while ($immagineProjects = $rImgProjects->fetch_array()):
					  
					   $immagineLabelProjects = $immagineProjects["immagine_label"];
					 
					 endwhile;
			
				endif;
			
				if ($i == 1) {
	
	?>
    
    <!--Inizio House-->
    
    <a class="box_link" href="<?php echo $siteurl_base.$nomePagProjects["pagina_url"]; ?>" title="<?php echo $nomePagProjects["pagina_meta_title"]; ?>">
    
        <div id="<?php echo $nomePagProjects["pagina_url"]; ?>" class="box_progetti" style="background-image: url(<?php echo $siteurl_base."img/".$immagineLabelProjects; ?>); "> <!--Box Sezione-->
        
            <div class="box_sfondo"> <!--Sfondo-->
            
                <h2 class="box_titolo"> <!--Titolo-->
                
                    <?php echo $nomePagProjects["pagina_url"]; ?>
                
                </h2>
            
            </div>
                
        </div>
    
    </a>
    
    <!--Fine House-->
    
    <?php
	
				} elseif ($i == 2) {
					
	?>
    
    <!--Inizio Kitchen-->
    
    <a class="box_link" href="<?php echo $siteurl_base.$nomePagProjects["pagina_url"]; ?>" title="<?php echo $nomePagProjects["pagina_meta_title"]; ?>">
    
        <div id="<?php echo $nomePagProjects["pagina_url"]; ?>" class="box_progetti" style="background-image: url(<?php echo $siteurl_base."img/".$immagineLabelProjects; ?>); "> <!--Box Sezione-->
        
            <div class="box_sfondo"> <!--Sfondo-->
            
                <h2 class="box_titolo"> <!--Titolo-->
                
                    <?php echo $nomePagProjects["pagina_url"]; ?>
                
                </h2>
            
            </div>
                
        </div>
    
    </a>
    
    <!--Fine Kitchen-->
    
    <?php
	
				} elseif ($i == 3) {
					
	?>
    
    <!--Inizio Bathroom-->
    
    <a class="box_link" href="<?php echo $siteurl_base.$nomePagProjects["pagina_url"]; ?>" title="<?php echo $nomePagProjects["pagina_meta_title"]; ?>">
    
        <div id="<?php echo $nomePagProjects["pagina_url"]; ?>" class="box_progetti" style="background-image: url(<?php echo $siteurl_base."img/".$immagineLabelProjects; ?>); "> <!--Box Sezione-->
        
            <div class="box_sfondo"> <!--Sfondo-->
            
                <h2 class="box_titolo"> <!--Titolo-->
                
                    <?php echo $nomePagProjects["pagina_url"]; ?>
                
                </h2>
            
            </div>
                
        </div>
    
    </a>
    
    <!--Fine Bathroom-->
    
    <?php
	
				} elseif ($i == 4) {
					
	?>
    
    <!--Inizio Living Room-->
    
    <a class="box_link" href="<?php echo $siteurl_base.$nomePagProjects["pagina_url"]; ?>" title="<?php echo $nomePagProjects["pagina_meta_title"]; ?>">
    
        <div id="<?php echo $nomePagProjects["pagina_url"]; ?>" class="box_progetti" style="background-image: url(<?php echo $siteurl_base."img/".$immagineLabelProjects; ?>); "> <!--Box Sezione-->
        
            <div class="box_sfondo"> <!--Sfondo-->
            
                <h2 class="box_titolo"> <!--Titolo-->
                
                    <?php echo $nomePagProjects["pagina_url"]; ?>
                
                </h2>
            
            </div>
                
        </div>
    
    </a>
    
    <!--Fine Living Room-->
    
    <?php
	
				} elseif ($i == 5) {
					
	?>
    
    <!--Inizio Offices-->
    
    <a class="box_link" href="<?php echo $siteurl_base.$nomePagProjects["pagina_url"]; ?>" title="<?php echo $nomePagProjects["pagina_meta_title"]; ?>">
    
        <div id="<?php echo $nomePagProjects["pagina_url"]; ?>" class="box_progetti" style="background-image: url(<?php echo $siteurl_base."img/".$immagineLabelProjects; ?>); "> <!--Box Sezione-->
        
            <div class="box_sfondo"> <!--Sfondo-->
            
                <h2 class="box_titolo"> <!--Titolo-->
                
                    <?php echo $nomePagProjects["pagina_url"]; ?>
                
                </h2>
            
            </div>
                
        </div>
    
    </a>
    
    <!--Fine Offices-->
    
    <?php
	
				} elseif ($i == 6) {
					
	?>
    
    <!--Inizio Various-->
    
    <a class="box_link" href="<?php echo $siteurl_base.$nomePagProjects["pagina_url"]; ?>" title="<?php echo $nomePagProjects["pagina_meta_title"]; ?>">
    
        <div id="<?php echo $nomePagProjects["pagina_url"]; ?>" class="box_progetti" style="background-image: url(<?php echo $siteurl_base."img/".$immagineLabelProjects; ?>); "> <!--Box Sezione-->
        
            <div class="box_sfondo"> <!--Sfondo-->
            
                <h2 class="box_titolo"> <!--Titolo-->
                
                    <?php echo $nomePagProjects["pagina_url"]; ?>
                
                </h2>
            
            </div>
                
        </div>
    
    </a>
    
    <!--Fine Various-->
    
    <?php
	
				}
	
				$i++;
	
			endwhile;
			
		endif;
		
	?>

</section>

<!--Fine Projects-->