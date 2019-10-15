<?php
include("../config/verificationLogin.php");
require("../config/connect.php");
include("../php/array/controle.php");
include("../php/functions.php");

?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="../assets/img/pelia.png" type="image/png">
	<title>Liste des Rendez-vous</title>
	<?php
	include "../includes/link.php";
    ?>
	<script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" href="../assets/css/medecin.css">
    <link rel="stylesheet" href="../assets/css/json.css">
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
									liste des Rendez-vous
									<span>auquel vous etes alérter</span>
								</a>
							</li>
							</ul>
						</div>
						<div class="medicament-contents bg-medicament">
							<div class="tab-content" id="pills-tabContent">
							<div  class="">
								<!-- Card global popup -->
								
											<!-- Form -->
															<div class="d-flex justify-content-around flex-wrap simple-information">
																<div class="col-md-8">
																	<div class="card form-ajout-medic">
																		<div style="" class="card-body">
																			<h5 class="card-title ">Vos Rendez-vous </h5>
																			
																			<div class="form-group mydiv">
																		
																				<?php

					$i=1;
					foreach( $controle as $key ) { $i++;
						?>
																		
																		
																				<div id="<?php echo 'RendiVous'.$i ?>">
																				<a  class="appelSpecifier pop  " href="#controle<?php echo $i; ?>">
																				
																				<img src="../assets/img/Rndv1.svg" width="10%" alt="">
																				
																				<div class="NomMed Margin  pic">
																				<h4  id="<?php echo 'RendVousN'.$i ?>"><?php echo $key['nom_conntroles']; ?></h4>
																				<span id="<?php echo 'RendVousD'.$i ?>"><?php echo $key['date_conntroles']; ?>,    <span id="<?php echo 'RendVousH'.$i ?>"> <?php $temps_prises = dateSimple("G:i", $key['heure_conntroles']); echo $temps_prises; ?></span></span>
																				</div></a>
																				<hr>	
																				</div>
					<?php
					}
					?>
																			
																			</div>
																			
																		</div>	
																			
																</div>
																		
															</div>
																	
																</div>
																
																</div>
																	
																	</div>
															<div class="d-flex justify-content-center mt-5">
																		<a class="primary-btn contact100-form-btn" href="rendez-vous.php">Ajouter un rendez-vous</a>
															</div>
										<!--Start of the DIV  -->
						
															<?php
															$s=1;
					foreach( $controle as $key ) { $s++;
						?>


												<div style="width:100%;border-radius:20px max-height:80vh;" class="mfp-hide white-popup-block d-flex justify-content-center animated zoomIn one" id="controle<?php echo $s; ?>">
												
												<div style=" max-width:470px; background:#fff;border-radius:20px; max-height:80vh;">

													<div class="card joursSpicifier ">

                                                    <div style=" padding-bottom: 0;padding-top: 0;" class=" card-header header">	
                                                        <div class="NomMed Margin pic prof">
															<h3 class="NomdeR nomRendez<?php echo $s; ?>"><?php echo $key['nom_conntroles']	; ?></h3>
																<div  class=" suppButton">
																	<form id="<?php echo 'deleteRendez'.$s ?>">
																		<input type="text" style="display:none" classe="" name="IDRendez" value="<?php echo $key['id_conntroles']; ?>">
																		<button type="submit" name="suprimerRendez"  style="background:none; border:none;" id="suprimerRendez<?php echo $s ?>"><img class="supp" id="suprimereendez<?php echo $s ?>" src="../assets/img/delete.svg" width="4%" alt=""></button>
																	</form>
																</div>

															<p><a id="closee" class="popup-jours-annuler closeButton" href="#"><img class="closee ferme" src="../assets/img/closee.svg" width="7%" alt=""></a></p>
                                                        </div>	
                                                    </div>
													<div class="card-body box-shodw coordonne " >
                                                        
														<div style="margin-top:-7%;" class="form-group checkbox jours Cord affichage" >

														<div class="search-form medecin ">
															<img  src="../assets/img/doctor.svg" width="12%" alt="">
                                                            <div class="NomMed Margin pic">
                                                            <h4 class="Nom Margin pic"><?php echo $key['nom_medecin']; ?></h4>
                                                        </div>

														<div  class="search-form medecin">
														<img src="../assets/img/time.svg" width="7%" alt="">
															<span class=" Margin pic dateHeure1<?php echo $s; ?> spanRndv "><?php echo $key['date_conntroles']; ?></span>
														</div>
														<div style="margin-top:9%; margin-left:0%; font-size:16px" class="search-form medecin">
															<img  src="../assets/img/rendez.svg" width="12%;" alt="">
															<span class=" Margin pic dateHeure2<?php echo $s; ?> spanRndv "><?php $temps_prises = dateSimple("G:i", $key['heure_conntroles']); echo $temps_prises;  ?></span>
														</div>  
														<div class="search-form medecin ">
															<img  src="../assets/img/alarm.svg" width="7%" alt="">
															<span class="Margin pic spanRndv"><?php $temps_prises = dateSimple("G:i", $key['rappel_conntroles']); echo $temps_prises;  ?> , <?php echo $key['rappel_text']; ?></span>
														</div>
														<div class="search-form medecin ">
															<img  src="../assets/img/adresse.svg" width="7%" alt="">
															<span class="Margin pic emplacement<?php echo $s; ?> spanRndv"><?php echo $key['emplacement']; ?></span>
														</div>

														<div class="search-form medecin ">
															<img  src="../assets/img/remarque.svg" width="7%" alt="">
															<span class="Margin pic remarque<?php echo $s; ?> spanRndv"><?php echo $key['remarque']; ?></span>				
															</div>

                                                        </div>
                                                        
                                                    </div>
													<div class="form-group checkbox jours Cord formModification animated fadeInUp" style="display:none;">
																<!--START OF THE FORM  -->
													<form  id= "<?php echo 'rendi'.$s ?>">
																<div class="search-form medecin validate-input" data-validate="error" id="<?php echo 'nom_conntroles'.$s?>">
                                                                        <input value="<?php echo $key['nom_conntroles']; ?>" class="typeText search Margin pic input100" type="text" name="nomRend" required>
                                                                    </div>
                                                                    
																		<div class="input-group dateRendez validate-input" data-validate="error"  id="<?php echo 'date_conntroles'.$s?>">
                                                                            <img src="../assets/img/rendez.svg" width="7%" alt="">
                                                                            <!-- <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i> -->
                                                                            <input class="input--style-2 js-datepicker input100" type="text" name="dateRendez" value="<?php echo $key['date_conntroles']; ?>">

                                                                        </div>
																		<div class="search-form medecin " >
                                                                        <img src="../assets/img/time.svg" width="7%" alt="">
                                                                        <div class="form-group unique validate-input" data-validate="error"  id="<?php echo 'heure_conntroles'.$s?>">
                                                                            <input type="text" name="heuresRappel" id="timeRendez" data-toggle="timepicker" class="form-input input100" autocomplete="off" value="<?php $temps_prises = dateSimple("G:i", $key['heure_conntroles']); echo $temps_prises; ?>">
																		</div>
                                                                    </div>
																	<!-- modifier verssion final: ajouter l'input de changement du temps du rappel -->
																	<div class="search-form medecin validate-input" data-validate="error">
																			<img  src="../assets/img/alarm.svg" width="7%" alt="">
																			<input type="text" name="timeControle" id="rappel_conntroles<?php echo $s; ?>" data-toggle="timepicker" class="form-input input100" autocomplete="off" value="<?php $temps_prises = dateSimple("G:i", $key['rappel_conntroles']); echo $temps_prises;  ?>">
																			<span class="Margin pic  spanRndv"><?php echo $key['rappel_text']; ?></span>
																		</div>
				
																	<div class="search-form medecin validate-input" data-validate="error" id="<?php echo 'emplacement'.$s?>">
                                                                        <img src="../assets/img/adresse.svg" width="7%" alt="">
                                                                        <input value="<?php echo $key['emplacement']; ?>" class="typeText search Margin pic input100" type="text" name="LocMed" >
                                                                    </div>

                                                                    <div class="search-form medecin validate-input" data-validate="error" id="<?php echo 'remarque'.$s?>">
                                                                        <img src="../assets/img/remarque.svg" width="7%" alt="">
                                                                        <input value="<?php echo $key['remarque']; ?>" class="typeText search Margin pic input100" type="text" name="RemarqueMed" >
                                                                    </div>
						
																		<input type="text" style="display:none" name="IDConntroles" value="<?php echo $key['id_conntroles']; ?>">
																		<div class="d-flex justify-content-center mt-5">
																	<button class="primary-btn contact100-form-btn" type="submit" name="modifierControle" id="modifierRend<?php echo $s?>">Enregistrer</button>
																	</div>
																	<div class="d-flex justify-content-center mt-5">
																	<a class="primary-btn contact100-form-btn anulerCordonnee" style="color: white;">Annuler</a>
																	</div>
																		</form>
																		
																		</div>
																	
																	<div class="d-flex justify-content-center mt-5">
																	<button class="primary-btn contact100-form-btn modifierCordonnee"><img class="" style="width:1.5rem; margin-right:1rem;" src="../assets/img/edit1.svg" width="1rem" alt="">Modifier</button>
																	</div>
                                                   </div>
												</div>
										</div>
							<!-- Material form contact -->
							<!-- popup magnifique with form -->
							<?php
					}
					?>
												</div>																															
							<!-- THE END OF THE BOG FORM -->
						
						</div>
					</div>
				</div>
			</div>
		</section>



		<!--====  End of medicament  ====-->
		<script src="../dist/timepicker.min.js"></script>
        <script>
	        document.addEventListener("DOMContentLoaded", function(event)
			{
			    timepicker.load({
			        interval: 15,
			        defaultHour: null
			    });
			});


		</script>
