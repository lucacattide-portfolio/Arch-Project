<!--
  
var indiceAttivo = 0;

$(document).ready(function () {

  inizializza(); // Invocazione Funzione Inizializzazione
  transizioni(); // Invocazione Funzione Transizioni
  mappa(); // Inizializzazione Funzione Mappa
  confermeForms(); // Invocazione Funzione Notifiche forms

});


// Funzione Avatar

(function ($) {

  $("#carica_avatar").on('change', function (e) { // Alla selezione del file

    var fileCount = $(this)[0].files.length; // Assegna la lunghezza del file (Files selezionati)

    for (var i = 0; i < fileCount; i++) { // Per ogni file presente

      if (typeof (FileReader) != "undefined") { // Se il file reader è supportato (JS attivo)

        var reader = new FileReader(); // Definisci un puntatore file

        reader.onload = function (e) { // Al caricamento del documento

          $("#avatar").prop("style", "background-image:url(" + e.target.result + ")"); // Sostituisci avatar

        };

        reader.readAsDataURL($(this)[0].files[i]); // Carica il file da path

      } else { // Altrimenti errore

        alert("Funzione non supportata");

      }

    }

  });

})(jQuery);


// Funzione Inizializzazione 

function inizializza() {

  // Sliders

  $('#progetto_slides, #showroom_slides').superslides({

    animation: "slide",
    pagination: true,
    play: 5000

  });
  $(".slides-pagination a").empty(); // Elimina contenuto bullets
  $(".slides-pagination a").each(function () { // Per ogni bullet

    $(this).addClass("animated fadeInUp"); // Anima l'ingresso

  });

  // Custom Scroll

  $(".elenco_catalogo").mCustomScrollbar({

    axis: "y",
    mouseWheel: {

      enable: true,
      axis: "y"

    },
    theme: "light"

  });
  
  // Form - Campi obbligatori 
  
  $("input[type='submit']").on("click tap", function() {

    $("input[required]").each(function() {

      if (!$(this).val()) {

        $(this).addClass("obbligatorio");

      }
    
    });
    
  });
 
  // Admin - Navigazione Rapida

  if ($(window).width() <= 768) { // Da tablet in giù

    if ($("#progetto_slides").length === 0) {

      $("#menu_rapido").addClass("assente");

    } else {

      $("#menu_rapido").removeClass("assente");

    }

    if ($("#profilo").length > 0) { // Se siamo nella pagina account

      $("#navigazione_rapida").css("right", "48px");
      $("body").css("overflow", "auto"); // Allora abilita lo scrolling
      $("#container").removeClass("container_pieno");
      $("#container").removeClass("container_ridotto");
      $("#container").addClass("container_auto");
      // Raggruppa avatar e modifica in un container
      $("#avatar").wrap("<div id='container_avatar'></div>");
      $(".modifica_pulsante").appendTo("#container_avatar");

    } else if ($("#progetti").length > 0 || $("#progetto_slides").length > 0 || $("#contacts_pagina").length > 0){ // Altrimenti 
      $("#navigazione_rapida").css("right", "0");
      $("body").css("overflow", "hidden"); // Disabilita lo scrolling
      $("#container").removeClass("container_auto");
      $("#container").removeClass("container_pieno");
      $("#container").addClass("container_ridotto");
      $("#pulsante_menu").css("position", "fixed");

    } else if ($("#showroom").length > 0) { // Altrimenti 
      $("#navigazione_rapida").css("right", "0");
      $("body, #container").css("overflow", "hidden"); // Disabilita lo scrolling
      $("#container").removeClass("container_auto");
      $("#container").removeClass("container_pieno");
      $("#container").addClass("container_ridotto");
      $("#pulsante_menu").css("position", "fixed");

    } else { // Altrimenti 

      $("#navigazione_rapida").css("right", "0");
      $("body").css("overflow", "hidden"); // Disabilita lo scrolling
      $("#container").removeClass("container_auto");
      $("#container").removeClass("container_ridotto");
      $("#container").addClass("container_pieno");
      $("#pulsante_menu").css("position", "fixed");

    } 

    // Scrolling - Limitazione

    if ($("#progetto_slides").length > 0 || $("#profilo").length > 0 || $("#mappa").length > 0 || $(".autenticazione").length > 0) {

      $("#pulsante_menu").css("position", "absolute"); // Fissa in alto il pulsante menu 

    } else {

      $("#pulsante_menu").css("position", "fixed"); // Fissa in alto il pulsante menu 

    }

    // Container - Riadattamento

    if ($("#mappa").length > 0) {
      
      $("#container").css("min-height", "auto !important");
    
    }

  }

  // Admin - Categorie

  // Controllo Attivi

  if ($(".categorie_admin_elemento").length === 5) { // Se sono presenti 5 categorie riadatta il layout

    $(".categorie_admin_elemento").addClass(".cinque_categorie");

  } else if ($(".categorie_admin_elemento").length === 4) { // Altrimenti se sono presenti 4 categorie riadatta il layout

    $(".categorie_admin_elemento").addClass(".quattro_categorie");

    controlloCataloghi(); // Invocazione Funzione Controllo cataloghi

  } else if ($(".categorie_admin_elemento").length === 3) { // Altrimenti se sono presenti 3 categorie riadatta il layout

    $(".categorie_admin_elemento").addClass(".tre_categorie");

    controlloCataloghi(); // Invocazione Funzione Controllo cataloghi

  } else if ($(".categorie_admin_elemento").length === 2) { // Altrimenti se sono presenti 2 categorie riadatta il layout

    $(".categorie_admin_elemento").addClass(".due_categorie");

    controlloCataloghi(); // Invocazione Funzione Controllo cataloghi

  } else if ($(".categorie_admin_elemento").length === 1) { // Altrimenti se è presente 1 categoria riadatta il layout

    $(".categorie_admin_elemento").addClass(".una_categoria");

    controlloCataloghi(); // Invocazione Funzione Controllo cataloghi

  }

  // Scrolling - Mobile

  if ($(window).width() < 768) { // Se siamo su mobile

    if (($("#home").length > 0) || ($("#progetti").length > 0) || ($("#progetto_slides").length > 0) || ($("#activities_summary").length > 0) || ($("#contacts_pagina").length > 0) || ($("#registrazione").length > 0)) { // E se siamo in una delle sezioni dov'è previsto

      $("body").addClass("scrolla"); // Allora abilita lo scrolling

    } else { // Disabilita per tutti gli altri casi

      $("body").removeClass("scrolla");

    }

    // Torna Su

    $("#torna_su").addClass("occulta"); // Nascondi il pulsante
    $("#torna_su").removeClass("ruota"); // Ruota il pulsante
    $(window).scroll(function () { // Allo scroll della pagina
      if ($(this).scrollTop() === 0) { // Se si è in testa

        $("#torna_su").addClass("occulta"); // Allora mostra il pulsante
        $(".descrizione").removeClass("solleva");

      } else { // Altrimenti nascondi

        $("#torna_su").removeClass("occulta");
        $(".descrizione").addClass("solleva");

      }

    });

    // Centratura Mobile

    // Contatti

    if ($("#login").length > 0 || $("#recupero").length > 0 || $("#showroom").length > 0 || $("#progetto_slides").length > 0) { // Se siamo su mobile in area amministrativa

      $("#container").css({ // Lascia la cenratura verticale

        "height": "calc(100% - 12em)",
        "overflow": "hidden"

      });

    } else {

      $("#container").css({ // Altrimenti scrolla

        "height": "auto !important",
        "overflow": "auto !important"

      });

    }

  }

}


