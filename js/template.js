<!--

$(document).ready(function() {
	
	transizioni(); // Invocazione Funzione Transizioni
	
});


// Funzione Transizioni

function transizioni() {
	
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
	
}

//-->