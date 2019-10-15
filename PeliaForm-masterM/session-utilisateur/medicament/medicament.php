<?php
include("../config/verificationLogin.php");
require("../config/connect.php");
include("../php/functions.php");
include("../php/array/medicament_user.php");
$m=0;
$i=0;
$s = 1;
?>
    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="../assets/img/pelia.png" type="image/png">
        <title>Liste médicaments</title>
        <?php
	include "../includes/link.php";
    ?>
            <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
            <link rel="stylesheet" href="../assets/css/json.css">
            <link rel="stylesheet" href="../assets/css/medecin.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
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
              
                <!--==============================
		=            medicament            =
		===============================-->
        <div class="site-main">
                <section class="section medicament">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="medicament-tab">
                                    <ul class="nav nav-pills text-center">
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill">
									liste des médicaments
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
                                            <div class="d-flex justify-content-around flex-wrap simple-information">
                                                <div class="col-md-8">
                                                    <div class="card ">
                                                        <div style="" class="card-body">
                                                            <h5 class="card-title ">Vos médicaments </h5>

                                                            <div class="form-group ">
                                                                <?php
                                                                $f=1;
foreach($details_medicament as $medica) {
?>
                                                                <div style="margin-top: -14%;margin-bottom: -13%;" id="MediList<?php echo $f ?>">                                                   
                                                                    <a class="appelMedic pop"  href="#medicament<?php echo $i; ?>">
                                                                        <div class="search-form medecin ">
                                                                            <div class="search-form medecin ">
                                                                                <img src="../assets/img/medical-pill.svg" width="12%" alt="">
                                                                                <div class="NomMed Margin pic">
                                                                                    <h4 class=""><?php echo $medica['nom_medicament']; ?></h4>
                                                                                    <span><?php echo $medica['type_medicament']; ?></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <hr>
                                                                </div>
                                                                    <?php
$i++;
$f++;
}
?>

                                                                        </div>

                                                            </div>

                                                        </div>

                                                    </div>
                                                   
                                                </div>

                                            </div>
                                            <!-- pop up ###############################################################################  -->
                                            <?php
    
