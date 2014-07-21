

<!-- /#content -->
<div id="footer-wrapper">

<div id="footer-top">
<div id="footer-top-inner" class="container">
<div class="row">
<div class="span6">
    <div id="mostrecentproperties_widget-3" class="widget properties">

        <h2>Les plus récentes</h2>

        <div class="content">
            <?php
                foreach($_SESSION["soon"] as $m)
                {
            ?>
            <div class="property clearfix">
                <div class="image">
                    <a href="index.php?section=Manifestation&action=show&id=<?php echo $m->getId(); ?>">
                        <img width="570" height="425" src=<?php echo $m->getImage(); ?>
                             class="thumbnail-image " alt="19"/>
                    </a>
                </div>
                <!-- /.image -->

                <div class="wrapper">
                    <div class="title">
                        <h3><a href="index.php?section=Manifestation&action=show&id=<?php echo $m->getId(); ?>">
                                <?php echo $m->getName(); ?>
                            </a></h3>
                    </div>
                    <!-- /.title -->

                    <div class="location"><?php echo $m->getAddress()?></div>
                    <!-- /.location -->

                    <div class="price">
                        Contacter nous
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


<div class="span6">
    <div id="featuredproperties_widget-2" class="widget properties">

        <h2>Les plus visitées</h2>

        <div class="content">
            <?php
            foreach($_SESSION["soon"] as $m)
            {
                ?>
                <div class="property clearfix">
                    <div class="image">
                        <a href="index.php?section=Manifestation&action=show&id=<?php echo $m->getId(); ?>">
                            <img width="570" heix   ght="425" src=<?php echo $m->getImage(); ?>
                            class="thumbnail-image " alt="19"/>
                        </a>
                    </div>
                    <!-- /.image -->

                    <div class="wrapper">
                        <div class="title">
                            <h3><a href="index.php?section=Manifestation&action=show&id=<?php echo $m->getId(); ?>">
                                    <?php echo $m->getName(); ?>
                                </a></h3>
                        </div>
                        <!-- /.title -->

                        <div class="location"><?php echo $m->getAddress()?></div>
                        <!-- /.location -->

                        <div class="price">
                            Contacter nous
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

            <div class="property-info clearfix">
                <div class="area">
                    <i class="icon icon-normal-cursor-scale-up"></i>
                    680m<sup>2</sup>
                </div>
                <!-- /.area -->

                <div class="bedrooms">
                    <i class="icon icon-normal-bed"></i>
                    3
                </div>
                <!-- /.bedrooms -->

                <div class="bathrooms">
                    <i class="icon icon-normal-shower"></i>
                    2
                </div>
                <!-- /.bathrooms -->
            </div>
            <!-- /.info -->
        </div>
        <!-- /.content -->
        <div class="sm-col-3">
        <div id="text-3" class="widget widget-text">
            <div class="textwidget">&copy; 2014 Brocante, Tous droits réservés </div>
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
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=false"></script>
<script type='text/javascript' src='assets/js/aviators-map.js'></script>
<script type='text/javascript' src='assets/js/gmap3.infobox.min.js'></script>
<script type='text/javascript' src='assets/js/bootstrap.min.js'></script>
<script type='text/javascript' src='assets/js/retina.js'></script>
<script type='text/javascript' src='assets/js/gmap3.clusterer.js'></script>
<script type='text/javascript' src='assets/js/jquery.ezmark.js'></script>
<script type='text/javascript' src='assets/js/carousel.js'></script>
<script type='text/javascript' src='assets/js/jquery.bxslider.js'></script>
<script type='text/javascript' src='assets/js/properta.js'></script>
<script type='text/javascript' src='assets/js/jquery.bxslider.min.js'></script>
</body>
</html>
