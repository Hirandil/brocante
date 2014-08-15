<div id="content" class="clearfix">
    <!-- /.map-wrapper -->
<div class="container">

<div class="row">

<div class="sidebar span8">
    <br>
        <div class="property clearfix">
            <div class="image" style='width: 150px;'>
                <img width="150" src="/<?php echo $news->getImage() ?>"
                     alt="<?php echo $news->getTitle(); ?>"/>
            </div>
            <!-- /.image -->

            <div class="wrapper" style="margin-left: 25px;float: left">
                <br>
                <br>
                <div class="title">
                    <h1>
                        <?php echo $news->getTitle(); ?></h1>
                </div>
                <!-- /.title -->
            </div>
            <!-- /.wrapper -->
        </div>
            <div class="row">
                <br>

                <div class="span6">

                    <div class="row">
                        <div style="padding: 10px" class="span10 box-search">
                            <br>
                            <?php echo html_entity_decode($news->getContent()); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>

