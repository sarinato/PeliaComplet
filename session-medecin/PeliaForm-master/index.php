<!DOCTYPE html>
<html lang="en">
<head>
	<title>Inscription</title>
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


	<div class=" overlay2">
	
		<div class="flex">
		<div class="  wrap-contact100">
			
			<form class="contact100-form validate-form" action="formProcess1.php" method="post" >
			<a class="logo" href="index.php">Pélia</a>
			<h3 class="plate">Inscription à la plateforme Medecin Pélia </h3>
			<p class="des">Créer gratuitement un compte Pélia pour bien gérer vos rendez-vous avec les patients. Vous avez déjà un compte Pélia ? <a href="./login.php"> <span class="blue"> Connectez-vous !</span></a></p>
			

				
				<div class="wrap-input100 validate-input" data-validate="le nom est requis">
					<span class="label-input100">Nom</span>
					<input id ="lastname" class="input100" type="text" name="lastname" placeholder="Nom">
					<span class="focus-input100"></span>
				</div>
				
				<div class="wrap-input100 validate-input" data-validate="prénom est requis">
					<span class="label-input100">Prenom</span>
					<input id="name" class="input100" type="text" name="name" placeholder="Prenom">
					<span class="focus-input100"></span>
				</div>
				


				<div class="wrap-input100 validate-input email" data-validate = "exemple: ex@abc.xyz">
					<span class="label-input100">Email</span>
					<input id="email" class="input100" type="email" name="email" placeholder="Email" >
					
					<span class="focus-input100"></span>
				</div>
				<small class="alert alert-danger emailExisted animated fadeIn" style="display: none;width:100%">email déja utilisé</small>
				<small class="alert alert-danger unvalidEmail animated fadeIn" style="display: none;width:100%">email nest pas valide</small>

				<div class="wrap-input100 validate-input password" data-validate="mot de passe est requis">
					<span class="label-input100">Mot de passe</span>
					<input id="password" class="input100" type="password" name="password" placeholder="entrez votre mot de passe" >
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input password" data-validate="c'est requis">
					<span class="label-input100">Confirmation de mot de passe</span>
					<input id="cpassword" class="input100" type="password" name="cpassword" placeholder="confirmez votre mot de passe" >
					<span class="focus-input100"></span>
				</div>
				<small class="alert alert-danger samePassword animated fadeIn" style="display: none;width:100%">ne sont pas correspandants</small>

				<div class="wrap-input100 validate-input phone" data-validate = "c'est requis 06XXXXXXXX">
					<span class="label-input100">Téléphone</span>
					<input id="phone" class="input100" type="text" name="phone" placeholder="Numero de téléphone">
					
					<span class="focus-input100"></span>
				</div>
				<small class="alert alert-danger phoneExisted animated fadeIn" style="display: none;width:100%">numéro de téléphone utilisé</small>

				<div class="wrap-input100 validate-input" data-validate="c'est requis de définir votre sexe">
					<span class="label-input100">Sexe</span>
					<input id="sexe" class="input100" type="text" name="sexe" placeholder="Sexe" >
					<span class="focus-input100"></span>
				</div>
				
				<div class="wrap-input100 validate-input" data-validate="c'est requis">
					<span class="label-input100">Age</span>
					<input id="age" class="input100" type="text" name="age" placeholder="Age" >
					<span class="focus-input100"></span>
				</div>
				<small class="alert alert-danger display-error animated fadeIn" style="display: none;width:100%">remplir les champs requis</small>
				<div class="container-contact100-form-btn">
				<div class="wrap-contact100-form-btn">
				<div class="contact100-form-bgbtn"></div>
				<button type="submit" name="submit" id="submit" class="contact100-form-btn">
					<span>
						S'inscrire
						<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
					</span>
				</button>
				</div>
			</div>
			<div class="container-contact100-form-btn" style="margin-top:30px;">
				<div class="wrap-contact100-form-btn">
				<div class="contact100-form-bgbtn"></div>
				<!-- <a type='link' class="contact100-form-btn" href="./login.php">
					<span>
						si vous avez un compte s'identifier ici
						<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
					</span>
				</a> -->
				</div>
			</div>
			<div class='alert alert-success animated fadeInDown' id='hide1' style="display:none;width:100%">
					<strong>Success!</strong> Youre in Bruh!!
				  </div>
			</form>
			<script type="text/javascript">
				$(document).ready(function() {

					$('#submit').click(function(e){
					  e.preventDefault();
			  
			  
					  var lastname = $("#lastname").val();
					  var name = $("#name").val();
					  var email = $("#email").val();
					  var password = $("#password").val();
					  var cpassword = $("#cpassword").val();
					  var phone = $("#phone").val();
					  var sexe = $("#sexe").val();
					  var age = $("#age").val();
					  
			  
			  
					  $.ajax({
						  type: "POST",
						  url: "./formProcess1.php",
						  dataType: "json",
						  data: {lastname:lastname, name:name, email:email, password:password, cpassword:cpassword, phone:phone, sexe:sexe, age:age},
						  success : function(data){
							if(data.empty == "4"){									
								$(".display-error").css("display","block");
								$('.validate-input').each(function(){
									if(!$(this).hasClass('true-validate')){
										$(this).addClass('alert-validate');
									}      						           							
									
								});						
							}

							  if(data.existedEmail == '1'){
									$(".emailExisted").css("display","block");
									$('.email').addClass('alert-validate');
									$('.email').removeClass('true-validate');								
							  }
							  else{
								$(".emailExisted").css("display","none");
							  }
							  if(data.unvalidEmail == '404'){
									$(".unvalidEmail").css("display","block");
									$('.email').addClass('alert-validate');
									$('.email').removeClass('true-validate');	
							  }
							  else{
								$(".unvalidEmail").css("display","none");
							  }
							  if(data.existedPhone == '2'){
								$(".phoneExisted").css("display","block");
								$('.phone').addClass('alert-validate');
								$('.phone').removeClass('true-validate');
							  }
							  else{
								$(".phoneExisted").css("display","none");
							  }
							  if(data.password == "404"){
								$(".samePassword").css("display","block");
								$('.password').addClass('alert-validate');
								$('.password').removeClass('true-validate');								
							  }
							  else{
								$(".samePassword").css("display","none");
							  }
							  if (data.code == "3"){								
								$(".display-error").css("display","none");
								$(".phoneExisted").css("display","none");
								$(".emailExisted").css("display","none");
								$(".password").css("display","none");
								$('#hide1').css('display','block');
									setTimeout(function(){
				  						$('#hide1').hide();
				  					}, 4000);
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
