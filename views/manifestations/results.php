<?php
/**
 * Created by PhpStorm.
 * User: relbachiri
 * Date: 26/06/14
 * Time: 12:45
 */
foreach((array)$manifestations as $manif)
{
?>

<label><?php echo $manif->getName()?></label>

<?php
}
?>

