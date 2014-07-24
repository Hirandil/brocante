<div id="content" class="clearfix">
<!-- /.map-wrapper -->
<div class="container">

<div class="row">

<div class="sidebar span8">
<h1 class="titleH1"><?php echo $manifestation->getName() ?></h1>
<div class="property clearfix">
    <div class="image">
            <img width="570" height="425" src="<?php echo $manifestation->getImage()?>"
                 class="thumbnail-image " alt="19"/>
        </a>
    </div>
    <!-- /.image -->

    <div class="wrapper">
        <div class="title">
            <h3>
                    <?php echo $manifestation->getAddress() ?>
                </h3>
        </div>
        <!-- /.title -->

        <div class="location"><?php echo $manifestation->getCity() ?></div>
        <!-- /.location -->

        <div class="price">
            Contacter l'organisateur
        </div>
        <!-- /.price -->
    </div>
    <!-- /.wrapper -->
</div>
<div class="property-info clearfix">
    <h5  class="showH5">Localisation</h5>
    <div class="area" >
        <i class="icon icon-normal-cursor-scale-up"></i>
        <?php echo $manifestation->getAddress().",".$manifestation->getCity().",".$manifestation->getRegion().",".$manifestation->getDepartment() ?>
    </div>
<!--    <div class="bedrooms">-->
<!--        <i class="icon icon-normal-bed"></i>-->
<!--        2-->
<!--    </div>-->
    <br>
    <h5 class="showH5">Horaires</h5>
    <div class="area">
        <i class="icon icon-normal-cursor-scale-up"></i>
        <?php echo $manifestation->getSchedule() ?>
    </div>
    <br>
    <h5 class="showH5">Site web de l'organisateur</h5>
    <div class="area">
        <i class="icon icon-normal-cursor-scale-up"></i>
        <?php
        if($manifestation->getSite()=='')
            echo 'Non renseigné';
        else
            echo $manifestation->getSite();
        ?>
    </div>
    <br>
    <h5 class="showH5">Commentaires</h5>
    <div class="area">
        <i class="icon icon-normal-cursor-scale-up"></i>
        Non renseigné
    </div>
    <br>
    <h5 class="showH5">Prix d'entrée</h5>
    <div class="area">
        <i class="icon icon-normal-cursor-scale-up"></i>
        <?php
        if($manifestation->getPrice()=='')
            echo 'Non renseigné';
        else
            echo $manifestation->getPrice();
        ?>
    </div>
    <br>
    <h5 class="showH5">Nombre d'exposants</h5>
    <div class="area">
        <i class="icon icon-normal-cursor-scale-up"></i>
        <?php
        if($manifestation->getExhibitorNumber()=='')
            echo 'Non renseigné';
        else
            echo $manifestation->getExhibitorNumber();
        ?>
    </div>
    <br>
    <h5 class="showH5">Tarif pour exposant</h5>
    <div class="area">
        <i class="icon icon-normal-cursor-scale-up"></i>
        <?php
        if($manifestation->getExhibitorPrice()=='')
            echo 'Non renseigné';
        else
            echo $manifestation->getExhibitorPrice();
        ?>
    </div>
    <br>
    <h5 class="showH5">Parking à proximité</h5>
    <div class="area">
        <i class="icon icon-normal-cursor-scale-up"></i>
        Non renseigné
    </div>

</div>

<div id="agencies_widget-2" class="widget agencies">


</div></div>
<!-- /#sidebar -->

<div id="main" class="span4 single-property">



<div class="property-detail">

<div class="row">



</div>






        <h2>Carte des brocantes du département</h2>

        <div id="property-map"
             style="position: relative; background-color: rgb(229, 227, 223); overflow: hidden; -webkit-transform: translateZ(0);">
        </div>
        <br>

    <div class="alentourBlock">
        <div class="content" style="margin-bottom: 20px">
            <p style="border-bottom: 1px; border-style:solid">Brocantes aux alentours</p>
            <ul>
                <?php
                foreach($nearTowns as $nearTown)
                {
                    ?>
                    <li><a href="index.php?section=Manifestation&action=show&id=<?php echo $nearTown->getId(); ?>"> <?php echo $nearTown->getName() ?> à <?php echo $nearTown->getCity() ?></a></li>
                <?php
                }
                ?>
            </ul>
        </div>
        <!-- /.content -->
    </div>