// Funzione Caricamento Catalogo

function caricaCatalogo(azienda, categoria) {

  $("#popup_cataloghi").empty(); // Svuota caricamenti contenuti precedenti

  // Chiamata AJAX

  $.ajax({

    url: "include/catalogo.php",
    type: "POST",
    data: {

      azienda: azienda,
      categoria: categoria

    },
    success: function (data) { // A chiamat avvenuta popola popup

      $("#popup_cataloghi").html(data);
      statiPopup(); // Invocazione Funzione Eventi Popup

    }

  });

}


// Funzione Controllo Cataloghi

function controlloCataloghi() {

  if ($(".catalogo_admin_elemento").length >= 3) { // Altrimenti se sono presenti 3 categorie riadatta il layout

    $(".catalogo_admin_elemento").addClass(".due_cataloghi");

  } else if ($(".catalogo_admin_elemento").length === 2) { // Altrimenti se è presente 2 categorie riadatta il layout

    $(".catalogo_admin_elemento").addClass(".tre_catalogo");

  } else if ($(".catalogo_admin_elemento").length === 1) { // Altrimenti se è presente 1 categoria riadatta il layout

    $(".catalogo_admin_elemento").addClass(".un_catalogo");

  }

}

// Funzione Transizioni

function transizioni(contatoreClick) {

  // Home - Logo (Animazione)

  if ($(window).width() > 768) { // Se siamo su Desktop allora anima

    $("#bordo_1").addClass("bordo_1");
    $("#bordo_2").addClass("bordo_2");
    $("#bordo_3").addClass("bordo_3");
    $("#bordo_4").addClass("bordo_4");
    $("#linea_1").addClass("linea_1");
    $("#linea_2").addClass("linea_2");
    $("#linea_3").addClass("linea_3");
    $("#linea_4").addClass("linea_4");

  }

  // Home - Box

  $(".box_link").hover(function () { // Al passaggio del mouse

    setTimeout(function () { // Rendi la cornice lampeggiante

      $(".box_cornice").addClass("animated pulse");

    }, 1500);

  }, function () { // Altrimenti resetta

    $(".box_cornice").removeClass("animated pulse");

  });

  // Menu Rapido

  $("#menu_rapido").addClass("menu_rapido_aperto"); // Anima ingresso	

  if ($(window).width() > 768) { // Se siamo su Desktop allora anima

    // Controllo Attivazione

    if ($("#progetto_slides").length > 0) { // Se siamo su Progetti

      $("#menu_rapido").removeClass("disattivato"); // Abilita menu rapido

    } else {

      $("#menu_rapido").addClass("disattivato"); // Altrimenti disabilita

    }

    $(".sezione_rapida").hover(function () { // Al passaggio del mouse mostra etichette

      if (!$(".rollover_rapido", this).hasClass("rollover_attivo")) { // Solo se la selezione non risulta attiva 

        $("h3", this).removeClass("animated fadeOutDown assente");
        $("h3", this).addClass("animated fadeInDown");

      }

    }, function () { // Altrimenti nascondi

      var selezionato = this;

      $("h3", this).removeClass("animated fadeInDown");
      $("h3", this).addClass("animated fadeOutDown");

      setTimeout(function () {

        $("h3", selezionato).addClass("assente");

      }, 500);

    });

  } else if ($(window).width() <= 768) { // Altrimenti se siamo su mobile 

    $(".sezione_rapida").on("click tap", function () { // Al click della categoria

      $("body").animate({ // Torna in testa se non ci si trova già

        scrollTop: 0

      });
            
      //$("body").toggleClass("scrolla"); // Disattiva-Abilita scroll

      if ($("#container_cataloghi").hasClass("spaziatura_bassa")) {

        $("#container_cataloghi").removeClass("spaziatura_bassa"); // Padding bottom su container

      } else {

        $("#container_cataloghi").addClass("spaziatura_bassa"); // Padding bottom su container

      }

    });
    $(".pulsante_rapida").on("click tap", function () { // Al click sul pulsante

      if ($(this).attr("id") === "rapida_dx") { // Se si è cliccato su avanti

        $(".sezione_rapida").eq(0).insertAfter(".sezione_rapida:nth-child(7)"); // Inseriscila dopo l'ultima
        $(".categoria:nth-child(2) .catalogo").removeClass("catalogo_aperto"); // Chiudi catalogo
        $(".categoria").eq(0).insertAfter(".categoria:nth-child(7)"); // Inseriscila dopo l'ultima
        $(".categoria:nth-child(2) .catalogo").addClass("catalogo_aperto"); // Chiudi catalogo

      } else if ($(this).attr("id") === "rapida_sx") { // Altrimenti se su indietro

        $(".sezione_rapida").eq(5).insertBefore(".sezione_rapida:nth-child(2)"); // Inserisci prima di tutte
        $(".categoria:nth-child(7) .catalogo").removeClass("catalogo_aperto"); // Chiudi catalogo
        $(".categoria").eq(5).insertBefore(".categoria:nth-child(2)"); // Inserisci prima di tutte
        $(".categoria:nth-child(2) .catalogo").addClass("catalogo_aperto"); // Apri catalogo

      }
      
      var azienda = $(".catalogo.catalogo_aperto .container_fornitori:first-child .ragione_fornitore:first-child a").attr("data-azienda"); // Dichiarazione ed Inizializzazione ID Azienda
      var categoria = $(".catalogo.catalogo_aperto .container_fornitori:first-child .ragione_fornitore:first-child a").attr("data-categoria"); // Dichiarazione ed Inizializzazione ID Categoria
      $(".catalogo.catalogo_aperto .container_fornitori:first-child .ragione_fornitore:first-child a").addClass("ragione_attiva");
      $("#popup_cataloghi").removeClass("animated slideOutDown"); // Rimuovi animazioni chiusura
      $("#popup_cataloghi").addClass("presente visibile animated slideInUp"); // Mostra Popup

      caricaCatalogo(azienda, categoria); // Invocazione Funzione Catalogo

    });

    // Menu Activities

    $(".menu_activities").hover(function () {

      $(this).addClass('slide');

    }, function () {

      $(this).removeClass('slide');

    });

  }

  $(".sezione_rapida").on("click tap", function () { // Al click sulla voce

    $(this).siblings().find(".rollover_rapido").removeClass("rollover_attivo"); // Disattiva elementi precedentemente attivi
    $(this).siblings().removeClass("sezione_attiva"); // Disattiva elementi precedentemente aperti
    $(".rollover_rapido", this).addClass("rollover_attivo"); // Attiva selezionato

    if ($(this).hasClass("sezione_attiva")) { // Se l'elemento cliccato è uguale al precedente

      $(".catalogo").removeClass("catalogo_aperto"); // Allora chiudi tutti i cataloghi
      $("#container_cataloghi").removeClass("container_aperto"); // Chiudi tutte le categorie
      $(".rollover_rapido").removeClass("rollover_attivo"); // Disattiva elementi precedentemente attivi
      $(".sezione_rapida").removeClass("sezione_attiva"); // Disattiva tutti gli elementi

    } else { // Altrimenti

      $(this).addClass("sezione_attiva");
      $("#container_cataloghi").addClass("container_aperto"); // Apri le categorie
      $(".catalogo[rel='" + $(this).attr("rel") + "']").parent().siblings().children().removeClass("catalogo_aperto"); // Nascondi cataloghi precedentemente aperti
      $(".catalogo[rel='" + $(this).attr("rel") + "']").addClass("catalogo_aperto"); // Apri catalogo selezionato
      
      // SI APRE QUI LA PRIMA POPUP
      
      var azienda = $(".catalogo[rel='" + $(this).attr("rel") + "'] .container_fornitori:first-child .ragione_fornitore:first-child a").attr("data-azienda"); // Dichiarazione ed Inizializzazione ID Azienda
      var categoria = $(".catalogo[rel='" + $(this).attr("rel") + "'] .container_fornitori:first-child .ragione_fornitore:first-child a").attr("data-categoria"); // Dichiarazione ed Inizializzazione ID Categoria
      $(".catalogo[rel='" + $(this).attr("rel") + "'] .container_fornitori:first-child .ragione_fornitore:first-child a").addClass("ragione_attiva");
      $("#popup_cataloghi").removeClass("animated slideOutDown"); // Rimuovi animazioni chiusura
      $("#popup_cataloghi").addClass("presente visibile animated slideInUp"); // Mostra Popup

      caricaCatalogo(azienda, categoria); // Invocazione Funzione Catalogo
      
    }

    // Controllo Posizione Popup

    if ($(window).width() > 768) { // Se siamo su desktop

      if ($(".sezione_rapida[rel='bathroom']").hasClass("sezione_attiva")) { // Se la terza sezione è attiva

        $("#popup_cataloghi").removeClass("posizione_sx"); // Allora rimuovi allineamenti precedenti
        $("#popup_cataloghi").addClass("posizione_dx"); // Allinea la popup

      } else if ($(".sezione_rapida[rel='living-room']").hasClass("sezione_attiva") || $(".sezione_rapida[rel='offices']").hasClass("sezione_attiva")) { // Altrimenti se la quarta o la quinta sezione sono attive

        $("#popup_cataloghi").removeClass("posizione_dx"); // Allora rimuovi allineamenti precedenti
        $("#popup_cataloghi").addClass("posizione_sx"); // Allinea la popup

      } else { // Altrimenti centra

        $("#popup_cataloghi").removeClass("posizione_sx posizione_dx");

      }

    }

  });

  // Cataloghi

  $(".ragione_fornitore a").on("click tap", function (e) { // Al click sul fornitore

    e.preventDefault(); // Disattiva funzione standard link

    var azienda = $(this).attr("data-azienda"); // Dichiarazione ed Inizializzazione ID Azienda
    var categoria = $(this).attr("data-categoria"); // Dichiarazione ed Inizializzazione ID Categoria

    $(".ragione_fornitore a").removeClass("ragione_attiva"); // Deseleziona fornitori precedentemente selezionati
    $(this).addClass("ragione_attiva"); // Attiva fornitore selezionato

    $("#popup_cataloghi").removeClass("animated slideOutDown"); // Rimuovi animazioni chiusura
    $("#popup_cataloghi").addClass("presente visibile animated slideInUp"); // Mostra Popup

    caricaCatalogo(azienda, categoria); // Invocazione Funzione Catalogo

    return false; // Blocca il refresh della pagina

  });

  // Popup 

  statiPopup(); // Invocazione Funzione Eventi Popup

  // Menu Principale - Pulsante

  $(".hamburger").on("click tap", function () { // Al primo click sul pulsante

    if (!$(this).hasClass("is-active")) { // Se il menu risulta chiuso aprilo

      if ($(window).width() < 768) { // E Se siamo su mobile

        $("body").removeClass("scrolla"); // Allora blocca lo scrolling  

      }

      $(this).addClass("is-active"); // Attiva il pulsante
      $("#pulsante_menu").addClass("pulsante_attivo"); // Trasla il pulsante a destra
      $("#menu_principale").addClass("apri_menu_larghezza"); // Apri il menu principale 

      setTimeout(function () {

        $("#menu_principale").addClass("apri_menu_altezza"); // Apri il menu principale 

      }, 500);
      setTimeout(function () {

        $("#menu_voci a:nth-child(odd)").removeClass("animated fadeOutUp"); // Anima voci di menu dispari
        $("#menu_voci a:nth-child(odd)").addClass("visibile animated fadeInUp"); // Anima voci di menu dispari

      }, 750);
      setTimeout(function () {

        $("#menu_voci a:nth-child(even)").removeClass("animated fadeOutUp"); // Anima voci di menu pari
        $("#menu_voci a:nth-child(even)").addClass("visibile animated fadeInDown"); // Anima voci di menu pari
        $("#account_mobile").removeClass("animated fadeOutDown"); // Anima voci di menu dispari
        $("#account_mobile").addClass("animated fadeInUp"); // Anima voci di menu dispari

      }, 1000);
      setTimeout(function () {

        $("#social a:nth-child(odd)").removeClass("animated rotateOut"); // Anima voci di menu dispari
        $("#social a:nth-child(odd)").addClass("visibile_parziale animated rotateIn"); // Anima voci di menu dispari

      }, 1500);
      setTimeout(function () {

        $("#social a:nth-child(even)").removeClass("animated rotateOut"); // Anima voci di menu pari
        $("#social a:nth-child(even)").addClass("visibile_parziale animated rotateIn"); // Anima voci di menu pari

      }, 2000);
      setTimeout(function () {

        $("#social a:nth-child(odd)").removeClass("animated rotateOut"); // Anima voci di menu pari
        $("#social a:nth-child(even)").removeClass("animated rotateOut"); // Anima voci di menu pari

      }, 2700);

    } else { // Altrimenti chiudilo

      if ($(window).width() < 768) { // E Se siamo su mobile

        $("body").addClass("scrolla"); // Allora sblocca lo scrolling  

      }

      $("#social a:nth-child(even)").removeClass("visibile_parziale animated rotateIn"); // Anima voci di menu pari
      $("#social a:nth-child(even)").addClass("animated rotateOut"); // Anima voci di menu pari

      setTimeout(function () {

        $("#social a:nth-child(odd)").removeClass("visibile_parziale animated rotateIn"); // Anima voci di menu dispari
        $("#social a:nth-child(odd)").addClass("animated rotateOut"); // Anima voci di menu dispari

      }, 250);
      setTimeout(function () {

        $("#account_mobile").removeClass("animated fadeInUp"); // Anima voci di menu dispari
        $("#account_mobile").addClass("animated fadeOutDown"); // Anima voci di menu dispari
        $("#menu_voci a:nth-child(even)").removeClass("visibile animated fadeInDown"); // Anima voci di menu pari
        $("#menu_voci a:nth-child(even)").addClass("animated fadeOutUp"); // Anima voci di menu pari

      }, 750);
      setTimeout(function () {

        $("#menu_voci a:nth-child(odd)").removeClass("visibile animated fadeInDown"); // Anima voci di menu dispari
        $("#menu_voci a:nth-child(odd)").addClass("animated fadeOutUp"); // Anima voci di menu dispari

      }, 1000);
      setTimeout(function () {

        $("#menu_principale").removeClass("apri_menu_altezza"); // Apri il menu principale 


      }, 1500);
      setTimeout(function () {

        $("#menu_principale").removeClass("apri_menu_larghezza"); // Apri il menu principale 
        $("#pulsante_menu").removeClass("pulsante_attivo"); // Trasla il pulsante a destra

      }, 1750);

      $(this).removeClass("is-active"); // Attiva il pulsante

    }

  });

  // Download Contestuale - Projects

  var download = $(".projects_specifiche .download_contestuale"); // Dichiarazione ed Assegnazione Variabile Array elementi

  $.each(download, function (index) { // Per ogni elemento

    setTimeout(function () { // Anima l'ingresso con ritardo

      download.eq(index).removeClass("occulta");
      download.eq(index).addClass("animated slideInLeft");

    }, index * 200);

  });

  // Menu Contestuale - Projects

  var projects = $(".menu_projects"); // Dichiarazione ed Assegnazione Variabile Array elementi

  $.each(projects, function (index) { // Per ogni elemento

    setTimeout(function () { // Anima l'ingresso con ritardo

      projects.eq(index).removeClass("occulta");
      projects.eq(index).addClass("animated slideInRight");

    }, index * 200);

  });
  $(".menu_projects").on("click tap", function ( /*e*/ ) { // Al click della voce 

    //e.preventDefault(); // Disattiva funzione standard link

    $(this).siblings().children().removeClass("lettera_attiva"); // Disattiva precedeti selezioni
    $(".lettera", this).addClass("lettera_attiva"); // Rende voce attiva

  });

  // Menu Contestuale - Activities

  var activities = $(".menu_activities"); // Dichiarazione ed Assegnazione Variabile Array elementi

  $.each(activities, function (index) { // Per ogni elemento

    setTimeout(function () { // Anima l'ingresso con ritardo

      activities.eq(index).removeClass("occulta");
      activities.eq(index).addClass("animated slideInRight");

    }, index * 200);

  });
  $(".menu_projects").on("click tap", function ( /*e*/ ) { // Al click della voce 
    $(this).siblings().children().removeClass("lettera_attiva"); // Disattiva precedeti selezioni
    $(".lettera", this).addClass("lettera_attiva"); // Rende voce attiva

  });
  $(".menu_activities").on("click tap", function (e) { // Al click della voce 

    e.preventDefault(); // Disattiva funzione standard link

    $(".menu_activities .numero").removeClass("numero_attivo"); // Disattiva precedeti selezioni
    $("#container").animate({ // Vai all'ancora con animazione

      scrollTop: $(".summary[rel='" + $(this).attr("rel") + "']").offset().top - ($("#container").offset().top - $("#container").scrollTop()) // Posizione elemento di destinazione - (posizione container elemento - scroll container elemento)

    }, "slow");
    $(".numero", this).addClass("numero_attivo"); // Rende voce attiva
    
    // Controllo Indice
    
    switch($(this).attr("rel")) {
        
      case "incontro":
        
        indiceAttivo = 1;
        break;
        
      case "rilievo":
        
        indiceAttivo = 2;
        break;
      
      case "progettazione_preliminare":
        
        indiceAttivo = 3;
        break;
        
      case "progettazione_definitiva":
        
        indiceAttivo = 4;
        break;
        
      case "progettazione_esecutiva":
        
        indiceAttivo = 5;
        break; 
        
    }
    
  });

  // Torna Su

  $("#container").on("scroll", function () { // Allo scroll del container

    if ($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) { // Altrimenti se si è arrivati alla fine dello scroll ruota 

      $("#torna_su").removeClass("ruota"); // Ruota
      
    } else { // Altrimenti

      $("#torna_su").addClass("ruota"); // Ruota

    }

  });
  $("#torna_su").on("click tap", function () { // Al click del pulsante

    if ($(window).width() > 480) { // Se non siamo su smartphone
        
      switch(indiceAttivo) {

        case 0:

          $(".menu_activities .numero").removeClass("numero_attivo");
          $(".menu_activities .numero").eq(0).addClass("numero_attivo");

          break;

        case 1:

          $(".menu_activities .numero").removeClass("numero_attivo");
          $(".menu_activities .numero").eq(1).addClass("numero_attivo");

          break;

        case 2:

          $(".menu_activities .numero").removeClass("numero_attivo");
          $(".menu_activities .numero").eq(2).addClass("numero_attivo");

          break;

        case 3:

          $(".menu_activities .numero").removeClass("numero_attivo");
          $(".menu_activities .numero").eq(3).addClass("numero_attivo");

          break;

        case 4:

          $(".menu_activities .numero").removeClass("numero_attivo");
          $(".menu_activities .numero").eq(4).addClass("numero_attivo");

          break;

      }
        
      indiceAttivo++;

      // Controllo posizione pagina

      if ($("#container").scrollTop() === 0) { // Se si è in testa alla pagina

        $("#container").animate({ // Vai all'ancora con animazione

          scrollTop: $("#activities_incontro").offset().top - ($("#container").offset().top - $("#container").scrollTop()) // Posizione elemento di destinazione - (posizione container elemento - scroll container elemento)

        }, "slow");

      } else if (($("#container").scrollTop() >= $("#activities_summary").outerHeight()) && $("#container").scrollTop() < $("#activities_esecutiva").offset().top + ($(".summary").outerHeight() * 3)) { // Altrimenti se si è superata la prima sezione ma non si è raggiunta l'ultima

        $("#container").animate({ // Torna su con animazione

          scrollTop: $("#container").scrollTop() + $(".summary").outerHeight()

        }, "slow");

      } else { // Altrimenti se si è arrivati alla fine dello scroll ruota 

        $("#container").animate({ // Torna su con animazione

          scrollTop: 0

        }, "slow");
        $(".numero").removeClass("numero_attivo"); // Disattiva voci precedentemente selezionate
        
        indiceAttivo = 0; 

      }

    } else { // Altrimenti 

      $("body, #container").animate({ // Torna in cima alla pagina

        scrollTop: 0

      }, "slow");
      
      indiceAttivo = 0; 

    }

  });

  // Admin - Files

  $("#container_utente .file").on("click tap", function () { // Al click sul file 

    $(".file_ico", this).toggleClass("file_ico_attivo"); // Seleziona 
    $(".file_nome", this).toggleClass("file_nome_attivo"); // "
    $("#notifica_toolbar").empty(); // Rimuovi precedenti notifiche
    $("#notifica_toolbar").html("Clicca nuovamente su un file per deselezionarlo.<br />Clicca su Elimina per cancellare definitivamente i files"); // Aggiorna notifica
    $("#notifica_toolbar").removeClass("animated fadeOutDown"); // Allora Mostra la notifica
    $("#notifica_toolbar").addClass("visibile animated fadeInUp"); // "

    // Controllo Notifiche

    if ($(".file_ico_attivo").length === 0) { // Se non ci sono più files selezionati

      $("#notifica_toolbar").removeClass("visibile animated fadeInUp"); // Allora nascondi la notifica	
      $("#notifica_toolbar").addClass("animated fadeOutDown"); // Allora nascondi la notifica

    }

  });

  // Elimina

  $(".elimina").on("click tap", function () { // Al click sul pulsante

    if ($(".file_nome_attivo").length > 0) { // Se esiste almeno un file selezionato

      // Mostra la popup con animazione

      $(".file_nome_attivo").parent().remove(); // Rimuovi elemento selezionato

      // Aggiorna notifica

      $("#notifica_toolbar").empty(); // Rimuovi precedenti notifiche
      $("#notifica_toolbar").html("Files eliminati"); // Aggiorna notifica
      $("#notifica_toolbar").removeClass("animated fadeOutDown"); // Visualizza messaggio errore
      $("#notifica_toolbar").addClass("visibile animated fadeInUp"); // "

    } else { // Altrimenti errore

      $("#notifica_toolbar").empty(); // Rimuovi precedenti notifiche
      $("#notifica_toolbar").html("Seleziona almeno un file"); // Aggiorna notifica
      $("#notifica_toolbar").removeClass("animated fadeOutDown"); // Visualizza messaggio errore
      $("#notifica_toolbar").addClass("visibile animated fadeInUp"); // "

    }

  });

  // Popup Modali

  $(".carica, .modifica_pulsante").on("click tap", function () { // Al click sul pulsante

    // Mostra la popup corrispondente con animazione

    $(".modale[rel='" + $(this).attr("rel") + "_popup']").removeClass("animated slideOutDown");
    $(".modale[rel='" + $(this).attr("rel") + "_popup'] .popup").removeClass("animated fadeOutDown");
    $(".modale[rel='" + $(this).attr("rel") + "_popup']").addClass("presente animated slideInDown");

  });
  $(".chiudi_modale").on("click tap", function () { // Al click sul pulsante

    // Chiudi modale con animazione

    $(".popup").addClass("animated fadeOutDown");

    setTimeout(function () {
      $(".modale").removeClass("animated slideInDown");
      $(".modale").addClass("animated slideOutDown");

    }, 500);
    setTimeout(function () {

      $(".modale").removeClass("presente");

    }, 1000);
    setTimeout(function () {

      window.location.reload();

    }, 1500);

  });

  // Cookies 

  $("#chiudi_banner").hover(function () { // Al passaggio del mouse anima

    $(this).addClass("animated swing");

  }, function () {

    $(this).removeClass("animated swing");

  });

  // Controllo Scrolling

  if ($("#cookies_summary").length > 0) { // Se siamo nella sezione cookies

    $("#container").addClass("scrolla"); // Attiva scrolling

  } else { // Altrimenti disattiva

    $("#cookies_summary").parent().removeClass("scrolla");

  }

}


