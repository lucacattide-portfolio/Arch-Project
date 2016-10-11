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
	
			$i = 1;
			
			while ($nomePagHome = $rPagHome->fetch_array()): 
			
				if ($i == 1) {
	
	?>
    
    <a class="box_link" href="<?php echo $siteurl_base.$nomePagHome["pagina_url"]; ?>" title="<?php echo $nomePagHome["pagina_meta_title"]; ?>">
    
        <div id="<?php echo $nomePagHome["pagina_url"]; ?>" class="box_home"> <!--Box Sezione-->
        
            <div class="box_sfondo"> <!--Sfondo-->
            
                <h2 class="box_titolo"> <!--Titolo-->
                
                    <?php echo $nomePagHome["pagina_url"]; ?>
                
                </h2>
            
            </div>
                
        </div>
    
    </a>
    
    <?php
	
				} elseif ($i == 2) {
					
	?>
    <a class="box_link" href="<?php echo $siteurl_base.$nomePagHome["pagina_url"]; ?>" title="<?php echo $nomePagHome["pagina_meta_title"]; ?>">
        
        <div id="<?php echo $nomePagHome["pagina_url"]; ?>" class="box_home"> <!--Box Sezione-->
        
            <div class="box_sfondo"> <!--Sfondo-->
            
                <h2 class="box_titolo"> <!--Titolo-->
                
                     <?php echo $nomePagHome["pagina_url"]; ?>
                
                </h2>
            
            </div>
        
        </div>
    
    </a>
     <?php
	
				} elseif ($i == 3) {
					
	?>
    
     <a class="box_link" href="<?php echo $siteurl_base.$nomePagHome["pagina_url"]; ?>" title="<?php echo $nomePagHome["pagina_meta_title"]; ?>">
    
        <div id="<?php echo $nomePagHome["pagina_url"]; ?>" class="box_home"> <!--Box Sezione-->
        
            <div class="box_sfondo"> <!--Sfondo-->
            
                <h2 class="box_titolo"> <!--Titolo-->
                
                     <?php echo $nomePagHome["pagina_url"]; ?>
                
                </h2>
            
            </div>
        
        </div>
    
    </a>
    <?php
	
				} elseif ($i == 4) {
					
	?>
     <a class="box_link" href="<?php echo $siteurl_base.$nomePagHome["pagina_url"]; ?>" title="<?php echo $nomePagHome["pagina_meta_title"]; ?>">
    
        <div id="<?php echo $nomePagHome["pagina_url"]; ?>" class="box_home"> <!--Box Sezione-->
        
            <div class="box_sfondo"> <!--Sfondo-->
            
                <h2 class="box_titolo"> <!--Titolo-->
                
                     <?php echo $nomePagHome["pagina_url"]; ?>
                
                </h2>
            
            </div>
        
        </div>
    
    </a>
    <?php
	
				}
	
				$i++;
	
			endwhile;
			
		endif;
		
	?>

</section>

<!--Fine Home-->