<!--            <li>> Brocante ville 2</li>-->
<!--            <li>> Brocante ville 3</li>-->

    <div class="alentourBlock" >
        <div class="content" style="margin-bottom: 20px">
            <p style="border-bottom: 1px; border-style:solid">Abonnez-vous aux alertes</p>
            <p style="font-size:75%;">Je veux recevoir une alerte par e-mail pour toutes les brocantes de la région <?php echo $manifestation->getDepartment() ?></p>
            <form method="get" action="javascript:void(0);">

                    <div class="type control-group">
                        <div class="controls">
                            <input type="text" id="departmentGoogle" name="department" placeholder="Taper votre adresse e-mail">
                        </div>
                        <!-- /.controls -->
                    </div>
                    <p style="color:white; font-size:75%;">Je veux être alerté :</p>
                    <div class="control-group">
                        <div class="controls">
                            <input type="radio" name="" value="male"><p style="font-size:75%;margin-left: 10%;">la veille</p>
                            <input type="radio" name="" value="female"><p style="font-size:75%;margin-left: 10%;">1 semaine à l'avance</p>
                            <input type="radio" name="" value="male"><p style="font-size:75%;margin-left: 10%;">1 mois à l'avance</p>
                        </div>
                    </div>
                    <!-- /.control-group -->
                    <div class="form-actions">
                        <a href="/index.php?section=User&action=register" class="btn btn-primary btn-large" style="background-color: #f69679"> S'inscrire !</a>
                    </div>


                <!-- /.form-actions -->
            </form>
        </div>
        <!-- /.content -->
    </div>
<div class="alentourBlock">
    <div class="content" style="margin-bottom: 20px">
        <p style="border-bottom: 1px; border-style:solid">Brocantes du département</p>
        <ul>
            <li>Brocante aujourd'hui</li>
            <li>Brocante demain</li>
            <li>Brocante Week end</li>
            <li>Brocante Juin 2014</li>
        </ul>
    </div>
    <!-- /.content -->
</div>

        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                function LoadMapProperty() {
                    var geocoder;
                    geocoder = new google.maps.Geocoder();
                    var locations = new Array(
                        [38.951399, -76.958463]
                    );
                    var types = new Array(
                        'family-house'
                    );
                    var markers = new Array();
                    var plainMarkers = new Array();

                    var results = new Array();
                    geocoder.geocode( { 'address': '<?php echo $manifestation->getAddress() ?>'}, function(results, status) {
                        /* Si l'adresse a pu être géolocalisée */
                        if (status == google.maps.GeocoderStatus.OK) {
                            console.log(results)
                            results = results;

                            var mapOptions = {
                                center: new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng()),
                                zoom: 14,
                                mapTypeId: google.maps.MapTypeId.ROADMAP,
                                scrollwheel: false
                            };

                            var map = new google.maps.Map(document.getElementById('property-map'), mapOptions);

                            $.each(locations, function (index, location) {
                                var marker = new google.maps.Marker({
                                    position: new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng()),
                                    map: map,
                                    icon: '../assets/img/marker-transparent.png'
                                });

                                var myOptions = {
                                    draggable: true,
                                    content: '<div class="marker ' + types[index] + '"><div class="marker-inner"></div></div>',
                                    disableAutoPan: true,
                                    pixelOffset: new google.maps.Size(-21, -58),
                                    position: new google.maps.LatLng(location[0], location[1]),
                                    closeBoxURL: "",
                                    isHidden: false,
                                    // pane: "mapPane",
                                    enableEventPropagation: true
                                };
                                marker.marker = new InfoBox(myOptions);
                                marker.marker.isHidden = false;
                                marker.marker.open(map, marker);
                                markers.push(marker);
                            });

                            google.maps.event.addListener(map, 'zoom_changed', function () {
                                $.each(markers, function (index, marker) {
                                    marker.infobox.close();
                                });
                            });

                        }
                    });
                    //console.log(results)






                }

                google.maps.event.addDomListener(window, 'load', LoadMapProperty);

                var dragFlag = false;
                var start = 0, end = 0;

                function thisTouchStart(e) {
                    dragFlag = true;
                    start = e.touches[0].pageY;
                }

                function thisTouchEnd() {
                    dragFlag = false;
                }

                function thisTouchMove(e) {
                    if (!dragFlag) return;
                    end = e.touches[0].pageY;
                    window.scrollBy(0, ( start - end ));
                }

                document.getElementById("property-map").addEventListener("touchstart", thisTouchStart, true);
                document.getElementById("property-map").addEventListener("touchend", thisTouchEnd, true);
                document.getElementById("property-map").addEventListener("touchmove", thisTouchMove, true);
            });

        </script>



</div>

</div>
<!-- /#main -->

</div>
<!-- /.row -->
</div>
<!-- /.container -->

</div>