// Funzione Stati Popup

function statiPopup() {

  $("#chiudi_popup").hover(function () { // Al passaggio del mouse anima

    $(this).addClass("animated swing");

  }, function () {

    $(this).removeClass("animated swing");

  });
  $("#chiudi_popup").on("click tap", function () { // Al click del pulsante

    $("#popup_cataloghi").removeClass("animated slideInUp"); // Anima l'uscita del popup
    $("#popup_cataloghi").addClass("animated slideOutDown"); // Anima l'uscita del popup
    $(".ragione_fornitore a.ragione_attiva").removeClass("ragione_attiva"); // Deseleziona fornitori precedentemente selezionati

    setTimeout(function () {

      $(".catalogo").removeClass("catalogo_aperto"); // Allora chiudi tutti i cataloghi
      $("#container_cataloghi").removeClass("container_aperto"); // Chiudi tutte le categorie
      $(".sezione_rapida").removeClass("sezione_attiva"); // Disattiva tutti gli elementi	

    }, 500);
    setTimeout(function () { // Nascondi e disattiva popup

      $("#popup_cataloghi").removeClass("posizione_sx posizione_dx visibile presente");
      $(".rollover_rapido").removeClass("rollover_attivo"); // Disattiva elementi precedentemente attivi

    }, 750);
    
    if ($("#container_cataloghi").hasClass("spaziatura_bassa")) {
console.log("ok");
      $("#container_cataloghi").removeClass("spaziatura_bassa"); // Padding bottom su container

    } 

  });

}


