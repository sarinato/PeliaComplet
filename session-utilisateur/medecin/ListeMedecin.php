<?php
include("../config/verificationLogin.php");
require("../config/connect.php");
include("../php/array/medecin.php");
include("../php/array/medic_medecin.php");
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
	<title>Liste médecins</title>
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
									liste des médecins
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

												<div class="card ">
													<div style="" class="card-body">
														<h5 class="card-title ">Vos médecins </h5>
														
														<div class="form-group ">
															<!-- THIS THE MEDICINE LIST -->
<?php

$i=1;
foreach( $medecin as $one_medecin ) { $i++;
	?>	
														<div class="<?php echo 'myDiv'.$i ?>">
														<a style="margin-bottom:0%;" class="appelMedecin pop" href="#medecin<?php echo $i; ?>">     
															<div class="search-form medecin ">
																<img  src="../assets/img/doctor.svg" width="12%" alt="">
																<div class="NomMed Margin pic">
																<h4 class=""><?php echo $one_medecin['nom_medecin']; ?></h4>
																<span><?php echo $one_medecin['specialite_medecin']; ?></span>
																</div>	
															</div>
														</a>
														
														</div>
														<hr>
<?php
}
?>
													
												</div>
												
											</div>
											<!-- END Card liste medecin -->

											</div>



											<div class="d-flex justify-content-center mt-5">
															<a class="primary-btn contact100-form-btn" href="medecin.php">Ajouter un médecin</a>
											</div>
											<!-- END Card principale -->
	
										</div>
										<?php
										$i=1;
