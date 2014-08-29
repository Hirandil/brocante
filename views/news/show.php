<div id="content" class="clearfix">
    <!-- /.map-wrapper -->
<div class="container" style=''>

<div class="" style=''>

<div class="sidebar" style=';'>
    <br>
        <div class="property clearfix">
            <div class="image" style='background: none; width: 150px;'>
                <img width="150" src="/<?php echo $news->getImage() ?>" alt="<?php echo $news->getTitle(); ?>" style='border-radius: 10px;' />
            </div>
            <!-- /.image -->

                <br>
                <br>

                <!-- /.title -->
            </div>
            <!-- /.wrapper -->
        </div>
               
                <div class="title">
                    <h1>
                        <?php echo $news->getTitle(); ?></h1>
                </div>

                        <div style="padding-top: 10px; width: 100%; border-top: 1px dashed;">
                            <?php echo html_entity_decode($news->getContent()); ?>
                        </div>
              
        </div>
    </div>
</div>
    </div>

