<?php
session_start();
if(isset($_SESSION['peliaSafetyConnection']) && $_SESSION['peliaSafetyConnection'] == 'motDePass'){
            header('location: ../session-utilisateur/dashboard/profil.php') ;
		}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Conexion</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="../Pélia/img/pelia.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
<!--JQUERY SCRIPT ===============================================================================================-->
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
</head>
<body>


<div class="overlay2">
	
	<div class="flex">
		<div class=" wrap-contact100">
						
			<form class="contact100-form validate-form" action="verify.php" method="post" style="background:url('./images/doctor.png');background-position:right;">
			<a class="logo" href="index.php">Pélia</a>
			<h3 class="plate">Connexion à la plateforme Medecin Pélia</h3>
			<p class="des"> Vous n'avez pas de compte Pélia ? <a href="./index.php"> <span class="blue"> Inscriver-vous !</span></a></p>
			
				<div class='alert alert-success animated fadeInUp' id='hide1' style="display:none;width:100%">
					<strong>Success!</strong> Youre in Bruh!!
				  </div>
				  <!-- <div class='alert alert-danger' id='hide' style="display:none">
					<strong>Danger!</strong> This is not in our Database.
				  </div> -->
				
				


				<div class="wrap-input100 validate-input email" data-validate = "exemple: ex@abc.xyz">
					<span class="label-input100">Email</span>
					<input id="email" class="input100" type="email" name="email" placeholder="Email" >
					
					<span class="focus-input100"></span>
				</div>

				<small class="alert alert-danger wrongEmail animated fadeIn" style="display: none;width:100%">wrong Email or phone number</small>
				<div class="wrap-input100 validate-input password" data-validate="mot de passe est requis">
					<span class="label-input100">Mot de passe</span>
					<input id="password" class="input100" type="password" name="password" placeholder="entrez votre mot de passe" >
					<span class="focus-input100"></span>
				</div>


				<small class="alert alert-danger wrongPassword animated fadeIn" style="display: none;width:100%">Wrong Password</small>				
				<small class="alert alert-danger display-error animated fadeIn" style="display: none;width:100%">remplir les champs requis</small>
				<div class="container-contact100-form-btn">
				<div class="wrap-contact100-form-btn">
				<div class="contact100-form-bgbtn"></div>
				<button type="submit" name="submit" id="submit" class="contact100-form-btn">
					<span>
						Sidentifier
						<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
					</span>
				</button>
				</div>
			</div>
			<div class="container-contact100-form-btn" style="margin-top:30px;">
				<div class="wrap-contact100-form-btn">
				<div class="contact100-form-bgbtn"></div>
				<!-- <a type='link' class="contact100-form-btn" href="./index.php">
					<span>
						si vous navez pas un compte s'inscrire ici
						<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
					</span>
				</a> -->
				</div>
			</div>
			</form>
			<script type="text/javascript">
				$(document).ready(function() {

					$('#submit').click(function(e){
					  e.preventDefault();
					  var email = $("#email").val();
					  var password = $("#password").val();
					  					  			  
			  
					  $.ajax({
						  type: "POST",
						  url: "./verify.php",
						  dataType: "json",
						  data: {email:email, password:password},
						  success : function(data){
							if(data.empty == "4"){							
								$(".display-error").css("display","block");
								$('.validate-input').each(function(){
									if(!$(this).hasClass('true-validate')){
										$(this).addClass('alert-validate');
									}      						           																
								});						
							}
							else{
								$(".display-error").css("display","none");
							}

							  if(data.wrongEmail == '30'){
									$(".wrongEmail").css("display","block");
									$('.email').addClass('alert-validate');
									$('.email').removeClass('true-validate');									
							  }
							  else{
								$(".wrongEmail").css("display","none");
							  }
							  if(data.notVerified== "20"){								
									$(".wrongPassword").css("display","block");
									$('.password').addClass('alert-validate');
									$('.password').removeClass('true-validate');																		
							  }
							  else{
								$(".wrongPassword").css("display","none");
							  }
							  if (data.verified == "10"){
								// alert("you are connected!!!!");
								$(".display-error").css("display","none");
								$('#hide1').css('display','block');
									setTimeout(function(){
				  						$('#hide1').hide();
				  					}, 4000);
								$('.password').addClass('true-validate');
								$('.password').removeClass('alert-validate');								
								window.location.href = "../session-utilisateur/dashboard/profil.php"
							  }							  


						  }
					  });			  
					});
				});
			  </script>
		</div>
		<section id="home" data-stellar-background-ratio="0.5">
		<!-- <div class="overlayy"></div> -->
		<div class="container">
		<div class="overlayy"></div>
			<div class="row">

				<div class="col-md-6 col-sm-12">
					<div class="home-info">
						<h1 data-wow-duration="700ms" data-wow-delay="500ms" class="wow bounceInDown animated">Bienvenue sur la meilleure plateforme pour vous! "Pélia" !
						</h1>
						<p>Nous avons développé un nouvel espace client plus performant et au goût du jour. 
						Vous êtes perdu ? Vous pouvez toujours accéder à l'ancienne version en cliquant le bouton ci-dessous.</p>
						<a style="margin-top:5%;" data-wow-duration="700ms" data-wow-delay="500ms" href="#apropos"
							class="btn section-btn smoothScroll wow slideInUp animated">Commencer</a>

					</div>
				</div>



			</div>
		</div>
	</section>
			</div>
	</div>

	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->	

	<script src="js/main.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script> -->


</body>
</html>
