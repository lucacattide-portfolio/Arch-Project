<!--

$(document).ready(function() {
	
	inizializza(); // Invocazione Funzione Inizializzazione
	transizioni(); // Invocazione Funzione Transizioni
	
});


// Funzione Transizioni

function transizioni() {
	
	// Menu Principale - Pulsante
	
	$(".hamburger").on("click tap", function() { // Al click sul pulsante
		
		$(this).toggleClass("is-active"); // Attiva il pulsante
		$("#menu_principale").toggleClass("apri_menu"); // Apri il menu principale 
		$("#pulsante_menu").toggleClass("pulsante_attivo"); // Trasla il pulsante a destra
		$("#menu_voci a:nth-child(odd)").toggleClass("animated fadeInDown"); // Anima voci di menu dispari
		
		setTimeout(function() {
		
			$("#menu_voci a:nth-child(even)").toggleClass("animated fadeInDown"); // Anima voci di menu pari
		
		}, 500);
		$("#social a:nth-child(odd)").toggleClass("animated rotateIn"); // Anima voci di menu dispari
		
		setTimeout(function() {
		
			$("#social a:nth-child(even)").toggleClass("animated rotateIn"); // Anima voci di menu pari
		
		}, 500);
		
	
	});
	
	// Menu Contestuale - Activities
    
    $(".menu_activities").on("click tap", function(e) { // Al click della voce 
        
        e.preventDefault(); // Disattiva funzione standard link
        
        $("#container").animate({ // Vai all'ancora con animazione
        
            scrollTop: $(".summary[rel='" + $(this).attr("rel") + "']").offset().top - 16 
            
        }, "slow");

    });
    
    // Torna Su
    
    $("#container").on("scroll", function() { // Allo scroll del container
        
        if ($(this).scrollTop() > 0) { // Se non si è in testa alla pagina
            
            $("#torna_su").removeClass("animated fadeOutDown"); // Allora mostra pulsante
            $("#torna_su").addClass("animated fadeInUp"); // "
            
        } else { // Altrimenti nascondi
            
            $("#torna_su").removeClass("animated fadeInUp");    
            $("#torna_su").addClass("animated fadeOutDown");
            
        }   
        
    });
    $("#torna_su").on("click tap", function() { // Al click del pulsante
            
        $("#container").animate({ // Torna su con animazione
        
            scrollTop: 0 
            
        }, "fast");
        
    });
	
}


// Funzione Inizializzazione 

function inizializza() {
	
	// Sliders
	
	$('#progetto_slides').superslides({
		
		animation: "fade",
		pagination: true,	
		play: 5000
		
	});
	
	// Activities - Menu Contestuale 
    
    $(".menu_activities").each(function(index) { // Per ogni voce

        if (index === 0) { // Al primo elemento calcola su base fissa
            
            $(this).css({ // Calcola coordinate
                
                top: $(".menu_activities:nth-child(1)").offset().top + $(this).height(), // In base al primo elemento
                right: "calc(0 - " + $("voce", this).width() + ")" // In base alla voce
                
            });
            
        } else { // Per gli altri in base al precedente
            
            $(this).css({ // Calcola coordinate
                
                top: $(this).prev().offset().top + $(this).height(), // In base al primo elemento
                right: "calc(0 - " + $("voce", this).width() + ")" // In base alla voce
                
            });
        
        }

	});
	
}

//-->