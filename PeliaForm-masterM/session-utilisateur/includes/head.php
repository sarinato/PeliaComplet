
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
                                    <img width="60" class="rounded-circle flsh" src="../assets/img/me.jpg"
                                        alt="">
                                    <i style="color:#fff; font-size:14px;" class="fa fa-angle-down ml-2 opacity-8 "></i>
                                </a>
                                <div tabindex="-1" role="menu" aria-hidden="true"
                                    class="dropdown-menu dropdown-menu-right">
                                    <a  href="../profil/profile.php" tabindex="0" class="dropdown-item">changer profile</a>
                                  
                                    <div tabindex="-1" class="dropdown-divider"></div>
                                    <a href="../config/logout.php" tabindex="0" class="dropdown-item">Déconnecter</a>
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