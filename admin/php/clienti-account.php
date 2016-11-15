<div class="page-header filled full-block light">
	<div class="row">
		<div class="col-md-6">
			<h2>Clienti Account</h2>
			<p>Gestione Profilo Clienti</p>
		</div>
		<div class="col-md-6">
			<ul class="list-page-breadcrumb">
				<li><a href="index.php" title="Home">Home<i class="zmdi"></i></a> | <a href="index.php?pag=clienti" title="Pagine"><i class="zmdi"></i>Clienti</a> | <a href="index.php?pag=clienti-account" title="Pagine"><i class="zmdi"></i>Clienti Account</a>
				</li>
			</ul>
		</div>
	</div>
</div>


<?php

if ( $countClientiAccount >= 1 ):

	while ( $cliente = $rClientiAccount->fetch_array() ):

		?>

<div draggable="false" class="widget-wrap">
	<div class="widget-header block-header margin-bottom-0 clearfix">
		<div class="pull-left">
			<h3>
				<?php echo $cliente["cliente_nome"]." ".$cliente["cliente_cognome"] ?>
			</h3>
			<p>
				<?php echo "P.IVA ".$cliente["cliente_partita_iva"]." | C.F. ".$cliente["cliente_codice_fiscale"]; ?>
			</p>
		</div>
		<div class="pull-right w-action">
			<ul class="widget-action-bar">
				<li class="dropdown"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="zmdi zmdi-more"></i></a>
					<ul class="dropdown-menu">
						<li class="widget-reload"><a href="#"><i class="zmdi zmdi-refresh"></i></a>
						</li>
						<li class="widget-toggle"><a href="#"><i class="zmdi zmdi-chevron-down"></i></a>
						</li>
						<li class="widget-fullscreen"><a href="#"><i class="zmdi zmdi-fullscreen"></i></a>
						</li>
						<li class="widget-exit"><a href="#"><i class="zmdi zmdi-power"></i></a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<div class="widget-container">
		<div class="widget-content">
			<div class="row">
				<div class="col-md-12">

					<input type="hidden" name="modificaCliente">
					<input type="hidden" name="cliente_id" value="">
					<div class="form-content">

						<!-- start text password -->
						<div class="row col-md-4">
							<div class="col-md-12 unit">

								<div class="cliente-profilo-img" style="background-image:url(../img/56523.png);"></div>

								<a class="btn btn-default btn-sm m-user-edit aggiungi add-document-clients" href="#"><i class="zmdi zmdi-attachment-alt"></i> Aggiungi documenti</a>

							</div>
						</div>
						<!-- end text password -->

						<!-- start text password -->
						<div class="row col-md-4">

							<div class="col-md-12 unit">
								<label class="label">Nome</label>
								<div class="input">
									<input value="<?php echo $cliente["cliente_nome"]; ?>" disabled class="form-control"/>
								</div>
							</div>

							<div class="col-md-12 unit">
								<label class="label">Cognome</label>
								<div class="input">
									<input value="<?php echo $cliente["cliente_cognome"]; ?>" disabled class="form-control"/>
								</div>
							</div>

							<div class="col-md-12 unit">
								<label class="label">Email</label>
								<div class="input">
									<input value="<?php echo $cliente["cliente_email"]; ?>" disabled class="form-control"/>
								</div>
							</div>

							<div class="col-md-12 unit">
								<label class="label">Codice Fiscale</label>
								<div class="input">
									<input value="<?php echo $cliente["cliente_codice_fiscale"]; ?>" disabled class="form-control"/>
								</div>
							</div>


						</div>
						<!-- end text password -->



						<!-- start text password -->
						<div class="row col-md-4">

							<div class="col-md-12 unit">
								<label class="label">Indirizzo</label>
								<div class="input">
									<input value="<?php echo $cliente["cliente_indirizzo"]; ?>" disabled class="form-control"/>
								</div>
							</div>

							<div class="col-md-12 unit">
								<label class="label">Cap</label>
								<div class="input">
									<input value="<?php echo $cliente["cliente_cap"]; ?>" disabled class="form-control"/>
								</div>
							</div>

							<div class="col-md-12 unit">
								<label class="label">Provincia</label>
								<div class="input">
									<input value="<?php echo $cliente["cliente_provincia"]; ?>" disabled class="form-control"/>
								</div>
							</div>

							<div class="col-md-12 unit">
								<label class="label">Telefono</label>
								<div class="input">
									<input value="<?php echo $cliente["cliente_telefono"]; ?>" disabled class="form-control"/>
								</div>
							</div>


						</div>
						<!-- end text password -->


						<!-- dati implementazione -->
						<div class="row col-md-6">
							<div style="clear:both;"></div>
							<hr>
							<div style="clear:both;"></div>
							<h4>Documenti per il cliente </h4>
							<!-- inserimento specifica nome articolo + immagine -->
							<form novalidate class="j-forms formElement" method="post" enctype="multipart/form-data" novalidate>


								<div class="row col-md-12">
									<?php 
						
						$sqlArticoloCliente = "SELECT * FROM `articolo` WHERE `articolo_cliente_id` = '".$_GET["id"]."' AND articolo_url LIKE 'amministratore' ";
   
   						$rArticoloCliente = $mysqli->query($sqlArticoloCliente);
   
  					    $countArticoloCliente =  $rArticoloCliente->num_rows;
						
						if( $countArticoloCliente >= 1 ):
							 while ( $articoloCliente = $rArticoloCliente->fetch_array() ):
				
                               //GESTIONE IMMAGINI LOOP NELL ARTICOLO
                               $sqlImmagine = "SELECT * FROM `immagine` WHERE `immagine_articolo_id` = ".$articoloCliente["articolo_id"]." ORDER BY `immagine_id` DESC";
                               $rImmagine = $mysqli->query($sqlImmagine);
                               $countImmagine =  $rImmagine->num_rows;
                               if( $countImmagine >= 1 ):
                                while ( $rowImmagine = $rImmagine->fetch_array() ):
									if(  $rowImmagine["immagine_tipo"] == "application/pdf" ): ?>
									<div draggable="true" class="col-sm-4 col-md-4 nopadding boxImgMod">
										<div class="col-sm-12 col-md-12 nopadding">
											<iframe class='thumb-image col-md-12' src="../img/<?php echo $rowImmagine["immagine_label"];  ?>"></iframe>
										</div>
										<input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
										<div class="col-sm-12 col-md-12">
											<label class="checkbox">
                                          <input type="checkbox" name="immagine_id[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                                          <i></i>
                                          ELIMINA PDF
                                       </label>
										
										</div>
									</div>
									<?php else: ?>
									<div draggable="true" class="col-sm-4 col-md-4 nopadding boxImgMod">
										<div class="col-sm-12 col-md-12 nopadding">
											<img class='thumb-image col-md-12' src="../img/<?php echo $rowImmagine["immagine_label"];  ?>"/>
										</div>
										<input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">

										<div class="col-sm-12 col-md-12">
											<label class="checkbox">
                                          <input type="checkbox" name="immagine_id[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
                                          <i></i>
                                          ELIMINA IMMAGINE
                                       </label>
										
										</div>

									</div>
									<?php  
							    	endif;
                                endwhile;  
                                endif; 
					
                               ?>


									<?php endwhile; endif; ?>


								</div>




								<!-- END inserimento specifica nome articolo + immagine -->
							</form>

							<!-- dati implementazione -->
						</div>



						<!-- dati implementazione -->
						<div class="row col-md-6">
							<div style="clear:both;"></div>
							<hr>
							<div style="clear:both;"></div>
							<h4>Documenti dal cliente </h4>
							<!-- inserimento specifica nome articolo + immagine -->
							<form novalidate class="j-forms formElement" method="post" enctype="multipart/form-data" novalidate>


								<div class="row col-md-12">
									<?php 
						
						$sqlArticoloCliente = "SELECT * FROM `articolo` WHERE `articolo_cliente_id` = '".$_GET["id"]."' AND articolo_url LIKE 'utente' ";
   
   						$rArticoloCliente = $mysqli->query($sqlArticoloCliente);
   
  					    $countArticoloCliente =  $rArticoloCliente->num_rows;
						
						if( $countArticoloCliente >= 1 ):
							 while ( $articoloCliente = $rArticoloCliente->fetch_array() ):
				
                               //GESTIONE IMMAGINI LOOP NELL ARTICOLO
                               $sqlImmagine = "SELECT * FROM `immagine` WHERE `immagine_articolo_id` = ".$articoloCliente["articolo_id"]." ORDER BY `immagine_id` DESC";
                               $rImmagine = $mysqli->query($sqlImmagine);
                               $countImmagine =  $rImmagine->num_rows;
                               if( $countImmagine >= 1 ):
                                while ( $rowImmagine = $rImmagine->fetch_array() ):
									if(  $rowImmagine["immagine_tipo"] == "application/pdf" ): ?>
									<div draggable="true" class="col-sm-6 col-md-6 nopadding boxImgMod">
										<div class="col-sm-12 col-md-12 nopadding">
											<iframe class='thumb-image col-md-12' src="../img/<?php echo $rowImmagine["immagine_label"];  ?>"></iframe>
										</div>
										<input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">
										
									</div>
									<?php else: ?>
									<div draggable="true" class="col-sm-6 col-md-6 nopadding boxImgMod">
										<div class="col-sm-12 col-md-12 nopadding">
											<img class='thumb-image col-md-12' src="../img/<?php echo $rowImmagine["immagine_label"];  ?>"/>
										</div>
										<input type="hidden" name="immagine_ordinamento[]" value="<?php echo $rowImmagine["immagine_id"];  ?>">

									</div>
									<?php  
							    	endif;
                                endwhile;  
                                endif; 
					
                               ?>


									<?php endwhile; endif; ?>


								</div>



								<!-- END inserimento specifica nome articolo + immagine -->
							</form>



							<!-- dati implementazione -->
						</div>



						<div class="row col-md-12">
							<div style="clear:both;"></div>
							<hr>
							<div style="clear:both;"></div>
						</div>


						<div class="row col-md-12">
							<h4>Attiva pdf categorie</h4>
						</div>
						
						<!-- seleziona cataloghi -->
						<div class="row col-md-12">
                        
						 <?php 
							
						
						  
							if( $countAzienda >= 1 ):
						
							
							  while( $azienda = $rAzienda->fetch_array()):
					
						  ?>
						    <form novalidate class="j-forms formElement" method="post" enctype="multipart/form-data" novalidate> 
                            <input type="hidden" name="clienteRiviste" />
                            <input type="hidden" name="cliente_id" value="<?php echo $_GET["id"]; ?>" />
						    <hr>          
								<h5> Azienda: <strong><?php echo $azienda["azienda_nome"]; ?></strong> </h5>
					            
						    <hr> 
						    <input type="hidden" name="azienda_id" value="<?php echo $azienda["azienda_id"]; ?>" />
						     
				    <table class="table foo-data-table" data-page-size="5" data-limit-navigation="3">
                        <thead>
                        <tr>
                            <th data-hide="phone">
                               Categoria
                            </th>
                            <th  data-hide="phone">
                               Rivista
                            </th>
                            <th data-sort-ignore="true">
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        
                        <?php 
							
						  $sqlMatch = "SELECT * FROM `articolo` LEFT JOIN categoria on categoria.categoria_id = articolo.articolo_categoria_id LEFT JOIN azienda on azienda.azienda_id = articolo.`articolo_azienda_id` WHERE  articolo_azienda_id = '".$azienda["azienda_id"]."'";	
						  $rMatch = $mysqli->query($sqlMatch);
                          $countMatch = $rMatch->num_rows;
							
						  if( $countMatch >= 1):
							 while ( $match = $rMatch->fetch_array() ):
							   
							  $varVisibile = "";
							
							  $sqlVis = "SELECT * FROM `match_cliente_cataloghi` WHERE `match_cli_cat_articolo_id` = '".$match["articolo_id"]."' ";
							  $rVis = $mysqli->query($sqlVis);
                              $countVis = $rMatch->num_rows;
							  if( $countVis >= 1):
							    while ( $vis = $rVis->fetch_array() ):
							      
							       $varVisibile = $vis["match_cli_cat_visibile"];
							   
							    endwhile;
							  endif;
							
								if(!empty($match["articolo_titolo"])):
						?>
                        
                        <input type="hidden" name="articolo_id[]" value="<?php echo $match["articolo_id"]; ?>" />
                        <tr>
                            <td><?php echo $match["categoria_nome"]; ?></td>
                            <td><?php echo $match["articolo_titolo"]; ?></td>
                            <td>
                             <label class="col-md-4">
                              <input type="radio" <?php if($varVisibile == 1): echo "checked"; endif; ?> name="visibile[]_<?php echo $match["articolo_id"]; ?>" value="1"/>
                              Visibile
                             </label> &nbsp;&nbsp;
                             <label class="col-md-4">
                              <input type="radio" <?php if($varVisibile != 1): echo "checked"; endif; ?>    name="visibile[]_<?php echo $match["articolo_id"]; ?>" value="2"/>
                              Non Visibile
                             </label> 
                            </td>
                        </tr>
                       <?php 
						        endif;
							endwhile;
						endif;
						?>
                        </tbody>
                        <tfoot class="hide-if-no-paging">
                        <tr>
                            <td colspan="6" class="footable-visible">
                                <div class="pagination pagination-centered"></div>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
						    <hr>
						  	<button type="submit"> SALVA </button>
						</form>
						  <?php 
							 
								endwhile; 
							
							endif;  
					     ?>
					    
						
						<!-- end seleziona cataloghi -->	
						</div>


					</div>
					<!-- end /.content -->



					<!-- end /.footer -->


				</div>
			</div>
		</div>
	</div>
</div>

<?php
endwhile;
endif;
?>