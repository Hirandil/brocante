<div class="container">
    <div id="main" class="span9 property-listing">

        <h1 class="titleH1"> Actualités</h1>

        <div class="clearfix">
            <?php
            if(sizeof($news) < 1)
            {
                echo "<p> Aucune actualité n'est disponible pour le moment</p>";
            }
            else{
            foreach ((array)$news as $n) {

                ?>
                <div class="properties-rows">
                    <div class="row">
                        <div class="property span9">
                            <div class="body span6">
                             <div class="property clearfix">
                                <div class="image" style='width: 80px;'>
                                    <img width="280" src="/<?php echo $n->getImage() ?>"
                                         alt="<?php echo $n->getTitle(); ?>"/>
                                </div>
                                 <div style="margin-left: 25px;float: left" class="wrapper">
                                         <div class="title">
                                             <a href="/Informations/show/<?php echo str_replace(' ','_',$n->getTitle()); ?>"> <h2><?php echo $n->getTitle() ?>
                                                 </h2></a>
                                             <div class="pull-right"></div>
                                         </div>
                                        <br>
                                             <?php if (isset($_SESSION['userId']) && $user->getAdmin()){ ?>
                                                 <div class="actions">
                                                     <a href="/Informations/update/<?php echo $n->getId();?>" class="edit" title="Edit">Modifier</a>
                                                     <a href="/Informations/destroy/<?php echo $n->getId();?>" class="remove" title="Remove"> Supprimer</a>
                                                 </div>
                                                 <br>
                                             <?php } ?>
                                 </div>
                             </div>

                                <div class="body">
                                    <p> <?php echo html_entity_decode(substr($n->getContent(), 0, 150)) ?>...</p>
                                </div>
                                <!-- /.body -->

                                <div class="property-info clearfix">
                                    <div class="more-info">
                                        <a href="/Informations/show/<?php echo str_replace(' ','_',$n->getTitle()); ?>"> Voir
                                            <i
                                                class="icon icon-normal-right-arrow-circle"></i></a>
                                    </div>
                                </div>
                                <!-- /.info -->
                            </div>
                            <!-- /.body -->
                        </div>
                    </div>

                    <!-- /#main -->

                </div>

            <?php
            }
            }
            ?>

        </div>
        <!-- /.container -->

    </div>
</div>