<?php

$tous_articles = $bdd->prepare("SELECT * FROM contenue_article
             INNER JOIN details_article 
                ON details_article.id_details_article = contenue_article.id_details_article
                ORDER BY view DESC
                LIMIT 4");
$tous_articles->execute();
$four_articles = $tous_articles->fetchAll(PDO::FETCH_ASSOC);

$tags = $bdd->prepare("SELECT sujets FROM sujets
            INNER JOIN afectation_sujet
                ON sujets.id_sujets = afectation_sujet.id_sujet
             INNER JOIN details_article 
                ON details_article.id_details_article = afectation_sujet.id_details_article
		WHERE details_article.id_details_article=:id_details_article");
$tags->execute(array('id_details_article' =>$id_details_article));
$tags_article = $tags->fetchAll(PDO::FETCH_ASSOC);


$maladies = $bdd->prepare("SELECT * FROM sujets");
$maladies->execute();
$maladie_article = $maladies->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="col-lg-4">
                        <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Chercher par Maladie">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button"><i class="lnr lnr-magnifier"></i></button>
                                    </span>
                                </div><!-- /input-group -->
                            </aside>
                <aside class="single_sidebar_widget popular_post_widget">
                                <h3 class="widget_title">Autres Publications</h3>
                                <?php
                                foreach($four_articles as $one_article){
                                    ?>
                                <div class="media post_item">
                                    <img src="img/pill.jpg" width="35%" alt="post">
                                    <div class="media-body">
                                        <a href="more.php?article=<?php echo $one_article['id_details_article'] ?>">
                                            <h3><?php echo $one_article['title_article'] ?></h3>
                                        </a>
                                        <p><?php echo $one_article['view'] ?> vue</p>
                                    </div>
                                </div>
                                    <?php

                                }
                                ?>
                               

                        
                                <div class="br"></div>
                            </aside>
                            <aside class="single_sidebar_widget ads_widget">
                                <a href="#"><img class="img-fluid" src="img/ads.jpg" alt=""></a>
                                <div class="br"></div>
                            </aside>
                            
                            <aside class="single_sidebar_widget post_category_widget">
                                <h4 class="widget_title">Maladies</h4>
                                <ul class="list cat-list">
                                <?php
                                 foreach($maladie_article as $maladie){
                                        ?>
                                    <li>
                                        <a href="maladie.php?tags=<?php echo $maladie['id_sujets'] ?>" class="blog_btn d-flex justify-content-between">
                                            <p> <?php  echo $maladie['sujets']; ?></p>
                                            <p>37</p>
                                        </a>
                                    </li>
                                   
                                        <?php
                                    } ?>
                                    
                                   
                                </ul>
                                <div class="br"></div>
                            </aside>
                            
                            <aside class="single-sidebar-widget newsletter_widget">
                                <h4 class="widget_title">Newsletter</h4>
                                    <form id="newsletter" action="">
                                <div class="form-group d-flex flex-row">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                        </div>
                                        <input type="text" class="form-control" name="email" id="inlineFormInputGroup" placeholder="Entrer votre email"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Entrer votre email'">
                                    </div>
                                    <button name="newsletter" type="submit" id="submit_email" class="bbtns">S'abonner</button>
                                </div>
                                </form>
                                <p class="text-bottom desabonner">Vous pouvez vous désabonner à tout moment</p>
                                <div class="br"></div>
                            </aside>
                           
                            <aside class="single-sidebar-widget tag_cloud_widget">
                                <h4 class="widget_title">Tags</h4>

                                <ul class="list tags">
                                    <?php foreach($tags_article as $tags){
                                        ?>

                                    <li><a href="#"> <?php  echo $tags['sujets']; ?> </a></li>
                                   
                                        <?php
                                    } ?>
                                    

                                </ul>

                            </aside>
</div>

</div>
