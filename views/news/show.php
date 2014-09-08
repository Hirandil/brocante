<div id="content" class="clearfix" style=''>
    <!-- /.map-wrapper -->


<div class="container">

<div id='news_ii'>

<div class="sidebar menu_article_bloc" style='padding-left: 0px; margin-left: 0px;'>

    <br>
        <div class="property clearfix" style='padding-left: 0px; margin-left: 0px; padding-right: 0px;'>
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

                        <div class='menu_article_bloc' style="padding-top: 10px;">
                      <div style="border-top: 1px dashed;"> </div>
                            <?php echo html_entity_decode($news->getContent()); ?>
                        </div>
              
        </div>

<div id='bloc_news_menu' style='margin-top: 20px;'>
<div class='bloc_menu_sous' style=''>

<div style=' width: 100%; border: 1px solid #f8947a; margin-bottom: 20px;'>
<div style='padding: 10px;'>
<div style='border-bottom: 1px solid; padding-bottom: 5px;'>Les 5 derni&egrave;res actualit&eacute;s</div>

<ul style='margin-top: 10px; list-style-type: none; margin-left: -0px;'>
<?php
	$sqlphone = "SELECT * FROM news ORDER BY id ASC LIMIT 0,5";
	$reqphone = mysql_query($sqlphone) or die (mysql_error());
	while($aphone = mysql_fetch_array($reqphone)){
        $titlebbbb = $aphone['title'];
        $titleUrbbbb = $aphone['titleUrl'];
        $contentbbbb = $aphone['content'];

?>
<li style='margin-bottom: 10px; '><a href='<?php echo "/Informations/show/$titleUrbbbb"; ?>'><?php echo "$titlebbbb"; ?></a></li>
<?php
}
?>
</ul>
</div>


</div>

<div style=' width: 100%; border: 1px solid #f8947a; margin-bottom: 20px;'>
<div style='padding: 10px;'>

<div style='border-bottom: 1px solid; padding-bottom: 5px;'>Manifestations</div>

<ul style='margin-top: 10px; list-style-type: none; margin-left: -0px;'>
<?php
	$sqlphonevv = "SELECT * FROM villes ORDER BY RAND() DESC LIMIT 0,5 ";
	$reqphonevv = mysql_query($sqlphonevv) or die (mysql_error());
	while($aphonevv = mysql_fetch_array($reqphonevv)){
        $departmentbbbbvv = $aphonevv['department'];
        $ville_slugbbbbvv = $aphonevv['ville_slug'];
        $ville_nom_reelbbbbvv = utf8_encode($aphonevv['ville_nom_reel']);

?>
<li style='margin-bottom: 10px; '><a href='<?php echo "/Manifestation/ville/".$departmentbbbbvv."/$ville_slugbbbbvv"; ?>'><?php echo "Manifestations $ville_nom_reelbbbbvv"; ?></a></li>
<?php
}
?>
</ul>
</div>

</div>

<div align="center">
<?php
include('facebook.php');
?>
</div>

</div>
</div>


    </div>

 


</div>


    </div>



