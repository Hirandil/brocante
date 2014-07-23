<?php

session_start();

ob_start();

ini_set('display_errors', 1);

$controller_file = dirname(__FILE__).'/Controller/VilleController.php';

if ( is_file($controller_file))
{
    include $controller_file ;
    $controller = 'VilleController' ;
    if(class_exists($controller))
    {
        $c = new $controller ;
        $action = 'autocomplete' ;
        if (method_exists($c,$action) )
        {
            $c->$action() ;
        }
    }
}

$content = ob_get_clean();

echo $content;
?>

