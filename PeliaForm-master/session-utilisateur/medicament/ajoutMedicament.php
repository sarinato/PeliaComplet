<?php
include("../config/verificationLogin.php");
include("../php/functions.php");

?>
    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="img/pelia.png" type="image/png">
        <title>Ajouter médicament</title>
        <?php
	include "../includes/link.php";
	?>
            <link rel="stylesheet" href="css/json.css">
            <!-- bootsrap css -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>

    <body>

        <!--================ Start Header Menu Area =================-->
        <?php
	include "../includes/header.php";
    ?>
     <?php
	include "../includes/head.php";
	?>
            <!--================ End Header Menu Area =================-->

            <div class="site-main">
               
                <!--==============================
		=            medicament            =
		===============================-->

                <section class="section medicament">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="medicament-tab">
                                    <ul class="nav nav-pills text-center">
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill">
									Ajouter des médicaments
									<span>auquel vous etes alérter</span>
								</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="medicament-contents bg-medicament">
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="">
                                            <!-- Card global popup -->

                                            <!-- Form -->
                                            <form class="" action="requetteAjoutMedic.php" method="POST">
                                                <div class="d-flex justify-content-around flex-wrap simple-information">
                                                    <div class="col-md-8">
                                                        <div class="card">
                                                            <div style="" class="card-body">
                                                                <h5 class="card-title ">Description du medicament</h5>

                                                                <div class="form-group col-md-3">
                                                                    <form class="search-form">
                                                                        <input placeholder="Nom du médicament" class="typeText search Margin" type="text" name="nomMedic" id="nomMedic">

                                                                        <ul class="suggestions name">
                                                                            <!-- <li class="wahd">iouj</li>
																<li></li> -->
                                                                        </ul>
                                                                    </form>

                                                                </div>
                                                                <br>
                                                                <small class="alert alert-danger search  nomMedic-error animated fadeIn" style="display:none;width:100%">le nom de medicament est requis</small>

                                                                <div class="form-group col-md-3 selectt ">
                                                                    <div class="form-select Margin">
                                                                        <select name="typeMedic" id='typeMedic'>
                                                                            <option value="select">Type</option>
                                                                            <option value="comprimé">Comprimé</option>
                                                                            <option value="gelule">Gélule</option>
                                                                            <option value="ampoule">Ampoule</option>
                                                                            <option value="application">Application</option>
                                                                            <option value="goutte">Goutte</option>
                                                                            <option value="gramme">Gramme</option>
                                                                            <option value="inhalation">Inhalation</option>
                                                                            <option value="injection">Injection</option>
                                                                            <option value="milligramme">Milligramme</option>
                                                                            <option value="millilitre">Millilitre</option>
                                                                            <option value="piece">Pièce</option>
                                                                            <option value="suppositoire">Suppositoire</option>
                                                                            <option value="unite">Unité</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <small class="alert alert-danger  typeMedic-error animated fadeIn" style="display:none;">le Type de medicament est requis</small>
                                                               
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card frequence">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Fréquence de rappel</h5>
                                                                <div id="app-cover">
                                                                    <div id="select-box">
                                                                        <input type="checkbox" class="frequenceInput" id="options-view-button" value="0">
                                                                        <div id="select-button" class="brd">
                                                                            <div id="selected-value">
                                                                                <span>Fréquence journalier</span>
                                                                            </div>
                                                                            <div id="chevrons">
                                                                                <i class="fa fa-chevron-up"></i>
                                                                                <i class="fa fa-chevron-down"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div id="options">
                                                                            <div class="option">
                                                                                <input class="s-c frequenceJourn top" type="checkbox" name="frequenceJourn" value="1">
                                                                                <input class="s-c frequenceJourn bottom frequenceInput" type="checkbox" name="frequenceJourn" value="1">
                                                                                <span class="label">Une fois par jours</span>
                                                                                <span class="opt-val">Une fois par jours</span>
                                                                            </div>
                                                                            <div class="option">
                                                                                <input class="s-c frequenceJourn top" type="checkbox" name="frequenceJourn" value="2">
                                                                                <input class="s-c frequenceJourn bottom frequenceInput" type="checkbox" name="frequenceJourn" value="2">
                                                                                <span class="label">Deux fois par jours</span>
                                                                                <span class="opt-val">Deux fois par jours</span>
                                                                            </div>
                                                                            <div class="option">
                                                                                <input class="s-c frequenceJourn top" type="checkbox" name="frequenceJourn" value="3">
                                                                                <input class="s-c frequenceJourn bottom frequenceInput" type="checkbox" name="frequenceJourn" value="3">
                                                                                <span class="label">Trois fois par jours</span>
                                                                                <span class="opt-val">Trois fois par jours</span>
                                                                            </div>
                                                                            <div class="option">
                                                                                <input class="s-c frequenceJourn top" type="checkbox" name="frequenceJourn" value="4">
                                                                                <input class="s-c frequenceJourn bottom frequenceInput" type="checkbox" id="allday" name="frequenceJourn" value="4">
                                                                                <span class="label">Quatre fois par jours</span>
                                                                                <span class="opt-val">Quatre fois par jours</span>
                                                                            </div>
                                                                            <input type="number" id="fDay" name="fDay" value="1" style="display:none">
                                                                            <div id="option-bg"></div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="time-groups">

                                                                    <div class="form-group has-icon col-sm time-group animated zoomIn doseFlex" style="display:none;margin-top:3%;">
                                                                        <div class="form-group unique">
                                                                            <input type="text" name="frequenceJ1" id="frequenceJ1" data-toggle="timepicker" class="form-input time" autocomplete="off" placeholder="08:15">
                                                                        </div>
                                                                        <!-- <label for="">La dose</label> -->
                                                                        <div class="form-group">
                                                                            <a class="appelDose dose" href="#dose1">Dose </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group has-icon col-sm time-group animated zoomIn doseFlex" style="display:none">
                                                                        <div class="form-group unique">

                                                                            <input type="text" name="frequenceJ2" id="frequenceJ2" data-toggle="timepicker" class="form-input time" autocomplete="off" placeholder="12:00">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <a class="appelDose dose" href="#dose2">Dose </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group has-icon col-sm time-group animated zoomIn doseFlex" style="display:none">
                                                                        <div class="form-group unique">
                                                                            <input type="text" name="frequenceJ3" id="frequenceJ3" data-toggle="timepicker" class="form-input time" autocomplete="off" placeholder="17:00">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <a class="appelDose dose" href="#dose3">Dose </a>
                                                                        </div>

                                                                    </div>

                                                                    <div class="form-group has-icon col-sm time-group animated zoomIn doseFlex" style="display:none">
                                                                        <div class="form-group unique">
                                                                            <!-- <label><i class="fa fa-clock-o form-icon"></i></label> -->
                                                                            <input type="text" name="frequenceJ4" id="frequenceJ4" data-toggle="timepicker" class="form-input time" autocomplete="off" placeholder="22:00">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <a class="appelDose dose" href="#dose4">Dose </a>

                                                                        </div>
                                                                    </div>
                                                                    <small class="alert alert-danger fDay-error animated fadeIn" style="display:none;width:100%">entrez les dates exactes</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card checkbox-card">
                                                            <div class="card-body">

                                                                <div>

                                                                    <div class="checkbox chequed-default one-choice duree">
                                                                        <h5 class="card-title">Durée</h5>
                                                                        <input type="checkbox" name="permanant" id="permanant" value="permanant" checked="checked" />
                                                                        <label for="permanant"><span class="chk-span"></span>Traitement allongé</label>
                                                                        <br>
                                                                        <input type="checkbox" name="limiter" id="limiter" value="limiter" />
                                                                        <label for="limiter"> <a class="appelLimiter" href="#caledar-fin"><span class="chk-span limiter" > </span>Traitement court</a></label>
                                                                        <input type="checkbox" name="limiter_seleted" id="limiter_seleted" value="" />

                                                                    </div>
                                                                    <div style="width:100%;" class="mfp-hide white-popup-block d-flex justify-content-center animated zoomIn" id="caledar-fin">
                                                                        <div class="card">
                                                                            <div class="card-header">
                                                                                Planifier le délai du traitement
                                                                            </div>
                                                                            <div class="card-body box-shodw">
                                                                                <div class="animated zoomIn">
                                                                                    <div>
                                                                                        <div class="reservation-form__count interval animated zoomIn">

                                                                                            <label for="count">Durée de traitement</label>
                                                                                            <br>
                                                                                            <button id="btn-minus-duree" class="btn-minus-duree" type="button">-</button>
                                                                                            <input id="dureeTraitement" type="text" name="dureeTraitement" value="-1">
                                                                                            <button id="btn-plus-duree" class="btn-plus-duree" type="button">+</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="d-flex justify-content-around">
                                                                                    <p><a class="popup-duree-enregi primary-btn" href="#">Enregistrer</a></p>
                                                                                    <p><a class="popup-duree-anuler primary-btn" href="#">Annuler</a></p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <small class="alert alert-danger finTraitement-error animated fadeIn" style="display:none;width:100%">inserez un nombre de jours exacte</small>

                                                                <div class="form-group checkbox chequed-default one-choice planifier">
                                                                    <h5 class="card-title">Jours</h5>
                                                                    <input type="checkbox" id="anId1" name="jours" value="all" />
                                                                    <label for="anId1"><span class="chk-span"></span>Quotidien</label>
                                                                    <input type="checkbox" name="jour_selectionne" class="jour_selectionne" id="anId1_seleted" value="all" />

                                                                    <br>
                                                                    <input type="checkbox" name="jours" id="anId2" value="specifique" disabled/>
                                                                    <label for="anId2"> <a class="appelSpecifier" href="#specifier"><span class="chk-span"> </span>Jours spécifiques de la semaine </a></label>
                                                                    <input type="checkbox" name="jour_selectionne" class="jour_selectionne" id="anId2_seleted" value="specifique" />

                                                                    <br>
                                                                    <input type="checkbox" name="jours" id="anId3" value="interval" disabled/>
                                                                    <label for="anId3"><a class="appelInterval" href="#interval"><span class="chk-span" >  </span>Interval de (X) jours </a></label>
                                                                    <input type="checkbox" name="jour_selectionne" class="jour_selectionne" id="anId3_seleted" value="interval" />
                                                                    <input type="text" name="typeJour" id="typeJour" value="all" style="display:none">
                                                                </div>
                                                                <small class="alert alert-success All-correct animated fadeIn" style="display:none;width:100%">vous avez choisi Quotidien comme option</small>
                                                                <small class="alert alert-danger specifique-error animated fadeIn" style="display:none;width:100%">entrez les jours specifque</small>
                                                                <small class="alert alert-danger interval-error animated fadeIn" style="display:none;width:100%">remplir une date correspandante</small>
                                                                <small class="alert alert-success specifique-correct animated fadeIn" style="display:none;width:100%">vous avez choisi les jours</small>
                                                                <div style="width:100%;" class="mfp-hide white-popup-block d-flex justify-content-center animated zoomIn" id="specifier">
                                                                    <div style=" max-width:350px;">

                                                                        <div class="card joursSpicifier">
                                                                            <div class="card-header">
                                                                                Choisir les jours voulu pour ce medicament
                                                                            </div>
                                                                            <div class="card-body box-shodw">
                                                                                <label class="Titre-jours" for="count">Jours spécifiers</label>
                                                                                <br>

                                                                                <div class="form-group checkbox jours">

                                                                                    <input type="checkbox" name="lundi" class="days" id="jr1" value="no" />
                                                                                    <label for="jr1" class="jrs"><span class="chk-span "></span>Lundi </label>

                                                                                    <input type="checkbox" name="mardi" class="days" id="jr2" value="no" />
                                                                                    <label for="jr2" class="jrs"><span class="chk-span"> </span>Mardi</label>

                                                                                    <input type="checkbox" name="mercredi" class="days" id="jr3" value="no" />
                                                                                    <label for="jr3" class="jrs"><span class="chk-span"> </span>Mercredi</label>

                                                                                    <input type="checkbox" id="jr4" class="days" name="jeudi" value="no" />
                                                                                    <label for="jr4" class="jrs"><span class="chk-span"></span>Jeudi</label>

                                                                                    <input type="checkbox" name="vendredi" class="days" id="jr5" value="no" />
                                                                                    <label for="jr5" class="jrs"><span class="chk-span"> </span>Vendredi</label>

                                                                                    <input type="checkbox" name="samedi" class="days" id="jr6" value="no" />
                                                                                    <label for="jr6" class="jrs"><span class="chk-span"> </span>Samedi</label>

                                                                                    <input type="checkbox" name="dimanche" class="days" id="jr7" value="no" />
                                                                                    <label for="jr7" class="jrs"><span class="chk-span"> </span>Dimanche</label>
                                                                                </div>
                                                                                <div class="d-flex justify-content-around">
                                                                                    <p><a class="popup-jours-enreg primary-btn" href="#">Enregistrer</a></p>
                                                                                    <p><a class="popup-jours-annuler primary-btn" href="#">Annuler</a></p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div style="width:100%;" class="mfp-hide white-popup-block d-flex justify-content-center animated zoomIn" id="interval">
                                                                    <div class="card ">
                                                                        <div class="card-header">
                                                                            Choisir interval entre les jours voulu pour ce médicament
                                                                        </div>
                                                                        <div class="card-body box-shodw">
                                                                            <div class="reservation-form__count interval  animated zoomIn">
                                                                                <label for="count">Date de début de traitement</label>
                                                                                <br>
                                                                                <div class="input-group">
                                                                                    <input class="input--style-2 js-datepicker" type="text" placeholder="Date début" id="dateDebut" name="dateDebut">
                                                                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                                                                </div>

                                                                                <label for="count">Interval entre prises de médicament</label>
                                                                                <br>

                                                                                <button id="btn-minus" class="btn-minus-interval" type="button">-</button>
                                                                                <input id="count" type="text" name="interval_prise" class="interval_prise" value="3">
                                                                                <button id="btn-plus" class="btn-plus-interval" type="button">+</button>
                                                                            </div>
                                                                            <div class="d-flex justify-content-around">
                                                                                <p><a class="popup-debut-enreg primary-btn" href="#">Enregistrer</a></p>
                                                                                <p><a class="popup-debut-annuler primary-btn" href="#">Annuler</a></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!---------------------1ere Dose------------------->

                                                                <div style="width:100%;" class="mfp-hide white-popup-block d-flex justify-content-center animated zoomIn" id="dose1">
                                                                    <div class="card ">
                                                                        <div style="text-align:center;font-size:20px;" class="card-header">
                                                                            Choisir la dose
                                                                        </div>
                                                                        <div class="card-body box-shodw">
                                                                            <div class="reservation-form__count interval  animated zoomIn">
                                                                                <button id="btn-minus" class=" moins" type="button">-</button>
                                                                                <input id="count" type="text" class="countDose doseF1" name="doseF1" value="0.25">
                                                                                <button id="btn-plus" class=" plus" type="button">+</button>
                                                                            </div>
                                                                            <div class="d-flex justify-content-around">
                                                                                <p><a class="popup-dose-enreg btnDose primary-btn" href="#">Enregistrer</a></p>
                                                                                <p><a class="popup-dose-annuler primary-btn" href="#">Annuler</a></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!---------------------2eme Dose------------------->
                                                                <div style="width:100%;" class="mfp-hide white-popup-block d-flex justify-content-center animated zoomIn" id="dose2">
                                                                    <div class="card ">
                                                                        <div style="text-align:center;font-size:20px;" class="card-header">
                                                                            Choisir la dose
                                                                        </div>
                                                                        <div class="card-body box-shodw">
                                                                            <div class="reservation-form__count interval  animated zoomIn">
                                                                                <button id="btn-minus" class=" moins" type="button">-</button>
                                                                                <input id="count" type="text" class="countDose doseF2" name="doseF2" value="0.25">
                                                                                <button id="btn-plus" class=" plus" type="button">+</button>
                                                                            </div>
                                                                            <div class="d-flex justify-content-around">
                                                                                <p><a class="popup-dose-enreg btnDose primary-btn" href="#">Enregistrer</a></p>
                                                                                <p><a class="popup-dose-annuler primary-btn" href="#">Annuler</a></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!---------------------Fin 2eme Dose------------------->
                                                                <!---------------------3eme Dose------------------->
                                                                <div style="width:100%;" class="mfp-hide white-popup-block d-flex justify-content-center animated zoomIn" id="dose3">
                                                                    <div class="card ">
                                                                        <div style="text-align:center;font-size:20px;" class="card-header">
                                                                            Choisir la dose
                                                                        </div>
                                                                        <div class="card-body box-shodw">
                                                                            <div class="reservation-form__count interval  animated zoomIn">
                                                                                <button id="btn-minus" class=" moins" type="button">-</button>
                                                                                <input id="count" type="text" class="countDose doseF3" name="doseF3" value="0.25">
                                                                                <button id="btn-plus" class=" plus" type="button">+</button>
                                                                            </div>
                                                                            <div class="d-flex justify-content-around">
                                                                                <p><a class="popup-dose-enreg btnDose primary-btn" href="#">Enregistrer</a></p>
                                                                                <p><a class="popup-dose-annuler primary-btn" href="#">Annuler</a></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!---------------------Fin 3eme Dose------------------->
                                                                <!---------------------4eme Dose------------------->
                                                                <div style="width:100%;" class="mfp-hide white-popup-block d-flex justify-content-center animated zoomIn" id="dose4">
                                                                    <div class="card ">
                                                                        <div style="text-align:center;font-size:20px;" class="card-header">
                                                                            Choisir la dose
                                                                        </div>
                                                                        <div class="card-body box-shodw">
                                                                            <div class="reservation-form__count interval  animated zoomIn">
                                                                                <button id="btn-minus" class=" moins" type="button">-</button>
                                                                                <input id="count" class="countDose doseF4" type="text" name="doseF4" value="0.25">
                                                                                <button id="btn-plus" class=" plus" type="button">+</button>
                                                                            </div>
                                                                            <div class="d-flex justify-content-around">
                                                                                <p><a class="popup-dose-enreg btnDose primary-btn" href="#">Enregistrer</a></p>
                                                                                <p><a class="popup-dose-annuler primary-btn" href="#">Annuler</a></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!---------------------Fin 4eme Dose------------------->
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card">
                                                            <div style="" class="card-body">
                                                                <h5 class="card-title ">Définir le stock courant</h5>

                                                                <div class="form-group ">
                                                                    <div class="search-form stock">
                                                                        <img src="../assets/img/stock2.svg" width="10%" alt="">
                                                                        <input placeholder="Stock" class="typeText StockInput" type="text" name="stockMedic" id="stockMedic">
    
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                        <div class="error-msg" id="hideError" style="display:none;  margin: 10px 0;padding: 10px;border-radius: 3px 3px 3px 3px;color: #D8000C;background-color: #FFBABA;">
                                                            <i class="fa fa-times-circle"></i> Remplir les champs ci-dessus
                                                        </div>
                                                        <div class="success-msg" id="showSuccess" style="display:none;  margin: 10px 0;padding: 10px;border-radius: 3px 3px 3px 3px;color: #270;background-color: #DFF2BF;">
                                                            <i class="fa fa-check"></i> les information sont envoyes avec succes
                                                        </div>
                                                        <div class="d-flex justify-content-center mt-5">
                                                            <button class="primary-btn contact100-form-btn" type="submit" name="submit" id="submit">Ajouter</button>
                                                        </div>
                                                    </div>

                                                </div>

                                            </form>

                                            <!-- END Form -->
                                            <script type="text/javascript">
                                                $(document).ready(function() {

                                                    $('#submit').click(function(e) {
                                                        e.preventDefault();

                                                        var nomMedic = $("#nomMedic").val();
                                                        var typeMedic = $("#typeMedic").val();
                                                        var maladie = $("#maladie").val();
                                                        var permanant = $("#permanant").val();
                                                        var limiter_seleted = $("#limiter_seleted").val();
                                                        var dureeTraitement = $("#dureeTraitement").val();
                                                        var frequenceJourn = $(".frequenceJourn").val();
                                                        var fDay = $("#fDay").val();
                                                        var frequenceJ1 = $("#frequenceJ1").val();
                                                        var doseF1 = $(".doseF1").val();
                                                        var frequenceJ2 = $("#frequenceJ2").val();
                                                        var doseF2 = $(".doseF2").val();
                                                        var frequenceJ3 = $("#frequenceJ3").val();
                                                        var doseF3 = $(".doseF3").val();
                                                        var frequenceJ4 = $("#frequenceJ4").val();
                                                        var doseF4 = $(".doseF4").val();
                                                        var jour_selectionne = $(".jour_selectionne").val();
                                                        var anId2_seleted = $("#anId2_seleted").val();
                                                        var typeJour = $("#typeJour").val();
                                                        var lundi = $("#jr1").val();
                                                        var mardi = $("#jr2").val();
                                                        var mercredi = $("#jr3").val();
                                                        var jeudi = $("#jr4").val();
                                                        var vendredi = $("#jr5").val();
                                                        var samedi = $("#jr6").val();
                                                        var dimanche = $("#jr7").val();
                                                        var interval_prise = $(".interval_prise").val();
                                                        var stockMedic = $("#stockMedic").val();
                                                        var dateDebut = $("#dateDebut").val();

                                                        $.ajax({
                                                            type: "POST",
                                                            url: "./requetteAjoutMedic.php",
                                                            dataType: "json",
                                                            data: {
                                                                nomMedic: nomMedic,
                                                                typeMedic: typeMedic,
                                                                maladie: maladie,
                                                                limiter_seleted: limiter_seleted,
                                                                permanant: permanant,
                                                                dureeTraitement: dureeTraitement,
                                                                frequenceJourn: frequenceJourn,
                                                                fDay: fDay,
                                                                frequenceJ1: frequenceJ1,
                                                                doseF1: doseF1,
                                                                frequenceJ2: frequenceJ2,
                                                                doseF2: doseF2,
                                                                frequenceJ3: frequenceJ3,
                                                                doseF3: doseF3,
                                                                frequenceJ4: frequenceJ4,
                                                                doseF4: doseF4,
                                                                jour_selectionne: jour_selectionne,
                                                                anId2_seleted: anId2_seleted,
                                                                typeJour: typeJour,
                                                                lundi: lundi,
                                                                mardi: mardi,
                                                                mercredi: mercredi,
                                                                jeudi: jeudi,
                                                                vendredi: vendredi,
                                                                samedi: samedi,
                                                                dimanche: dimanche,
                                                                interval_prise: interval_prise,
                                                                stockMedic: stockMedic,
                                                                dateDebut: dateDebut
                                                            },
                                                            success: function(data) {
                                                                if (data.nomMedic == "1") {
                                                                    $(".nomMedic-error").css("display", "block");
                                                                } else {
                                                                    $(".nomMedic-error").css("display", 'none');
                                                                }
                                                                if (data.typeMedic == "2") {
                                                                    $(".typeMedic-error").css("display", "block");
                                                                } else {
                                                                    $(".typeMedic-error").css("display", "none");
                                                                }
                                                                if (data.maladie == "3") {
                                                                    $(".maladie-error").css("display", "block");
                                                                } else {
                                                                    $(".maladie-error").css("display", "none");
                                                                }
                                                                if (data.fDay == "4") {
                                                                    $(".fDay-error").css("display", "block");
                                                                } else {
                                                                    $(".fDay-error").css("display", "none");
                                                                }
                                                                if (data.finTraitement == "5") {
                                                                    $(".finTraitement-error").css("display", "block");
                                                                } else {
                                                                    $(".finTraitement-error").css("display", "none");
                                                                }
                                                                if (data.typeJour == "100") {
                                                                    // alert("ALL");
                                                                    $(".All-correct").css("display", "block");
                                                                } else {
                                                                    $(".All-correct").css("display", "none");
                                                                }
                                                                if (data.typeJour == "200") {
                                                                    // alert("days are specified");
                                                                    $(".specifique-correct").css("display", "block");
                                                                } else {
                                                                    $(".specifique-correct").css("display", "none");
                                                                }
                                                                if (data.typeJour == "300") {
                                                                    // alert("Interval");
                                                                    $(".interval-error").css("display", "block");
                                                                } else {
                                                                    $(".interval-error").css("display", "none");
                                                                }
                                                                if (data.typeJour == "202") {
                                                                    // alert("specifie days");
                                                                    $(".specifique-error").css("display", "block");
                                                                } else {
                                                                    $(".specifique-error").css("display", "none");
                                                                }
                                                                if (data.stockMedic == "4") {
                                                                    $(".stock-error").css("display", "block");
                                                                } else {
                                                                    $(".stock-error").css("display", "none");
                                                                }
                                                                if (data.sent == "1") {
                                                                    $('#showSuccess').css("display", "block")
                                                                    setTimeout(() => {
                                                                        $('#showSuccess').css("display", "none")
                                                                    }, 2000);
                                                                    window.location.href = "./medicament.php"
                                                                }
                                                                if (data.error == "1") {
                                                                    $('#hideError').css("display", "block")
                                                                    setTimeout(() => {
                                                                        $('#hideError').css("display", "none")
                                                                    }, 2000);
                                                                }
                                                                

                                                            }
                                                        });
                                                    });
                                                });
                                            </script>

                                        </div>
                                        <!-- Material form contact -->

                                        <!-- popup magnifique with form -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!--====  End of medicament  ====-->

                <script>
                    var btn = document.getElementsByClassName('btnDose');
                    var dose = document.getElementsByClassName('dose');
                    var count = document.getElementsByClassName('countDose');

                    btn[0].addEventListener('click', function(e) {
                        dose[0].innerHTML = count[0].value;
                    })
                    btn[1].addEventListener('click', function(e) {
                        dose[1].innerHTML = count[0].value;
                    })
                    btn[2].addEventListener('click', function(e) {
                        dose[2].innerHTML = count[0].value;
                    })
                    btn[3].addEventListener('click', function(e) {
                        dose[3].innerHTML = count[0].value;
                    })
                </script>
                <script src="../dist/timepicker.min.js"></script>
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        timepicker.load({
                            interval: 15,
                            defaultHour: null
                        });
                    });
                </script>

                <!-- Optional JavaScript -->
                <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                <script src="../assets/js/jquery-3.2.1.min.js"></script>
                <script src="../assets/js/popper.js"></script>
                <script src="../assets/js/bootstrap.min.js"></script>
                <script src="../assets/js/stellar.js"></script>
                <script src="../assets/js/jquery.magnific-popup.min.js"></script>

                <script src="../vendors/lightbox/simpleLightbox.min.js"></script>
                <script src="../vendors/nice-select/js/jquery.nice-select.min.js"></script>
                <script src="../vendors/owl-carousel/owl.carousel.min.js"></script>
                <script src="../vendors/jquery-ui/jquery-ui.js"></script>
                <script src="../assets/js/jquery.ajaxchimp.min.js"></script>
                <script src="../vendors/counter-up/jquery.waypoints.min.js"></script>
                <script src="../vendors/counter-up/jquery.counterup.js"></script>
                <script src="../assets/js/mail-script.js"></script>
                <!--gmaps Js-->
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
                <script src="../assets/js/gmaps.min.js"></script>
                <script src="../assets/js/theme.js"></script>
                <script src="../assets/js/global.js"></script>

                <!-- Jquery JS-->
                <script src="../vendors/jquery/jquery.min.js"></script>
                <!-- Vendor JS-->
                <script src="../vendors/select2/select2.min.js"></script>
                <script src="../vendors/datepicker/moment.min.js"></script>
                <script src="../vendors/datepicker/daterangepicker.js"></script>

                <!-- Main JS-->
                <script src="../assets/js/global.js"></script>
                <script>
                    const endpoint = 'https://api.myjson.com/bins/14j8qp';

                    const cities = [];
                    fetch(endpoint)
                        .then(blob => blob.json())
                        .then(data => cities.push(...data));

                    function findMatches(wordToMatch, cities) {
                        return cities.filter(place => {
                            // here we need to figure out if the city or state matches what was searched
                            const regex = new RegExp(wordToMatch, 'gi');
                            return place.title.match(regex)
                        });
                    }

                    function numberWithCommas(x) {
                        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                    }

                    function displayMatches() {

                        const matchArray = findMatches(this.value, cities);
                        const html = matchArray.map(place => {

                            var array = place.composition[0].components;
                            var keyNames = Object.keys(array);
                            // const stateName = place.state.replace(regex, `<span class="hl">${this.value}</span>`);
                            return `
																			<li>
																				<span class="name">${keyNames[0]}</span>

																			</li>
																			`;
                        }).join('');
                        suggestions.innerHTML = html;

                    }

                    var searchInput = document.querySelector('.search');
                    const suggestions = document.querySelector('.suggestions');
                    // const li =document.querySelector('li');
                    searchInput.addEventListener('change', displayMatches);
                    searchInput.addEventListener('keyup', displayMatches);
                    const name = document.querySelector('.name');
                    name.addEventListener('click', function(e) {
                        searchInput.value = e.target.innerHTML;
                        suggestions.style.display = "none";
                        searchInput.addEventListener('keyup', function(e) {
                            if (searchInput.value == e.target.innerHTML) {
                                suggestions.style.display = "none";
                            } else {
                                suggestions.style.display = "block";
                            }
                        })

                    })
                </script>

    </body>

    </html>