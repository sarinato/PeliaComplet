<?php

include("../config/verificationLogin.php");
require("../config/connect.php");
include("../php/array/medecin.php");
include("../php/functions.php");

?>
    <!doctype html>
    <html lang="en">

    <head>
        <!--  meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="../assets/img/pelia.png" type="image/png">
        <title>Ajouter un rendez-vous</title>
        <?php
	include "../includes/link.php";
	?>
            <link rel="stylesheet" href="../assets/css/json.css">
            <link rel="stylesheet" href="../assets/css/medecin.css">
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
									Ajouter des Rendez-vous
									<span>auquel vous etes alérter</span>
								</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="medicament-contents bg-medicament">
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="VR">
                                            <!-- Card global popup -->

                                            <!-- Form -->
                                            <form id="theForm">
                                                <div class="d-flex justify-content-around flex-wrap simple-information">
                                                    <div class="col-md-8">
                                                        <div class="card">
                                                            <div class="card-body VR">
                                                                <h5 class="card-title" id="checkbox-medecin">Ajouter un rendez-vous</h5>

                                                                <div class="form-group">
                                                                    <div class="search-form medecin validate-input" data-validate="error" id="nomRend">
                                                                        <input  placeholder="Nom du rendez-vous" class="typeText search Margin pic input100" type="text" name="nomRend"  >
                                                                    </div>
                                                                    
                                                                    <div class="form-group col-md-12 selectt validate-input" data-validate="error">
                                                                        
                                                                             <div id="app-cover" class="ChoixPadd">
                                                                                <div id="select-box">
                                                                                    <input  type="checkbox" class="frequenceInput input100" id="options-view-button" value="0">
                                                                                    <div id="select-button" class="brd">
                                                                                    
                                                                                        <input type="text" style="display:none" id="MedecinSelect">
                                                                                        <div id="selected-value">
                                                                                            <span>Choisissez un medecin</span>
                                                                                        </div>
                                                                                        <div id="chevrons">
                                                                                            <i class="fa fa-chevron-up"></i>
                                                                                            <i class="fa fa-chevron-down"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div id="options">
                                                                                        <div class="option">
                                                                                            <input  class="s-c top  SelectMed" type="checkbox" name="medecinSelected" id="" value="1">
                                                                                            <input  class="s-c bottom frequenceInput  SelectMed" type="checkbox" name="medecinSelected" value="1">
                                                                                            <span class="label" >Aucun médecin</span>
                                                                                            <span class="opt-val" >Aucun médecin</span>
                                                                                        </div>
                                                                                        <div class="refreshContainer">
                                                                                        <div class="refreshMe">
                                                                                        <?php

                    $i=1;
                    foreach( $medecin as $key ) { $i++;
                        ?>
                                                                                        <div class="option ">
                                                                                            <input  class="s-c top   SelectMed" type="checkbox" name="medecinSelected" value="2">
                                                       <!-- the input with Medecin id-->    <input  class="s-c bottom  frequenceInput  SelectMed" type="checkbox"  name="medecinSelected" value="<?php echo $key['id_medecin']; ?>">
                                                                                            <span class="label "><?php echo $key['nom_medecin']; ?></span>
                                                                                            <span class="opt-val "><?php echo $key['nom_medecin']; ?></span>
                                                                                        </div>
                    <?php
                    }
                    ?>
                                                                                        </div>
                                                                                        </div>
                                                                                    
                                                                                        <div class="option">
                                                                                            <input  class="s-c top  SelectMed" type="checkbox">
                                                                                            <input  class="s-c bottom frequenceInput ajouterMedecin  SelectMed" type="checkbox">
                                                                                            <span class="label" id="MedecinAjoute1">Ajouter un medecin</span>
                                                                                            <span class="opt-val" id="MedecinAjoute2">Ajouter un medecin</span>
                                                                                        </div>
                                                                                        
                                                                                        <div id="option-bg"></div>
                                                                                    </div>
                                                                                </div>

														                    </div>
                                                                            <!-- FIN DU SELECT BOX -->
                                                                        </div>

                                                                    </div>

                                                                    <div class="search-form medecin rendez-vousPadding">
                                                                        <div class="input-group dateRendez validate-input" data-validate="error" id="dateRendez">
                                                                            <img src="../assets/img/rendez.svg" width="7%" alt="">
                                                                            <!-- <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i> -->
                                                                            <input  class="input--style-2 js-datepicker input100" type="text" placeholder="Date de Rendez-vous" name="dateRendez">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div  class="search-form medecin rendez-vousPadding ">
                                                                        <img src="../assets/img/time.svg" width="7%" alt="">
                                                                        <div class="form-group unique validate-input " data-validate="error" >
                                                                            <input id="timeRendez" type="text" name="timeRendez" data-toggle="timepicker" class="form-input input100" autocomplete="off"  value="12:00" >
                                                                        </div>
                                                                    </div>

                                                                    <div class="search-form medecin rendez-vousPadding validate-input" data-validate="error" id="heureRappel">
                                                                    <span >Vous serez rappelez la nuitiez du rendez-vous par votre controle à 21 heures</label><br><br>
                                                                        <img src="../assets/img/alarm.svg" width="7%" alt="">
                                                                        
                                                                        <a class="appelRapelReminder reminder" href="#rappel"><span class="Margin pic lesRappel">ajouter d'autres rappel</span></a>
                                                                        <input    type="text" style="display:none" name="heureRappel" class="inputeureRappel input100" value="">

                                                                    </div>

                                                                    <div class="search-form medecin rendez-vousPadding validate-input" data-validate="error" id="LocMed">
                                                                        <img src="../assets/img/adresse.svg" width="7%" alt="">
                                                                        <input  placeholder="Ajouter un emplacement" class="typeText search Margin pic input100" type="text" name="LocMed" >
                                                                    </div>

                                                                    <div class="search-form medecin rendez-vousPadding validate-input" data-validate="error" id="RemarqueMed">
                                                                        <img src="../assets/img/remarque.svg" width="7%" alt="">
                                                                        <input  placeholder="Ajouter des remarques" class="typeText search Margin pic input100" type="text" name="RemarqueMed" >
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                                
                                                <div style="width:100%;display:none;" class="mfp-hide white-popup-block d-flex justify-content-center animated zoomIn" id="rappel">
													
												<div class="card joursSpicifier" style="max-width:350px;">
														<div class="card-header">
                                                        Ajouter d'autres rappel
														</div>
														<div class="card-body box-shodw ">
														<label class="Titre-jours" >Vouliez vous ajouter d'autres rappel</label><br>

                                                            <div class="form-group checkbox one-choice rappelControll" >

																<input  type="checkbox" class="rappelTime input100" name="heureRappel" id="jr2" value="30 minutes avant"/>
																<label for="jr2" class="jrs"><span class="chk-span" > </span>30 minutes avant</label>

																<input  type="checkbox" class="rappelTime input100" name="heureRappel" id="jr3" value="1 heure avant"/>
																<label for="jr3" class="jrs"><span class="chk-span " > </span>1 heure avant</label>
																
																<input  type="checkbox" id="jr4" class="rappelTime input100" name="heureRappel" value="2 heure avant"/>
																<label  for="jr4" class="jrs"><span class="chk-span " ></span>2 heure avant</label>
																									
																<input  type="checkbox" class="rappelTime input100" name="heureRappel" id="jr5" value="3 heure avant"/>
																<label for="jr5" class="jrs"><span class="chk-span" > </span>3 heure avant</label>

																<input  type="checkbox" class="rappelTime input100" name="heureRappel" id="jr6" value="4 heure avant"/>
																<label for="jr6" class="jrs"><span class="chk-span" > </span>4 heure avant</label>

															</div>
															<div class="d-flex justify-content-around">
																<p><a class="popup-rapelCont-enreg primary-btn" href="#">Enregistrer</a></p>
																<p><a class="popup-rapelCont-annuler primary-btn" href="#">Annuler</a></p>
															</div>
														</div>
													</div>
												</div>
                                                <div class="d-flex justify-content-center mt-5">
                                                    <button class="primary-btn contact100-form-btn" type="submit" name="ajoutControle" id="submitRend">Ajouter</button>
                                                </div>
                                            </form>
                                            
                    <!-- The ajax for The Oppointements form -->
                    <script type="text/javascript">
					$(document).ready(function() {

						$('#submitRend').click(function(e){
						e.preventDefault();						
							var form = $("#theForm")[0];
							var formdata = new FormData(form)
							$.ajax({
								type:'POST',
								//method:'post',
								url: "./requetteAjoutRendez.php",
								cache:false,
								data: formdata,
								dataType: "json",
								processData: false,
								contentType: false,
								success:function (data){

									if(data.nom_conntroles==1){
										$('#nomRend').addClass("alert-validate");
										$('#nomRend').removeClass("true-validate");
                                    }
                                    else{
                                        $('#nomRend').removeClass("alert-validate");
										$('#nomRend').addClass("true-validate");
                                    }
                                    if(data.date_conntroles==1){
										$('#dateRendez').addClass("alert-validate");
										$('#dateRendez').removeClass("true-validate");
                                    }
                                    else{
                                        $('#dateRendez').removeClass("alert-validate");
										$('#dateRendez').addClass("true-validate");
                                    }
                                    if(data.heure_conntroles==1){
                                        $('#timeRendez').addClass("alert-validate");
										$('#timeRendez').removeClass("true-validate");
                                    }
                                    else{
                                        $('#timeRendez').removeClass("alert-validate");
										$('#timeRendez').addClass("true-validate");
                                    }
                                    if(data.rappel_conntroles==1){
										$('#heureRappel').addClass("alert-validate");
										$('#heureRappel').removeClass("true-validate");
                                    }
                                    else{
                                        $('#heureRappel').removeClass("alert-validate");
										$('#heureRappel').addClass("true-validate");
                                    }
                                    if(data.emplacement==1){
										$('#LocMed').addClass("alert-validate");
										$('#LocMed').removeClass("true-validate");
                                    }
                                    else{
                                        $('#LocMed').removeClass("alert-validate");
										$('#LocMed').addClass("true-validate");
                                    }
                                    if(data.remarque==1){
										$('#RemarqueMed').addClass("alert-validate");
										$('#RemarqueMed').removeClass("true-validate");
                                    }
                                    else{
                                        $('#RemarqueMed').removeClass("alert-validate");
										$('#RemarqueMed').addClass("true-validate");
                                    }
                                    if(data.success == "1"){
                                        window.location.href = "./ListeRendez-vous.php";
                                    }                                    
                                    
								}
								});									
						});
					});
                </script>
                
                

                                        </div>

                                    </div>
									<div class="VM" style="display:none">
                                            <!-- Card global popup -->

                                            <!-- Form -->
                                            <form id="MedForm">
                                                <div class="d-flex justify-content-around flex-wrap simple-information">
                                                    <div class="col-md-8">
                                                        <div class="card">
                                                            <div class="card-body VM">
                                                                <h5 class="card-title ">Ajouter un médecin</h5>

                                                                <div class="form-group ">
                                                                    <div class="search-form medecin validate-input" data-validate="error">
                                                                        <img src="../assets/img/doctor.svg" width="12%" alt="">
                                                                        <input  placeholder="Nom du médecin" class="typeText search Margin pic input100" type="text" id="nomMed" name="nomMed" >
                                                                    </div>
                                                                    <div class="search-form medecin validate-input" data-validate="error">
                                                                        <input  placeholder="Spécialité" class="typeText search Margin specialite input100" type="text" id="SpecMed" name="SpecMed" >
                                                                    </div>
                                                                    <div class="search-form medecin validate-input" data-validate="error">
                                                                        <img src="../assets/img/phone1.svg" width="7%" alt="">
                                                                        <input  placeholder="Numéro de téléphone" class="typeText search Margin pic input100" type="text" id="numMed" name="numMed" >
                                                                    </div>

                                                                    <div class="search-form medecin validate-input" data-validate="error">
                                                                        <img src="../assets/img/email.svg" width="7%" alt="">
                                                                        <input  placeholder="Email" class="typeText search Margin pic input100" type="email" id="emailMed" name="emailMed" >
                                                                    </div>

                                                                    <div class="search-form medecin validate-input" data-validate="error">
                                                                        <img src="../assets/img/adresse.svg" width="7%" alt="">
                                                                        <input  placeholder="Adresse" class="typeText search Margin pic input100" type="text" id="adresseMed" name="adresseMed" >
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="d-flex justify-content-center mt-5">
                                                    <button class="primary-btn contact100-form-btn VMbtn" type="submit" id="submit" name="submit">Ajouter</button>
                                                </div>

                                        </div>

                                    </form>
                                    <!-- The ajax for the medecine form -->
                <script type="text/javascript">
					$(document).ready(function() {

						$('#submit').click(function(e){                            
						    e.preventDefault();					
							var form = $("#MedForm")[0];
							var formdata = new FormData(form)
							$.ajax({
								type:'POST',
								//method:'post',
								url: "../medecin/requetteAjoutMedecin.php",
								cache:false,
								data: formdata,
								dataType: "json",
								processData: false,
								contentType: false,
								success:function (data){
									if(data.nomMed == "1"){
										$('#nomMed').addClass("alert-validate");
										$('#nomMed').removeClass("true-validate");
									}
									else{
										$('#nomMed').removeClass("alert-validate");
										$('#nomMed').addClass("true-validate");
                                    }
                                    
									if(data.SpecMed == "1"){
										$('#SpecMed').addClass("alert-validate");
										$('#SpecMed').removeClass("true-validate");
									}
									else{
										$('#SpecMed').removeClass("alert-validate");
										$('#SpecMed').addClass("true-validate");
                                    }
                                    
									if(data.numMed == "1"){
										$('#numMed').addClass("alert-validate");
										$('#numMed').removeClass("true-validate");
									}
									else{
										$('#numMed').removeClass("alert-validate");
										$('#numMed').addClass("true-validate");
                                    }
                                    
									if(data.emailMed == "1"){
										$('#emailMed').addClass("alert-validate");
										$('#emailMed').removeClass("true-validate");
									}
									else{
										$('#emailMed').removeClass("alert-validate");
										$('#emailMed').addClass("true-validate");
                                    }
                                    
									if(data.adresseMed == "1"){
										$('#adresseMed').addClass("alert-validate");
										$('#adressMed').removeClass("true-validate");
									}						
									else{
										$('#adresseMed').removeClass("alert-validate");
										$('#adresseMed').addClass("true-validate");
									}
                               
                                                                                      
									if(data.success==1){
                                        // alert(data.idMedecin);
                                        $(".refreshMe").append("<div class='option '><input  class='s-c top  SelectMed ' type='checkbox' name='medecinSelected' value='"+data.idMedecin+"' checked><input  class='s-c bottom frequenceInput  SelectMed ' type='checkbox'  name='medecinSelected' value="+data.idMedecin+" checked><span class='label'>"+data.nomMedecin+"</span><span class='opt-val'>"+data.nomMedecin+"</span></div>");
                                        // $(".refreshContainer").load(" .refreshMe");
                                       
                                        $("#MedecinAjoute1").text(data.nomMedecin);
                                        $("#MedecinAjoute2").text(data.nomMedecin);
                                        
                                        $("#options-view-button").prop('disabled', true); 
                                        
                                       
								    }
                                }
							});									
						});
					});
				</script>

                                    <!-- END Form -->

                                </div>
                                <!-- Material form contact -->

                                <!-- popup magnifique with form -->

                            </div>
                        </div>
                    </div>
            </div>
            </div>
            </section>

          

            <script type="text/javascript">
                $('.clockpicker').clockpicker({
                    placement: 'top',
                    align: 'left',
                    donetext: 'Done'
                });
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
 
 <?php
	include "../includes/script.php";
?>
    </body>

    </html>