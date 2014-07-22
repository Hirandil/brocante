


<div class="top">
    <div class="container">
        <div class="top-inner inverted">
            <div class="header clearfix">


                <div class="branding pull-left">
                    <div class="logo">
                        <a href="index.php" title="Home">
                            <img src="assets/img/logo.png" alt="Home">
                        </a>
                    </div>
                    <!-- /.logo -->

                    <div class="site-name">
                        <a href="index.php" title="Home" class="brand">
                            123Brocante
                        </a>
                    </div>
                    <!-- /.site-name -->
                </div>

                <div class="contact-top">
                    <ul class="menu nav">
                        <li class="first leaf facebook">
                            <a href="http://www.facebook.com" class="facebook"><i>F</i></a>
                        </li>

                        <li class="leaf google-plus"><a href="http://plus.google.com" class="google"><i>g</i></a></li>

                        <li class="leaf twitter"><a href="http://www.twitter.com" class="twitter"><i>T</i></a></li>
                    </ul>
                </div>

                <?php
                if(!isset($_SESSION['userLogin']))
                {
                ?>
                <div class="user-area pull-right">
                    <div class="menu-anonymous-container">
                        <ul id="menu-anonymous" class="nav nav-pills">
                            <li class="menu-item"><a href="/index.php?section=User&action=login"> Se connecter </a></li>
                            <li class="menu-item"><a href="/index.php?section=User&action=register"> S'inscrire </a></li>
                        </ul>
                    </div>
                </div>
                <?php
                }
                else
                {
                ?>
                <div class="user-area pull-right">
                    <div class="menu-anonymous-container">
                        <ul id="menu-anonymous" class="nav nav-pills">
                            <li class="menu-item"><a href="/index.php?section=Manifestation&action=add"> Ajouter une manifestation  </a></li>
                            <li class="menu-item"><a href="/index.php?section=User&action=manifestations"> Mes manifestations  </a></li>
                            <li class="menu-item"><a href="/index.php?section=User&action=update"> Mon compte  </a></li>
                            <li class="menu-item"><a href="/index.php?section=User&action=logout"> Déconnexion </a></li>
                        </ul>
                    </div>
                </div>
                <?php
                }
                ?>
                <!-- /.user-area -->
            </div>
            <!-- /.header --><div class="navigation navbar clearfix">
                <div class="pull-left">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <div class="nav-collapse collapse">
                        <ul id="menu-main" class="nav">
                            <li class="menu-item active-menu-item ">
                                <a href="index.php"> Accueil</a>
                            </li>

<!--                            <li class="menu-item ">-->
<!--                                <a href="/index.php?section=Manifestation&action=add">Annoncer un évènement</a>-->
<!--                            </li>-->

                            <li class="menu-item ">
                                <a href="/index.php?section=Manifestation&action=search">Recherche Avancée</a>
                            </li>

                            <li class="menu-item ">
                                <a href="#">Legislation & Organisation</a>
                            </li>

                            <li class="menu-item ">
                                <a href="#">Actualités</a>
                            </li>

                            <li class="menu-item ">
                                <a href="#">Bien vendre & bien acheter</a>
                            </li>

<!--                            <li class="menu-item">-->
<!--                                <a href="contact.html">Aide</a>-->
<!--                            </li>-->
                        </ul>
                    </div>
                </div>

                <div class="pull-right">
                    <div class="list-property">
                        <a href="/index.php?section=Manifestation&action=add">Ajouter une manifestation<div class="ribbon"><span class="icon icon-normal-circle-plus"></span></div>
                        </a>
                    </div>
                    <!-- /.list-property -->
                </div>
                <!-- /.pull-right -->

            </div>

            <div class="breadcrumb pull-left">
                <!-- Breadcrumb NavXT 4.4.0 -->
                <a title="Brocante." href="index.php" class="home">Brocante</a> &gt;
            </div>

            <!-- /.breadcrumb -->
        </div>
    </div>
</div>