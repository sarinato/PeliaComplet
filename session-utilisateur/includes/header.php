<?php
$actual_link = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$url = explode('/', $actual_link);
$url = array_values(array_slice($url, -1))[0];
?>

<div class="menu-trigger">
		<span></span>
		<span></span>
		<span></span>
	</div>
<header class="fixed-menu">
		<span class="menu-close"><i class="fa fa-times"></i></span>
		<a href="../dashboard/profil.php">
		<div class="menu-header">
			<div class="logo d-flex justify-content-center">
				<h1 class="logo-g">Pélia</h1>
				<!-- <img src="../assets/img/logo.png" alt=""> -->
			</div>
		</div></a>
		<div class="nav-wraper">
			<div class="navbar">
				<ul class="navbar-nav">
					<!-- classe d'active page: active -->
					<li class="nav-item"><a class="nav-link <?php echo ($url == "profil.php") ||($url == "profile.php") ? "active" : "" ?>" href="../dashboard/profil.php"><img src="../assets/img/banner/dash.svg" alt=""> Dashboard</a></li>
					<li class="nav-item"><a class="nav-link <?php echo ($url == "medicament.php")||($url == "ajoutMedicament.php") ? "active" : "" ?>" href="../medicament/medicament.php" ><img src="../assets/img/banner/medic.svg" alt="">Médicament</a></li>
					<li class="nav-item"><a class="nav-link <?php echo ($url == "ListeMedecin.php")||($url == "medecin.php") ? "active" : "" ?>" href="../medecin/ListeMedecin.php" ><img src="../assets/img/banner/doctor.svg" alt="">Médecin</a></li>
					<li class="nav-item"><a class="nav-link <?php echo ($url == "ListeRendez-vous.php") ||($url == "rendez-vous.php") ? "active" : "" ?>" href="../rendezVous/ListeRendez-vous.php"><img src="../assets/img/banner/rendez-vous.svg" alt="">Rendez vous</a></li>
					<li class="nav-item submenu dropdown">
						<a class="nav-link dropdown-toggle" href="../traitement/survey.php" data-toggle="dropdown" role="button" aria-haspopup="true"
						 aria-expanded="<?php echo ($url == "survey.php") || ($url == "observance.php") ? "true" : "false" ?>"><img src="../assets/img/banner/traitement.svg" alt="">Traitement</a>
						 <ul class="dropdown-menu <?php echo ($url == "survey.php") || ($url == "observance.php") ? "show" : "" ?>">
							<li class="nav-item"><a class="nav-link <?php echo ($url == "survey.php") ? "active" : "" ?>" href="../traitement/survey.php">Qestionnaire</a></li>
							<li class="nav-item"><a class="nav-link <?php echo ($url == "observance.php") ? "active" : "" ?>" href="../traitement/observance.php">Observance</a></li>

						</ul>
					</li>
					<li class="nav-item"><a class="nav-link <?php echo ($url == "index1.php") ? "active" : "" ?>" href="../../PhpSocket2/index1.php"><img src="../assets/img/banner/nous.svg" alt=""><span>Chat</span></a></li>
					<li class="nav-item"><a class="nav-link <?php echo ($url == "about-us.php") ? "active" : "" ?>" href="../about/about-us.php"><img src="../assets/img/banner/nous.svg" alt=""><span>Qui sommes-nous</span></a></li>
					<li class="nav-item"><a class="nav-link <?php echo ($url == "faq.php") ? "active" : "" ?>" href="../faq/faq.php"><img src="../assets/img/banner/faq.svg" alt="">FAQ</a></li>
					<li class="nav-item "><a class="nav-link <?php echo ($url == "contact.php") ? "active" : "" ?>" href="../contact/contact.php"><img src="../assets/img/banner/contact.svg" alt="">Contact</a></li>

					<!-- <li class="nav-item"><a href="../config/logout.php" class="nav-link"><img src="../assets/img/banner/logout.svg" alt="">Déconnecter</a> -->
					
			</div>
		</div>
	</header>
	<script>
	$(".nav-link").click(function(e){
		$(this).addClass("active");
		
	})
	</script>