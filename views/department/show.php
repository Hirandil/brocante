<div id="content" class="clearfix">
<!-- /.map-wrapper -->
<div class="container">

<div class="row">

<div class="container">
        <div id="main" class="span12">
            <br>

            <div class=" filter-horizontal" style=" text-align: center;">
                <div class="content">
                    <form method="POST" action="/Manifestation/Rechercher-des-manifestations" class="form-inline map-filtering">
                        <!-- /.property-types -->
                        <div class="general">
                            <select name="types" id="inputLocation-" class="location">
                                <option value="null">Tout les types de manifestations</option>
                                <?php

                                foreach($types as $t)
                                {
                                    ?>
                                    <option value="<?php echo $t->getId() ?>" > <?php echo $t->getLibelle() ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                            <select name="date" id="inputBeds-" class="beds ">
                                <option value="null">Dates</option>
                                <option value="0">Aujourd'hui</option>
                                <option value="1">Demain</option>
                                <option value="7">La semaine prochaine</option>
                             </select>
                            <select id="selectDepartment" name="department">
                                <option value="null">Séléctionner un département</option>
                                <?php
                                foreach((array)$departments as $d)
                                {
                                    ?>
                                    <option value="<?php echo $d->getName()?>" id="<?php echo $d->getId()?>" <?php if($d->getName() == $department->getName()){echo 'selected="selected"';}?>><?php echo $d->getName()?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <button type="submit" class="btn btn-primary btn-large">Filtrer!</button>
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
    <h1 class="page-header"><?php echo $department->getName() . ' (' . $department->getZipCode() . ') -- '
            . (sizeof($manifProByDate) + sizeof($manifTomorrow0) + sizeof($manifTomorrow1) + sizeof($manifTomorrow2)) .
            ' résultat(s) ont été trouvé(s). Vous pouvez aussi rechercher pour la région
            <i><a href="/Manifestation/region/'.str_replace(' ','-',$region->getName()).'/' . $region->getId() . '">' . $region->getName() . '</a></i>' ?></h1>
    <br>
    <?php
        if (sizeof((array)$manifProByDate) != 0) {
            ?>
            <h2>Les brocantes à la une</h2>
    <?php
        }
    ?>

    <?php
    foreach ((array)$manifProByDate as $d)
    {
    foreach ((array)$d as $manifestation)
    {
    ?>
    <div class="property clearfix">
        <div class="image">
            <a href="<?php echo '/Manifestation/'.str_replace(" ","-",$manifestation->getRegion()).'/'.str_replace(" ","-",$manifestation->getDepartment()).'/'.str_replace(" ","-",$manifestation->getCity()).'/'.str_replace(' ','-',$manifestation->getNameUrl());?>">

            <img width="570" height="425" src="/<?php echo $manifestation->getImage() ?>"
                 class="thumbnail-image " alt="19"/>
                </a>
        </div>
        <!-- /.image -->

        <div class="wrapper">
            <div class="title">
                <h2>
                    <a href="<?php echo '/Manifestation/'.str_replace(" ","-",$manifestation->getRegion()).'/'.str_replace(" ","-",$manifestation->getDepartment()).'/'.str_replace(" ","-",$manifestation->getCity()).'/'.str_replace(' ','-',$manifestation->getNameUrl());?>">
                        <?php echo $manifestation->getName() ?></a>
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

    <h2>Calendrier des brocantes sur le departement : <?php echo $department->getName() ?></h2>

    <?php
    for ($i = 0; $i <= 30; $i++) {
    ?>
    <div class="property clearfix" style="background: #f69679;">

        <div class="wrapper">
            <div class="title">
                <h3>
                    <h3>
                        <?php
                        date_default_timezone_set('Europe/Paris');
                        setlocale(LC_TIME, 'fr_FR.utf8','fra');
                        $currentDate = time() +(48 * 60 * (30*$i)) ;
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
        foreach ((array)${'manifTomorrow'.$i} as $d)
        {
            foreach ((array)$d as $manifestation)
            {
                ?>
                <h5 class="showH5"><a href="<?php echo '/Manifestation/'.str_replace(" ","_",$manifestation->getRegion()).'/'.str_replace(" ","_",$manifestation->getDepartment())
                        .'/'.str_replace(" ","_",$manifestation->getCity()).'/'.str_replace(' ','_',$manifestation->getName());?>"><?php echo $manifestation->getName() ?></a></h5>

                <div class="area">
                    <i class="icon icon-normal-cursor-scale-up"></i>
                    <?php echo $manifestation->getAddress() ?>
                </div>

                <br>
                <h5 class="addBr"></h5>
            <?php
            }
        }
        ?>

    </div>
    <?php
    }
    ?>

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

                <p style="font-size:75%;">Je veux recevoir une alerte par e-mail pour toutes les brocantes du
                    département <?php echo $department->getName() ?></p>

                <form method="POST" action="/User/newsletter">

                    <div class="type control-group">
                        <div class="controls">
                            <input type="text"  name="email"
                                   placeholder="Taper votre adresse e-mail">
                        </div>
                        <!-- /.controls -->
                    </div>
                    <input type="hidden" name="zone" value="<?php echo $department->getName(); ?>">
                    <p style="font-size:75%;">Je veux être alerté :</p>
                    <div class="control-group">
                        <div class="controls">
                            <input type="checkbox" name="veille" value="1">

                            <p style="font-size:75%;margin-left: 10%;">la veille</p>

                            <input type="checkbox" name="week" value="7">
                            <p style="font-size:75%;margin-left: 10%;">1 semaine à l'avance</p>

                            <input type="checkbox" name="month" value="30">
                            <p style="font-size:75%;margin-left: 10%;">1 mois à l'avance</p>

                        </div>
                    </div>
                    <!-- /.control-group -->
                    <div style=" text-align: center; ">
                        <button type="submit" class="btn btn-primary btn-large" style="background-color: #f69679">
                            S'inscrire !</button>
                    </div>


                    <!-- /.form-actions -->
                </form>
            </div>
            <!-- /.content -->
        </div>
        <?php
        if (sizeof($nearRegion) !=0 ){
        ?>
        <div class="alentourBlock">
            <div class="content" style="margin-bottom: 20px">
                <p style="border-bottom: 1px; border-style:solid">Brocantes de la région</p>

                    <?php
                    foreach ((array)$nearRegion as $nearRegion) {
                        ?>
                        <p><a href="<?php echo '/Manifestation/'.str_replace(" ","-",$nearRegion->getRegion()).'/'.str_replace(" ","-",$nearRegion->getDepartment()).'/'.str_replace(" ","-",$nearRegion->getCity()).'/'.str_replace(' ','-',$nearRegion->getNameUrl());?>">
                                <img width="40" height="35" src="/<?php echo $nearRegion->getImage() ?>"
                                     class="thumbnail-image " alt="Image"/>
                                <?php echo $nearRegion->getName() ?> à <?php echo $nearRegion->getCity() ?></a></p>
                    <?php
                    }
                    ?>

            </div>
            <!-- /.content -->
        </div>
        <?php
        }
        ?>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {

                var locations = [
<?php
foreach ((array)$manifByDate as $d)
{
    foreach ((array)$d as $manifestation)
    {
 ?>
                ['<?php echo $manifestation->getNameUrl() ?>','<?php echo $manifestation->getAddress() ?>','<?php echo $manifestation->getid() ?>','<?php echo $manifestation->getRegion() ?>','<?php echo $manifestation->getDepartment() ?>','<?php echo $manifestation->getCity() ?>'],
                <?php
    }
}
?>
                ]

                var map = new google.maps.Map(document.getElementById('property-map'), {
                    zoom: 11,
                    center: new google.maps.LatLng(43.253205,-80.480347),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });


                var geocoder = new google.maps.Geocoder();

                var marker, i;

                function getAdress(address,title,region,department,city,i,callback){
                    geocoder.geocode( { 'address': address  }, function(results, status) {
                        //alert(status);
                        if (status == google.maps.GeocoderStatus.OK) {
                            //alert(results[0].geometry.location);
                            callback(title,region,department,city,i,results);
                            //google.maps.event.addListener(marker, 'mouseout', function() { infowindow.close();});

                        }
                        else
                        {
                            //alert("some problem in geocode" + status);
                        }
                    });

                }

                for (i = 0; i < locations.length; i++) {
                    getAdress(locations[i][1],locations[i][0],locations[i][3],locations[i][4],locations[i][5],i,function(title,region,department,city,i,results){
                        var link = "/Manifestation/"+region+"/"+department+"/"+city+"/"+title;
                        var link = link.replace(/ /g, "-");
                        map.setCenter(results[0].geometry.location);
                        marker = new google.maps.Marker({
                            position: results[0].geometry.location,
                            map: map
                        })


                        google.maps.event.addListener(marker, 'click', function(marker,i) {
                            var infowindow = new google.maps.InfoWindow();
                            infowindow.setContent('<h1>'+title+'</h1><a href='+link+'   >Voir la fiche</a>');
                            //infowindow.open(map, marker);
                            // console.log('salut')
                            infowindow.open(map, this);
                        });
                    })
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
