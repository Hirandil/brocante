<div class="container" style=''>
    <div id="main" class="span9 property-listing" style='width: 100%; padding-left: 0px; margin-left: 0px; padding-right: 0px; margin-right: 0px;'>

        <h1 class="titleH1"> Actualités sur 123brocante</h1>

        <div class="clearfix" style='width: 100%;'>
            <?php
            if(sizeof($news) < 1)
            {
                echo "<p> Aucune actualité n'est disponible pour le moment</p>";
            }
            else{
            foreach ((array)$news as $n) {

                ?>
                <div class="properties-rows" style='width: 100%;'>
                        <div class="property span9" style='padding-left:0px; margin-left: 0px; width: 99%; background-color: #F2F2F2; border-radius: 6px; padding-bottom: 0px;' >
                            <div class="body span6" style='width: 100%; padding-left: 0px; margin-left: 0px;'>
                             <div class="property " style=' padding-botom: 0px; height: auto; margin-top: 0px;'>
                                <div class="image" style='width: 80px; background: none;'>
                                    <img width="280" src="/<?php echo $n->getImage() ?>"
                                         alt="<?php echo $n->getTitle(); ?>" style='border-radius: 4px; margin-left: 40px;' />
                                </div>
                                 <div style=" margin-left: 25px; float: left; margin-top: 20px; " class="wrapper">
                                         <div class="title" style='margin-left: 40px;'' >
                                             <a href="/Informations/show/<?php echo str_replace(' ','-',$n->getTitleUrl()); ?>"> <h2><?php echo $n->getTitle() ?></h2></a>
                                             <div class="pull-right"></div>
                                         </div>
                                     
                                             <?php if (isset($_SESSION['userId']) && $user->getAdmin()){ ?>
                                                 <div class="actions">
                                                     <a href="/Informations/update/<?php echo $n->getId();?>" class="edit" title="Edit">Modifier</a>
                                                     <a href="/Informations/destroy/<?php echo $n->getId();?>" class="remove" title="Remove"> Supprimer</a>
                                                 </div>
                                                 <br>
                                             <?php } ?>
                                 </div>

                             <div style='clear: both;' ></div>

                                <div class="body" style='clear: both; width: 100%; ' >
                                    <div style='margin-top: 10px;  border-top: 1px dashed #999999;' > 
                                  <div style='margin-top: 10px; padding-left: 20px;'><?php echo html_entity_decode(substr($n->getContent(), 0, 150)) ?></div>

<div class="property-info clearfix" style='padding-left: 20px;'>                          
<div style='font-size: 14px;'>
<a href="/Informations/show/<?php echo str_replace(' ','-',$n->getTitleUrl()); ?>" style=''> <div style='float: left; margin-top: 1px; margin-right: 10px;'>Lire : <?php echo $n->getTitle() ?></div> <i class="icon icon-normal-right-arrow-circle" style=''></i></a>
</div>
</div>

                                </div>
                                </div>
                                <!-- /.body -->


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