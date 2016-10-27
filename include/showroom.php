<!--Inizio Showroom-->
    
<section id="showroom">

	<h7> <!--Titolo-->
    
    	Showroom
    
    </h7>
                
    <!--Inizio Slider-->
    
    <div id="showroom_slides" class="slideshow">
    
    	<!--Inzio Foto-->
    
    	<div class="slides-container">
    
    		<!--Inizio Elemento-->
            
			<?php 
			 
             	if ( $countArticolo >= 1 ): // Se esistono almeno un record 
				
                	while ($articolo = $rArt->fetch_array()): // Allora finchè esistono record non vuoti
				  
				  		$sqlImg = "SELECT * FROM `immagine` WHERE immagine_articolo_id = ".$articolo["articolo_id"]." ";
				 		$rImg = $mysqli->query($sqlImg);
				 
				 		while ($immagine = $rImg->fetch_array()):
				  
            ?> 
    
    		<div class="foto" style="background-image:url(<?php echo $siteurl_base;  ?>img/<?php echo $immagine["immagine_label"]; ?>)"> <!--Immagine-->
            </div>
            
            <?php 
			
						endwhile;
					
					endwhile;
					
				endif;	
				  
		    ?>

  		</div>
        
        <!--Fine Foto-->

        <!--Inizio Navigazione-->
    
        <nav class="slides-navigation deseleziona animated fadeInRight">
    
            <a href="#" class="prev">Prev</a>
            <a href="#" class="next">Next</a>
    
        </nav>
        
        <!--Fine Navigazione-->
            
    </div>
    
    <!--Fine Slider-->

</section>

<!--Fine Showroom-->