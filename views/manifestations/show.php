<div id="content" class="clearfix">
<!-- /.map-wrapper -->
<div class="container">

<div class="row">

<div class="sidebar span8">
<h2><?php echo $manifestation->getName() ?></h2>
<div class="property clearfix">
    <div class="image">
        <a href="property-detail.html">
            <img width="570" height="425" src="../assets/img/property/19.jpg"
                 class="thumbnail-image " alt="19"/>
        </a>
    </div>
    <!-- /.image -->

    <div class="wrapper">
        <div class="title">
            <h3><a href="property-detail.html">
                    <?php echo $manifestation->getAddress() ?>
                </a></h3>
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
    <h5 style=" border-bottom: 1px solid #f69679; ">Localisation</h5>
    <div class="area">
        <i class="icon icon-normal-cursor-scale-up"></i>
        <?php echo $manifestation->getAddress() ?>, <?php echo $manifestation->getCity() ?>, <?php echo $manifestation->getRegion() ?>, <?php echo $manifestation->getDepartment() ?>
    </div>
    <div class="bedrooms">
        <i class="icon icon-normal-bed"></i>
        2
    </div>
    <br>
    <h5 style=" border-bottom: 1px solid #f69679; ">Horaires</h5>
    <div class="area">
        <i class="icon icon-normal-cursor-scale-up"></i>
        <?php echo $manifestation->getSchedule() ?>
    </div>
    <br>
    <h5 style=" border-bottom: 1px solid #f69679; ">Site web de l'organisateur</h5>
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
    <h5 style=" border-bottom: 1px solid #f69679; ">Commentaires</h5>
    <div class="area">
        <i class="icon icon-normal-cursor-scale-up"></i>
        800m<sup>2</sup>
    </div>
    <br>
    <h5 style=" border-bottom: 1px solid #f69679; ">Prix d'entrée</h5>
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
    <h5 style=" border-bottom: 1px solid #f69679; ">Nombre d'exposants</h5>
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
    <h5 style=" border-bottom: 1px solid #f69679; ">Tarif pour exposant</h5>
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
    <h5 style=" border-bottom: 1px solid #f69679; ">Parking à proximité</h5>
    <div class="area">
        <i class="icon icon-normal-cursor-scale-up"></i>
        800m<sup>2</sup>
    </div>

</div>

<div id="agencies_widget-2" class="widget agencies">


</div></div>
<!-- /#sidebar -->

<div id="main" class="span4 single-property">



<div class="property-detail">

<div class="row">



</div>






        <h2>Brocantes du département</h2>

        <div id="property-map"
             style="position: relative; background-color: rgb(229, 227, 223); overflow: hidden; -webkit-transform: translateZ(0);">
        </div>
<br>

    <div class="property-filter widget" style="background-color: #003f4f;">
        <div class="content">
            <p style="color:white;border-bottom: 1px; border-style:solid">S'inscrire à la newsletter</p>
            <p style="color:white; font-size:75%;">Je veux recevoir une alerte par e-mail pour toutes les brocantes de la région Alsace</p>
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
                            <input type="radio" name="" value="male"><p style="color:white; font-size:75%;margin-left: 10%;">la veille</p>
                            <input type="radio" name="" value="female"><p style="color:white; font-size:75%;margin-left: 10%;">1 semaine à l'avance</p>
                            <input type="radio" name="" value="male"><p style="color:white; font-size:75%;margin-left: 10%;">1 mois à l'avance</p>
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

        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                function LoadMapProperty() {
                    var locations = new Array(
                        [38.951399, -76.958463]
                    );
                    var types = new Array(
                        'family-house'
                    );
                    var markers = new Array();
                    var plainMarkers = new Array();

                    var mapOptions = {
                        center: new google.maps.LatLng(38.951399, -76.958463),
                        zoom: 14,
                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                        scrollwheel: false
                    };

                    var map = new google.maps.Map(document.getElementById('property-map'), mapOptions);

                    $.each(locations, function (index, location) {
                        var marker = new google.maps.Marker({
                            position: new google.maps.LatLng(location[0], location[1]),
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