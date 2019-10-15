<?php
include("../config/verificationLogin.php");
require("../config/connect.php");
$today = date("l");
$today_date= date("Y-m-d");
$now_time= date("H:i:s");
include("../php/array/details_medicament.php");
include("../php/array/controle.php");
include("../php/array/medecin.php");
include("../php/array/programmeJ.php");
include("../php/array/details_medicament.php");
include("../php/functions.php");
include("../php/array/questionnaire.php");
$az=0;
$jours_requis='';
       while($az<7){
        $today_date_table= dateSimple("Y-m-d","now - ".$az . 'Day');
            foreach($questionnaire as $elemntOfChart){               
                if(in_array($today_date_table, $elemntOfChart)){
                    $jours_requis= $jours_requis. ", ". dateToFrench("l", "now - ".$az . 'Day');
                    break;
                }  
}
$az++;
       }    
$xyz=0;
$pris=$retard=$nonpris=1;
while($xyz < 30){
$today_date_table= dateSimple("Y-m-d","now - ".$xyz . 'Day');
$questionnaires_allMedic = $bdd->prepare("SELECT * FROM questionnaire 
							JOIN temps_prises
								ON questionnaire.id_temps = temps_prises.id_temps 
        WHERE temps_prises.id_user=:id_this_user AND questionnaire.date_questionaire=:dateQues");
        if(
$questionnaires_allMedic->execute(array('id_this_user' =>$id_user,'dateQues'=>$today_date_table))
){
$questionnaireallMedic = $questionnaires_allMedic->fetchAll(PDO::FETCH_ASSOC);
foreach($questionnaireallMedic as $elemntOfChart){
    $nbr_fois =$elemntOfChart['nombre_fois'];
    while($nbr_fois){
        if($elemntOfChart['prise'.$nbr_fois] == 100){
            $pris++;
        } elseif($elemntOfChart['prise'.$nbr_fois] == 50){
            $retard++;
        } elseif($elemntOfChart['prise'.$nbr_fois] == 0){
            $nonpris++;
        }
        $nbr_fois--;
    }
}
}
$total_jours = $nonpris+ $pris+ $retard;
$xyz++;
}
$total_mois = $nonpris+ $pris+ $retard;

$prc_pris =  $pris/$total_mois*100;
$prc_nonpris =  $nonpris/$total_mois*100;
$prc_retard =  $retard/$total_mois*100;
?>
    <!doctype html>
    <html lang="fr">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="img/pelia.png" type="image/png">
        <title>PELIA | Dashboard</title>
        <?php
	include "../includes/link.php";
	?>
    </head>
    <body>
        <!--================ Start Header Menu Area =================-->
        <?php
	include "../includes/header.php";
	?>
            <!--================ End Header Menu Area =================-->
           <?php 
           include "../includes/head.php";
           ?>
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
                                        <div class="widget-numbers text-white"><span> <?php echo intval($prc_pris) ;?>%
                                        </span></div>
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
                                        <div class="widget-numbers text-white"><span><?php echo intval($prc_retard) ;?>%</span></div>
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
                                        <div class="widget-numbers text-white"><span><?php echo intval($prc_nonpris) ;?>%</span></div>
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
                                                                    <img class="programme" src="../assets/img/Rndv1.svg " width="8%" alt="">
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

                                                        <img class="programme" src="../assets/img/medical-pill.svg" width="5%" alt="">

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

                                                                        <img src="../assets/img/medical-pill.svg" width="12%" alt="">

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

                                                                    <img src="../assets/img/Rndv1.svg" width="13%" alt="">

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

                                                                                    <img src="../assets/img/doctor.svg" width="12%" alt="">

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
                                                       <p style="text-align:center;padding:50px;padding-bottom:10px;font-size:20px" class="container heartbeat">Vous devez Remplir le Questionnaire de <?php 
                                                        echo (strpos($jours_requis,"lundi")) ? "" : "lundi ";
                                                        echo (strpos($jours_requis,"mardi")) ? "" : "mardi ";
                                                        echo (strpos($jours_requis,"mercredi")) ? "" : "mercredi ";
                                                        echo (strpos($jours_requis,"jeudi")) ? "" : "jeudi ";
                                                        echo (strpos($jours_requis,"vendredi")) ? "" : "vendredi ";
                                                        echo (strpos($jours_requis,"samedi")) ? "" : "samedi "; 
                                                        echo (strpos($jours_requis,"dimanche")) ? "" : "dimanche "; ?> <div class="d-flex justify-content-center ">
                                                            <a style="margin-bottom:7%; color:white;" href="../traitement/survey.php" class="primary-btn contact100-form-btn heartbeat" >Remplir</a>
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
                <?php
	include "../includes/script.php";
?>
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