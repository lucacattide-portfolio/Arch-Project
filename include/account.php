<!--Inizio Account-->

<?php 

if(isset($_SESSION["id_utente"]) != ""):
	
      $sqlCli = "SELECT * FROM `cliente` WHERE cliente_id = '".$_SESSION["id_utente"]."' ";
      $rCli = $mysqli->query($sqlCli);
	  
      while ($cli = $rCli->fetch_array()): 	

?>

<section id="profilo">

	<h7> <!--Titolo-->
    
    	Account
        
    </h7>

    <header id="header_profilo">
    
        <h7> <!--Titolo-->
        
            Arch &amp; Project
            
        </h7>
        
        <div id="logo_profilo"> <!--Logo-->
        </div>
        <div id="toolbar_profilo">
            
            <span id="logout" class="etichetta_pulsante deseleziona"> <!--Logout-->
            
            	<a href="http://www.laboratorio-a.com/archeproject/index.php?logoff">Logout</a>
            
            </span>
            
            <a href="http://www.laboratorio-a.com/archeproject/index.php">
				<span id="chiudi_profilo"></span>
            </a>
            
        </div>
    
    </header>
    
    <!--Inizio Container-->
    
    <div id="container_area">
    
        <!--Inizio Area Clienti-->
        
        <div id="area_clienti">
        
            <h2 id="titolo_clienti">
            
                Area Clienti
            
            </h2>
            
            <!--Inizio Container-->
            
            <div id="container_clienti">
            
            	<!--Inizio Avatar-->
            
            	<div id="avatar" style="background-image:url(<?php echo $siteurl_base; ?>img/avatar.png);">
      
      		 		<!-- UPDATE IMG AJAX -->
       
       				<form method="post" enctype="multipart/form-data">
          
          				<label id="cover_avatar" for="carica_avatar"> 
           					
                            <input type="file" name="photo" id="carica_avatar" />
        
        				</label>
                        
       				</form>

			        <!-- END UPDATE IMG AJAX -->
     
     			</div>
                
                <!--Fine Avatar-->
        
                <span class="modifica_pulsante deseleziona" rel="modifica"> <!--Modifica-->
                
                    Modifica Dati
                
                </span>
                
                <!--Inizio Dati-->
                
                <article id="dati_profilo">
                
                	<!--Inizio Titoli-->
                	
                	<hgroup>
                
                        <h7>
                        
                            Dati Utente
                            
                        </h7>
                        <h2 id="nome_profilo" data-rel="nome_cognome">
                        
                            <?php echo $cli["cliente_nome"]." ".$cli["cliente_cognome"]; ?>
                            
                        </h2>
                    
                    </hgroup>	
                    
                    <p class="info_profilo" data-rel="email">
                    
                    	 <?php echo $cli["cliente_email"]; ?>
                    
                    </p>
                    <p class="info_profilo" data-rel="cap">
                    
                    	<?php echo $cli["cliente_cap"]; ?>
                    
                    </p>
                    <p class="info_profilo" data-rel="relefono">
                    
                    	<?php echo $cli["cliente_telefono"]; ?>
                    
                    </p>
                    <p class="info_profilo" data-rel="ragione">
                    
                    	<?php echo $cli["cliente_ragione_sociale"]; ?>
                    
                    </p>
                    <p class="info_profilo" data-rel="indirizzo">
                    
                    	<?php echo $cli["cliente_indirizzo"]; ?>
                    
                    </p>
                    <p class="info_profilo" data-rel="fiscale">
                    
                    	<?php echo $cli["cliente_codice_fiscale"]; ?>
                    
                    </p>
                    <p class="info_profilo" data-rel="provincia">
                    
                    	<?php echo $cli["cliente_provincia"]; ?>
                    
                    </p>
                    <p class="info_profilo" data-rel="iva">
                    
                    	<?php echo $cli["cliente_partita_iva"]; ?>
                    
                    </p>
                    
                    <!--Fine Titoli-->
                    
                
                </artice>
                
                <!--Fine Dati-->
            
            </div>
            
            <!--Fine Container-->
        
        </div>
        
        <!--Fine Area Clienti-->
        
        <!--Inizio File Utente-->
        
        <div id="file_utente">
        
            <h2 id="titolo_utente">
            
                Files Utente
            
            </h2>
            
            <!--Inizio Container-->
            
            <div id="container_utente">
            
            <!--Inizio Files-->
          
            
            <?php 
				
				$sqlArticoloCliente = "SELECT * FROM `articolo` WHERE `articolo_cliente_id` = '".$_SESSION["id_utente"]."' AND articolo_url LIKE 'utente' ";
   
   						$rArticoloCliente = $mysqli->query($sqlArticoloCliente);
   
  					    $countArticoloCliente =  $rArticoloCliente->num_rows;
						
						if( $countArticoloCliente >= 1 ):
							 while ( $articoloCliente = $rArticoloCliente->fetch_array() ):
				
									  $titolo = $articoloCliente["articolo_titolo"];
				                      $articoloId = $articoloCliente["articolo_id"];
			
									   //GESTIONE IMMAGINI LOOP NELL ARTICOLO
									   $sqlImmagine = "SELECT * FROM `immagine` WHERE `immagine_articolo_id` = ".$articoloCliente["articolo_id"]." ORDER BY `immagine_id` DESC";
									   $rImmagine = $mysqli->query($sqlImmagine);
									   $countImmagine =  $rImmagine->num_rows;
									   if( $countImmagine >= 1 ):
										while ( $rowImmagine = $rImmagine->fetch_array() ):
											if(  $rowImmagine["immagine_tipo"] == "application/pdf" ): ?>
												  <div class="file deseleziona">
												   <input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
												   
												     	<a target="_blank" href="<?php echo $siteurl_base.'img/'.$rowImmagine["immagine_label"]; ?>">
												   
                                <span class="file_ico"> <!--Icona-->
                                </span>
                                <span class="file_nome"> <!--Nome-->

															    <?php echo $titolo;  ?>

															</span>
															
															</a>
													</div>
											<?php else: ?>
												<div class="file deseleziona">
												   <input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
												   
												     <a target="_blank" href="<?php echo $siteurl_base.'img/'.$rowImmagine["immagine_label"]; ?>">
												   
															<span class="file_ico"> <!--Icona-->
															</span>
															<span class="file_nome"> <!--Nome-->

																<?php echo $titolo;  ?>

															</span>
															
														</a>
													</div>
											<?php 

											 endif;
										  endwhile;  
										 endif; 
          
         

							 endwhile;
						  endif;

			   ?>

           
           
            
            
            
            
            	
                
                <!--Fine Files-->
                
                <div class="clear"> <!--Clear-->
                </div>
                                
            </div>
            
            <!--Fine Container-->
            
            <!--Inizio Toolbar-->
            
            <div id="toolbar_utente">
            
            	<span id="notifica_toolbar"> <!--Notifica-->
                
                	Clicca nuovamente su un file per deselezionarlo.<br />Clicca su Elimina per cancellare definitivamente i files
                
                </span>
                
                <div id="container_toolbar">
                
					<span class="carica deseleziona" rel="carica"> <!--Carica-->

						Carica file...

					</span>
					<span class="elimina deseleziona"> <!--Elimina-->

						Elimina

					</span>
                
				</div>
            
            </div>
            
            <!--Fine Toolbar-->
        
        </div>
        
        <!--Fine File Utente-->
        
         <!--Inizio File Admin-->
        
        <div id="file_admin">
        
            <h2 id="titolo_admin">
            
                Files Amministratore
            
            </h2>
            
            <!--Inizio Container-->
            
            <div id="container_admin_files">
             
                               <?php 
				
				$sqlArticoloCliente = "SELECT * FROM `articolo` WHERE `articolo_cliente_id` = '".$_SESSION["id_utente"]."' AND articolo_url LIKE 'amministratore' ";
   
   						$rArticoloCliente = $mysqli->query($sqlArticoloCliente);
   
  					    $countArticoloCliente =  $rArticoloCliente->num_rows;
			
						
						if( $countArticoloCliente >= 1 ):
							 while ( $articoloCliente = $rArticoloCliente->fetch_array() ):
				                      
				                      $articoloId = $articoloCliente["articolo_id"];
				
									  $titolo = $articoloCliente["articolo_titolo"];
			
									   //GESTIONE IMMAGINI LOOP NELL ARTICOLO
									   $sqlImmagine = "SELECT * FROM `immagine` WHERE `immagine_articolo_id` = ".$articoloCliente["articolo_id"]." ORDER BY `immagine_id` DESC";
									   $rImmagine = $mysqli->query($sqlImmagine);
									   $countImmagine =  $rImmagine->num_rows;
									   if( $countImmagine >= 1 ):
										while ( $rowImmagine = $rImmagine->fetch_array() ):
											if(  $rowImmagine["immagine_tipo"] == "application/pdf" ): ?>
												  <div class="file deseleziona">
												   <input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
												   
												     	<a target="_blank" href="<?php echo $siteurl_base.'img/'.$rowImmagine["immagine_label"]; ?>">
												   
                                <span class="file_ico"> <!--Icona-->
                                </span>
                                <span class="file_nome"> <!--Nome-->

                                <?php echo $titolo;  ?>

                                </span>
															
															</a>
													</div>
											<?php else: ?>
												<div class="file deseleziona">
												   <input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
												   
												     <a target="_blank" href="<?php echo $siteurl_base.'img/'.$rowImmagine["immagine_label"]; ?>">
												   
															<span class="file_ico"> <!--Icona-->
															</span>
															<span class="file_nome"> <!--Nome-->

																<?php echo $titolo;  ?>

															</span>
															
														</a>
													</div>
											<?php 

											 endif;
										  endwhile;  
										 endif; 
          
         

							 endwhile;
						  endif;

			   ?>
                                
            </div>
            
            <!--Fine Container-->
        
        </div>
        
        <!--Fine File Admin-->
        
        <div class="clear"> <!--Clear-->
        </div>
    
    </div>
    
    <!--Fine Container-->
    
    <!--Categorie-->

	<h2 id="titolo_categorie_profilo"> <!--Titolo-->
    
    	Categorie
        
    </h2>
    
    <!--Inizio Container-->
    
    <div id="categorie_admin_container">
    

      <?php
	
		$sqlCategoria = "SELECT * FROM `categoria`"; 
		$rCategoria = $mysqli->query($sqlCategoria);
		$countCategoria = $rCategoria->num_rows;

	  	if($countCategoria >= 1):
	        
		    $j = 1;
		
			while ( $categoria = $rCategoria->fetch_array() ):
		    
	   
		?>
    	<!--Inizio Houses-->
        
        <div class="categorie_admin_elemento">
        
        	<!--Inizio Header-->
        
        	<h2 class="header_admin_elemento">
            
            	<span class="numero_admin"> <!--Numero-->
                
                	<?php echo "0".$j; ?>
                
                </span>
                <span class="titolo_admin_elemento"> <!--Titolo-->
                
                	<?php echo $categoria['categoria_nome']; ?>
                
                </span>
            
            </h2>
            
            <!--Fine Header-->
        
        	<!--Inizio Wrapper-->
            
            <div class="wrapper_admin_elemento">
            
            <?php 
				
				 $sqlMatch="SELECT * FROM `match_azienda_categoria_articolo` LEFT JOIN `articolo` ON `articolo`.articolo_categoria_id = `match_azienda_categoria_articolo`.match_categoria_id LEFT JOIN `azienda` ON `azienda`.azienda_id = `match_azienda_categoria_articolo`.match_azienda_id  WHERE `match_categoria_id` = '".$categoria["categoria_id"]."' ORDER BY `azienda`.`azienda_nome` ASC  "; 
				 $rMatch = $mysqli->query($sqlMatch);
		         $countMatch = $rMatch->num_rows;
		        
				if( $countMatch  >= 1 ):
				 	while ( $Match = $rMatch ->fetch_array() ):
				
				      $sqlVisualizza="SELECT * FROM `match_cliente_cataloghi` WHERE `match_cli_cat_articolo_id`='".$Match["articolo_id"]."' ";
				      $rVisu = $mysqli->query($sqlVisualizza);
				      $countVisu = $rVisu->num_rows;
				      while ( $vis = $rVisu->fetch_array() ): $visu = $vis["match_cli_cat_visibile"]; endwhile;
				
				
				
				       
				    
				    if( $countVisu >= 1 ):
				    	if( $visu == "1"):
				
				
				
				
							$sqlImmagine2 = "SELECT * FROM `immagine` WHERE `immagine_articolo_id` = ".$Match["articolo_id"]." ORDER BY `immagine_id` DESC";
								   $rImmagine2 = $mysqli->query($sqlImmagine2);
								   $countImmagine2 =  $rImmagine2->num_rows;
								   if( $countImmagine2 >= 1 ):
										while ( $rowImmagine2 = $rImmagine2->fetch_array() ):
											$immagine2 = $rowImmagine2["immagine_label"];
										endwhile;
								   endif;
				
				
			 ?>    
             
            
           	 <a class="link_catalogo" target="_blank" href="<?php echo $siteurl_base.'img/'.$immagine2; ?>">
                <div class="catalogo_admin_elemento">
               
                	<span class="file_ico"> <!--Icona-->
                    </span>
                	<span class="file_nome"> <!--Nome-->
                    
                    	Catalogo 
                        
                        <span class="brand"> <!--Brand-->
                        
                        	
                        		<?php echo $Match["azienda_nome"]; ?>
								
                        
                        </span>
                    
                    </span>
                
                	<div class="clear"> <!--Clear-->
                    </div>
                
                </div>
              </a>
              <?php 
						endif;
				   endif;
				
					endwhile;
				endif;
				
			  ?>
                
            	<!--Fine Catalogo-->
            
            </div>
            
        	<!--Inizio Wrapper-->
        	
        	<div class=”clear”></div>
        	
        </div>

        
    <?php 
		
		      $j++; 
		  endwhile;
	    endif;
		
	?>	
           
        </div>
        
    	<!--Fine Offices-->
        
        <!--Inizio Various-->
        

    
    <!--Fine Container-->

