<?php
include("../config/verificationLogin.php");
require("../config/connect.php");
include("../php/functions.php");
include("../php/array/medicament_user.php");
include("../php/array/questionnaire.php");
$m=0;
?>
    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="../assets/img/favicon.png" type="image/png">
        <title>Questionnaire</title>
        <?php
	include "../includes/link.php";
    ?>
            <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
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
           
        <div class="site-main">
            <section id="elementtoScrollToID" class="section schedule">
                <div class="container">

                    <div class="row">
                        <div class="col-12">
                            <div class="schedule-tab">
                                <ul class="nav nav-pills text-center">

                                    <?php
					  $t=0;
					 		while($t<7){
								 ?>
                                        <li class="nav-item" id="itemsSelected<?php echo $t; ?>">
                                            <a class="nav-link" id="calendar" href="#nov<?php echo $t; ?>" data-toggle="pill">
                                                <?php echo dateToFrench("l", "now - ".$t . 'Day'); ?>
                                                    <span> <?php  echo dateToFrench("j F Y","now - ".$t . 'Day'); ?> </span>
                                            </a>
                                        </li>
                                        <?php
							   $t++;
							 } 
					  ?>

                                </ul>
                            </div>

                            <div class="schedule-contents bg-schedule">
                                <div class="tab-content" id="pills-tabContent">
                                <?php
					  $t=0;
					 		while($t<7){
                                $today = dateSimple("l", "now - ".$t . 'Day');
                                $today_date= dateSimple("j F Y","now - ".$t . 'Day');
                                $today_date_table= dateSimple("Y-m-d","now - ".$t . 'Day');
                               
              
?>
									<div class="tab-pane schedule-item afficher" id="nov<?php echo $t; ?>"  >
																		<!-- debut de la forme -->
                                <form action ="surveySending.php" method ="POST" id="questionnaire<?php echo $t; ?>">
                                    <input type="text" style="display:none" name="idDateQuestionaire" value="<?php echo $today_date_table; ?>">
                                 <input type="text" style="display:none" name="BoucleJoures" value="<?php echo $t; ?>">
      
                                        <div class="mm-survey-page ">
                                            <div class="mm-survery-content">
                                            <?php
                                $i=0;
foreach( $details_medicament as $medica ){
 
        if($medica['date_prise']==$today_date || $medica[$today]== 1 ){
?>	
<input type="text" style="display:none" name="boucleMedicament" value="<?php echo $i; ?>">
                                                <input type="text" style="display:none" name="idMedicament<?php echo $i; ?>" value="<?php echo $medica['id_temps']; ?>">
                                                

                                                <div class="mm-survey-question">
													<h1 style="text-align:center"><?php echo $medica['nom_medicament']; ?></h1>
                                                </div>
                                                        <?php 
                                                        $nbr_fois= 1;
                                                        $q=0;
                                                        $p=0;
                                                        while($nbr_fois<= $medica['nombre_fois']){
                                                    ?>

													<div class="">
														<p style=font-size:24px>Comment tu as pris votre dose de <span style="color:#038dfe;font-weight:bold"><?php echo $medica['nom_medicament']; ?></span> de <span style="color:#038dfe;font-weight:bold"><?php echo $temps_prises = dateSimple("G:i", $medica['f'.$nbr_fois]); ?>?</span></p>
                                                        
														<div class="mm-survey-item">
															<input type="radio" id="radio<?php echo $i; ?><?php  $p++; echo $p; ?><?php echo $t; ?>" data-item="1" name="surveillance<?php echo $i; ?><?php echo $q; ?><?php echo $t; ?>" value="100" />
															<label for="radio<?php echo $i; ?><?php echo  $p; ?><?php echo $t; ?>"><span></span>
																<p>Pris</p>
															</label>
														</div>
														<div class="mm-survey-item">
															<input type="radio" id="radio<?php echo $i; ?><?php $p++; echo  $p; ?><?php echo $t; ?>" data-item="1" name="surveillance<?php echo $i; ?><?php echo $q; ?><?php echo $t; ?>" value="50" />
															<label for="radio<?php echo $i; ?><?php echo  $p; ?><?php echo $t; ?>"><span></span>
																<p>Retard</p>
															</label>
														</div>
														<div class="mm-survey-item">
															<input type="radio" id="radio<?php echo $i; ?><?php $p++; echo  $p; ?><?php echo $t; ?>" data-item="1" name="surveillance<?php echo $i; ?><?php echo  $q; ?><?php echo $t; ?>" value="0" />
															<label for="radio<?php echo $i; ?><?php  echo $p; ?><?php echo $t; ?>"><span></span>
																<p>Non pris</p>
															</label>
														</div>			
                                                    </div>
                                                        <?php
                                                        $nbr_fois++;
                                                        $q++;
                                                        } 
                                                        
                                                        }
                                                        $i++;
                                                    }
                                                        ?>
                                            </div>
										</div>
                                        <button style="margin-bottom:10%;" class="primary-btn contact100-form-btn" type="submit" name="ajout_questionnaire" id="ajoutQues<?php echo $t; ?>">Ajouter</button>


									</form>	
									<!-- fin de la forme -->
                                    </div>												

                                    <?php
							   $t++;
							 } 
					  ?>                                   
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
                            </div>
            <?php
   $az=0;
          while($az<7){
$today_date_table= dateSimple("Y-m-d","now - ".$az . 'Day');

                  foreach($questionnaire as $elemntOfChart){
                    $date1= new DateTime($elemntOfChart['date_questionaire']);
                    $date2=new DateTime($today_date_table);
                    $dteDiff  = $date2->diff( $date1);
                    $lesjours=$dteDiff->format('%d');
                    if($lesjours == 0){
?>
                <script>
                        var  dskdl= "<?php echo $az; ?>";
                $('#itemsSelected'+dskdl+' a').css("background-color","#8dc63f");
                $('#itemsSelected'+dskdl+' a').css("pointer-events","none");
                $('#nov'+dskdl).css("display","none");
                // $('.nav-pills .nav-item #calendar'+dskdl).addClass("active show");
                $('#itemsSelected'+dskdl+' a').addClass("ajouterALaTable");
                $('#nov'+dskdl).addClass("ajouterALaTable");


                    
                
                // $('.nav-pills .nav-item:first-child .nav-link').addClass("active show");
                </script>
<?php               
}
}
$az++;
          }
            ?>
            <!--====  End of medicament  ====-->
