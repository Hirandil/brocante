

<!-- /#content -->
<div id="footer-wrapper">

<div id="footer-top">
<div id="footer-top-inner" class="container">
<div class="row">
<div class="span4">
    <div id="mostrecentproperties_widget-3" class="widget properties">

        <h2>Manifestations ajoutées récemment</h2>

        <div class="content">
            <?php
                foreach((array)$_SESSION["last"] as $m)
                {
            ?>
            <div class="property clearfix">
                <div class="image">
                    <a href="<?php echo '/Manifestation/'.str_replace(" ","-",$m->getRegion()).'/'.str_replace(" ","-",$m->getDepartment())
                        .'/'.str_replace(" ","-",$m->getCityUrl()).'/'.str_replace(' ','-',$m->getNameUrl());?>">
                        <img width="570" height="425" src=<?php echo $m->getImage(); ?>
                             class="thumbnail-image " alt="19"/>
                    </a>
                </div>
                <!-- /.image -->

                <div class="wrapper">
                    <div class="title">
                        <h3><a href="<?php echo '/Manifestation/'.str_replace(" ","-",$m->getRegion()).'/'.str_replace(" ","-",$m->getDepartment())
                                .'/'.str_replace(" ","-",$m->getCityUrl()).'/'.str_replace(' ','-',$m->getNameUrl());?>">
                                <?php echo $m->getName(); ?>
                            </a></h3>
                    </div>
                    <!-- /.title -->

                    <div class="location"><?php echo $m->getAddress()?></div>
                    <!-- /.location -->

                    <div class="price">
                        <a href="<?php echo '/Manifestation/'.str_replace(" ","-",$m->getRegion()).'/'.str_replace(" ","-",$m->getDepartment())
                            .'/'.str_replace(" ","-",$m->getCityUrl()).'/'.str_replace(' ','-',$m->getNameUrl());?>">
                            Voir l'annonce
                        </a>
                    </div>
                    <!-- /.price -->
                </div>
                <!-- /.wrapper -->
            </div>
            <!-- /.property -->
            <?php
                }
            ?>
    </div>
</div>
</div>


<div class="span4">
    <div class="widget properties">

        <h2>Manifestations les plus consultées</h2>

        <div class="content">
            <?php
            foreach((array)$_SESSION["visited"] as $m)
            {
                ?>
                <div class="property clearfix">
                    <div class="image">
                        <a href="<?php echo '/Manifestation/'.str_replace(" ","-",$m->getRegion()).'/'.str_replace(" ","-",$m->getDepartment()).'/'.str_replace(" ","-",$m->getCityUrl()).'/'.str_replace(' ','-',$m->getNameUrl()); ?>">
                            <img width="570" height="425" src=<?php echo $m->getImage(); ?>
                            class="thumbnail-image " alt="19"/>
                        </a>
                    </div>
                    <!-- /.image -->

                    <div class="wrapper">
                        <div class="title">
                            <h3><a href="<?php echo '/Manifestation/'.str_replace(" ","-",$m->getRegion()).'/'.str_replace(" ","-",$m->getDepartment())
                                    .'/'.str_replace(" ","-",$m->getCityUrl()).'/'.str_replace(' ','-',$m->getNameUrl());?>">
                                    <?php echo $m->getName(); ?>
                                </a></h3>
                        </div>
                        <!-- /.title -->

                        <div class="location"><?php echo $m->getAddress()?></div>
                        <!-- /.location -->

                        <div class="price">
                            <a href="<?php echo '/Manifestation/'.str_replace(" ","-",$m->getRegion()).'/'.str_replace(" ","-",$m->getDepartment())
                                .'/'.str_replace(" ","-",$m->getCityUrl()).'/'.str_replace(' ','-',$m->getNameUrl());?>">
                                Voir l'annonce
                            </a>
                        </div>
                        <!-- /.price -->
                    </div>
                    <!-- /.wrapper -->
                </div>
                <!-- /.property -->
            <?php
            }
            ?>
        </div>
            <!-- /.property -->


            <!-- /.info -->
        </div>
        <!-- /.content -->


    </div>
<div class="span4">
        <div class="widget properties">

            <h2>Actualités</h2>

            <div class="content">
                <?php
                foreach((array)$_SESSION["news"] as $n)
                {
                    ?>
                    <div class="property clearfix">
                        <div class="image" style='width: 50px;'>
                            <img width="50" src="/<?php echo $n->getImage() ?>"
                                 alt="<?php echo $n->getTitle(); ?>"/>
                        </div>
                        <div class="wrapper">
                            <div class="title">
                                <h3><a href="/Informations/show/<?php echo str_replace(' ','-',$n->getTitleUrl()); ?>">
                                        <?php echo $n->getTitle(); ?>
                                    </a></h3>
                            </div>
                            <!-- /.title -->

                            <div class="location"><?php echo html_entity_decode(substr($n->getContent(),0,50))?>...</div>
                            <!-- /.location -->

                            <div class="price pull-right">
                                <a href="/Informations/show/<?php echo str_replace(' ','-',$n->getTitleUrl()); ?>">
                                    Voir
                                </a>
                            </div>
                            <!-- /.price -->
                        </div>
                        <!-- /.wrapper -->
                    </div>
                    <!-- /.property -->
                <?php
                }
                ?>
            </div>
            <!-- /.property -->
        </div>
        <!-- /.content -->
        <div class="sm-col-3">
            <div id="text-3" class="widget widget-text">
                <div class="textwidget">&copy; 2014 123Brocante, Tous droits réservés </div>
            </div>
        </div>

    </div>
</div>
</div>
<!-- /.row -->
</div>
<!-- /#footer-top-inner -->
</div>
<!-- /#footer-top -->




<!-- /#footer-wrapper -->
<script type='text/javascript' src='http://maps.googleapis.com/maps/api/js?v=3&#038;sensor=true&#038;ver=3.6'></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&amp;sensor=false"></script>
<!--<script type='text/javascript' src='/assets/js/aviators-map.js'></script>-->
<script type='text/javascript' src='/assets/js/gmap3.infobox.min.js'></script>
<script type='text/javascript' src='/assets/js/bootstrap.min.js'></script>
<script type='text/javascript' src='/assets/js/retina.js'></script>
<!--<script type='text/javascript' src='/assets/js/gmap3.clusterer.js'></script>-->
<script type='text/javascript' src='/assets/js/jquery.ezmark.js'></script>
<script type='text/javascript' src='/assets/js/carousel.js'></script>
<script type='text/javascript' src='/assets/js/jquery.bxslider.js'></script>
<script type='text/javascript' src='/assets/js/properta.js'></script>
<script type='text/javascript' src='/assets/js/jquery.bxslider.min.js'></script>
</body>
</html>
