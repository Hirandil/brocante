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

        <h1 class="page-header"><?php echo $region->getName() .' -- '
                . sizeof($manifestations) .
                ' résultat(s) ont été trouvé(s).' ?> </h1>
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
                <div class="alentourBlock" >
                    <div class="content" style="margin-bottom: 20px">
                        <p style="border-bottom: 1px; border-style:solid">Abonnez-vous aux alertes</p>
                        <p style="font-size:75%;">Je veux recevoir une alerte par e-mail pour toutes les brocantes de la région <?php echo $region->getName() ?></p>
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
                                <a href="/User/register" class="btn btn-primary btn-large" style="background-color: #f69679"> S'inscrire !</a>
                            </div>


                            <!-- /.form-actions -->
                        </form>
                    </div>
                    <!-- /.content -->
                </div>
            </div>

        </div>
    </div>
</div>


