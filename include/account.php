<!--Inizio Account-->

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
            
            	Logout
            
            </span>
            <span id="chiudi_profilo"> <!--Chiudi-->
            </span>
            
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
                        
       				<form>

			        <!-- END UPDATE IMG AJAX -->
     
     			</div>
                
                <!--Fine Avatar-->
        
                <span class="modifica_pulsante deseleziona"> <!--Modifica-->
                
                    Modifica Dati
                
                </span>
                
                <!--Inizio Dati-->
                
                <article id="dati_profilo">
                
                	<!--Inizio Titoli-->
                	
                	<hgroup>
                
                        <h7>
                        
                            Dati Utente
                            
                        </h7>
                        <h2 id="nome_profilo">
                        
                            Nome Cognome
                            
                        </h2>
                    
                    </hgroup>	
                    
                    <p class="info_profilo">
                    
                    	Email
                    
                    </p>
                    <p class="info_profilo">
                    
                    	CAP
                    
                    </p>
                    <p class="info_profilo">
                    
                    	Telefono
                    
                    </p>
                    <p class="info_profilo">
                    
                    	Ragione sociale
                    
                    </p>
                    <p class="info_profilo">
                    
                    	Indirizzo
                    
                    </p>
                    <p class="info_profilo">
                    
                    	Codice Fiscale
                    
                    </p>
                    <p class="info_profilo">
                    
                    	Provincia
                    
                    </p>
                    <p class="info_profilo">
                    
                    	Partita IVA
                    
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
        
        </div>
        
        <!--Fine File Utente-->
        
         <!--Inizio File Admin-->
        
        <div id="file_admin">
        
            <h2 id="titolo_admin">
            
                Files Amministratore
            
            </h2>
        
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

</section>

<!--Fine Account-->