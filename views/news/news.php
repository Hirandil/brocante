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
                                <div class="title-price row">
                                    <div class="title span12">
                                        <a href="/Informations/show/<?php echo str_replace(' ','_',$n->getTitle()); ?>"> <h3><?php echo $n->getTitle() ?>
                                        </h3></a>
                                        <?php if (isset($_SESSION['userId']) && $user->getAdmin()){ ?>
                                        <div class="actions">
                                            <a href="/Informations/update/<?php echo $n->getId();?>" class="edit" title="Edit">Modifier</a>
                                            <a href="/Informations/destroy/<?php echo $n->getId();?>" class="remove" title="Remove"> Supprimer</a>
                                        </div>
                                            <br>
                                        <?php } ?>
                                    </div>
                                    <!-- /.title -->
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