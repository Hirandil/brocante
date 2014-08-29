<div class="top">
    <div class="container">
        <div class="top-inner inverted">
            <div class="header clearfix">


                <div class="branding pull-left">
                    <div class="logo">
                        <a href="/" title="Home">
                            <img width="250" height="250" src="assets/img/123Brocante.png" alt="Accueil">
                        </a>
                    </div>
                    <!-- /.logo -->


                    <!-- /.site-name -->
                </div>

                <div class="contact-top">
                    <ul class="menu nav">
                        <li class="first leaf facebook">
                            <a href="https://www.facebook.com/123brocante?fref=ts" class="facebook" target='blank_'><i>F</i></a>
                        </li>

                        <li class="leaf google-plus"><a href="https://plus.google.com/u/0/111116772030929335882/about" class="google" target='blank_'><i>g</i></a></li>

                        <li class="leaf twitter"><a href="https://twitter.com/123brocante" class="twitter" target='blank_'><i>T</i></a></li>
                    </ul>
                </div>

                <?php
                if(!isset($_SESSION['userLogin']))
                {
                ?>
                <div class="user-area pull-right">
                    <div class="menu-anonymous-container">
                        <ul id="menu-anonymous" class="nav nav-pills">
                            <li class="menu-item"><a href="/User/login"> Se connecter </a></li>
                            <li class="menu-item"><a href="/User/inscription"> S'inscrire </a></li>
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
                            <?php
                            if($_SESSION['admin'] == 1)
                            {
                            ?>
                            <li class="menu-item"><a href="/Informations/create"> Ajouter une actualité </a></li>
                            <?php
                            }
                            ?>
                            <li class="menu-item"><a href="/User/manifestations"> Mes manifestations  </a></li>
                            <li class="menu-item"><a href="/User/update"> Mon compte  </a></li>
                            <li class="menu-item"><a href="/User/logout"> Déconnexion </a></li>
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
                                <a href="/"> Accueil</a>
                            </li>

                            <li class="menu-item ">
                                <a href="/Manifestation/Rechercher-des-manifestations">Recherche Avancée</a>
                            </li>

                            <!--<li class="menu-item ">
                                <a href="#">Legislation & Organisation</a>
                            </li>-->

                           <li class="menu-item ">
                                <a href="/Informations/actualites">Actualités</a>
                            </li>
                            <?php if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1){
                            echo('<li class="menu-item">
                                <a href="/User/myusers">Gestion des membres</a>
                            </li>');
                            echo('<li class="menu-item"><a href="/Manifestation/all">Gestion des manifestations</a></li>');
                            }
                            ?>
                           <!-- <li class="menu-item ">
                                <a href="#">Bien vendre & bien acheter</a>
                            </li>-->
                        </ul>
                    </div>
                </div>

                <div class="pull-right">
                    <div class="list-property">
                        <a href="/Manifestation/Annoncer-une-manifestation">Ajouter une manifestation<div class="ribbon"><span class="icon icon-normal-circle-plus"></span></div>
                        </a>
                    </div>
                    <!-- /.list-property -->
                </div>
                <!-- /.pull-right -->

            </div>

            <div class="breadcrumb pull-left">
                <!-- Breadcrumb NavXT 4.4.0 -->
                <a title="123Brocante." href="/" class="home">123Brocante</a> &gt; <?php echo $_SESSION['ariane'] ?>
            </div>

            <!-- /.breadcrumb -->
        </div>
    </div>
</div>