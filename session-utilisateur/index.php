<?php
include("config/verificationLogin.php");
require("config/connect.php");
$today = date("l");
$today_date= date("Y-m-d");
$now_time= date("H:i:s");
include("php/array/details_medicament.php");
include("php/array/controle.php");
include("php/array/medecin.php");
include("php/array/programmeJ.php");
include("php/array/details_medicament.php");
include("php/functions.php");
?>
    <!doctype html>
    <html lang="fr">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="img/pelia.png" type="image/png">
        <title>PELIA | Dashboard</title>
   	<!-- Required meta tags -->

	<link rel="stylesheet" type="text/css" href="dist/timepicker.min.css">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="assets/css/bootstrap.css">
<link rel="stylesheet" href="vendors/linericon/style.css">
<link rel="stylesheet" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/magnific-popup.css">
<link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
<link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
<link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
<link rel="stylesheet" href="vendors/jquery-ui/jquery-ui.css">
<link rel="stylesheet" href="vendors/animate-css/animate.css">
<link href="assets/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
<link href="vendors/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

<link href="vendors/select2/select2.min.css" rel="stylesheet" media="all">
<link href="vendors/datepicker/daterangepicker.css" rel="stylesheet" media="all">

<!-- main css -->
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/mainn.css">


 

    </head>
    <body>
        <!--================ Start Header Menu Area =================-->
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
		<a href="dashboard/profil.php">
		<div class="menu-header">
			<div class="logo d-flex justify-content-center">
				<h1 class="logo-g">Pélia</h1>
				<!-- <img src="assets/img/logo.png" alt=""> -->
			</div>
		</div></a>
		<div class="nav-wraper">
			<div class="navbar">
				<ul class="navbar-nav">
					<!-- classe d'active page: active -->
					<li class="nav-item"><a class="nav-link active" href="dashboard/profil.php"><img src="assets/img/banner/dash.svg" alt=""> Dashboard</a></li>
					<li class="nav-item"><a class="nav-link " href="medicament/medicament.php" ><img src="assets/img/banner/medic.svg" alt="">Médicament</a></li>
					<li class="nav-item"><a class="nav-link " href="medecin/ListeMedecin.php" ><img src="assets/img/banner/doctor.svg" alt="">Médecin</a></li>
					<li class="nav-item"><a class="nav-link " href="rendezVous/ListeRendez-vous.php"><img src="assets/img/banner/rendez-vous.svg" alt="">Rendez vous</a></li>
					<li class="nav-item submenu dropdown">
						<a class="nav-link dropdown-toggle" href="rendezVous/rendez-vous.php" data-toggle="dropdown" role="button" aria-haspopup="true"
						 aria-expanded=""><img src="assets/img/banner/traitement.svg" alt="">Traitement</a>
						 <ul class="dropdown-menu ">
							<li class="nav-item"><a class="nav-link " href="traitement/survey.php">Qestionnaire</a></li>
							<li class="nav-item"><a class="nav-link " href="traitement/observance.php">Observance</a></li>

						</ul>
					</li>
					<li class="nav-item"><a class="nav-link " href="about/about-us.php"><img src="assets/img/banner/nous.svg" alt=""><span>Qui sommes-nous</span></a></li>
					<li class="nav-item"><a class="nav-link " href="faq/faq.php"><img src="assets/img/banner/faq.svg" alt="">FAQ</a></li>
					<li class="nav-item "><a class="nav-link " href="contact/contact.php"><img src="assets/img/banner/contact.svg" alt="">Contact</a></li>

					<!-- <li class="nav-item"><a href="config/logout.php" class="nav-link"><img src="assets/img/banner/logout.svg" alt="">Déconnecter</a> -->
					
			</div>
		</div>
	</header>
	<script>
	$(".nav-link").click(function(e){
		$(this).addClass("active");
		
	})
	</script>
            <!--================ End Header Menu Area =================-->
            <nav class=" navbar navbar-expand-md fixed-top  app-header header-shadow">
    
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button"
                class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="app-header__content">
       
        <div class="app-header-left">
            <div class="header-btn-lg pr-0">
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    class="p-0 btn">
                                    <img width="60" class="rounded-circle" src="assets/img/me.jpg"
                                        alt="">
                                    <i style="color:#fff; font-size:14px;" class="fa fa-angle-down ml-2 opacity-8"></i>
                                </a>
                                <div tabindex="-1" role="menu" aria-hidden="true"
                                    class="dropdown-menu dropdown-menu-right">
                                    <a  href="profil/profile.php" tabindex="0" class="dropdown-item">changer profile</a>
                                  
                                    <div tabindex="-1" class="dropdown-divider"></div>
                                    <a href="config/logout.php" tabindex="0" class="dropdown-item">Déconnecter</a>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content-left  ml-3 header-user-info">
                            <div class="widget-heading">
                            <?php echo $_SESSION['prenom']; ?>
                            </div>
                            <div class="widget-subheading">
                                Développer
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</nav>
            <div class="site-main">
               
                <!--==============================
		=            medicament            =
        ===============================-->
        <div style="position:relative;left:7%;margin-top:3%" class="row container">
                        <div class="col-md-6 col-xl-4">
                            <div class="card mb-3 widget-content bg-midnight-bloom">
                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Médicaments Pris</div>
                                        <div class="widget-subheading">Last year expenses</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-white"><span>60%</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <div class="card mb-3 widget-content bg-arielle-smile">
                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Médicaments Pris en retard</div>
                                        <div class="widget-subheading">Total Clients Profit</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-white"><span>10%</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <div class="card mb-3 widget-content bg-grow-early">
                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Médicaments non Pris</div>
                                        <div class="widget-subheading">People Interested</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-white"><span>30%</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>

                <section class="section profil">
                    <div class="container">
                        <div class="row justify-content-center">
                        <div class="row container">
                            <div class="col">
                                <div class="card" id="recentActivity">
                                    <div class="card-header">Programme Journalier</div>
                                        <ul class="list-group">
