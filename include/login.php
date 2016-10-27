<!--Inizio Login-->

<section id="login">

	<h7>
    
    	Autenticazione
        
    </h7>
    
    <!--Inizio Autenticazione-->
    
    <article class="autenticazione">
    
    	<h1 class="titolo_autenticazione animated fadeInDown"> <!--Titolo-->
        	
            Login
            
        </h1>
        
      	<div class="dingbat_3 animated fadeInDown"> <!--Separatore-->
        </div>
        
        <!--Inizio Form-->
        
        <form method="post" action="" enctype="application/x-www-form-urlencoded" id="form_login" autocomplete="on" title="Login" accept-charset="UTF-8" >
        
        	<legend>
            
            	Accesso all'area riservata
            
           	</legend>
            
            <!--Inizio Campi-->
            
            <fieldset>
            
            	<input name="email_login" type="email" required="required" id="email_login" form="form_login" placeholder="Email" pattern="^[a-z0-9][_.a-z0-9-]+@([a-z0-9][0-9a-z-]+.)+([a-z]{2,4})" tabindex="1" title="Inserire l'indirizzo E-Mail" class="animated fadeInUp">
                <input name="password_login" type="password" required="required" form="form_login" id="password_login" placeholder="Password" tabindex="2" title="Inserire la Password" class="animated fadeInUp">
            
            </fieldset>
            
            <!--Fine Campi-->
            
            <input name="entra_login" type="submit" id="entra_login" form="form_login" tabindex="3" title="Accedi" value="Accedi" class="animated fadeInUp">
            
            <label class="recupero_password animated fadeInUp">
            
            	Se hai dimenticato la password <a href="<?php echo $siteurl."recupero-password" ?>" title="Recupero password">clicca qui</a>
            
            </label>
        
        </form>
        
        <!--Fine Form-->
        
        <p class="eccezioni"> <!--Notifiche-->        
        </p>
    
    </article>
    
    <!--Fine Autenticazione-->

</section>

<!--Fine Login-->