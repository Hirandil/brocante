<div class="container">
    <div id="main" class="span9 property-listing">

        <h1 class="titleH1"> Actualités</h1>

        <div class="clearfix">


            <?php
            foreach ((array)$news as $n) {

                ?>
                <div class="properties-rows">
                    <div class="row">
                        <div class="property span9">
                            <div class="body span6">
                                <div class="title-price row">
                                    <div class="title span12">
                                        <h3><a href="index.php?section=News&action=show&id=<?php echo $n->getId() ?>"><?php echo $n->getTitle() ?></a>
                                        </h3>

                                        <p> Posté le <?php echo $n->getCreatedAt() ?></p>
                                    </div>
                                    <!-- /.title -->
                                </div>

                                <div class="body">
                                    <p> <?php echo substr($n->getContent(), 0, 150) ?>...</p>
                                </div>
                                <!-- /.body -->

                                <div class="property-info clearfix">
                                    <div class="more-info">
                                        <a href="index.php?section=News&action=show&id=<?php echo $n->getId() ?>"> Voir
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
            ?>

        </div>
        <!-- /.container -->

    </div>
</div>