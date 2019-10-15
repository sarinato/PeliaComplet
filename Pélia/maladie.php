<?php
require("../session-utilisateur/config/connect.php");
$id_details_article = (isset($_GET['article'])) ? $_GET['article'] : 0;

$id_sujets = (isset($_GET['tags'])) ? $_GET['tags'] : 0;

$articles = $bdd->prepare("SELECT * FROM contenue_article
            INNER JOIN details_article
                ON details_article.id_details_article = contenue_article.id_details_article
            INNER JOIN afectation_sujet 
                ON details_article.id_details_article = afectation_sujet.id_details_article 
                INNER JOIN sujets
                ON sujets.id_sujets = afectation_sujet.id_sujet
                WHERE sujets.id_sujets=:id_sujets");
$articles->execute(array('id_sujets' =>$id_sujets));

$article = $articles->fetchAll(PDO::FETCH_ASSOC);
function dateToFrench( $format, $date) {
    $english_days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
    $french_days = array('lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche');
    $english_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    $french_months = array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
    return str_replace($english_months, $french_months, str_replace($english_days, $french_days, date($format, strtotime($date) ) ) );
}
?>
<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/pelia.png" type="image/png">
    <title>Pélia</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="vendors/linericon/style.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
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

  
    <!--================ End Home Banner Area =================-->
    <!--================Blog Area =================-->
    <section style="padding-top:10%" class="blog_area blog_categorie_area list-wrapper">
        <div class="container">
            <div class="row ">
                <div class="col-lg-8 ">
                    <div class="blog_left_sidebar">
                    <div  class="pages wow animated activate ">
                        <?php  
                        foreach($article as $this_article){
                            ?>
                        <article class="row blog_item">
                            <div class="container col-md-9">
                                
                                <h2 class="h2"><?php  echo $this_article['title_article'] ?></h2>
                                <div class="col-lg-12 plas">
                                    <div class="blog_info text-right">
                                        <ul class="blog_meta list">
                                            <li><i class="lnr lnr-user"></i><a href="#">Pélia</a></li>
                                            <li><i class="lnr lnr-calendar-full"></i><a href="#"><?php echo dateToFrench("j F, o", $this_article['date_modification']); ?></a></li>
                                            <li><i class="lnr lnr-eye"></i><a href="#"><?php echo $this_article['view'];  ?> Views</a></li>
                                        </ul>
                                    </div>
                                </div>
                                 
                                <div class="feature-img container">
                                        <img class="" width="100%" src="img/pill.jpg" alt="">
                                    </div>
                                    <div class=" col-md-12  blog_details">
                                    <p class="excert">
                                    <?php  echo $this_article['description_article'] ?>
                                    </p>
                                    <a href="more.php?article=<?php  echo $this_article['id_details_article'] ?>" class="blog_btn">Lire la suite</a>
                                </div>
                            </div>
                               
                                
                        </article>
                            <?php
                        }
                        ?>
                        
                        </div>   
                     
                        <nav class="blog-pagination justify-content-center d-flex">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a href="#" class="page-link" aria-label="Previous">
                                            <span aria-hidden="true">
                                                <span class="lnr lnr-chevron-left"></span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="page-item"><a href="#" class="page-link">01</a></li>
                                    <li class="page-item "><a href="#" class="page-link">02</a></li>
                                    <li class="page-item"><a href="#" class="page-link">03</a></li>
                                    <li class="page-item"><a href="#" class="page-link">04</a></li>
                                    <li class="page-item"><a href="#" class="page-link">09</a></li>
                                    <li class="page-item">
                                        <a href="#" class="page-link nxt" aria-label="Next">
                                            <span aria-hidden="true">
                                                <span class="lnr lnr-chevron-right"></span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                    </div>
                </div>
                <?php
    include("aside.php");
               ?>
            </div>
            
        </div>
        
    </section>
    


    <!--================Footer Area =================-->
    <?php 
                include "footer.php"
                ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.js'></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <script src="js/theme.js"></script>
    <script src="js/pagination.js"></script>
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
                $("#inlineFormInputGroup").val(" ");
                $(".desabonner").text("vous pouvez désormais recevoir des email sur chaque nouveau article déposer sir le site");

            }	
                                                                                                
        }
        });									
});

</script>
</body>

</html>