<?php
foreach( $controle_this_day as $programme_controle ){
if($programme_controle['date_conntroles'] == $today_date) {
$controleTimesVerif=strtotime($programme_controle['heure_conntroles']);
$noww=strtotime($now_time);
$heures = date("G:i",$controleTimesVerif );
$heures2 = date("G:i",$noww );
if($heures > $heures2){
?>
                                                    <li class="list-group-item">
                                                        <div class="row no-gutters">
                                                            <div class="col">

                                                                <div class="search-form medecin ">
                                                                    <img class="programme" src="assets/img/Rndv1.svg " width="8%" alt="">
                                                                    <div class="NomMed Margin pic">
                                                                        <h4 class="NomMedic"><?php echo $programme_controle['nom_conntroles']; ?> avec votre médecin : <i> <?php echo $programme_controle['nom_medecin']; ?> </i></h4>
                                                                        <span> à <?php echo $programme_controle['heure_conntroles']; ?></span>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col right">

                                                                <div class="row no-gutters justify-content-center align-items-center">
                                                                    <div class="text-center reste">Il reste
                                                                        <br><?php $rendez=strtotime($programme_controle['heure_conntroles']);
                                                                        $noww=strtotime($now_time);
                                                                        if(date("G",$rendez - $noww) > 0 ){
                                                                            echo date("G",$rendez - $noww) . " h :"   .date("i",$rendez - $noww) . " minutes";
                                                                        }  
                                                                        if(date("G",$rendez - $noww)== 0 ){
                                                                            echo date("i",$rendez - $noww) . " minutes";                                                                                       
                                                                        }
                                                                            ?></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                        </li>
                                                    <?php
                                                    }
                                                }
                                                
                                            }
                                            ?>
                                            <?php
                                        foreach( $jour as $programme ){
                                            if($programme['date_prise'] == $today_date || $programme[$today]== 1){
                                            $nbr_fois= 1;
                                            while($nbr_fois <= $programme['nombre_fois']){
                                                $medicTimesCounter=strtotime($programme['f'. $nbr_fois]);
                                                $noww=strtotime($now_time);
                                                $heures = date("H:i",$medicTimesCounter );
                                                $heures2 = date("H:i",$noww );
                                                
                                                if($heures > $heures2){
                                                
                                                ?>
                                            <li class="list-group-item">
                                            <div class="row no-gutters">
                                                <div class="col">
                                                    <div class="search-form medecin ">

                                                        <img class="programme" src="assets/img/medical-pill.svg" width="5%" alt="">

                                                        <div class="NomMed Margin pic">
                                                            <h4 class="">  <?php echo $programme['nom_medicament']; ?> <?php echo $programme['dose_medicament'. $nbr_fois]; ?> <?php echo $programme['type_medicament']; ?> : prise <?php echo $nbr_fois; ?></h4>
                                                            <h5> <?php echo date("H:i", strtotime($programme['f'. $nbr_fois])); ?></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col right">
                                                    <div class="row no-gutters justify-content-center align-items-center">
                                                    <div class="text-center reste">Il reste
                                                            <br><?php 
                                                            
                                                            if(date("G",$medicTimesCounter - $noww) > 0 ){
                                                                echo date("G",$medicTimesCounter - $noww) . "h  ". date("i",$medicTimesCounter - $noww) . "min";
                                                            }
                                                                
                                                            if(date("G",$medicTimesCounter - $noww)== 0 ){
                                                                echo date("i",$medicTimesCounter - $noww) . " minutes";                                                                                        
                                                            }
                                                                ?></div>
                                                        <!-- <div class="text-center">Il reste
                                                            <br>4 heures</div>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </li>
                                        <?php
                                        }
                                        $nbr_fois++;
                                            }
                                            }
                                        }
                                            ?>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                        </div>
                            <div class="col-md">
                                <div class="row mt-4">

                                
                                    <div class="col-lg-6">
                                        <div class="card" id="upcomingEvents">
                                            <div class="card-header">Médicaments<a class="action" href="medicament.php">Voir les détails</a></div>
                                            <ul class="list-group">
                                            <?php
