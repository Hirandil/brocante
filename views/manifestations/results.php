<?php
/**
 * Created by PhpStorm.
 * User: relbachiri
 * Date: 26/06/14
 * Time: 12:45
 */
?>
<div id="content" class="clearfix">
    <div class="container">
        <div class="row">
            <div id="main" class="span12"
                 div class="clearfix">
                <div class="pull-left">
                    <h1 class="page-header">Résultats :</h1>
                </div>
                <!-- /.pull-left -->

                <!-- /.pull-right -->
            </div>
            <?php
                if(sizeof($manifestations) > 0)
                {
            ?>
<table class="table submissions-table">
    <thead>
    <tr>
        <th>Image</th>
        <th>Titre</th>
        <th>Adresse</th>
        <th>Date</th>
    </tr>
    </thead>

    <tbody>
<?php
    foreach((array)$manifestations as $manif)
       {
?>
    <tr>
        <td class="thumbnail">
            <a href="<?php echo '/Manifestation/'.str_replace(" ","_",$manif->getRegion()).'/'.str_replace(" ","_",$manif->getDepartment())
            .'/'.str_replace(" ","_",$manif->getCity()).'/'.str_replace(' ','_',$manif->getName());?>">
                <img width="80" height="59"
                     src="<?php echo $manif->getImage(); ?>"
                     class="attachment-admin-thumb" alt="<?php echo $manif->getName(); ?>">
            </a>
        </td>

        <td class="title">
            <a href="<?php echo '/Manifestation/'.str_replace(" ","_",$manif->getRegion()).'/'.str_replace(" ","_",$manif->getDepartment())
            .'/'.str_replace(" ","_",$manif->getCity()).'/'.str_replace(' ','_',$manif->getName());?>"><?php echo $manif->getName(); ?></a>
        </td>

        <td class="post-date">
            <strong><?php echo $manif->getAddress(); ?></strong>
        </td>

        <td class="status">
            <strong class="publish"><?php echo $manif->getStart()/*date_format(DateTime::createFromFormat('Y-m-d',$manif->getStart()),('d-m-Y'))." au ".date_format(DateTime::createFromFormat('Y-m-d',$manif->getEnd()),('d-m-Y'));*/?></strong>
        </td>

        </tr>
        <tr class="sep">
            <td colspan="5"></td>
        </tr>
<?php
        }
    }
    else {
        echo 'Aucun résultat n\'a été trouvé';
    }
?>
    </tbody>
</table>


</div>
<!-- /#main -->
</div>
<!-- /.row -->
</div>
<!-- /.container -->

</div>