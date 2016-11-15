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
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Nome Azienda</th>
                  <th>Email</th>
                  <th>Telefono</th>
                  <th>P.Iva/C.F.</th>
                  <th class="td-center">Azioni</th>
                </tr>
              </thead>
              <tbody class="insertContentQuery">
			    <?php 
				  
				  if( $countAzienda >= 1 ):
				  
				  while ( $Azienda = $rAzienda->fetch_array()):
				
				?>
                <tr>
                  <td><?php echo $Azienda["azienda_nome"]; ?></td>
                  <td>
                  	<a href="mailto:<?php echo $Azienda["azienda_email"]; ?>"><?php echo $Azienda["azienda_email"]; ?></a>
                  </td>
                  <td><?php echo $Azienda["azienda_telefono"]; ?></td>
                  <td><?php echo $Azienda["azienda_partita_iva"]; ?></td>
                  <td class="td-center">
                   <div class="btn-toolbar" role="toolbar">
                  	<div class="btn-group" role="group"> 
                     <form class="j-forms formElement2"  method="post" enctype="multipart/form-data" novalidate>
                      <a  class="btn btn-default btn-sm m-user-edit" href="index.php?pag=aziende-account&id=<?php echo $Azienda["azienda_id"]; ?>"><i class="zmdi zmdi-edit"></i></a> 
                      <input type="hidden" name="eliminaAzienda" />
                      <input class="idSelection" type="hidden" name="azienda_id" value="<?php echo $Azienda["azienda_id"]; ?>" />
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
          </div>
        </div>
      </div>
    </div>
   </div>
</div>