foreach( $details_medicament as $medica )
    {
?>	
													
                                                            <li class="list-group-item">
                                                    <div class="row no-gutters">
                                                        <div class="col">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="search-form medecin ">

                                                                        <img src="assets/img/medical-pill.svg" width="12%" alt="">

                                                                        <div class="NomMed Margin pic">
                                                                            <h4 class=""><?php echo $medica['nom_medicament']; ?></h4> 
                                                                            <span><?php echo $medica['nombre_fois']; ?> fois par jours,
                                                                        <?php
                                                                        if($medica['methode']==0){
                                                                            if($medica['Monday']==1 && $medica['Tuesday']==1 && $medica['Wednesday']==1 && $medica['Thursday']==1  && $medica['Friday']==1  && $medica['Saturday']==1  && $medica['Sunday']==1){
                                                                                echo "tous les jours de la semaine";
                                                                            }else{
                                                                                echo "le ";
                                                                                echo ($medica['Monday']==1) ? "Lundi, " : "";
                                                                                echo ($medica['Tuesday']==1) ? "Mardi, " : "";
                                                                                echo ($medica['Wednesday']==1) ? "Mercredi, " : "";
                                                                                echo ($medica['Thursday']==1) ? "Jeudi, " : "";
                                                                                echo ($medica['Friday']==1) ? "Vendredi, " : "";
                                                                                echo ($medica['Saturday']==1) ? "Samedi, " : "";
                                                                                echo ($medica['Sunday']==1) ? "Dimanche " : "";
                                                                            }
                                                                        }else{
                                                                            $dateD= date_create($medica['date_debut']);
																			$dateP=date_create($medica['date_prise']);
																			$nbjour= date_diff($dateP, $dateD);
																			echo $nbjour->format("interval entre chaque prise %a jours <br>");
																			echo "prochaine prise le ". $medica['date_prise'];
                                                                        }
                                                                        ?>
                                                                        </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                </li>
															<?php

}
?>
                                            
                                            </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card" id="upcomingEvents">
                                                <div class="card-header">Rendez-vous<a class="action" href="ListeRendez-vous.php">Voir les détails</a></div>
                                                <ul class="list-group">
                                                <?php
                                                foreach( $controle as $key ) { 
						?>
																		
																		

																					
                                                                                <li class="list-group-item">
                                                        <div class="row no-gutters">
                                                            <div class="col">
                                                                <div class="search-form medecin ">

                                                                    <img src="assets/img/Rndv1.svg" width="13%" alt="">

                                                                    <div class="NomMed Margin  pic">
                                                                        <h4 class=""><?php echo $key['nom_conntroles']; ?></h4>
                                                                        <span> le <?php echo $key['date_conntroles']; ?>, à <?php $temps_prises = dateSimple("G:i", $key['heure_conntroles']); echo $temps_prises;?></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </li>
					<?php } ?>
        
                                                </ul>
                                                </div>
                                                </div>

                                                

                                                <!------Medecin------->
                                                <div class="col-lg-6">
                                                    <div class="card" id="upcomingEvents">
                                                        <div class="card-header">Médecins<a class="action" href="ListeMedecin.php">Voir les détails</a></div>
                                                        <ul class="list-group">
                                                        <?php