foreach( $details_medicament as $medic ){ 
?>
                                                <div style="width:100%;border-radius:20px max-height:80vh;" class="mfp-hide white-popup-block d-flex justify-content-center animated zoomIn one" id="medicament<?php echo $m; ?>">

                                                    <div style=" max-width:470px; background:#fff;border-radius:20px;max-height:80vh;">

                                                        <div class="card joursSpicifier">

                                                            <div class=" card-header header">
                                                                <div class="NomMed Margin pic prof">
                                                                    <img src="../assets/img/medical-pillW.svg" width="10%" alt="">
                                                                    <div class="NomMed Margin pic">
                                                                        <h5 class="h4"><?php echo $medic['nom_medicament']; ?></h5>
                                                                        <span><?php echo $medic['type_medicament']; ?></span>
                                                                    </div>
                                                                    <div class="suppButton">
                                                                        <form  id="<?php echo 'deleteForm'.$s ?>">
                                                                            <input type="text" style="display:none" name="IDMedicament" value="<?php echo $medic['id_temps']; ?>">
                                                                            <button type="submit" name="suprimerMedicament" class="<?php echo 'suprimerMedicament'.$s ?>" style="background:none; border:none;"><img class="supp" id="<?php echo 'suprimerMedicament'.$s ?>" src="../assets/img/delete.svg" width="4%" alt=""></button>
                                                                        </form>
                                                                    </div>
                                                                    <p>
                                                                        <a class="popup-jours-annuler closeButton" id ="closee" href="#"><img class="closee" src="../assets/img/closee.svg" width="7%" alt=""></a>
                                                                    </p>
                                                                </div>

                                                                <div class="d-flex justify-content-around">
                                                                    <a class="lien frquence">
                                                                        <label class="un border1 colorSelected">fréquence</label>
                                                                    </a>
                                                                    <a class="lien  duree">
                                                                        <label class="un border2">durée</label>
                                                                    </a>
                                                                    <a class="lien joursSelect">
                                                                        <label class="un border3">les jours</label>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="card-body box-shodw frequenceDetail" id="coordonne">
                                                                <div class="form-group checkbox jours Cord" >
                                                                    <div class="afichageFreq" id="afichageFreqInserted<?php echo $s ?>">
                                                                    <div id="afichageFreqInsertedLoad<?php echo $s ?>">
                                                                        
                                                                        <?php 
																$nbr_fois= 1;
																while($nbr_fois<= $medic['nombre_fois']){
																	?>
                                                                            <div class="search-form medecin">
                                                                                <img src="../assets/img/comprime.png" width="12%" alt="">
                                                                                <div class="NomMed Margin pic">
                                                                                    <h4 class=""><?php  $temps_prises = dateSimple("G:i", $medic['f'.$nbr_fois]);
                                                                                     echo $temps_prises; ?></h4>
                                                                                    <span class=""><?php echo $medic['dose_medicament'.$nbr_fois]; ?></span>
                                                                                </div>
                                                                            </div>
                                                                            <?php
																	$nbr_fois++;
																} ?>
                                                                    </div>
                                                                    
                                                                    </div>
                                                                    <div class="form-group frequenceModification animated fadeInUp" style="display:none;">
                                                                    <!-- form frequence -->
                                                                        <form id="<?php echo 'FrequenceForm'.$s ?>">
                                                                            <div class="mt-4">
                                                                                <label for="">temps des prises</label>
                                                                            </div>
                                                                            <?php 
																$nbr_fois_form= 1;
																while($nbr_fois_form<= $medic['nombre_fois']){
																	?>
                                                                                <div class="form-group unique validate-input">
                                                                                    <input type="text" class="frequence" id="" name="frequenceJ<?php echo $nbr_fois_form; ?>" data-toggle="timepicker" class="form-input time input100" autocomplete="off" value="<?php $temps_prises = dateSimple("G:i", $medic['f'.$nbr_fois_form]);
                                                                                     echo $temps_prises; ?>">
                                                                                </div>
                                                                                <div class="form-group unique validate-input">
                                                                                    <input type="text" class="typeText input100" name="doseFreq<?php echo $nbr_fois_form; ?>" value="<?php echo $medic['dose_medicament'.$nbr_fois_form]; ?>">
                                                                                </div>
                                                                                <?php
																	$nbr_fois_form++;
																} ?>
                                                                                    <input type="text" style="display:none" name="IDTemps" value="<?php echo $medic['id_temps']; ?>">
                                                                                    <input type="text" style="display:none" name="manyTimes" value="<?php echo $nbr_fois_form; ?>">

                                                                                    <div class="d-flex justify-content-center mt-5">
                                                                                        <button class="primary-btn contact100-form-btn" type="submit"  name="modifierFreq" id="<?php echo 'SubmitFrequenceForm'.$s ?>">Enregistrer</button>
                                                                                    </div>
                                                                        </form>                                                                        
                                                                    </div>
                                                                    <div class="d-flex justify-content-center mt-5 boutonModif" >
                                                                        <button class="primary-btn contact100-form-btn modifierFreq"><img class="" style="width:1.5rem; margin-right:1rem;" src="../assets/img/edit1.svg" width="1rem" alt="">Modifier</button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="card-body box-shodw dureeDetail" style="display:none;" id="medic">

                                                                <div class="form-group checkbox jours Cord ">

                                                                    <div class="search-form medecin ">
                                                                        <img src="../assets/img/calendar.svg" width="12%" alt="">                                                                        
                                                                        <div class="NomMed Margin pic afichageDuree">
                                                                            <h4 class="<?php echo 'Delay'.$s ?>"><?php
																$today_date= date("Y-m-d");
																$datefin=$medic['date_fin'];
																$date1=date_create($today_date);
																$date2=date_create($datefin);
																$nbjour= date_diff($date1, $date2);
																$chi = $nbjour->format("%a");
																if($chi>365){
																	echo "traitement alongé";
																}else{
																 echo $nbjour->format("%a jours"); 
																}
																?></h4>
                                                                        </div>
                                                                        <div class="form-group dureeModification animated fadeInUp" style="display:none;">
                                                                            <form id="<?php echo 'DateForm'.$s ?>">
                                                                                <?php
																if($chi>365){?> 
                                                                                    <input type="text" class="typeText" name="interval_p" placeholder="ajouter une durée du traitement">
                                                                                    <?php
																}else {
																	?>                  <div class="validate-input" data-validate="error" >
                                                                                        <input class="count<?php echo $s ?> input100" type="text" class="typeText" name="interval_p" value="<?php echo $chi; ?>">
                                                                                        </div>
                                                                                        <?php	
																}?>
                                                                                            <input type="text" style="display:none" name="IDTemps" value="<?php echo $medic['id_temps']; ?>">
                                                                                            <div class="d-flex justify-content-center mt-5">
                                                                                                <button class="primary-btn contact100-form-btn" id="<?php echo 'modifierDuree'.$s ?>" type="submit" name="modifierDuree">Enregistrer</button>
                                                                                            </div>
                                                                            </form>
                                                                        </div>

                                                                    </div>
                                                                    <div class="d-flex justify-content-center mt-5">
                                                                        <button class="primary-btn contact100-form-btn modifierDuree"><img class="" style="width:1.5rem; margin-right:1rem;" src="../assets/img/edit1.svg" width="1rem" alt="">Modifier</button>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                            <div class="card-body box-shodw joursDetail" style="display:none;" id="rndv">

                                                                <div class="form-group checkbox jours Cord">                                                                
                                                                    <div id="<?php echo 'refreshContent'.$s ?>">
                                                                    <div class="search-form medecin afichageJours" id="<?php echo 'refreshMe'.$s ?>">
                                                                        <img src="../assets/img/calendar.svg" width="12%" alt="">
                                                                        <div class="NomMed Margin pic " style="width:80%;">
                                                                            <?php if($medic['methode']==0){
																			$Lundi = ($medic['Monday']==1) ? "Lundi, " : "";
																			$Mardi = ($medic['Tuesday']==1) ? "Mardi, " : "";
																			$Mercredi = ($medic['Wednesday']==1) ? "Mercredi, " : "";
																			$Jeudi = ($medic['Thursday']==1) ? "Jeudi, " : "";
																			$Vendredi = ($medic['Friday']==1) ? "Vendredi, " : "";
																			$Samedi = ($medic['Saturday']==1) ? "Samedi, " : "";
																			$Dimanche = ($medic['Sunday']==1) ? "Dimanche " : "";
																			echo "<h4>". $Lundi .$Mardi .$Mercredi .$Jeudi .$Vendredi .$Samedi .$Dimanche."</h4>" ;
																			if($Lundi ==1 && $Mardi ==1 && $Mercredi ==1 && $Jeudi ==1 && $Vendredi ==1 && $Samedi ==1 && $Dimanche ==1){
																				echo "tous les jours";
																			}
																		}else{
																			$dateD= date_create($medic['date_debut']);
																			$dateP=date_create($medic['date_prise']);
																			$nbjour= date_diff($dateP, $dateD);
																			echo $nbjour->format("interval entre chaque prise %a jours <br>");
																			echo "prochaine prise ". $medic['date_prise'];
																			?>
                                                                                <h4></h4>
                                                                                <?php
																		}
																		 ?>
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                    <div class="form-group JoursModificat animated fadeInUp" style="display:none;">
                                                                    <div class="alert alert-danger" role="alert" id="dayAlert" style=display:none>
                                                                        vous devez prendre un choix
                                                                    </div>
                                                                    <form  id="<?php echo 'dayForm'.$s ?>">
                                                                            <input type="checkbox" id="quotidien_modif" name="jours" value="all" />
                                                                            <label class="quotidienShow" for="quotidien_modif"><span class="chk-span"></span>Quotidien</label>
                                                                            <input type="checkbox" name="jour_selectionne" id="quotidien_seleted_modif" value="all" />
                                                                            <br>
                                                                            <input type="checkbox" name="jours" id="specifier_modif" value="specifique" />
                                                                            <label class="specifierShow" for="specifier_modif"> <span class="chk-span"> </span>Jours spécifiques de la semaine</label>
                                                                            <input type="checkbox" name="jour_selectionne" id="specifier_seleted_modif" value="specifique" />
                                                                            <br>
                                                                            <input type="checkbox" name="jours" id="interval_modif" value="interval" />
                                                                            <label class="intervalShow" for="interval_modif"><span class="chk-span">  </span>Interval de (X) jours </label>
                                                                            <input type="checkbox" name="jour_selectionne" id="interval_seleted_modif" value="interval" />

                                                                            <div class="form-group checkbox jours changeJours animated fadeInUp" style="display:none;">
                                                                                <input type="checkbox" name="lundi" id="jr1" value="lundi" />
                                                                                <label for="jr1" class="jrs"><span class="chk-span "></span>Lundi </label>

                                                                                <input type="checkbox" name="mardi" id="jr2" value="mardi" />
                                                                                <label for="jr2" class="jrs"><span class="chk-span"> </span>Mardi</label>

                                                                                <input type="checkbox" name="mercredi" id="jr3" value="mercredi" />
                                                                                <label for="jr3" class="jrs"><span class="chk-span"> </span>Mercredi</label>

                                                                                <input type="checkbox" id="jr4" name="jeudi" value="jeudi" />
                                                                                <label for="jr4" class="jrs"><span class="chk-span"></span>Jeudi</label>

                                                                                <input type="checkbox" name="venredi" id="jr5" value="venredi" />
                                                                                <label for="jr5" class="jrs"><span class="chk-span"> </span>Vendredi</label>

                                                                                <input type="checkbox" name="samedi" id="jr6" value="samedi" />
                                                                                <label for="jr6" class="jrs"><span class="chk-span"> </span>Samedi</label>

                                                                                <input type="checkbox" name="dimanche" id="jr7" value="dimanche" />
                                                                                <label for="jr7" class="jrs"><span class="chk-span"> </span>Dimanche</label>
                                                                            </div>

                                                                            <div class="reservation-form__count interval intervalChange animated fadeInUp" style="display:none;">
                                                                                <label for="count">Date de début de traitement</label>
                                                                                <br>
                                                                                <div class="input-group">
                                                                                    <input class="input--style-2 js-datepicker" type="text" placeholder="Date début" name="dateDebut" autocomplete="off">
                                                                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                                                                </div>
                                                                                <div class="alert alert-danger" role="alert" id="datealert" style=display:none>
                                                                                    veillez entrer une date de début
                                                                                </div>
                                                                                <label for="count">Interval entre prises de médicament</label>
                                                                                <br>

                                                                                <button id="btn-minus" class="btn-minus-interval_modif" type="button">-</button>
                                                                                <input id="count" type="text" name="interval_prise" class="count_modif" value="3">
                                                                                <button id="btn-plus" class="btn-plus-interval_modif" type="button">+</button>
                                                                            </div>

                                                                            <input type="text" style="display:none" name="IDJours" value="<?php echo $medic['id_jours']; ?>">
                                                                            <input type="text" style="display:none" name="IDTemps" value="<?php echo $medic['id_temps']; ?>">
                                                                            <div class="d-flex justify-content-center mt-5">
                                                                                <button class="primary-btn contact100-form-btn" type="submit" id="<?php echo 'modifierJours'.$s ?>" name="modifierJours">Enregistrer</button>
                                                                                <button class="primary-btn contact100-form-btn">annuler</button>

                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <div class="d-flex justify-content-center mt-5">
                                                                        <button class="primary-btn contact100-form-btn modifierJour"><img class="" style="width:1.5rem; margin-right:1rem;" src="../assets/img/edit1.svg" width="1rem" alt="">Modifier</button>

                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>

                                                        <!-- END Form -->

                                                    </div>
                                                    <!-- Material form contact -->

                                                    <!-- popup magnifique with form -->

                                                </div>
                                                <?php
$m++;
$s++;
}
?>
                                        </div>
                                    </div>
                                </div>
							</div>
							<div class="d-flex justify-content-center mt-5 mb-5">
                                                        <a class="primary-btn contact100-form-btn" href="ajoutMedicament.php">Ajouter un médicament</a>
                                                    </div>
                </section>

                                                            <?php
                                                                $inc=1;
                                                                while($inc <= $m){
                                                            ?>
                                                    <script type="text/javascript">
                                                        var s = "<?php echo $inc ?>";
	
																		$('#SubmitFrequenceForm'+s).click(function(e){								
																			var def = $(e.target).attr("id");
																			var def = def.substring(19);
																			e.preventDefault();						
																			var form = $("#FrequenceForm"+def)[0];
																			var formdata = new FormData(form);
																																					
																			$.ajax({
																				type:'POST',																	
																				url: "./modifFreq.php",
																				cache:false,
																				data: formdata,
																				dataType: "json",
																				processData: false,
																				contentType: false,
																				success:function (data){
                                                                                    $(".frequenceModification").css("display", "none");
                                                                                    $(".afichageFreq").css("display", "block");
                                                                                    $(".modifierFreq").css("display", "block");
                                                                                    $("#afichageFreqInserted"+def).load(" #afichageFreqInsertedLoad"+def); 
																				}
																				});
																		});
																	
                                                                </script>
                                                                <!-- ######################################################### -->
                                                                <script type="text/javascript">
                                                                        var g = "<?php echo $inc ?>";

																		$('#modifierDuree'+g).click(function(e){								
																			var def = $(e.target).attr("id");
																			var def = def.substring(13);
																			e.preventDefault();						
																			var form = $("#DateForm"+def)[0];
																			var formdata = new FormData(form);
																																					
																			$.ajax({
																				type:'POST',																	
																				url: "./changeDur.php",
																				cache:false,
																				data: formdata,
																				dataType: "json",
																				processData: false,
																				contentType: false,
																				success:function (data){
                                                                                    if(data.interval == "1"){
                                                                                        $(".count"+def).parent().addClass('alert-validate');
                                                                                        $(".count"+def).parent().removeClass('true-validate');                                                                                                                                                                                                                                                                                                                                                     	
                                                                                    }
                                                                                    else{
                                                                                        $(".count"+def).parent().removeClass('alert-validate');
                                                                                        $(".count"+def).parent().addClass('true-validate');

                                                                                        $(".modifierDuree").css("display", "block");
                                                                                        $(".dureeModification").css("display", "none");
                                                                                        $(".dureeModification").addClass("animated fadeIn");
                                                                                        $(".afichageDuree").css("display", "block");
                                                                                        if(data.intervalVal >= 365){
                                                                                            $(".Delay"+def).text("Traitement allongé");    
                                                                                        }
                                                                                        else{
                                                                                            $(".Delay"+def).text(data.intervalVal+" jours");
                                                                                        }
                                                                                        
                                                                                    }                                                                                    
																				}
																				});									
																		});
																	
                                                                </script>
                                                                <!-- ############################################# -->
                                                                <script type="text/javascript">
                                                                        var p = "<?php echo $inc ?>";

																		$('#modifierJours'+p).click(function(e){								
																			var def = $(e.target).attr("id");
																			var def = def.substring(13);
																			e.preventDefault();						
																			var form = $("#dayForm"+def)[0];
																			var formdata = new FormData(form);
                                                                            																																					
																			$.ajax({
																				type:'POST',																	
																				url: "./changeDay.php",
																				cache:false,
																				data: formdata,
																				dataType: "json",
																				processData: false,
																				contentType: false,
																				success:function (data){
                                                                                    if(data.day == "1"){
                                                                                        $("#dayAlert").css("display", "block");
                                                                                        $("#dayAlert").addClass("animated fadeIn");
                                                                                    }
                                                                                    if(data.dateDebut == "3"){
                                                                                        $("#datealert").css("display", "block");
                                                                                        $("#datealert").addClass("animated fadeIn");
                                                                                    }else{
                                                                                        $("#refreshContent"+def).load(" #refreshMe"+def)
                                                                                        $(".modifierJour").css("display", "block");
                                                                                        $(".JoursModificat").css("display", "none");
                                                                                        $(".JoursModificat").addClass("animated fadeIn");
                                                                                        $(".afichageJours").css("display", "block");

                                                                                    }                                                
																				}
																				});									
																		});
																	
                                                                </script>
                                                                <script type="text/javascript">
                                                                        var y = "<?php echo $inc ?>";

																		$('.suprimerMedicament'+y).click(function(e){								
																			var def = $(e.target).attr("id");
																			var def = def.substring(18);
																			e.preventDefault();						
																			var form = $("#deleteForm"+def)[0];
																			var formdata = new FormData(form);
                                                                            																																					
																			$.ajax({
																				type:'POST',																	
																				url: "./deleteMedi.php",
																				cache:false,
																				data: formdata,
																				dataType: "json",
																				processData: false,
																				contentType: false,
																				success:function (data){
                                                                                    $("#MediList"+def).css("display","none");
                                                                                    document.getElementById("closee").click();                                                                                                                                                                        
																				}
																				});									
																		});
																	
                                                                </script>
                                                                
                                                                				<?php
				$inc++;
			}
			
			
			?>

                <!--====  End of medicament  ====-->
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