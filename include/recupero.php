<!--Inizio Recupero-->

<section id="recupero">

	<h7>
    
    	Password reset
        
    </h7>
    
    <!--Inizio Autenticazione-->
    
    <article class="autenticazione">
    
    	<h1 class="titolo_autenticazione animated fadeInDown"> <!--Titolo-->
        	
            Recupero Password
            
        </h1>
        
      	<div class="dingbat_3 animated fadeInDown"> <!--Separatore-->
        </div>
        
        <!--Inizio Form-->
        
        <form method="post" action="" enctype="application/x-www-form-urlencoded" id="form_recupero" autocomplete="on" title="Login" accept-charset="UTF-8" >
        
        	<legend>
            
            	Recupero password utente
            
           	</legend>
            
            <!--Inizio Campi-->
            
            <fieldset>
            
            	<input name="email_recupero" type="email" required="required" id="email_recupero" form="form_recupero" placeholder="Email" pattern="^[a-z0-9][_.a-z0-9-]+@([a-z0-9][0-9a-z-]+.)+([a-z]{2,4})" tabindex="1" title="Inserire l'indirizzo E-Mail" class="animated fadeInUp">
               <!-- <input name="password_recupero_nuova" type="password" required="required" form="form_recupero" id="password_recupero_nuova" placeholder="Nuova Password" tabindex="2" title="Inserire la Password">
                <input name="password_recupero_conferma" type="password" required="required" form="form_recupero" id="password_recupero_conferma" placeholder="Conferma Password" tabindex="3" title="Conferma la Password">-->
            
            </fieldset>
            
            <!--Fine Campi-->
            
            <input name="entra_recupero" type="submit" id="entra_recupero" form="form_recupero" tabindex="4" title="Accedi" value="Invia" class="animated fadeInUp">
        
        </form>
        
        <!--Fine Form-->
        
        <p class="eccezioni"> <!--Notifiche-->        
        </p>
    
    </article>
    
    <!--Fine Autenticazione-->

</section>

<!--Fine Recupero-->