</section>

<!--Fine Account-->

<!--Inizio Popup Carica-->

<aside id="popup_carica" class="modale" rel="carica_popup">

	<h7>
    
    	Caricamento
    
    </h7>
    
    <!--Inizio Contenuti-->
     
    <article class="popup"> <!--Popup-->
   
    	<!--Inizio Titoli-->
    	
    	<hgroup>
        
            <h7>
            
                Carica
                
            </h7>
            <h2 class="titolo_popup">
            
                Carica File 
                
                <span class="chiudi_modale">
                </span>
                
            </h2>
            
        </hgroup>
        
        <!--Fine Titoli-->
        
        <!--Inizio Corpo-->
        
        <div class="corpo_popup">
        
            <!--Inizio Form-->
              
            <form id="form_carica" enctype="multipart/form-data" action="" method="post">
                <input type="hidden" name="nuovoArticolo"/>
                <input type="hidden" name="articolo_cliente_id" value="<?php echo $_SESSION["id_utente"]; ?>" />
                <input type="hidden" name="articolo_url" value="utente"/>
              
                <legend> <!--Legenda-->
                      
                	Caricamento Files Utente
                          
                </legend>
                      
                <!--Inizio Campi-->
                      
                <fieldset> 
                
                    <label for="rinomina">
                
                        Rinomina File
                
                        <input name="articolo_titolo" type="text" id="rinomina" form="form_carica" tabindex="1" title="Inserire il nuovo nome del file">
                    
                    </label>
                    <label for="inserisci">
                    
                        Seleziona File
                                        
               	  		<div class="custom_input">
                        
                        	<span> <!--Etichetta-->
                            	
                                Sfoglia
                                
                            </span>
                            
                        	<input form="form_carica" name="file[]" type="file" required="required" id="inserisci" tabindex="2" title="Seleziona il file da caricare"> 
                        
                    	</div>
                                                
                    </label>
      
                </fieldset>
                
                <!--Fine Campi-->
              
              	<hr>
                
                <input type="submit" id="carica" form="form_carica" value="Carica">
            
             </form> 
            <!--Fine Form-->
        
        </div>
        
        <!--Fine Corpo-->
    
    </article>
    
    <!--Fine Contenuti-->