<script>

     $('.nav-pills .nav-item #calendar:not(.ajouterALaTable)').first().addClass("active show");
//    ($(".nav-pills .nav-item .nav-link").addClass("active show");
$('.afficher:not(.ajouterALaTable)').first().addClass("active show");
</script>

<?php
			$inc=0;
			while($inc <= $t){
				?>
<script type="text/javascript">
	var s = "<?php echo $inc ?>";
	
																		$('#ajoutQues'+s).click(function(e){								
																			var def = $(e.target).attr("id");
																			var def = def.substring(9);
                                                                           var ajj = parseInt(def)  +1;
																			e.preventDefault();	
																			var form = $("#questionnaire"+def)[0];
																			var formdata = new FormData(form);
																			var mydiv = $("#mydiv").html();																			
																			$.ajax({
																				type:'POST',																	
																				url: "./surveySending.php",
																				cache:false,
																				data: formdata,
																				dataType: "json",
																				processData: false,
																				contentType: false,
																				success:function (data){
																					
																					if(data.success == "1"){
                                                                                        $('#nov'+def).removeClass("active show");
                                                                                        $('#nov'+ajj).addClass("active show");
                                                                                        $('#itemsSelected'+def+' .nav-link').removeClass("active show");
                                                                                        $('#itemsSelected'+ajj+' .nav-link').addClass("active show");
                                                                                        $('#itemsSelected'+def+' a').css("background-color","#8dc63f");
                                                                                        $('#itemsSelected'+def+' a').addClass("ajouterALaTable");
                                                                                        $('#itemsSelected'+def+' a').css("pointer-events","none");
                                                                                        $('#nov'+def).css("display","none");
                                                                                        $([document.documentElement, document.body]).animate({
                                                                                            scrollTop: $("#elementtoScrollToID").offset().top
                                                                                        }, 1000);

                                                                                       }
                                                                                        
                                                                                       if(data.success == "0"){
                                                                                           alert(data.user);
                    
                                                                                       }

                                                                                    
																																										
																				}
																				});									
																		});
																	
																</script>
				<?php
				$inc++;
			}
			
			
			?>
                 <?php
	include "../includes/script.php";
?>
            <script src="../assets/js/survey.js"></script>

    </body>

    </html>