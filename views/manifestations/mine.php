<?php
/**
 * Created by PhpStorm.
 * User: relbachiri
 * Date: 04/07/14
 * Time: 16:24
 */
?>

<div id="content" class="clearfix">

<div class="container">
<div class="row">

<div id="main" class="span12">

<div class="clearfix">
    <div class="pull-left">
        <h1 class="page-header">Mes manifestations :</h1>
    </div>
</div>
<!-- /.clearfix -->
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
        <th>Dates </th>
        <th>Actions</th>
    </tr>
    </thead>

    <tbody>
    <?php
    foreach((array)$manifestations as $manif)
    {
    ?>
    <tr>
        <td class="thumbnail">
                <img width="80" height="59"
                     src="<?php echo $manif->getImage() ?>"
                     class="attachment-admin-thumb" alt="<?php echo $manif->getName(); ?>">
        </td>

        <td class="title">
            <strong><?php echo $manif->getName(); ?></strong>
        </td>

        <td class="post-date">
            <strong><?php echo $manif->getAddress(); ?></strong>
        </td>

        <td class="status">
            <strong class="publish"><?php echo $manif->getStart()//echo date_format(DateTime::createFromFormat('Y-m-d',$manif->getStart()),('d-m-Y'))." au ".date_format(DateTime::createFromFormat('Y-m-d',$manif->getEnd()),('d-m-Y'));?></strong>
        </td>

        <td class="actions">
            <a href="/Manifestation/update/<?php echo $manif->getId();?>" class="edit" title="Edit">Modifier</a>
            <a href="/Manifestation/destroy/<?php echo $manif->getId();?>" class="remove" title="Remove">Supprimer</a>

            <a href="<?php echo '/Manifestation/'.str_replace(" ","_",$manif->getRegion()).'/'.str_replace(" ","_",$manif->getDepartment())
                    .'/'.str_replace(" ","_",$manif->getCity()).'/'.str_replace(' ','_',$manif->getName());?>"
            class="view"
               title="View">Visualiser</a>

        </td>

    </tr>
    <tr class="sep">
        <td colspan="5"></td>
    </tr>
    <?php
    }
    }
    else {
        echo 'Vous n\'avez aucune manifestations';
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