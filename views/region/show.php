<div id="content" class="clearfix">
<!-- /.map-wrapper -->
<div class="container">

<div class="row">

    <div class="container">
        <div id="main" class="span12">
            <br>

            <div class=" filter-horizontal" style=" text-align: center;">
                <div class="content">
                    <form method="get" action="javascript:void(0);" class="form-inline map-filtering">
                        <!-- /.property-types -->
                        <div class="general">
                            <select name="filter_location" id="inputLocation-" class="location">
                                <option value="">Tout les types de manifestations</option>
                                <?php

                                foreach($types as $t)
                                {
                                    ?>
                                    <option value="<?php echo $t->getId() ?>" > <?php echo $t->getLibelle() ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                            <select name="filter_bedrooms" id="inputBeds-" class="beds ">
                                <option value="">Dates</option>
                                <option value="">Aujourd'hui</option>
                                <option value="">Demain</option>
                                <option value="">Ce week end</option>
                            </select>
                            <select id="selectDepartment" name="department">
                                <option value="null">Séléctionner une région</option>
                                <?php
                                foreach((array)$regions as $d)
                                {
                                    ?>
                                    <option value="<?php echo $d->getName()?>" id="<?php echo $d->getId()?>"><?php echo $d->getName()?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <button class="btn btn-primary btn-large">Filtrer!</button>
                        </div>
                        <!-- /.general -->
                    </form>
                </div>
                <!-- /.content -->
            </div>
            <!-- /.property-filter -->                        </div>
        <!-- /.span12 -->
    </div>
    <!-- /.row -->
</div>
<div class="container">
<div class="row">
<div class="sidebar span8">
    <h1 class="page-header"><?php echo $region->getName() .' -- '
            . sizeof($manifestations) .
            ' résultat(s) ont été trouvé(s). Vous pouvez aussi rechercher pour la région
            <a href="/Manifestation/region/' . $region->getId() . '">' . $region->getName() . '</a>' ?></h1>
    <br>
    <?php
    if (sizeof((array)$manifByDate) != 0) {
        ?>
        <h2>Les brocantes à la une</h2>
    <?php
    }
    ?>

    <?php
    foreach ((array)$manifByDate as $d)
    {
        foreach ((array)$d as $manifestation)
        {
            ?>
            <div class="property clearfix">
                <div class="image">
                    <a href="/Manifestation/show/<?php echo $manifestation->getId() ?>">
                        <img width="570" height="425" src="/<?php echo $manifestation->getImage() ?>"
                             class="thumbnail-image " alt="19"/>
                    </a>
                </div>
                <!-- /.image -->

                <div class="wrapper">
                    <div class="title">
                        <h2>
                            <a href="/Manifestation/show/<?php echo $manifestation->getId() ?>"><?php echo $manifestation->getName() ?></a>
                        </h2>
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
            <br>

        <?php
        }
    }
    ?>
    <h2>Calendrier des brocantes sur le departement : <?php echo $region->getName() ?></h2>

    <div class="property clearfix" style="background: #f69679;">

        <div class="wrapper">
            <div class="title">
                <h3>
                    <?php
                    date_default_timezone_set('Europe/Paris');
                    setlocale(LC_TIME, 'fr_FR.utf8','fra');
                    //                    $currentDate = date("F j, Y");
                    echo strftime("%A %d %B %Y")
                    ?>
                </h3>
            </div>
            <!-- /.title -->
            <!-- /.price -->
        </div>
        <!-- /.wrapper -->
    </div>
    <div class="property-info clearfix">
        <?php
        foreach ((array)$manifByDate as $d)
        {
            foreach ((array)$d as $manifestation)
            {
                ?>
                <h5 class="showH5"><?php echo $manifestation->getName() ?></h5>

                <div class="area">
                    <i class="icon icon-normal-cursor-scale-up"></i>
                    <?php echo $manifestation->getAddress() ?>
                </div>
                <br>
            <?php
            }
        }
        ?>

    </div>
    <div class="property clearfix" style="background: #f69679;">

        <div class="wrapper">
            <div class="title">
                <h3>
                    <?php
                    $currentDate = time() +(24 * 60 * 60) ;
                    echo strftime("%A %d %B %Y",$currentDate);
                    ?>
                </h3>
            </div>
            <!-- /.title -->
            <!-- /.price -->
        </div>
        <!-- /.wrapper -->
    </div>
    <div class="property-info clearfix">
        <?php
        foreach ((array)$manifByDate as $d)
        {
            foreach ((array)$d as $manifestation)
            {
                ?>
                <h5 class="showH5"><?php echo $manifestation->getName() ?></h5>

                <div class="area">
                    <i class="icon icon-normal-cursor-scale-up"></i>
                    <?php echo $manifestation->getAddress() ?>
                </div>
                <br>
            <?php
            }
        }
        ?>

    </div>
    <div class="property clearfix" style="background: #f69679;">

        <div class="wrapper">
            <div class="title">
                <h3>
                    <h3>
                        <?php
                        $currentDate = time() +(48 * 60 * 60) ;
                        echo strftime("%A %d %B %Y",$currentDate);
                        ?>
                    </h3>
                </h3>
            </div>
            <!-- /.title -->
            <!-- /.price -->
        </div>
        <!-- /.wrapper -->
    </div>
    <div class="property-info clearfix">
        <?php
        foreach ((array)$manifByDate as $d)
        {
            foreach ((array)$d as $manifestation)
            {
                ?>
                <h5 class="showH5"><?php echo $manifestation->getName() ?></h5>

                <div class="area">
                    <i class="icon icon-normal-cursor-scale-up"></i>
                    <?php echo $manifestation->getAddress() ?>
                </div>
                <br>
            <?php
            }
        }
        ?>

    </div>

    <div id="agencies_widget-2" class="widget agencies">


    </div>
</div>
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
                <p style="border-bottom: 1px; border-style:solid">Abonnez-vous aux alertes</p>

                <p style="font-size:75%;">Je veux recevoir une alerte par e-mail pour toutes les brocantes de la
                    région ></p>

                <form method="get" action="javascript:void(0);">

                    <div class="type control-group">
                        <div class="controls">
                            <input type="text" id="departmentGoogle" name="department"
                                   placeholder="Taper votre adresse e-mail">
                        </div>
                        <!-- /.controls -->
                    </div>
                    <p style="color:white; font-size:75%;">Je veux être alerté :</p>

                    <div class="control-group">
                        <div class="controls">
                            <input type="radio" name="" value="male">

                            <p style="font-size:75%;margin-left: 10%;">la veille</p>
                            <input type="radio" name="" value="female">

                            <p style="font-size:75%;margin-left: 10%;">1 semaine à l'avance</p>
                            <input type="radio" name="" value="male">

                            <p style="font-size:75%;margin-left: 10%;">1 mois à l'avance</p>
                        </div>
                    </div>
                    <!-- /.control-group -->
                    <div style=" text-align: center; ">
                        <a href="/User/register" class="btn btn-primary btn-large" style="background-color: #f69679">
                            S'inscrire !</a>
                    </div>


                    <!-- /.form-actions -->
                </form>
            </div>
            <!-- /.content -->
        </div>

        <div class="alentourBlock">
            <div class="content" style="margin-bottom: 20px">
                <p style="border-bottom: 1px; border-style:solid">Brocantes de la région</p>
                <ul>
                    <?php
                    foreach ($nearRegion as $nearRegion) {
                        ?>
                        <li><a href="index.php?section=Manifestation&action=show&id=<?php echo $nearRegion->getId(); ?>">
                                <img width="40" height="35" src="/<?php echo $nearRegion->getImage() ?>"
                                     class="thumbnail-image " alt="Image"/>
                                <?php echo $nearRegion->getName() ?> à <?php echo $nearRegion->getCity() ?></a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <!-- /.content -->
        </div>

        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                var locations = [
                    <?php
                    foreach ((array)$manifByDate as $d)
                    {
                        foreach ((array)$d as $manifestation)
                        {
                     ?>
                    ['<?php echo $manifestation->getName() ?>','<?php echo $manifestation->getAddress() ?>','<?php echo $manifestation->getid() ?>'],
                    <?php
        }
    }
    ?>
                ]

//                var locations = [
//
//                    ['Bondi Beach', '33 Rue de saint dié'],
//                    ['Coogee Beach', '932 Bay Street, Toronto, ON M5S 1B1'],
//                    ['Cronulla Beach', '61 Town Centre Court, Toronto, ON M1P'],
//                    ['Manly Beach', '832 Bay Street, Toronto, ON M5S 1B1'],
//                    ['Maroubra Beach', '606 New Toronto Street, Toronto, ON M8V 2E8']
//                ];

                var map = new google.maps.Map(document.getElementById('property-map'), {
                    zoom: 11,
                    center: new google.maps.LatLng(43.253205,-80.480347),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });


                var geocoder = new google.maps.Geocoder();

                var marker, i;

                for (i = 0; i < locations.length; i++) {
                    j = i;
                    geocoder.geocode( { 'address': locations[i][1]}, function(results, status) {
                        //alert(status);
                        if (status == google.maps.GeocoderStatus.OK) {

                            //alert(results[0].geometry.location);
                            map.setCenter(results[0].geometry.location);
                            marker = new google.maps.Marker({
                                position: results[0].geometry.location,
                                map: map,
                                title: locations[j][0]
                            });

                            google.maps.event.addListener(marker, 'click', function(marker,i) {
                                console.log(locations[j][2])
                                var infowindow = new google.maps.InfoWindow();
                                infowindow.setContent('<h1>'+this.title+'</h1><a href="">Voir la fiche</a>');
                                //infowindow.open(map, marker);
                                // console.log('salut')
                                infowindow.open(map, this);
                            });
                            //google.maps.event.addListener(marker, 'mouseout', function() { infowindow.close();});

                        }
                        else
                        {
                            alert("some problem in geocode" + status);
                        }
                    });
                }

            });

        </script>


    </div>

</div>
</div>
<!-- /#main -->
</div>

</div>
<!-- /.row -->
</div>
<!-- /.container -->

</div>
