<?php
include("../config/verificationLogin.php");
require("../config/connect.php");
include("../php/functions.php");
$users = $bdd->prepare("SELECT * FROM users 
		WHERE id=:id_this_user");
$users->execute(array('id_this_user' =>$id_user));
$this_user = $users->fetch(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="../assets/img/favicon.png" type="image/png">
	<title>Profile</title>
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
									Votre Profile
								</a>
							</li>
							</ul>
						</div>
						<div class="medicament-contents bg-medicament">
							<div class="tab-content" id="pills-tabContent">
							<div  class="">
								<!-- Card global popup -->
								
											<!-- Form -->
										<form class="" action="modifierProfile.php" method="POST" id="profilForm" enctype="multipart/form-data">
										
											
											<!-- </div>
												
												</div> -->
												<div style="width:100%;border-radius:20px" class="d-flex justify-content-center animated zoomIn one">
												
												<div style=" max-width:470px; background:#fff;border-radius:20px">

													<div class="card joursSpicifier">

                                                    <div style=" padding-bottom: 0;padding-top: 0;" class=" card-header header">
                                                            <div class="Photo">
															<img style="border-radius:50%;margin-left:32%;margin-top:2%;background-position:cover;" id="ProfilPic" class="main-img  wow bounceIn animated"  src="../assets/img/utilisateurs/<?php echo $this_user['photo_utilisateur']; ?>" width="35%" alt="">
															<div class="d-flex flex-column" style="">
																<label for="photo" style="cursor: pointer; width:100%;" class="modifierPhoto" >Modifier la photo</label>
																<input type="file" id="photo" style="visibility: hidden;" class="form-control inputPhoto" name="photo" size=100 />
															</div>
                                                            <!-- <a class=" modifierPhoto" href="">Modifier la photo</a> -->
                                                            </div>
                                                        </div>
													<div class="card-body box-shodw coordonne" id="coordonne">
                                                        
														<div style="margin-top:-7%;" class="form-group checkbox jours Cord" >
                                            <div style="" class="card-body">
                                            <div class="form-group ">
															<div class="search-form medecin validate-input"  id="prenom" data-validate="error" >
																<img  src="../assets/img/User.svg" width="8%" alt="">
																<input  placeholder="Prenom" class="typeText search Margin pic input100" type="text" name="PrenomUtilisateur" value="<?php echo $this_user['prenom']; ?>"  required>
															</div>
															<div class="search-form medecin validate-input"  id="nom" data-validate="error">
																<img  src="../assets/img/User.svg" width="8%" alt="">
																<input  placeholder="Nom" class="typeText search Margin pic input100" type="text" name="NomUtilisateur" value="<?php echo $this_user['nom']; ?>" required>
                                                            </div>
                                                            <div class="search-form medecin validate-input"  id="email" data-validate="error">
																<img  src="../assets/img/email.svg" width="7%" alt="">
																<input  placeholder="Email" class="typeText search Margin pic input100" type="email" name="EmailUtilisateur" value="<?php echo $this_user['email']; ?>"  required>
															</div>
															<div class="search-form medecin validate-input"  id="phone" data-validate="error">
																<img  src="../assets/img/phone1.svg" width="7%" alt="">
																<input  placeholder="Numéro de téléphone" class="typeText search Margin pic input100" type="text" name="NumUtilisateur" value="<?php echo $this_user['phone']; ?>"  required>
															</div>
															<div class="search-form medecin validate-input"  id="sex" data-validate="error">
																<img  src="../assets/img/sexe.svg" width="7%" alt="">
																<input  placeholder="Sexe" class="typeText search Margin pic input100" type="text" name="SexeUtilisateur" value="<?php echo $this_user['sex']; ?>" required>
                                                            </div>
                                                            <div class="search-form medecin validate-input"  id="age" data-validate="error" >
																<img  src="../assets/img/Age.svg" width="10%" alt="">
																<input  placeholder="Age" class="typeText search Margin pic input100" type="text" name="AgeUtilisateur" value="<?php echo $this_user['age']; ?>" required>
															</div>
															<input  style="display:none" class="typeText search Margin pic "type="text" name="IdUtilisateur" value="<?php echo $this_user['id']; ?>" required>

                                                        </div>
                                                        <div class="d-flex justify-content-center mt-5">
																<button class="primary-btn contact100-form-btn" type="submit" name="modificationUtilisateur" id="Enreg">Enregistrer</button>
												</div>
                                                    </div> 
                                                    
                                                    </div>
                                                        </div>
                                                </div>
                                               
										</form>
										<div class="alert alert-success" role="alert" id="yupi" style="display:none">
											les informations sont changé correctement
										</div>
											<script type="text/javascript">                                                    	
																		$('#Enreg').click(function(e){																											
																			e.preventDefault();						
																			var form = $("#profilForm")[0];
																			var formdata = new FormData(form);
																																					
																			$.ajax({
																				type:'POST',																	
																				url: "./modifierProfile.php",
																				cache:false,
																				data: formdata,
																				dataType: "json",
																				processData: false,
																				contentType: false,
																				success:function (data){
                                                                                    if(data.prenom == "1"){
																							$('#prenom').addClass("alert-validate");
																							$('#prenom').removeClass("true-validate");
																							$('html, body').animate({scrollTop:750}, 'slow');   	
																					}
																					else{
																							$('#prenom').removeClass("alert-validate");
																							$('#prenom').addClass("true-validate");
																					}
																					if(data.nom == "1"){
																							$('#nom').addClass("alert-validate");
																							$('#nom').removeClass("true-validate");
																							$('html, body').animate({scrollTop:750}, 'slow');   	
																					}
																					else{
																							$('#nom').removeClass("alert-validate");
																							$('#nom').addClass("true-validate");
																					}
																					if(data.phone == "1"){
																							$('#phone').addClass("alert-validate");
																							$('#phone').removeClass("true-validate");
																							$('html, body').animate({scrollTop:750}, 'slow');   	
																					}
																					else{
																							$('#phone').removeClass("alert-validate");
																							$('#phone').addClass("true-validate");
																					}
																					if(data.sex == "1"){
																							$('#sex').addClass("alert-validate");
																							$('#sex').removeClass("true-validate");
																							$('html, body').animate({scrollTop:750}, 'slow');   	
																					}
																					else{
																							$('#sex').removeClass("alert-validate");
																							$('#sex').addClass("true-validate");
																					}
																					if(data.email == "1"){
																							$('#email').addClass("alert-validate");
																							$('#email').removeClass("true-validate");
																							$('html, body').animate({scrollTop:750}, 'slow');   	
																					}
																					else{
																							$('#email').removeClass("alert-validate");
																							$('#email').addClass("true-validate");
																					}
																					if(data.age == "1"){
																							$('#age').addClass("alert-validate");
																							$('#age').removeClass("true-validate");
																							$('html, body').animate({scrollTop:750}, 'slow');   	
																					}
																					else{
																							$('#age').removeClass("alert-validate");
																							$('#age').addClass("true-validate");
																					}
																					if(data.success == "1" ){
																						$('html, body').animate({scrollTop:$(document).height()}, 'slow');   	
																						$("#yupi").css("display","block");
																						setTimeout(function(){
																							$('#yupi').css("display","none");
																						},2000);																						     															
																						$("#ProfilPic").attr("src",data.profilPic);
																					}
																					
																					
																				}
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

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="../assets/js/jquery-3.2.1.min.js"></script>
	<script src="../assets/js/popper.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/stellar.js"></script>
    <script src="../assets/js/jquery.magnific-popup.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>


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
	<script src="../assets/js/medecin.js"></script>
	

	 <!-- Jquery JS-->
	 <script src="../vendors/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="../vendors/select2/select2.min.js"></script>
    <script src="../vendors/datepicker/moment.min.js"></script>
	<script src="../vendors/datepicker/daterangepicker.js"></script>
	


    <!-- Main JS-->
    <script src="../assets/js/global.js"></script>
	
</body>

</html>