(function ($) {
    "use strict"

    var window_width = $(window).width(),
        window_height = window.innerHeight,
        header_height = $(".default-header").height(),
        header_height_static = $(".site-header.static").outerHeight(),
        fitscreen = window_height - header_height;


    $(".fullscreen").css("height", window_height)
    $(".fitscreen").css("height", fitscreen);
    var nav_offset_top = $('header').height() + 50;
    /*-------------------------------------------------------------------------------
      Navbar 
    -------------------------------------------------------------------------------*/

    //* Navbar Fixed  
    function navbarFixed() {
        if ($('.header_area').length) {
            $(window).scroll(function () {
                var scroll = $(window).scrollTop();
                if (scroll >= nav_offset_top) {
                    $(".header_area").addClass("navbar_fixed");
                } else {
                    $(".header_area").removeClass("navbar_fixed");
                }
            });
        };
    };
    navbarFixed();


    // Search Toggle
    $("#search_input_box").hide();
    $("#search").on("click", function () {
        $("#search_input_box").slideToggle('slow');
        $("#search_input").focus();
    });
    $("#close_search").on("click", function () {
        $('#search_input_box').slideUp('slow');
    });


    /*==========================
    javaScript for off-canvas-menu
    ============================*/

    $(".menu-trigger").on("click", function () {
        $(".menu-trigger").hide('slow');
        $(".fixed-menu").addClass("active");
    });

    $(".menu-close").on("click", function () {
        $(".menu-trigger").show('slow');
        $(".fixed-menu").removeClass("active");
    });


    /*----------------------------------------------------*/
    /*  MailChimp Slider
    /*----------------------------------------------------*/
    function mailChimp() {
        $('#mc_embed_signup').find('form').ajaxChimp();
    }
    mailChimp();

    $('select').niceSelect();


    /*----------------------------------------------------*/
    /* counter js
    /*----------------------------------------------------*/
    if (document.getElementById("features_counter")) {
        $('.counter').counterUp({
            delay: 10,
            time: 1000
        });
    }

    /*----------------------------------------------------*/
    /*  Magnific Pop up js (Home Video)
    /*----------------------------------------------------*/
    $('.play-video').magnificPopup({
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });
    /*  Magnific Pop up js (ajouter medicament)
    /*----------------------------------------------------*/
    // $('a.ajouter-medicament').magnificPopup({
    //     mainClass: 'mfp-with-fade',
    //     removalDelay: 500, //delay removal by X to allow out-animation
    //     callbacks: {
    //         beforeClose: function () {
    //             this.content.addClass('zoomOut');
    //         },
    //         close: function () {
    //             this.content.removeClass('zoomOut');
    //         }
    //     },
    //     midClick: true
    // });


    // for img popup //
    $(".chef-items").magnificPopup({
        delegate: '.img-popup',
        type: 'image',
        gallery: {
            enabled: true
        }
    });

    // set CHEQUED to the value of input if chequed //



    // set attribute chequed to the every day input //

    $('.chequed-default input[type=checkbox]').prop('checked', false);
    $('#anId1').prop('checked', true).attr("disabled", true);
    $('#permanant').prop('checked', true).attr("disabled", true);
    // changedAbdo
    $('input').on('change', function () {
        if ($('#anId1').is(':checked')) {
            $('#anId1_seleted').prop('checked', true);
            $('#typeJour').attr("value", "all");
        }

        if ($('#quotidien_modif').is(':checked')) {
            $('#quotidien_seleted_modif').prop('checked', true);
        }
        if ($('#specifier_modif').is(':checked')) {
            $('#specifier_seleted_modif').prop('checked', true);
        }
        if ($('#interval_modif').is(':checked')) {
            $('#interval_seleted_modif').prop('checked', true);
        }

    });
    // verifier si une input checkbox est chequer et déchequer les autres  //

    $('input.frequenceInput').on('change', function () {
        $('input.frequenceInput').not(this).prop('checked', false);
    });

    $('.one-choice.planifier input[type=checkbox]').on('change', function () {
        $('.one-choice.planifier input[type=checkbox]').not(this).prop('checked', false);
        $('#anId1').attr("disabled", true);

    });
    // fDay Script changedAbdo
    $(".frequenceJourn").on("click", function () {
        $("#fDay").val($(this).val());
    });

    $('.one-choice.planifier input[type=checkbox]').on('change', function () {
        $('.one-choice.planifier input[type=checkbox]').not(this).prop('checked', false);
        $('#anId1').attr("disabled", true);
        // if($('#anId1').prop("disabled",true);)
        // $('#typeJour').attr("value","all");
        // $('#anId1_selected').attr('value', '');
        // $('#anId2_selected').attr('value', '');
        // $('#anId3_selected').attr('value', '');

    });
    $('.one-choice.duree input[type=checkbox]').on('change', function () {
        $('.one-choice.duree input[type=checkbox]').not(this).prop('checked', false);
        $('#permanant').attr("disabled", true);
        $('#limiter_seleted').attr('value', '');
    });
    // verifier si une input checkbox est chequer et déchequer les autres modification des jours de prises  //

    $('.JoursModification input[type=checkbox]').on('change', function () {
        $('.JoursModification input[type=checkbox]').not(this).prop('checked', false);
        $('.JoursModification input[type=checkbox]').prop('disabled', false);
        $(this).prop('disabled', true);

    });
    $('.JoursModificat form > input[type=checkbox]').on('change', function () {
        $('.JoursModificat form > input[type=checkbox]').not(this).prop('checked', false);
        $('.JoursModificat form > input[type=checkbox]').prop('disabled', false);
        $(this).prop('disabled', true);
        if ($('#quotidien_modif').is(':checked')) {
            $('#quotidien_seleted_modif').prop('checked', true);
        }
        if ($('#specifier_modif').is(':checked')) {
            $('#specifier_seleted_modif').prop('checked', true);
        }
        if ($('#interval_modif').is(':checked')) {
            $('#interval_seleted_modif').prop('checked', true);
        }
    });
    // /////////////
    /*----------------------------------------------------*/
    /*  radio frequence time nombre input
       /*----------------------------------------------------*/
    $(".option input[type=checkbox]").change(function () {
        $(".time-group:lt(4)").hide(200);
        $('.time-group:lt(4) input.form-input').attr('required', false);
        var chechchech = this.value;
        switch (parseInt(chechchech)) {
            case 2:
                $('.time-group:lt(2) input.form-input').attr('required', true);
                $(".time-group:lt(2)").show(200);
                break;
            case 3:
                $('.time-group:lt(3) input.form-input').attr('required', true);
                $(".time-group:lt(3)").show(200);
                break;
            case 4:
                $('.time-group input.form-input').attr('required', true);
                $(".time-group").show(200);
                break;
            default:
                $('.time-group:lt(1) input.form-input').attr('required', true);
                $(".time-group:lt(1)").show(200);
        }


    });


    /*----------------------------------------------------*/
    /*  fonction de preparation des popup de forme
        /*----------------------------------------------------*/

    $(document).on('click', '.btn-plus-interval', function () {
        $('#count').val(parseInt($('#count').val()) + 1);
        $('.btn-minus-interval').css("cursor", "pointer").css("opacity", "1")
    });
    $(document).on('click', '.btn-minus-interval', function () {
        if (parseInt($('#count').val()) == 2) {
            $('.btn-minus-interval').css("cursor", "default").css("opacity", ".3")
        } else {
            $('#count').val(parseInt($('#count').val()) - 1);
            if (parseInt($('#count').val()) == 2) {
                $('.btn-minus-interval').css("cursor", "default").css("opacity", ".3")
            }
        }
    });
    /***************************** Dose *********************** */
    $(document).on('click', '.plus', function () {
        $('#count').val(parseFloat($('#count').val()) + 0.25);
        $('.moins').css("cursor", "pointer").css("opacity", "1")

    });
    $(document).on('click', '.moins', function () {
        if (parseFloat($('#count').val()) == 0.25) {
            $('.moins').css("cursor", "default").css("opacity", ".3")
        } else {
            $('#count').val(parseFloat($('#count').val()) - 0.25);
            if (parseFloat($('#count').val()) == 0.25) {
                $('.moins').css("cursor", "default").css("opacity", ".3")
            }
        }
    });
    /***************************** FinDose *********************** */
    $(document).on('click', '.btn-plus-duree', function () {
        $('#dureeTraitement').val(parseInt($('#dureeTraitement').val()) + 1);
        $('.btn-minus-duree').css("cursor", "pointer").css("opacity", "1")
    });
    $(document).on('click', '.btn-minus-duree', function () {
        if (parseInt($('#dureeTraitement').val()) == 2) {
            $('.btn-minus-duree').css("cursor", "default").css("opacity", ".3")
        } else {
            $('#dureeTraitement').val(parseInt($('#dureeTraitement').val()) - 1);
            if (parseInt($('#dureeTraitement').val()) == 2) {
                $('.btn-minus-duree').css("cursor", "default").css("opacity", ".3")
            }
        }
    });
    /***************************** modification interval *********************** */
    $(document).on('click', '.btn-plus-interval_modif', function () {
        $('.count_modif').val(parseInt($('.count_modif').val()) + 1);
        $('.btn-minus-interval_modif').css("cursor", "pointer").css("opacity", "1")
    });
    $(document).on('click', '.btn-minus-interval_modif', function () {
        if (parseInt($('.count_modif').val()) == 2) {
            $('.btn-minus-interval_modif').css("cursor", "default").css("opacity", ".3")
        } else {
            $('.count_modif').val(parseInt($('.count_modif').val()) - 1);
            if (parseInt($('.count_modif').val()) == 2) {
                $('.btn-minus-interval_modif').css("cursor", "default").css("opacity", ".3")
            }
        }
    });
    /*----------------------------------------------------*/
    /*  debut a ajouter chez abdo
        /*----------------------------------------------------*/

    $('input').on('change', function () {
        if ($('.rappelTime').is(':checked')) {
            $('.lesRappel').html($(this).attr('value'));
            $('.inputeureRappel').attr("value", $(this).attr('value'));
        }
        // modifier verssion final : ajouter la condition else
        else {
            $('.lesRappel').html("aucun autre rappel");
            $('.inputeureRappel').attr("value", "");
        }

    });
    $('.one-choice.rappelControll input[type=checkbox]').on('change', function () {
        $('.one-choice.rappelControll input[type=checkbox]').not(this).prop('checked', false);
    });
    $('.VMbtn').click(function (e) {
        $('.VR').css('display', 'block');
        $('.VM').css('display', 'none');
    });
    $('input[type=checkbox].ajouterMedecin').on('change', function () {
        $('.VR').css('display', 'none');
        $('.VM').css('display', 'block');
    });

    /*----------------------------------------------------*/
    /*  debut a ajouter chez abdo
        /*----------------------------------------------------*/





    $(document).ready(function () {
        $('a.appelRapelReminder').magnificPopup({ //  a ajouter chez abdo
            type: 'inline',
            removalDelay: 300,
            focus: '#name',
            modal: true,
            // When elemened is focused, some mobile browsers in some cases zoom in
            // It looks not nice, so we disable it:
            callbacks: {
                beforeClose: function () {
                    this.content.addClass('zoomOut');
                },
                close: function () {
                    this.content.removeClass('zoomOut');
                }
            },
            midClick: true
        });

        $(document).on('click', '.popup-rapelCont-enreg', function (e) { //  a ajouter chez abdo
            e.preventDefault();

            $.magnificPopup.close();
        });
        $(document).on('click', '.popup-rapelCont-annuler', function (e) { //  a ajouter chez abdo
            e.preventDefault();
            $('.lesRappel').html("aucun autre rappel");
            $('.rappelControll input[type=checkbox]').prop('checked', false);

            $.magnificPopup.close();
        }); // fin a ajouter chez abdo

        /*----------------------------------------------------*/
        /*  popup selection jours specifier
            /*----------------------------------------------------*/

        $('a.appelSpecifier').magnificPopup({
            type: 'inline',
            removalDelay: 300,
            focus: '#name',
            modal: true,
            // When elemened is focused, some mobile browsers in some cases zoom in
            // It looks not nice, so we disable it:
            callbacks: {
                beforeClose: function () {
                    this.content.addClass('zoomOut');
                },
                close: function () {
                    this.content.removeClass('zoomOut');
                }
            },
            midClick: true
        });
        $(document).on('click', '.popup-jours-enreg', function (e) {
            e.preventDefault();
            $('.one-choice.planifier input[type=checkbox]').prop('checked', false); // détchequer les autre input
            $('#anId2').prop('checked', true); // chequer l'input jours spécifier
            $('#anId2_seleted').prop('checked', true);
            $('#typeJour').attr('value', 'specifique');
            $('#anId1').removeAttr("disabled");
            // checked inputs
            $('.days').each(function () {
                if ($(this).is(':checked')) {
                    $(this).val('yes');
                } else {
                    $(this).val('no');
                }

            })
            $.magnificPopup.close();
        });
        $(document).on('click', '.popup-jours-annuler', function (e) {
            e.preventDefault();

            $.magnificPopup.close();
        });

        /*----------------------------------------------------*/
        /*  popup selection interval entre jours
            /*----------------------------------------------------*/

        $('a.appelInterval').magnificPopup({
            type: 'inline',
            removalDelay: 300,
            focus: '#name',
            modal: true,
            // When elemened is focused, some mobile browsers in some cases zoom in
            // It looks not nice, so we disable it:
            callbacks: {
                beforeClose: function () {
                    this.content.addClass('zoomOut');
                },
                close: function () {
                    this.content.removeClass('zoomOut');
                }
            },
            midClick: true
        });
        $(document).on('click', '.popup-debut-enreg', function (e) {
            e.preventDefault();
            $('.one-choice.planifier input[type=checkbox]').prop('checked', false); // détchequer les autre input
            $('#anId3').prop('checked', true); // chequer l'input jours spécifier
            $('#anId3_seleted').prop('checked', true);
            $('#typeJour').attr('value', 'interval');
            $('#anId1').removeAttr("disabled");

            $.magnificPopup.close();
        });
        $(document).on('click', '.popup-debut-annuler', function (e) {
            e.preventDefault();

            $.magnificPopup.close();
        });
        /*----------------------------------------------------*/
        /*  popup selection intarva jours date de fin de traitement
            /*----------------------------------------------------*/

        $('a.appelLimiter').magnificPopup({
            type: 'inline',
            removalDelay: 300,
            focus: '#name',
            modal: true,
            // When elemened is focused, some mobile browsers in some cases zoom in
            // It looks not nice, so we disable it:
            callbacks: {
                beforeClose: function () {
                    this.content.addClass('zoomOut');
                },
                close: function () {
                    this.content.removeClass('zoomOut');
                }
            },
            midClick: true
        });
        $(document).on('click', '.popup-duree-enregi', function (e) {
            e.preventDefault();
            $('.one-choice.duree input[type=checkbox]').prop('checked', false); // détchequer les autre input                
            $('#permanant').removeAttr("disabled");
            // $('#permanant').prop('checked', false);
            $('#limiter').prop('checked', true); // chequer l'input jours spécifier
            $('#limiter_seleted').attr('value', 'limiter');
            $('#limiter_seleted').prop('checked', true);
            $.magnificPopup.close();
        });
        $(document).on('click', '.popup-duree-anuler', function (e) {
            e.preventDefault();
            $.magnificPopup.close();
        });


        /*----------------------------------------------------*/
        /*  popup selection dose specifier a chaque prises
            /*----------------------------------------------------*/



        $('.appelDose').magnificPopup({
            type: 'inline',
            removalDelay: 300,
            focus: '#name',
            modal: true,
            // When elemened is focused, some mobile browsers in some cases zoom in
            // It looks not nice, so we disable it:
            callbacks: {
                beforeClose: function () {
                    this.content.addClass('zoomOut');
                },
                close: function () {
                    this.content.removeClass('zoomOut');
                }
            },
            midClick: true
        });
        $(document).on('click', '.popup-dose-enreg', function (e) {
            e.preventDefault();
            $.magnificPopup.close();
        });
        $(document).on('click', '.popup-dose-annuler', function (e) {
            e.preventDefault();
            $.magnificPopup.close();
        });

        /*----------------------------------------------------*/
        /*  popup selection medecin 
            /*----------------------------------------------------*/



        $('.appelMedecin').magnificPopup({
            type: 'inline',
            removalDelay: 300,
            focus: '#name',
            modal: true,
            // When elemened is focused, some mobile browsers in some cases zoom in
            // It looks not nice, so we disable it:
            callbacks: {
                beforeClose: function () {
                    this.content.addClass('zoomOut');
                },
                close: function () {
                    this.content.removeClass('zoomOut');
                }
            },
            midClick: true
        });
        $(document).on('click', '.popup-dose-enreg', function (e) {
            e.preventDefault();
            $.magnificPopup.close();
        });
        $(document).on('click', '.popup-dose-annuler', function (e) {
            e.preventDefault();
            $.magnificPopup.close();
        });
        // modifier verssion final : ajouter la l'appel de popup

        $('.appelMedic').magnificPopup({
            type: 'inline',
            removalDelay: 300,
            focus: '#name',
            modal: true,
            // When elemened is focused, some mobile browsers in some cases zoom in
            // It looks not nice, so we disable it:
            callbacks: {
                beforeClose: function () {
                    this.content.addClass('zoomOut');
                },
                close: function () {
                    this.content.removeClass('zoomOut');
                }
            },
            midClick: true
        });
    });
    $(".colorSelected").css("color", "#00F260");
    $(document).on('click', '.frquence', function () {
        $(".dureeDetail").css("display", "none");
        $(".joursDetail").css("display", "none");
        $(".frequenceDetail").css("display", "block");
        $(".frequenceDetail").addClass("animated fadeInUp");
        $(".border1").css("color", "#00F260");
        $(".border2").css("color", "#fff");
        $(".border3").css("color", "#fff");
        $(".frequenceModification").css("display", "none");
        $(".afichageFreq").css("display", "block");
        $(".afichageFreq").addClass("animated fadeIn");
        $(".modifierFreq").css("display", "block");

    });
    $(document).on('click', '.duree', function () {
        $(".frequenceDetail").css("display", "none");
        $(".joursDetail").css("display", "none");
        $(".dureeDetail").css("display", "block");
        $(".dureeDetail").addClass("animated fadeIn");
        $(".border1").css("color", "#fff");
        $(".border2").css("color", "#00F260");
        $(".border3").css("color", "#fff");
        $(".dureeModification").css("display", "none");
        $(".afichageDuree").css("display", "block");
        $(".afichageDuree").addClass("animated fadeIn");

    });
    $(document).on('click', '.joursSelect', function () {
        $(".dureeDetail").css("display", "none");
        $(".frequenceDetail").css("display", "none");
        $(".joursDetail").css("display", "block");
        $(".joursDetail").addClass("animated fadeIn");
        $(".border1").css("color", "#fff");
        $(".border2").css("color", "#fff");
        $(".border3").css("color", "#00F260");
    });
    $(".modifierFreq").click(function () {
        $(".modifierFreq").css("display", "none");
        $(".frequenceModification").css("display", "block");
        $(".frequenceModification").addClass("animated fadeIn");
        $(".afichageFreq").css("display", "none");
    })
    $(".modifierDuree").click(function () {
        $(".modifierDuree").css("display", "none");
        $(".dureeModification").css("display", "block");
        $(".dureeModification").addClass("animated fadeIn");
        $(".afichageDuree").css("display", "none");
    })
    $(".modifierJour").click(function () {
        $(".modifierJour").css("display", "none");
        $(".JoursModificat").css("display", "block");
        $(".JoursModificat").addClass("animated fadeIn");
        $(".afichageJours").css("display", "none");
    })
    $(".intervalShow").click(function () {
        $('.changeJours').css("display", "none");
        $('.intervalChange').css("display", "block");
        $(".intervalChange").addClass("animated fadeIn");
        $('#interval_seleted_modif').prop('checked', true);

    })
    $(".specifierShow").click(function () {
        $('.changeJours').css("display", "block");
        $('.intervalChange').css("display", "none");
        $('#specifier_seleted_modif').prop('checked', true);
        $('#specifier_seleted_modif').prop('checked', true);

    })
    $(".quotidienShow").click(function () {
        $('.changeJours').css("display", "none");
        $('.intervalChange').css("display", "none");
    })



    /*=================================
    Javascript for banner area carousel
    ==================================*/
    $(".active-food-gallery").owlCarousel({
        items: 4,
        autoplay: false,
        autoplayTimeout: 5000,
        loop: true,
        nav: true,
        navText: ["<img src='img/chef/prev.png'>", "<img src='img/chef/next.png'>"],
        dots: false,
        responsive: {
            0: {
                items: 1,
            },
            420: {
                items: 1,
            },
            480: {
                items: 2,
            },
            768: {
                items: 3,
            },
            992: {
                items: 4,
            }
        }
    });


    /*-------------------------------------------------------------------------------
    Brand Slider 
	-------------------------------------------------------------------------------*/
    $(".brand-carousel").owlCarousel({
        items: 1,
        autoplay: false,
        loop: true,
        nav: false,
        margin: 30,
        dots: false,
        responsive: {
            0: {
                items: 1,
            },
            420: {
                items: 1,
            },
            480: {
                items: 3,
            },
            768: {
                items: 3,
            },
            992: {
                items: 5,
            }
        }
    });

    /*----------------------------------------------------*/
    /*  Google map js
    /*----------------------------------------------------*/

    if ($('#mapBox').length) {
        var $lat = $('#mapBox').data('lat');
        var $lon = $('#mapBox').data('lon');
        var $zoom = $('#mapBox').data('zoom');
        var $marker = $('#mapBox').data('marker');
        var $info = $('#mapBox').data('info');
        var $markerLat = $('#mapBox').data('mlat');
        var $markerLon = $('#mapBox').data('mlon');
        var map = new GMaps({
            el: '#mapBox',
            lat: $lat,
            lng: $lon,
            scrollwheel: false,
            scaleControl: true,
            streetViewControl: false,
            panControl: true,
            disableDoubleClickZoom: true,
            mapTypeControl: false,
            zoom: $zoom,
            styles: [{
                    "featureType": "water",
                    "elementType": "geometry.fill",
                    "stylers": [{
                        "color": "#dcdfe6"
                    }]
                },
                {
                    "featureType": "transit",
                    "stylers": [{
                            "color": "#808080"
                        },
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.stroke",
                    "stylers": [{
                            "visibility": "on"
                        },
                        {
                            "color": "#dcdfe6"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.fill",
                    "stylers": [{
                        "color": "#ffffff"
                    }]
                },
                {
                    "featureType": "road.local",
                    "elementType": "geometry.fill",
                    "stylers": [{
                            "visibility": "on"
                        },
                        {
                            "color": "#ffffff"
                        },
                        {
                            "weight": 1.8
                        }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "geometry.stroke",
                    "stylers": [{
                        "color": "#d7d7d7"
                    }]
                },
                {
                    "featureType": "poi",
                    "elementType": "geometry.fill",
                    "stylers": [{
                            "visibility": "on"
                        },
                        {
                            "color": "#ebebeb"
                        }
                    ]
                },
                {
                    "featureType": "administrative",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#a7a7a7"
                    }]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "geometry.fill",
                    "stylers": [{
                        "color": "#ffffff"
                    }]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "geometry.fill",
                    "stylers": [{
                        "color": "#ffffff"
                    }]
                },
                {
                    "featureType": "landscape",
                    "elementType": "geometry.fill",
                    "stylers": [{
                            "visibility": "on"
                        },
                        {
                            "color": "#efefef"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#696969"
                    }]
                },
                {
                    "featureType": "administrative",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                            "visibility": "on"
                        },
                        {
                            "color": "#737373"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "labels.icon",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "poi",
                    "elementType": "labels",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "geometry.stroke",
                    "stylers": [{
                        "color": "#d6d6d6"
                    }]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.icon",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {},
                {
                    "featureType": "poi",
                    "elementType": "geometry.fill",
                    "stylers": [{
                        "color": "#dadada"
                    }]
                }
            ]
        });
    }

    /*----------------------------------------------------*/
    /*  Google map js
    /*----------------------------------------------------*/

    if ($('#mapBox2').length) {
        var $lat = $('#mapBox2').data('lat');
        var $lon = $('#mapBox2').data('lon');
        var $zoom = $('#mapBox2').data('zoom');
        var $marker = $('#mapBox2').data('marker');
        var $info = $('#mapBox2').data('info');
        var $markerLat = $('#mapBox2').data('mlat');
        var $markerLon = $('#mapBox2').data('mlon');
        var map = new GMaps({
            el: '#mapBox2',
            lat: $lat,
            lng: $lon,
            scrollwheel: false,
            scaleControl: true,
            streetViewControl: false,
            panControl: true,
            disableDoubleClickZoom: true,
            mapTypeControl: false,
            zoom: $zoom,
            styles: [{
                "featureType": "administrative.country",
                "elementType": "geometry",
                "stylers": [{
                        "visibility": "simplified"
                    },
                    {
                        "hue": "#ff0000"
                    }
                ]
            }]
        });
    }

})(jQuery)