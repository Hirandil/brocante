


<div class="top">
    <div class="container">
        <div class="top-inner inverted">
            <div class="header clearfix">
                <div id="language-switch" class="languages">
                    <div id="lang_sel_list" class="lang_sel_list_horizontal">
                        <ul>
                            <li class="language-en">
                                <a href="#" class="language-active">
                                    <img class="iclflag"
                                         src="assets/img/flags/en.png" alt="en"
                                         title="English"/>
                                </a>
                            </li>
                            <li class="language-fr">
                                <a href="#">
                                    <img class="language-flag"
                                         src="assets/img/flags/fr.png" alt="fr"
                                         title="Français"/>
                                </a>
                            </li>
                            <li class="language-de">
                                <a href="#">
                                    <img class="language-flag"
                                         src="assets/img/flags/de.png" alt="de"
                                         title="Deutsch"/>
                                </a>
                            </li>
                            <li class="language-it">
                                <a href="#">

                                    <img class="language-flag"
                                         src="assets/img/flags/it.png" alt="it"
                                         title="Italiano"/>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="branding pull-left">
                    <div class="logo">
                        <a href="index.php" title="Home">
                            <img src="assets/img/logo.png" alt="Home">
                        </a>
                    </div>
                    <!-- /.logo -->

                    <div class="site-name">
                        <a href="index.php" title="Home" class="brand">
                            Brocante
                        </a>
                    </div>
                    <!-- /.site-name -->
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
                            <li class="menu-item"><a href="/index.php"> Ajouter une manifestation  </a></li>
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
<!--                                <ul class="sub-menu">-->
<!--                                    <li class="menu-item"><a href="frontpage-slider.html">Revolution slider</a></li>-->
<!--                                    <li class="menu-item"><a href="frontpage-map-vertical.html.html">Homepage - Vertical filter</a></li>-->
<!--                                    <li class="menu-item"><a href="index.php">Homepage - Horizontal filter</a></li>-->
<!--                                </ul>-->
                            </li>

                            <li class="menu-item ">
                                <a href="/index.php?section=Manifestation&action=add">Annoncer un évènement</a>

<!--                                <ul class="sub-menu">-->
<!--                                    <li class="menu-item"><a href="properties/default.htm">Properties listing</a></li>-->
<!--                                    <li class="menu-item"><a href="properties/property-detail.html">Property detail</a></li>-->
<!---->
<!--                                    <li class="menu-item"><a href="agencies/default.htm">Agencies listing</a></li>-->
<!--                                    <li class="menu-item"><a href="agencies/agency-detail.html">Agencies detail</a></li>-->
<!---->
<!--                                    <li class="menu-item"><a href="agents/default.htm">Agents listing</a></li>-->
<!--                                    <li class="menu-item"><a href="agents/agent-detail.html">Agent detail</a></li>-->
<!---->
<!--                                    <li class="menu-item"><a href="register.html">Register</a></li>-->
<!--                                    <li class="menu-item"><a href="login.html">Login</a></li>-->
<!--                                </ul>-->
                            </li>

                            <li class="menu-item ">
                                <a href="/index.php?section=Manifestation&action=search">Recherche Avancée</a>
<!--                                <ul class="sub-menu">-->
<!--                                    <li class="menu-item"><a href="404.html">404 page</a></li>-->
<!--                                    <li class="menu-item"><a href="faq.html">FAQ page</a></li>-->
<!--                                    <li class="menu-item"><a href="pricing.html">Pricing</a></li>-->
<!--                                </ul>-->
                            </li>

                            <li class="menu-item ">
                                <a href="#">Legislation & Organisation</a>
<!--                                <ul class="sub-menu">-->
<!--                                    <li class="menu-item"><a href="submissions/default.htm">List submissions</a></li>-->
<!--                                    <li class="menu-item"><a href="submissions/add.html">Add submission</a></li>-->
<!--                                    <li class="menu-item"><a href="submissions/edit.html">Edit submission</a></li>-->
<!--                                </ul>-->
                            </li>

                            <li class="menu-item ">
                                <a href="#">Bien vendre & bien acheter</a>
<!--                                <ul class="sub-menu">-->
<!--                                    <li class="menu-item"><a href="templates/default-left.html">Left sidebar</a></li>-->
<!--                                    <li class="menu-item"><a href="templates/default-right.html">Right sidebar</a></li>-->
<!--                                    <li class="menu-item"><a href="templates/default-full.html">Full width</a></li>-->
<!--                                </ul>-->
                            </li>

<!--                            <li class="menu-item">-->
<!--                                <a href="contact.html">Aide</a>-->
<!--                            </li>-->
                        </ul>
                    </div>
                </div>

                <div class="pull-right">
                    <div class="list-property">
                        <a href="manifestations/default.htm">Aide<div class="ribbon"><span class="icon icon-normal-circle-plus"></span></div>
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