foreach( $medecin as $one_medecin ) { $i++;?>
												<div style="width:100%;border-radius:20px; max-height:80vh;" class="mfp-hide white-popup-block d-flex justify-content-center animated zoomIn one" id="medecin<?php echo $i; ?>">
												
													<div style=" max-width:470px; background:#fff;border-radius:20px">

														<div class="card joursSpicifier">
														<!-- THIS THE MEDICINE NAME AND SPEC -->
																<div class=" card-header header">	
																	<div class="NomMed Margin pic prof">

																		<img  src="../assets/img/doctor.svg" width="10%" alt="">
																		<div class="NomMed Margin pic" style="width:100%;">
																			<h5 class="h4"><?php echo $one_medecin['nom_medecin']; ?></h5>
																			<span><?php echo $one_medecin['specialite_medecin']; ?></span>
																		</div>
																	<div class="suppButton">
																	<form id="<?php echo 'deleteForm'.$i ?>">
																		<input type="text" style="display:none" name="IDMedecin" value="<?php echo $one_medecin['id_medecin']; ?>">
																		<button type="submit" name="suprimerMedecin"  style="background:none; border:none;" id="suppMedecin<?php echo $i ?>"><img class="supp" id="<?php echo 'submitDelete'.$i ?>" src="../assets/img/delete.svg" width="4%" alt=""></button>

																			
																		</form>
																	</div>
																		<p><a id="closee" class="popup-jours-annuler closeButton" href="#"><img class="closee" src="../assets/img/closee.svg" width="7%" alt=""></a></p>
																	</div>
																
																	<div class="pagin">
																		<a class="lien CoordonneLink" href="#coordonne"><label class="un border1" for="count">Coordonnées</label> </a>
																		<a class="lien MedicamentLink" href="#medic"><label class="un border2" for="count">Médicaments</label> </a>
																		<a class="lien RndvLink" href="#rndv"><label class="un border3" for="count">Rendez-vous</label> </a>
																	</div>	
																</div>
																<!-- THIS THE MEDICINE COORDONATE -->
																<div class="card-body box-shodw coordonne" >
																	
																	<div class="form-group checkbox jours Cord affchageCordonne" >

																		<div class="search-form medecin ">
																			<img  src="../assets/img/phone3.svg" width="6%" alt="">
																			<h4 class="Margin pic" id="<?php echo 'numero'.$i ?>"><?php echo $one_medecin['numero_telephone']; ?></h4>
																		</div>

																		<div class="search-form medecin ">
																			<img  src="../assets/img/email3.svg" width="6%" alt="">
																			<h4 class="Margin pic" id="<?php echo 'email'.$i ?>"><?php echo $one_medecin['email']; ?></h4>
																		</div>
																		
																		<div class="search-form medecin ">
																			<img  src="../assets/img/adresse3.svg" width="6%" alt="">
																			<h4 class="Margin pic" id="<?php echo 'adresse'.$i ?>"><?php echo $one_medecin['adresse']; ?></h4>
																		</div>

																	</div>
																	<div class="form-group checkbox jours Cord formModification animated fadeInUp" style="display:none;">
																	<!-- THE START OF THE FORM FOR THE MEDICINE COORDONATE-->
																<form id="<?php echo 'medecinForm'.$i ?>">
																		<div class="search-form medecin validate-input"  id="<?php echo 'NumeroMedecin'.$i ?>" data-validate="entrez le nom de medecin">
																			<img  src="../assets/img/phone3.svg" width="6%" alt="">
																			<input type="text"  class="typeText input100"  name="NumeroMedecin" value="<?php echo $one_medecin['numero_telephone']; ?>">
																		</div>

																		<div class="search-form medecin validate-input"  id="<?php echo 'emailMedecin'.$i ?>" data-validate="entrez le nom de medecin">
																			<img  src="../assets/img/email3.svg" width="6%" alt="">
																			<input type="text" class="typeText input100"  name="emailMedecin" value="<?php echo $one_medecin['email']; ?>">

																		</div>

																		<div class="search-form medecin validate-input"  id="<?php echo 'adresseMedecin'.$i ?>" data-validate="entrez le nom de medecin">
																			<img  src="../assets/img/adresse3.svg" width="6%" alt="">
																			<input type="text" class="typeText input100"  name="adresseMedecin" value="<?php echo $one_medecin['adresse']; ?>">

																		</div>
																		<input type="text" style="display:none" name="IDMedecin" value="<?php echo $one_medecin['id_medecin']; ?>">

																		<div class="d-flex justify-content-center mt-5">
																	<button class="primary-btn contact100-form-btn" type="submit" id="<?php echo 'submit'.$i ?>" name="submit">Enregistrer</button>
																	</div>
																		</form>
																	


	
													
													
																						
																		</div>
																	
																	<div class="d-flex justify-content-center mt-5">
																	<button class="primary-btn contact100-form-btn modifierCordonnee"><img class="" style="width:1.5rem; margin-right:1rem;" src="../assets/img/edit1.svg" width="1rem" alt="">Modifier</button>
																	</div>
																	
																</div>
                                                    

																<div class="card-body box-shodw medicam" style="display:none;" id="medic">
																<div class="<?php echo 'refreshMed1'.$i ?>">
																	<div class="form-group checkbox jours Cord <?php echo 'refreshMed'.$i ?>" >
			<?php

foreach( $medi_this_user as $one_medec) { 	
	if($one_medec['id_medecin']==$one_medecin['id_medecin']){
	?>	
																		<div class="search-form medecin ">
																			<img  src="../assets/img/comprime.png" width="12%" alt="">
																			<div class="NomMed Margin pic">
																				<h4 class=""><?php echo $one_medec['nom_medicament']; ?></h4>
																			</div>
																		</div>
<?php
}
}
?>
																	</div>
																</div>
																	<div class="d-flex justify-content-center mt-5">
																	<button class="primary-btn contact100-form-btn SelectButton" type="submit" name="submit">Sélectionnez les médicaments</button>
																	</div>
																		
																	</div>

																</div>	
                                                    
                                                    
																<div class="card-body box-shodw rndv" style="display:none;" id="rndv">
																	
																	<div class="form-group checkbox jours Cord" >
				
																	<!-- modifier verssion final : ajouter l'affichage des rendez-vous -->
																	<?php


foreach( $controle as $one_rendez) {
	if( $one_rendez['id_medecin']==$one_medecin['id_medecin']){
	?>

																		<div class="search-form medecin ">
																				<img  src="../assets/img/calendar.svg" width="12%" alt="">
																			<div class="NomMed Margin pic">
																				<h4 class=""><?php echo $one_rendez['nom_conntroles']; ?></h4>
																				<span><?php echo $one_rendez['date_conntroles']; ?>, <?php $temps_prises = dateSimple("G:i", $one_rendez['heure_conntroles']); echo $temps_prises; ?></span>
																			</div>
					
																		</div>
																		<?php
}
}
?>

																	</div>
															
																</div>
																<div class="card-body box-shodw jeudi" style="display:none;" id="jeudi">
																<form id="<?php echo 'MedForm'.$i ?>">
																	<div class="form-group checkbox jours Cord" >
																		<h4 style="text-align:center">Sélectionnez les médicaments prescrits par ce médecin</h4>
																		<?php

	
$t=1;
foreach( $medi_this_user as $one_medic) { ?>	
																		<div class="search-form medecin ">
																			<img  src="../assets/img/comprime.png" width="12%" alt="">
																			<div class="NomMed Margin pic">
																				<h4 class=""><?php echo $one_medic['nom_medicament']; ?></h4>
																			</div>

																			<div class="primary-switch">
																				<input type="checkbox" id="default-switch<?php echo $t; ?>" name="selected_medic<?php echo $t; ?>" <?php  $finTraitement = ($one_medic["id_medecin"]== $one_medecin['id_medecin']) ? "checked disabled" :" "; echo $finTraitement; ?>>
																				<label for="default-switch<?php echo $t; ?>"></label>
																				<input type="text" style="display:none" name="idMedAjout<?php echo $t; ?>" value="<?php echo $one_medic['id_medicament']; ?>">
																				<input type="text" style="display:none" name="idMedecin" value="<?php echo $one_medecin['id_medecin']; ?>">
																				<input type="text" style="display:none" name="idTempsPrise<?php echo $t;?>" value="<?php echo $one_medic['id_temps']; ?>">

																				<input type="text" style="display:none" name="incrementation" value="<?php echo $t; ?>">

																			</div>
																		</div>															
<?php $t++; } ?>											
																		<div class="d-flex justify-content-center mt-5">
																			<button class="primary-btn contact100-form-btn" type="submit" name="affectation_medicament" id="<?php echo 'Terminer'.$i ?>">Terminer</button>
																		</div>

																	</div>
																	</form>
																</div>
														</div>
														
														

														<?php
}
?>
																												
													
												<!-- End card vue d'ensemble page -->

													</div>
										

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



		<!--====  End of medicament  ====-->
    <script>
    $(".MedicamentLink").click(function(e){
        $(".coordonne").css("display","none");
		$(".medicam").css("display","block");
		$(".medicam").addClass("animated fadeIn");
        $(".border2").css("color","#00F260");
        $(".border1").css("color","#fff");
        $(".border3").css("color","#fff");
        $(".rndv").css("display","none");
		$(".jeudi").css("display","none");
    })
    $(".CoordonneLink").click(function(e){
		$(".coordonne").css("display","block");
		$(".coordonne").addClass("animated fadeIn");
        $(".medicam").css("display","none");
        $(".border2").css("color","#fff");
        $(".border1").css("color","#00F260");
        $(".border3").css("color","#fff");
        $(".rndv").css("display","none");
		$(".jeudi").css("display","none");
    })
    $(".RndvLink").click(function(e){
        $(".coordonne").css("display","none");
        $(".medicam").css("display","none");
		$(".rndv").css("display","block");
		$(".rndv").addClass("animated fadeIn");
        $(".border2").css("color","#fff");
        $(".border1").css("color","#fff");
        $(".border3").css("color","#00F260");
		$(".jeudi").css("display","none");
    })
	$(".modifierCordonnee").click(function(e){
		$(".modifierCordonnee").css("display","none");
		$(".formModification").css("display","block");
		$(".formModification").addClass("animated fadeIn");
		$(".affchageCordonne").css("display","none");
	})
	$(".SelectButton").click(function(e){
		$(".jeudi").css("display","block");
		$(".jeudi").addClass("animated fadeIn");
		$(".medicam").css("display","none");
	})
	$(".Terminer").click(function(e){
		$(".jeudi").css("display","none");
		$(".medicam").css("display","block");
		$(".medicam").addClass("animated fadeIn");
	})
	
    </script>
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
		<?php 
		$current=2;
		while( $i>= $current ) {

		?>
			<script type="text/javascript">
			
																	var s = "<?php echo $current ?>";
																										
																		$('#submit'+s).click(function(e){
																			// alert($(e.target).attr("id"));
																			var s = $(e.target).attr("id");
																			var s = s.substring(6);																			
																			e.preventDefault();						
																			var form = $("#medecinForm"+s)[0];
																			console.log(s);
																			var formdata = new FormData(form)
																			$.ajax({
																				type:'POST',																	
																				url: "./modifMedc.php",
																				cache:false,
																				data: formdata,
																				dataType: "json",
																				processData: false,
																				contentType: false,
																				success:function (data){
																					if(data.NumeroMedecin == "1"){
																						$("#NumeroMedecin"+s).addClass('alert-validate');
																						$("#NumeroMedecin"+s).removeClass('true-validate');																																			
																					}
																					else{
																						$("#NumeroMedecin"+s).removeClass('alert-validate');
																						$("#NumeroMedecin"+s).addClass('true-validate');
																					}

																					if(data.emailMedecin == "1"){
																						$("#emailMedecin"+s).addClass('alert-validate');
																						$("#emailMedecin"+s).removeClass('true-validate');																																			
																					}
																					else{
																						$("#emailMedecin"+s).removeClass('alert-validate');
																						$("#emailMedecin"+s).addClass('true-validate');
																					}

																					if(data.adresseMedecin == "1"){
																						$("#adresseMedecin"+s).addClass('alert-validate');
																						$("#adresseMedecin"+s).removeClass('true-validate');																																			
																					}
																					else{
																						$("#adresseMedecin"+s).removeClass('alert-validate');
																						$("#adresseMedecin"+s).addClass('true-validate');
																					}
																					if(data.success == "1"){

																							$("#numero"+s).text(data.numero);
																							$("#email"+s).text(data.email);
																							$("#adresse"+s).text(data.adresse);
																							$(".modifierCordonnee").css("display","block");
																							$(".formModification").css("display","none");
																							$(".affchageCordonne").addClass("animated fadeIn");
																							$(".affchageCordonne").css("display","block");
																				
																					}
																				}
																				});									
																		});
																
																	
																</script>
																<!-- The AJAX FOR THE MEDICINE FORM -->
																<script type="text/javascript">
			
																	var m = "<?php echo $current ?>";
																	var step = parseInt(m);
																	var strStep = toString(step);

																										
																		$('#Terminer'+m).click(function(e){
																			// alert($(e.target).attr("id"));
																			var m = $(e.target).attr("id");
																			var m = m.substring(8);																			
																			e.preventDefault();						
																			var form = $("#MedForm"+m)[0];
																			// console.log(s);
																			var formdata = new FormData(form)
																			$.ajax({
																				type:'POST',																	
																				url: "./afectation.php",
																				cache:false,
																				data: formdata,
																				dataType: "json",
																				processData: false,
																				contentType: false,
																				success:function (data){
																					for(i = 2;i<=step;i++){
																						$(".refreshMed1"+i).load(" .refreshMed"+i);
																						$(".refreshMed1"+i).load(" .refreshMed"+i);
																					}
																					$(".refreshMed1"+m).load(" .refreshMed"+m);																					
																					$(".medicam ").css("display","none");
																					$(".jeudi").css("display","none");
																					$(".medicam").css("display","block");
																					$(".boutonenr").css("display","block");
																					$(".medicam").addClass("animated fadeIn");	

																				}
																				});									
																		});
																
																	
																</script>
																<!-- The AJAX FOR THE DELETE FORM -->
																<script type="text/javascript">
			
																	var d = "<?php echo $current ?>";
																										
																		$('#suppMedecin'+d).click(function(e){																			
																			var d = $(e.target).attr("id");
																			var d = d.substring(12);																			
																			e.preventDefault();						
																			var form = $("#deleteForm"+d)[0];																			
																			var formdata = new FormData(form)
																			$.ajax({
																				type:'POST',																	
																				url: "./deleteMed.php",
																				cache:false,
																				data: formdata,
																				dataType: "json",
																				processData: false,
																				contentType: false,
																				success:function (data){
																					$(".myDiv"+d).css("display","none");
																					document.getElementById("closee").click();     
																				}
																				});									
																		});
																
																	
																</script>
<?php
$current++; 
		} 
		?>

<?php
	include "../includes/script.php";
?>
</body>

</html>