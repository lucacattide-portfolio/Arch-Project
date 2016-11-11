<!--Inizio Cookies-->

<?php 
			 
	if ( $countArticolo >= 1 ): // Se esistono almeno un record 

		while ($articolo = $rArt->fetch_array()): // Allora finchè esistono record non vuoti

?> 
	
<!--Inizio Summary-->

<section id="cookies_summary" class="summary">

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

	endif;

?>

<!--Fine Activities-->