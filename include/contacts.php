<!--Inizio Contacts-->

<section id="contacts_pagina">

	<h7>
    
    	Contacts
    
    </h7>
    
    <div id="mappa"> <!--Mappa-->
    </div>
    
    <!--Inizio Recapiti-->
    
    <div id="recapiti">
    
		<h1 id="titolo_contatti"> <!--Titolo-->
        
        	Contacts
            
        </h1>
        
        <div id="logo_recapiti" class="box_recapiti"> <!--Logo-->
        </div>
        <div id="info_recapiti" class="box_recapiti"> <!--Recapiti-->
        
        	<!--Inizio Container-->
        
        	<div id="container_recapiti">
            
            	<?php 
			 
					if ( $countArticolo >= 1 ): // Se esistono almeno un record 
					
						while ($articolo = $rArt->fetch_array()): // Allora finchè esistono record non vuoti
				  				  
            	?> 
            
                <h2> <!--Titolo-->
                    
                    Arch &amp; Project
                    
                </h2>
                
                <span class="recapito_uno"> 
                
                    <?php echo $articolo["articolo_titolo"]; ?>
                
                </span>
                <span>
                
                    <?php echo $articolo["articolo_sottotitolo"]; ?>

				</span>
                <span>
                
                    <?php echo $articolo["articolo_testo"]; ?>

				</span>
                
                <?php 
			
						endwhile;
						
					endif;	
				  
		    	?>
            
            </div>
            
            <!--FIne Container-->
            
        </div>
    
    </div>
    
    <!--Fine Recapiti-->
    
</section>

<!--Fine Contacts-->