</aside>

<!--Fine Popup Carica-->

<!--Inizio Popup Modifica-->

<aside id="popup_modifica" class="modale" rel="modifica_popup">

	<h7>
    
    	Caricamento
    
    </h7>
    
    <!--Inizio Contenuti-->
     
    <article class="popup"> <!--Popup-->
   
    	<!--Inizio Titoli-->
    	
    	<hgroup>
        
            <h7>
            
                Modifica
                
            </h7>
            <h2 class="titolo_popup">
            
                Modifica Dati
                
                <span class="chiudi_modale">
                </span>
                
            </h2>
            
        </hgroup>
        
        <!--Fine Titoli-->
        
        <!--Inizio Corpo-->
        
        <div class="corpo_popup">
        
            <!--Inizio Form-->
              
            <form method="post" action="" enctype="application/x-www-form-urlencoded" id="form_modifica" autocomplete="on" accept-charset="UTF-8">
              
                <legend> <!--Legenda-->
                      
                	Modifica Dati Utente
                          
                </legend>
                      
                <!--Inizio Campi-->
                      
                <fieldset> 
			   <?php 
					 $sqlCli2 = "SELECT * FROM `cliente` WHERE cliente_id = '".$_SESSION["id_utente"]."' ";
					 $rCli2 = $mysqli->query($sqlCli2);
					 while ($cli2 = $rCli2->fetch_array()): 	
				?>
                    <input type="hidden" name="modificaREg" id="modificaREg">
                    <input type="hidden" name="id_utente" id="id_utente" value="<?php echo $_SESSION["id_utente"]; ?>">
                    <input name="nome_utente_modifica" type="text" required="required" id="nome_utente_modifica" form="form_modifica" value="<?php echo $cli2["cliente_nome"]; ?>"  tabindex="1" title="Inserire il nuovo nome utente" placeholder="Inserisci il Nome*">
                    <input name="cognome_utente" type="text" required="required" id="cognome_utente" form="form_modifica"  value="<?php echo $cli2["cliente_cognome"]; ?>" tabindex="2" title="Inserire il nuovo cognome utente" placeholder="Inserisci il Cognome*">
                 	<input name="email_utente_admin" type="email" required="required" id="email_utente_admin" form="form_modifica"  value="<?php echo $cli2["cliente_email"]; ?>" pattern="^[a-z0-9][_.a-z0-9-]+@([a-z0-9][0-9a-z-]+.)+([a-z]{2,4})" tabindex="3" title="Inserire la nuova email utente" placeholder="Inserisci l'E-mail*">         
                 	<input name="telefono_utente_admin" type="tel" id="telefono_utente_admin" form="form_modifica"  value="<?php echo $cli2["cliente_telefono"]; ?>" tabindex="4" title="Inserire il nuovo telefono utente" placeholder="Inserisci il Telefono">  
                    <input name="indirizzo_utente_admin" type="text" required="required" id="indirizzo_utente_admin" form="form_modifica"  value="<?php echo $cli2["cliente_indirizzo"]; ?>" tabindex="5" title="Inserire il nuovo indirizzo utente" placeholder="Inserisci l'Indirizzo*">  
                    <input name="cap_utente_admin" type="text" required="required" id="cap_utente_admin" form="form_modifica"  value="<?php echo $cli2["cliente_cap"]; ?>" tabindex="5" title="Inserire il nuovo CAP utente" size="5" maxlength="5" placeholder="Inserisci il CAP*">
                    <input name="provincia_utente_admin" type="text" required="required" id="provincia_utente_admin" form="form_modifica" value="<?php echo $cli2["cliente_provincia"]; ?>" tabindex="6" title="Inserire la nuova Provincia utente" placeholder="Inserisci la Provincia*">
                    <input name="ragione_utente_admin" type="text" id="ragione_utente_admin" form="form_modifica"  value="<?php echo $cli2["cliente_ragione_sociale"]; ?>" tabindex="7" title="Inserire la nuova Ragione sociale utente" placeholder="Inserisci la Ragione Sociale">
                    <input name="fiscale_utente_admin" type="text" required="required" id="fiscale_utente_admin" form="form_modifica"  value="<?php echo $cli2["cliente_codice_fiscale"]; ?>" tabindex="8" title="Inserire il nuovo Codice Fiscale utente" size="16" maxlength="16" placeholder="Inserisci il Codice Fiscale*">
                    <input name="iva_utente_admin" type="text" id="iva_utente_admin" form="form_modifica"  value="<?php echo $cli2["cliente_partita_iva"]; ?>" tabindex="9" title="Inserire la nuova Partita IVA utente" placeholder="Inserisci la P. IVA">

                 <?php endwhile; ?>
                </fieldset>
                
                <!--Fine Campi-->
              
              	<hr>
                
                <span class="obbligatorio_utente_admin">
                
                	* Campi obbligatori
                    
                </span>
                
                <input type="submit" id="salva" form="form_modifica" value="Salva">
            
             </form> 
            <!--Fine Form-->
        
        </div>
        
        <!--Fine Corpo-->
    
    </article>
    
    <!--Fine Contenuti-->

</aside>


<?php 
		endwhile;

    else:

    
     include("include/login.php");
     

	endif;
?>

<!--Fine Popup Modifica-->