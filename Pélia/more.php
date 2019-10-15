<?php
require("../session-utilisateur/config/connect.php");
$id_details_article = (isset($_GET['article'])) ? $_GET['article'] : 0;


$articles = $bdd->prepare("SELECT * FROM contenue_article
             INNER JOIN details_article 
                ON details_article.id_details_article = contenue_article.id_details_article
		WHERE details_article.id_details_article=:id_details_article");
$articles->execute(array('id_details_article' =>$id_details_article));
$article = $articles->fetch(PDO::FETCH_ASSOC);
    // print_r($article);
    $viwadd =  $article['view'];
    if(isset($_COOKIE[$id_details_article])){
if ($_COOKIE[$id_details_article]!="alredy viewd"){
    $viwadd =  $article['view']+1;
    $add_veiw = $bdd->prepare("UPDATE details_article 
    SET view=:view
    WHERE id_details_article=:id_article");
        $add_veiw->execute(array(
            'view' => $viwadd,
            'id_article' => $id_details_article
    ));
}
}
$commentaires = $bdd->prepare("SELECT * FROM commentaires_article 						
		WHERE commentaires_article.id_details_article=:id_details_article");
$commentaires->execute(array('id_details_article' =>$id_details_article));
$commentaire = $commentaires->fetchAll(PDO::FETCH_ASSOC);
$nbr_commentaire = sizeof($commentaire);


setcookie($id_details_article,'alredy viewd' , time() + 365*24*3600);


function dateToFrench( $format, $date) {
    $english_days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
    $french_days = array('lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche');
    $english_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    $french_months = array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
    return str_replace($english_months, $french_months, str_replace($english_days, $french_days, date($format, strtotime($date) ) ) );
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/pelia.png" type="image/png">
    <title>Articles</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="vendors/linericon/style.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="css/animate.css">

    <link href="js/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">

</head>

<body>

   <?php 
   include "nav.php"
   ?>

    <!--================ Start Home Banner Area =================-->
    
    <!--================ End Home Banner Area =================-->
    <!--================Blog Area =================-->
    <section class="blog_area single-post-area section_gap">
        <div class="container">
            <div class="row ">
                <div class="col-lg-8 posts-list">
                <div class="single-post row">
                    
                            <div class="container">
                            <h2 class="h2"><?php echo $article['title_article'];  ?></h2>
                            <p class="legend"> <?php echo $article['legende_article'];  ?></p>
                            <div class="col-lg-12 ">
                                <div class="blog_info text-right" id="details">
                                    <ul style="margin-bottom:3%" class="blog_meta list" id="detail">
                                        <li><i class="lnr lnr-user"></i><a href="#">Pélia</a></li>   
                                        <li><i class="lnr lnr-calendar-full"></i><a href="#"><?php echo dateToFrench("j F, o", $article['date_modification']); ?></a></li>
                                        <li><i class="lnr lnr-eye"></i><a href="#"><?php echo $viwadd;  ?> Views</a></li>
                                        <li><i class="lnr lnr-bubble"></i><a href="#"><?php echo $nbr_commentaire; ?> Comments</a></li>

                                    </ul>
                                   
                                   <div style="margin-bottom:3%" class="sharethis-inline-share-buttons"></div>
                                   <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5d753bccab6f1000123c8401&product=inline-share-buttons" async="async"></script>
                                    <!-- <ul class="social-links">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-github"></i></a></li>
                                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                    </ul> -->
                                </div>
                            </div>
                            <div id="fb-root"></div>
                            <script>
                            (function(d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0];
                                if (d.getElementById(id)) return;
                                js = d.createElement(s); js.id = id;
                                js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
                                fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));
                            </script>   
                            <div class="feature-img">
                                    <img class="img-fluid" src="img/articles/<?php echo $article['image_principale_article'];  ?>" alt="">
                                </div>
                            </div>
                           
                            <div class=" col-lg-12 col-md-9 blog_details">
                                <p class="excert"> <?php echo $article['description_article'];  ?> </p>
                                <p class="Para2">
                                   
                                </p>
                                <p class="Para3">
                                   
                                </p>
                            </div>
                            <div class="col-lg-12">
                                <div class="quotes">
                                <?php echo $article['autres_paragraphes_article'];  ?>
                                </div>
                               
                            </div>
                        </div>
                </div>
               <?php
    include("aside.php");
               ?>
            </div>
            <div class="comments-area" id="elementtoScrollToID">
                            <h4> <?php echo $nbr_commentaire; ?> Commentaires</h4>

					
                            <?php

$i=0;
foreach( $commentaire as $key ) { 
    ?>
                                                    
                            <div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="img/blog/c1.jpg" alt="">
                                        </div>
                                        <div class="desc">
                                            <h5 id="nomComment"><a href="#"><?php echo $key['name']; ?></a></h5>
                                            <p id="dateComment" class="date">  <?php echo $key['date_creation']; ?> </p>
                                            <p id="contennueComment" class="comment">
                                            <?php echo $key['contenue_commentaire']; ?>
                                             </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                         
<?php
$i++;
}
?>
                            </div> 
                            <div class="comment-form">
                            <h4></h4>
                            <div class="wrap-contact100" id="formMother">

            <form class="contact100-form validate-form" id="ajoutComment">
                <span style="margin-bottom:13% !important;" class="contact100-form-title woww bounceIn animated">
				Laisser un commentaire
			</span>

                <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Name is required">
                    
                    <input class="input100" type="text" name="name" placeholder="Entrer votre Nom " autocomplete="off">
                    <span class="focus-input100"></span>
                </div>
                <div class="nomMedic-error" id="hideError" style="display:none; margin: 10px 0;padding: 10px;border-radius: 3px 3px 3px 3px;color: #D8000C;background-color: #FFBABA;">
                    <i class="fa fa-times-circle"></i> Remplir les champs ci-dessus
                </div>
                <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    
                    <input class="input100" type="text" name="email" placeholder="Entrer votre adresse email" autocomplete="off">
                    <span class="focus-input100"></span>
                </div>
                <div class="error-msg email-error" id="hideError" style="display:none;  margin: 10px 0;padding: 10px;border-radius: 3px 3px 3px 3px;color: #D8000C;background-color: #FFBABA;">
                    <i class="fa fa-times-circle"></i> Remplir les champs ci-dessus
                </div>
                <div class="wrap-input100 validate-input" data-validate="Message is required">
                    
                    <textarea class="input100" name="message" placeholder="Votre commentaire ici..."></textarea>
                    <span class="focus-input100"></span>
                </div>
                <div class="error-msg message-error" id="hideError" style="display:none;  margin: 10px 0;padding: 10px;border-radius: 3px 3px 3px 3px;color: #D8000C;background-color: #FFBABA;">
                    <i class="fa fa-times-circle"></i> Remplir les champs ci-dessus
                </div>
                <input type="text" value="<?php echo $id_details_article ?>" name="idArticle" style="display:none">
                <div class="container-contact100-form-btn">
                    <button class="contact100-form-btn" name="ajoutCommentSubmit" id="ajoutCommentSubmit">
                        <span>
						Ajouter
						<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
					</span>
                    </button>
                </div>
            </form>

        </div>
                        </div>
        </div>
    </section>

    <?php 
                include "footer.php"
                ?>
 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <script src="js/theme.js"></script>

    <script type="text/javascript">

																		$('#ajoutCommentSubmit').click(function(e){
																			e.preventDefault();						
																			var form = $("#ajoutComment")[0];
																			var formdata = new FormData(form);
																			$.ajax({
																				type:'POST',																	
																				url: "./ajoutCommentaire.php",
																				cache:false,
																				data: formdata,
																				dataType: "json",
																				processData: false,
																				contentType: false,
																				success:function (data){
                                                                                    if (data.email == "200") {
                                                                                        $(".email-error").css("display", "block");
                                                                                    } if (data.message == "300") {
                                                                                        $(".message-error").css("display", "block");
                                                                                    }
                                                                                    if (data.name == "100") {
                                                                                        $(".nomMedic-error").css("display", "block");
                                                                                    }
                                                                                    if(data.success == "1"){
																						$(".comments-area").load(" .comment-list");
                                                                                        $("#details").load(" #detail");
                                                                                        
                                                                                        $([document.documentElement, document.body]).animate({
                                                                                            scrollTop: $("#elementtoScrollToID").offset().top-100
                                                                                        }, 1000);
																					}	
																																										
																				}
																				});									
																		});
																
                                                                </script>
                                                                
<script type="text/javascript">

$('#submit_email').click(function(e){
    e.preventDefault();						
    var form = $("#newsletter")[0];
    var formdata = new FormData(form);
    $.ajax({
        type:'POST',																	
        url: "./ajoutEmail.php",
        cache:false,
        data: formdata,
        dataType: "json",
        processData: false,
        contentType: false,
        success:function (data){
            if (data.email == "200") {
                alert("hello word");
            }
            if(data.success == "1"){
                $(".desabonner").text("vous pouvez désormais recevoir des email sur chaque nouveau article déposer sir le site");
                $("#inlineFormInputGroup").val(" ");
                
            }	
                                                                                                
        }
        });									
});

</script>
</body>

</html>