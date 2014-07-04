<?php
/**
 * Created by PhpStorm.
 * User: relbachiri
 * Date: 26/06/14
 * Time: 12:45
 */
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
            <a href="/index.php/section=Manifestation&action=show&id=<?php echo $manif->getId();?>">
                <img width="80" height="59"
                     src=""
                     class="attachment-admin-thumb" alt="<?php echo $manif->getName(); ?>">
            </a>
        </td>

        <td class="title">
            <a href="../properties/property-detail.html"><?php echo $manif->getName(); ?></a>
        </td>

        <td class="post-date">
            <strong><?php echo $manif->getAddress(); ?></strong>
        </td>

        <td class="status">
            <strong class="publish"><?php echo date_format(DateTime::createFromFormat('Y-m-d',$manif->getStart()),('d-m-Y'))." au ".date_format(DateTime::createFromFormat('Y-m-d',$manif->getEnd()),('d-m-Y'));?></strong>
        </td>

    </tr>
    <tr class="sep">
        <td colspan="5"></td>
    </tr>
<?php
        }
?>
    </tbody>
</table>

<div class="pagination pagination-centered">
    <ul class="unstyled">
        <li><a href="#">Previous</a></li>
        <li><a href="#" class="inactive">1</a></li>
        <li class="active"><a href="#">2</a></li>
        <li><a href="#" class="inactive">3</a>
        </li>
        <li><a href="#" class="inactive">4</a>
        </li>
        <li><a href="#">Next</a></li>
        <li><a href="#">Last</a></li>
    </ul>
</div>


</div>
<!-- /#main -->
</div>
<!-- /.row -->
</div>
<!-- /.container -->

</div>x