<script>
              
              
                $('.modifierCordonnee').click(function(e){
					$('.formModification').css('display','block');
					$('.modifierCordonnee').css('display','none');
					$('.affichage').css('display','none');

				});
				$('.anulerCordonnee').click(function(e){
					$('.formModification').css('display','none');
					$('.modifierCordonnee').css('display','block');
					$('.affichage').css('display','block');

				});
				
              
			</script>

			<?php
			$inc=2;
			while($inc <= $s){
				?>
<script type="text/javascript">
	var s = "<?php echo $inc ?>";
	
																		$('#modifierRend'+s).click(function(e){								
																			var def = $(e.target).attr("id");
																			var def = def.substring(12);
																			e.preventDefault();						
																			var form = $("#rendi"+def)[0];
																			var formdata = new FormData(form);
																			var mydiv = $("#mydiv").html();																			
																			$.ajax({
																				type:'POST',																	
																				url: "./modifRend.php",
																				cache:false,
																				data: formdata,
																				dataType: "json",
																				processData: false,
																				contentType: false,
																				success:function (data){
																					if(data.nom_conntroles == "1"){
																						$("#nom_conntroles"+def).addClass('alert-validate');
																						$("#nom_conntroles"+def).removeClass('true-validate');																																			
																					}
																					else{
																						$("#nom_conntroles"+def).removeClass('alert-validate');
																						$("#nom_conntroles"+def).addClass('true-validate');
																					}

																					if(data.date_conntroles == "1"){
																						$("#date_conntroles"+def).addClass('alert-validate');
																						$("#date_conntroles"+def).removeClass('true-validate');																																			
																					}
																					else{
																						$("#date_conntroles"+def).removeClass('alert-validate');
																						$("#date_conntroles"+def).addClass('true-validate');
																					}

																					if(data.heure_conntroles == "1"){
																						$("#heure_conntroles"+def).addClass('alert-validate');
																						$("#heure_conntroles"+def).removeClass('true-validate');																																			
																					}
																					else{
																						$("#heure_conntroles"+def).removeClass('alert-validate');
																						$("#heure_conntroles"+def).addClass('true-validate');
																					}

																					if(data.emplacement == "1"){
																						$("#emplacement"+def).addClass('alert-validate');
																						$("#emplacement"+def).removeClass('true-validate');																																			
																					}
																					else{
																						$("#emplacement"+def).removeClass('alert-validate');
																						$("#emplacement"+def).addClass('true-validate');
																					}

																					if(data.remarque == "1"){
																						$("#remarque"+def).addClass('alert-validate');
																						$("#remarque"+def).removeClass('true-validate');																																			
																					}
																					else{
																						$("#remarque"+def).removeClass('alert-validate');
																						$("#remarque"+def).addClass('true-validate');
																					}
																					if(data.success == "1"){
																						$("#RendVousN"+def).text(data.name);
																						$(".nomRendez"+def).text(data.name);
																						$("#RendVousD"+def).text(data.date1);
																						$("#RendVousH"+def).text(data.date2);																						
																						$(".dateHeure1"+def).text(data.date1);
																						$(".dateHeure2"+def).text(data.date2);
																						$(".remarque"+def).text(data.remarque);
																						$(".emplacement"+def).text(data.emplacement);

																						$(".rappel_conntroles"+def).text(data.rappel_conntroles);
																						$('.formModification').css('display','none');
																						$('.modifierCordonnee').css('display','block');
																						$('.affichage').css('display','block');
																					}	
																																										
																				}
																				});									
																		});
																	
																</script>
																<!-- The AJAX FOR THE DELETE FORM -->
																<script type="text/javascript">
			
																	var d = "<?php echo $inc ?>";
																										
																		$('#suprimerRendez'+d).click(function(e){
																			// alert($(e.target).attr("id"));
																			var d = $(e.target).attr("id");
																			var d = d.substring(14);																			
																			e.preventDefault();						
																			var form = $("#deleteRendez"+d)[0];																			
																			var formdata = new FormData(form)
																			$.ajax({
																				type:'POST',																	
																				url: "./deleteRendez.php",
																				cache:false,
																				data: formdata,
																				dataType: "json",
																				processData: false,
																				contentType: false,
																				success:function (data){																					
																					$("#RendiVous"+d).css("display","none");
																					document.getElementById("closee").click();       																																					
																				}
																				});									
																		});
																
																	
																</script>
				<?php
				$inc++;
			}
			
			
			?>
			<!-- AJAX FOR MODIFYING THE MEDICINS -->
			
			<?php
	include "../includes/script.php";
?>
</body>

</html>