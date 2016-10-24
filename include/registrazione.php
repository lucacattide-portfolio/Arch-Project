<!--Inizio Registrazione-->

<section id="registrazione">

	<h7>
    
    	Registrazione Account
        
    </h7>
    
    <!--Inizio Autenticazione-->
    
    <article class="autenticazione">
    
    	<h1 class="titolo_autenticazione"> <!--Titolo-->
        	
            Registrazione
            
        </h1>
        
      	<div class="dingbat_4"> <!--Separatore-->
        </div>
        
        <h2 class="sottotitolo_autenticazione"> <!--Sottotitolo-->
        
        	PER POTER VEDERE LA SEZIONE PARTNERS E’ OBBLIGATORIO REGISTRARSI
        
        </h2>
        
        <!--Inizio Form-->
        
        <form method="post" action="" enctype="application/x-www-form-urlencoded" id="form_registrazione" autocomplete="on" title="Login" accept-charset="UTF-8" >
        
        	<legend>
            
            	Registrazione profilo utente
            
           	</legend>
            
            <!--Inizio Campi-->
            
            <fieldset>
            	
            	<div>
              
              		<input name="nome_registrazione" type="text" required="required" form="form_registrazione" id="nome_registrazione" placeholder="Nome*" tabindex="1" title="Inserire il nome" pattern="[a-zA-Zàèìòù' ]">
              		<input name="cognome_registrazione" type="text" required="required" form="form_registrazione" id="cognome_registrazione" placeholder="Cognome*" tabindex="2" title="Inserire il cognome" pattern="[a-zA-Zàèìòù' ]">
                    
                </div>
                <div>
                
                    <input name="email_registrazione" type="email" required="required" id="email_registrazione" form="form_registrazione" placeholder="Email*" pattern="^[a-z0-9][_.a-z0-9-]+@([a-z0-9][0-9a-z-]+.)+([a-z]{2,4})" tabindex="3" title="Inserire l'indirizzo E-Mail">
                    <input name="telefono_registrazione" type="tel" form="form_registrazione" id="telefono_registrazione" placeholder="Telefono" tabindex="4" title="Inserire il telefono">
                   
               	</div>
               	<div>
               
                    <input name="indirizzo_registrazione" type="text" required="required" form="form_registrazione" id="indirizzo_registrazione" placeholder="Indirizzo*" tabindex="5" title="Inserire l'indirizzo">
                    <input name="cap_registrazione" type="number" required="required" id="cap_registrazione" form="form_registrazione" placeholder="CAP*" max="5" min="5" tabindex="6" title="Inserire il Codice di Avviamento Postale">
                    
                </div>
              	<div>
              
                  <input name="provincia_registrazione" type="text" required="required" form="form_registrazione" id="provincia_registrazione" placeholder="Provincia*" tabindex="7" title="Inserire la provincia">
                  <input name="regione_registrazione" type="text" form="form_registrazione" id="regione_registrazione" placeholder="Ragione sociale" tabindex="8" title="Inserire la ragione sociale">
                  
                </div>
                <div>
              
                  <input name="fiscale_registrazione" type="text" required="required" id="fiscale_registrazione" form="form_registrazione" placeholder="Codice Fiscale*" tabindex="9" title="Inserire il codice fiscale" maxlength="16">
                  <input name="iva_registrazione" type="text" id="iva_registrazione" form="form_registrazione" placeholder="Partita IVA" tabindex="10" title="Inserire la partita IVA">
              
                </div>
                <div>
              
                  <input name="password_registrazione" type="text" required="required" id="password_registrazione" form="form_registrazione" placeholder="Password*" tabindex="11" title="Inserire la password">
                  <input name="password_conferma_registrazione" type="text" required="required" id="password_conferma_registrazione" form="form_registrazione" placeholder="Conferma Password*" tabindex="12" title="Confermare la password">
              
                </div>
            
            </fieldset>
            
            <!--Fine Campi-->
            
            <div>
            
            	<span>
                
                	<p>
                    
                    	* Campi obbligatori
                        
                    </p>
                
                    <label for="accettazione">
                    
                        <input name="accettazione" type="checkbox" required="required" id="accettazione" form="form_registrazione" title="Accettare i termini e le condizioni" tabindex="13">
                        
                        Autorizzo al trattemnto dei dati personali ai sensi del DLgs. n. 196/03
                        
                    </label>   
                
                </span>
                
            	<input name="entra_registrazione" type="submit" id="entra_registrazione" form="form_registrazione" tabindex="14" title="Accedi" value="Registrati">
        
       	  	</div>
        
        </form>
        
        <!--Fine Form-->
        
        <p class="eccezioni"> <!--Notifiche-->        
        </p>
    
    </article>
    
    <!--Fine Autenticazione-->

</section>

<!--Fine Registrazione-->