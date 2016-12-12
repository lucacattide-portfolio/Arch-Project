<div class="page-header filled full-block light">
    <div class="row">
        <div class="col-md-6">
            <h2>Aziende</h2>
            <p>Gestione Aziende</p>
        </div>
        <div class="col-md-6">
            <ul class="list-page-breadcrumb">
                <li><a href="index.php" title="Home">Home<i class="zmdi"></i></a> | <a href="index.php?pag=clienti" title="Pagine"><i class="zmdi"></i>Aziende</a></li>
            </ul>
        </div>
    </div>
</div>


<div class="btnAdd-page btn-primary">
 <a class="aggiungi" title="Aggiungi Azienda"  href="#"><i class="zmdi zmdi-plus zmdi-hc-fw"></i></a>
</div> 


<div class="row">
  <div class="col-md-12">
    <div class="widget-wrap">
      <div class="widget-header block-header margin-bottom-0 clearfix">
        <div class="pull-left">
        <h3>Aziende</h3>
        <p>Gestione Aziende</p>
        </div>
        <div class="pull-right w-action">
          <ul class="widget-action-bar">
            <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="zmdi zmdi-more"></i></a>
              <ul class="dropdown-menu">
                <li class="widget-reload"><a href="#"><i class="zmdi zmdi-refresh"></i></a></li>
                <li class="widget-toggle"><a href="#"><i class="zmdi zmdi-chevron-down"></i></a></li>
                <li class="widget-fullscreen"><a href="#"><i class="zmdi zmdi-fullscreen"></i></a></li>
                <li class="widget-exit"><a href="#"><i class="zmdi zmdi-power"></i></a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <div class="widget-container">
        <div class="widget-content">
          <form class="j-forms formElement"  method="post" enctype="multipart/form-data" novalidate>
          <?php if( $countAziendaAccount >= 1 ):
				  
				  while ( $Account = $rAziendaAccount->fetch_array()): 
				  
		  ?>
          <input type="hidden" name="modificaAzienda" />
          <input type="hidden" name="azienda_id" value="<?php echo $Account["azienda_id"]; ?>"/> 
          <div class="form-content"> 
            
            <!-- start text password -->
            <div class="row col-md-6">
              <div class="col-md-12 unit ">
                <label class="label">Nome Azienda*</label>
                <div class="input req">
                  <label for="text" class="icon-left"> <i class="zmdi zmdi-globe"></i> </label>
                  <input  name="azienda_nome" class="form-control required" type="text" placeholder="Nome Azienda" value="<?php echo $Account["azienda_nome"]; ?>">
                </div>
              </div>
              
              <div class="col-md-12 unit ">
                <label class="label">Email*</label>
                <div class="input req">
                  <label for="text" class="icon-left"> <i class="zmdi zmdi-globe"></i> </label>
                  <input required name="azienda_email" class="form-control required" type="text" placeholder="Email" value="<?php echo $Account["azienda_email"]; ?>">
                </div>
              </div>
              
              
              <div class="col-md-12 unit">
                <label class="label">Partita Iva</label>
                <div class="input">
                  <label for="text" class="icon-left"> <i class="zmdi zmdi-globe"></i> </label>
                  <input  name="azienda_partita_iva" class="form-control" type="email" placeholder="P.IVA" value="<?php echo $Account["azienda_partita_iva"]; ?>">
                </div>
              </div>
              
              <div class="col-md-12 unit">
                <label class="label">Telefono</label>
                <div class="input">
                  <label for="text" class="icon-left"> <i class="zmdi zmdi-globe"></i> </label>
                  <input required name="azienda_telefono" class="form-control" type="text" placeholder="Telefono" value="<?php echo $Account["azienda_telefono"]; ?>">
                </div>
              </div>
              
            </div>
            <!-- end text password --> 
            
            <!-- start text password -->
            <div class="row col-md-6">
            
             <div class="col-md-12 unit">
                <label class="label">Indirizzo</label>
                <div class="input">
                  <label for="text" class="icon-left"> <i class="zmdi zmdi-globe"></i> </label>
                  <input required name="azienda_indirizzo" class="form-control" type="text" placeholder="Indirizzo" value="<?php echo $Account["azienda_indirizzo"]; ?>">
                </div>
              </div>
              
              
              <div class="col-md-12 unit">
                <label class="label">Cap</label>
                <div class="input">
                  <label for="text" class="icon-left"> <i class="zmdi zmdi-globe"></i> </label>
                  <input required name="azienda_cap" class="form-control" type="text" placeholder="CAP" value="<?php echo $Account["azienda_cap"]; ?>">
                </div>
              </div>
              
              
              <div class="col-md-12 unit">
                <label class="label">Provincia</label>
                <div class="input">
                  <label for="text" class="icon-left"> <i class="zmdi zmdi-globe"></i> </label>
                  <input required name="azienda_provincia" class="form-control" type="text" placeholder="Provincia" value="<?php echo $Account["azienda_provincia"]; ?>">
                   <input required name="azienda_stato" class="form-control" type="hidden" value="Italia" >
                </div>
              </div>
             
             
            
            </div>
            <!-- end text password --> 
            
            <!-- categorie selezione -->
            <div class="row col-md-12" style="margin:0px; padding:0px;">
               <div style="clear:both;"></div>
               <hr>
               <div style="clear:both;"></div>
               <label> Seleziona le categorie dei cataloghi inerenti alle aziende</label>
               <label> *Disattivando una categoria si cancelleranno automaticamente i pdf inseriti </label>
               <div style="clear:both;"></div><br>
                <div class="row col-md-12" style="margin:0px; padding:0px;">
     			<?php 
				
				    $sqlCategoria = "SELECT * FROM `categoria`"; 

					$rCategoria = $mysqli->query($sqlCategoria);
				
					$countCategoria = $rCategoria->num_rows;
								  
				  if($countCategoria >= 1):
               
                  	while ( $rowCategoria = $rCategoria->fetch_array() ):
					
						$sqlMatch = "SELECT * FROM `match_azienda_categoria_articolo` WHERE match_azienda_id = '".$Account["azienda_id"]."' AND match_categoria_id = '".$rowCategoria["categoria_id"]."' GROUP BY match_categoria_id ";
						$rMatch = $mysqli->query($sqlMatch);
						$countMatch  = $rMatch->num_rows;
						$catActive = "";
						if($countMatch  >= 1):
							while ( $rowMatch = $rMatch->fetch_array() ):   
							    $catActive = $rowMatch["match_categoria_id"];
							endwhile;
						endif;
				
				?>
                <div class="col-md-5" style="background-color:rgba(255,255,255,1.00);border:1px solid #999;border-radius:10px; margin-left:8px; margin-right:8px; margin-bottom:8px;">
                    <h5>Categoria:</h5>
                    <label class="checkbox">
                        
                        <input type="checkbox" name="match_categoria_id[]" <?php if(!empty($catActive)): echo "checked"; endif; ?> value="<?php echo $rowCategoria["categoria_id"]; ?>">
                        <i></i>
                        <?php echo $rowCategoria["categoria_nome"]; ?>
                    </label>
                    <div style="clear:both;"></div>
                    <hr>
                    <div style="clear:both;"></div>
                    <h5>PDF Correlati: </h5>
                    <div style="clear:both;"></div>
                    <hr>
                    <div style="clear:both;"></div>
                    
                    <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Nome Documento</th>
                        <th class="td-center">Azioni</th>
                      </tr>
                    </thead>
                    <tbody class="insertContentQuery">
                    <?php 
					   
					   $sqlArticoloPdf = "SELECT * FROM `articolo` WHERE  articolo_azienda_id = '".$_GET["id"]."' AND articolo_categoria_id = '".$catActive."' ORDER BY articolo_titolo ASC ";
					   $rArticoloPdf = $mysqli->query($sqlArticoloPdf);
					   $countArticoloPdf  = $rArticoloPdf->num_rows;
					   if($countArticoloPdf  >= 1):
							while ( $rowArticoloPdf = $rArticoloPdf->fetch_array() ):   
							
							$sqlImmagine = "SELECT * FROM `immagine` WHERE immagine_articolo_id = '".$rowArticoloPdf["articolo_id"]."' ORDER BY `immagine_ordinamento` ASC";
                               $rImmagine = $mysqli->query($sqlImmagine);
                               $countImmagine =  $rImmagine->num_rows;
                               if( $countImmagine >= 1 ):
                                while ( $rowImmagine = $rImmagine->fetch_array() ):
									if(  $rowImmagine["immagine_tipo"] == "application/pdf" ): 
									  $linkDocument = $rowImmagine["immagine_label"];
									endif;
							     endwhile;
								endif; 		
						?>
                                  <tr>
                                    <td><a target="_blank" href="../img/<?php echo $linkDocument; ?>"><?php echo $rowArticoloPdf["articolo_titolo"]; ?></a></td>
                                    <td class="td-center">
                                     <div class="btn-toolbar" role="toolbar">
                                      <div class="btn-group" role="group"> 
                                       <form class="j-forms formElement2"  method="post" enctype="multipart/form-data" novalidate>
                                        <input type="hidden" name="eliminaArticolo" />
                                        <input class="idSelection" type="hidden" name="articolo_id" value="<?php echo $rowArticoloPdf["articolo_id"]; ?>" />
                                        <button class="btn btn-default btn-sm m-user-delete"><i class="zmdi zmdi-close"></i></button>
                                       </form>
                                      </div>
                                     </div>
                                    </td>
                                  </tr>
                    <?php
				    
							endwhile;
						endif;
					   
					?>
                       </tbody>
          			  </table>
                      
                       <div style="clear:both;"></div>
                        <br>
                       <div style="clear:both;"></div>  
                </div>
                <?php 
				  	endwhile;
				  
				  endif;
				?>
                                               
            
            <!-- END categorie selezione -->
             </div>
            </div>
            
            
           
            
  
            <div class="row col-md-12">
               <div style="clear:both; margin-top:20px;"></div>
                <div class="modal-footer">
                 <button class="btn btn-primary" type="submit">Modifica Azienda</button>
                   <i class="zmdi"></i>
                   <button class="btn" type="reset">Annulla</button>
                  </div>
             </div>
            
            
          </div>
          <?php 
		     
				 endwhile;
			 
			 endif;
		  
		  ?>
        </form>
        </div>
      </div>
    </div>
   </div>
</div>