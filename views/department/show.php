<?php
/**
 * Created by PhpStorm.
 * User: relbachiri
 * Date: 18/07/14
 * Time: 13:49
 */
?>

<div id="main" class="span12">

<h1 class="page-header"><?php echo $department->getName().' ('.$department->getZipCode().') -- '.sizeof($manifestations).' résultat(s) ont été trouvé(s). Vous pouvez aussi rechercher pour la région <a href="index.php?section=Manifestation&action=region&id='.$region->getId().'">'.$region->getName().'</a>' ?></h1>

<div class="clearfix">

<div class="properties-rows">
    <?php
        foreach((array)$manifestations as $m)
        {
    ?>
<div class="property span9">
    <div class="row">
        <div class="span3">
            <div class="image">
                <div class="content">
                    <a href="index.php?section=Manifestation&action=show&id=<?php echo $m->getId()?>">
                        <img width="50" height="100" src="<?php echo $m->getImage()?>" class="thumbnail-image" alt="19">
                    </a>
                </div>
                <!-- /.content -->
            </div>
            <!-- /.image -->
        </div>

        <div class="body span6">
            <div class="title-price row">
                <div class="title span4">
                    <h2><a href="index.php?section=Manifestation&action=show&id=<?php echo $m->getId()?>"><?php echo $m->getName() ?></a>
                    </h2>
                </div>
                <!-- /.title -->

                <div class="price">
                    Contacter l'organisateur
                </div>
                <!-- /.price -->
            </div>
            <!-- /.title -->

            <div class="location"><?php echo $m->getAddress()?></div>
            <!-- /.location -->

            <div class="body">
                <p>

                </p>
            </div>
            <!-- /.body -->

            <div class="property-info clearfix">
                <div class="area">
                    <i class="icon icon-normal-cursor-scale-up"></i>

                </div>
                <!-- /.area -->

                <div class="more-info">
                    <a href="index.php?section=Manifestation&action=show&id=<?php echo $m->getId()?>"> Voir la fiche <i
                            class="icon icon-normal-right-arrow-circle"></i></a>
                </div>
            </div>
            <!-- /.info -->
    </div>
    <!-- /.row -->
</div>
    <?php
        }
    ?>
</div>
<!-- /.row -->

</div>
<!-- /.properties-grid -->

</div>
    </div>


