<?php
/**
 * Created by PhpStorm.
 * User: relbachiri
 * Date: 18/07/14
 * Time: 13:49
 */
?>
<div class="container">
        <div id="main" class="span12">

            <h1 class="page-header"><?php echo $department->getName() . ' (' . $department->getZipCode() . ') -- '
                    . sizeof($manifestations) .
                    ' résultat(s) ont été trouvé(s). Vous pouvez aussi rechercher pour la région
                    <a href="/Manifestation/region/' . $region->getId() . '">' . $region->getName() . '</a>' ?></h1>
            <br>

            <div class="clearfix">

                <div class="properties-rows">
                    <?php
                    foreach ((array)$manifByDate as $d)
                    {
                    foreach ((array)$d as $m)
                    {
                    ?>
                    <div class="property span9">
                        <div class="row">
                            <div class="span3">
                                <div class="image">
                                    <div class="content">
                                        <a href="/Manifestation/show/<?php echo $m->getId() ?>">
                                            <img width="50" height="100" src="<?php echo $m->getImage() ?>"
                                                 class="thumbnail-image" alt="19">
                                        </a>
                                    </div>
                                    <!-- /.content -->
                                </div>
                                <!-- /.image -->
                            </div>

                            <div class="body span6">
                                <div class="title-price row">
                                    <div class="title span4">
                                        <h2>
                                            <a href="/Manifestation/show/<?php echo $m->getId() ?>"><?php echo $m->getName() ?></a>
                                        </h2>
                                    </div>
                                    <!-- /.title -->
                                    <div class="price">
                                        Contacter l'organisateur
                                    </div>
                                    <!-- /.price -->
                                </div>
                                <!-- /.title -->

                                <div class="location"><?php echo $m->getAddress() ?></div>
                                <!-- /.location -->

                                <div class="body">
                                    <p>

                                    </p>
                                </div>
                                <!-- /.body -->

                                <div class="property-info clearfix">
                                    <div class="area">

                                    </div>
                                    <!-- /.area -->

                                    <div class="more-info">
                                        <a href="/Manifestation/show/<?php echo $m->getId() ?>">
                                            Voir
                                            la fiche <i
                                                class="icon icon-normal-right-arrow-circle"></i></a>
                                    </div>
                                </div>
                                <!-- /.info -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                    <!-- /.row -->

                <!-- /.properties-grid -->
                        <?php
                        }
                        }
                        ?>

                </div>
            </div>
        </div>
</div>