$i=1;
foreach( $medecin as $key ) { $i++;
	?>
														
                                                        <li class="list-group-item">
                                                                <div class="row no-gutters">
                                                                    <div class="col">
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <div class="search-form medecin ">

                                                                                    <img src="assets/img/doctor.svg" width="12%" alt="">

                                                                                    <div class="NomMed Margin pic">
                                                                                        <h4 class=""><?php echo $key['nom_medecin']; ?></h4>
                                                                                        <span><?php echo $key['specialite_medecin']; ?></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                            </li>
<?php }?>
                                                            
                                                           
                                                        </ul>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-6">
                                                    <div class="card" id="upcomingEvents">
                                                        <div class="card-header">Questionnaire<a class="action" href="survey.php">Voir les détails</a></div>
                                                       <p style="text-align:center;padding:50px;padding-bottom:10px;font-size:20px" class="container heartbeat">Vous devez Remplir le Questionnaire de Lundi, Mardi <div class="d-flex justify-content-center ">
                                                            <button style="margin-bottom:7%;" class="primary-btn contact100-form-btn heartbeat" type="submit" name="submit" id="submit">Remplir</button>
                                                        </div></p>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-12">
                                                    <div class="card" id="upcomingEvents">
                                                        <div class="card-header">Observance<a class="action" href="ListeMedecin.php">Voir les détails</a></div>
                                                        <div class="card mb-3 widget-chart widget-chart2 text-left w-100">
                                                <div class="widget-chat-wrapper-outer">
                                                    <div
                                                        class=" container widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                                                        <canvas id="line-chart"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                                        </div>
                                                    </div>
                                                                                    
                                                </div>

                                                
                                                </div>
                                            </div>

                                            
                                           
                </section>
           
                <!--====  End of medicament  ====-->
  <!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/stellar.js"></script>
	<script src="assets/js/jquery.magnific-popup.min.js"></script>

	<script src="vendors/lightbox/simpleLightbox.min.js"></script>
	<script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
	<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
	<script src="vendors/jquery-ui/jquery-ui.js"></script>
	<script src="assets/js/jquery.ajaxchimp.min.js"></script>
	<script src="vendors/counter-up/jquery.waypoints.min.js"></script>
	<script src="vendors/counter-up/jquery.counterup.js"></script>
	<script src="assets/js/mail-script.js"></script>
	<!--gmaps Js-->

	<script src="assets/js/theme.js"></script>
	

	 <!-- Jquery JS-->
	 <script src="vendors/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendors/select2/select2.min.js"></script>
    <script src="vendors/datepicker/moment.min.js"></script>
	<script src="vendors/datepicker/daterangepicker.js"></script>
	


    <!-- Main JS-->
	<script src="assets/js/global.js"></script>
	<script src="assets/js/medecin.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<script>
new Chart(document.getElementById("line-chart"), {
  type: 'line',
  data: {
    labels: ["Janvier","Fevrier","Mars","Avril","Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Decembre"],
    datasets: [{ 
        data: [0,20,50,100,100,100,100,50,100,50],
        label: "Doliprane",
        borderColor: "#038dfe",
        fill: false,
         backgroundColor: [
                'rgba(3, 141, 254, 1)'
            ],
      }, { 
        data: [0,50,0,20,20,50,50,50,100,50],
        label: "Asia",
        borderColor: "#e91e63",
        fill: false,
        backgroundColor: [
                'rgba(233, 30, 99, 1)'
            ],
      }
    ]
  },
  options: {
    title: {
      display: true,
      text: 'Observance Mensuel',
      fontSize: 14,
      fontFamily: "'Roboto', sans-serif",
                fontColor: '#000',
                fontStyle: '500'
    },
    legend: {
            labels: {
                fontSize: 13,
                fontFamily: "'Roboto', sans-serif",
                fontColor: '#000',
                fontStyle: '300'
            }
        },
        scales: {
            
            yAxes: [{

                ticks: {
                    min: 0,
                    max: 100,
                    callback: function (value) {
                        return value + "%"
                    },
                    fontSize: 12,
                    fontFamily: "'Roboto', sans-serif",
                    fontColor: '#000',
                    fontStyle: '500',

                },
                scaleLabel: {
                    display: true,
                    labelString: 'Percentage',
                },
            }],
            xAxes: [{
                
                    ticks: {
                        fontSize: 12,
                        fontFamily: "'Roboto', sans-serif",
                        fontColor: '#000',
                        fontStyle: '500'
                    },
                },

            ]

        }
  }
});
</script>
    </body>

    </html>