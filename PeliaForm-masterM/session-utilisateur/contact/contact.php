<?php
include("../config/verificationLogin.php");
?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="../assets/img/favicon.png" type="image/png">
	<title>Contact</title>
	<?php
	include "../includes/link.php";
	?></head>
	<link rel="stylesheet" href="../assets/css/mainForm.css">

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
		
		<!--================Contact Area =================-->
		<section class="contact_area section_gap">
			<div class="container">
				<div class="row">
				
					<div class="col-lg-12">
					<div  class="wrap-contact100">

<form  class="contact100-form validate-form" action="../dashboard/profil.php" method="post">
	<span class="contact100-form-title woww bounceIn animated">
		Contactez-nous
	</span>

	<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Name is required">
		<span class="label-input100">Nom </span>
		<input class="input100" type="text" name="name" placeholder="Entrer votre Nom ">
		<span class="focus-input100"></span>
	</div>

	<div class="wrap-input100 rs1-wrap-input100 validate-input"
		data-validate="Valid email is required: ex@abc.xyz">
		<span class="label-input100">Email</span>
		<input class="input100" type="text" name="email" placeholder="Entrer votre adresse email ">
		<span class="focus-input100"></span>
	</div>

	<div class="wrap-input100 validate-input" data-validate="Message is required">
		<span class="label-input100">Message</span>
		<textarea class="input100" name="message" placeholder="Votre message ici..."></textarea>
		<span class="focus-input100"></span>
	</div>

	<div class="container-contact100-form-btn">
		<button class="contact100-form-btn" name="submit">
			<span>
				Envoyer
				<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
			</span>
		</button>
	</div>
</form>

	<div class="col-lg-12">
						<div class="contact_info">
							<div class="info_item">
								<i class="ion-ios-telephone"></i>
								<h6><a href="#">00 (440) 9865 562</a></h6>
							</div>
							<div class="info_item">
								<i class="ion-email"></i>
								<h6><a href="#">Pelia@Pelia.com</a></h6>
							</div>
							<div class="info_item">
								<i class="ion-social-facebook"></i>
								<h6><a href="#">support@Pelia.com</a></h6>
							</div>
							<div class="info_item">
								<i class="ion-social-twitter"></i>
								<h6><a href="#">support@Pelia.com</a></h6>
							</div>
						</div>
					</div>
</div>
<?php
	if(isset($_POST['submit'])){
		$nom =$_POST['name'];
		$email=$_POST['email'];
		$email = str_replace(' ', '', $email);
		$message=$_POST['message'];
		$message = $message .". L'email est envoyer par " . $email ;
			if(mail("ahmedkhachia17@gmail.com" ,$message,$nom)){    
			}
		}
?>
					</div>
				</div>
			</div>
		</section>
		<!--================Contact Area =================-->
	</div>

	

	

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
</body>

</html>