<?php
/**
 * Created by PhpStorm.
 * User: relbachiri
 * Date: 18/07/14
 * Time: 13:49
 */
foreach((array)$manifestations as $m)
{
    echo '<p><a href="/Manifestation/show/'.$m->getId().'">'.$m->getName().'</p>';
}
?>