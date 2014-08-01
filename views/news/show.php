<div id="content" class="clearfix">
    <!-- /.map-wrapper -->
    <div class="container">
        <div class="row">
<div id="main" class="span12">
    <h1 class="titleH1"> <?php echo $news->getTitle(); ?></h1>
            <div class="row">
                <br>

                <div class="span9">

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