// Funzione Mappa

function mappa() {

  if ($("#mappa").length > 0) { // Se siamo in contatti allora inizializza API

    // Dichiarazione Variabili

    var luogo = new google.maps.LatLng(45.4485896, 9.1944947); // Posizione

    // Inizializzazione Oggetto Stile

    var stileMappa = [{
      "elementType": "geometry",
      "stylers": [{
        "color": "#f5f5f5"
      }]
    }, {
      "elementType": "labels.icon",
      "stylers": [{
        "visibility": "off"
      }]
    }, {
      "elementType": "labels.text.fill",
      "stylers": [{
        "color": "#616161"
      }]
    }, {
      "elementType": "labels.text.stroke",
      "stylers": [{
        "color": "#f5f5f5"
      }]
    }, {
      "featureType": "administrative.land_parcel",
      "elementType": "labels.text.fill",
      "stylers": [{
        "color": "#bdbdbd"
      }]
    }, {
      "featureType": "poi",
      "elementType": "geometry",
      "stylers": [{
        "color": "#eeeeee"
      }]
    }, {
      "featureType": "poi",
      "elementType": "labels.text.fill",
      "stylers": [{
        "color": "#757575"
      }]
    }, {
      "featureType": "poi.park",
      "elementType": "geometry",
      "stylers": [{
        "color": "#e5e5e5"
      }]
    }, {
      "featureType": "poi.park",
      "elementType": "labels.text.fill",
      "stylers": [{
        "color": "#9e9e9e"
      }]
    }, {
      "featureType": "road",
      "elementType": "geometry",
      "stylers": [{
        "color": "#ffffff"
      }]
    }, {
      "featureType": "road.arterial",
      "elementType": "labels.text.fill",
      "stylers": [{
        "color": "#757575"
      }]
    }, {
      "featureType": "road.highway",
      "elementType": "geometry",
      "stylers": [{
        "color": "#dadada"
      }]
    }, {
      "featureType": "road.highway",
      "elementType": "labels.text.fill",
      "stylers": [{
        "color": "#616161"
      }]
    }, {
      "featureType": "road.local",
      "elementType": "labels.text.fill",
      "stylers": [{
        "color": "#9e9e9e"
      }]
    }, {
      "featureType": "transit.line",
      "elementType": "geometry",
      "stylers": [{
        "color": "#e5e5e5"
      }]
    }, {
      "featureType": "transit.station",
      "elementType": "geometry",
      "stylers": [{
        "color": "#eeeeee"
      }]
    }, {
      "featureType": "water",
      "elementType": "geometry",
      "stylers": [{
        "color": "#c9c9c9"
      }]
    }, {
      "featureType": "water",
      "elementType": "labels.text.fill",
      "stylers": [{
        "color": "#9e9e9e"
      }]
    }];

    // Dichiarazione ed Istanziazione oggetto mappa con assegnazione stile e nome

    var stilizzata = new google.maps.StyledMapType(stileMappa, {

      name: "Arch & Project"

    });
    var opzioniMappa = {

      zoom: 18, // Livello Zoom
      center: luogo, // Centro
      disableDefaultUI: true, // Disabilita UI
      mapTypeControlOptions: {

        mapTypeIds: [google.maps.MapTypeId.ROADMAP, stileMappa] // Tipo di Visualizzazione

      }

    };
    var mappa = new google.maps.Map(document.getElementById('mappa'), opzioniMappa);

    //Assegnazione ID mappa ad elemento ed output

    mappa.mapTypes.set('stile_mappa', stilizzata);
    mappa.setMapTypeId('stile_mappa');

    // Contenuto Finestra informativa

    var contentString = '<div id="content">' +
      '<div id="siteNotice">' +
      '</div>' +
      '<img id="logo_mappa" src="img/logo.svg" alt="Arch & Project">' +
      '</img>';

    // Finestra informativa

    var infowindow = new google.maps.InfoWindow({

      content: contentString, // Imposta contenuto
      maxWidth: 210

    });

    // Marker

    var marker = new google.maps.Marker({

      position: luogo,
      map: mappa,
      title: 'Arch & Project'

    });

    marker.addListener('click', function () { // Al click del marker

      infowindow.open(mappa, marker); // Apri finestra informativa

    });

  }

}


// Funzione Gestione notifiche forms

function confermeForms() {
  
  if ($("#conferma_form").length > 0) {
  
    $("#form_registrazione > div").addClass("riallinea");

    setTimeout(function() {

      $("#conferma_form").remove();

    }, 3000);
    
  } 
  
  // Gestione Pulsante salva
  
  $("#salva").on("click tap", function(e) {
    
    e.preventDefault();
    
    $.ajax({
      
      url: "include/conferma_salva.php",
      data: $("#form_modifica").serialize(),
      type: "POST"
      
    }).done(function(data) {

      $(data).insertAfter("#form_modifica legend");
      
      setTimeout(function() {

        $("#conferma_salva").fadeOut();

      }, 3000);
      
    });
        
    return false;
    
  });
  
}

//-->
