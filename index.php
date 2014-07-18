<?php

session_start();

ob_start();

ini_set('display_errors', 1);
    
    if (isset($_GET['section'] ) )
    {
        if(isset($_GET['action']))
        {
            $controller_file = dirname(__FILE__).'/Controller/'.$_GET['section'].'Controller.php';

            if ( is_file($controller_file))
            {
                include $controller_file ;
                $controller = $_GET['section'].'Controller' ;
                if(class_exists($controller))
                {
                    $c = new $controller ;
                    $action = $_GET['action'] ;
                    if (method_exists($c,$action) )
                    {
                        $c->$action() ;
                    }
                }
            }
        }
        else{
            include 'Controller/ManifestationController.php';
            $controller = new ManifestationController();
            $controller->index();
        }
    }
    else {
        include 'Controller/ManifestationController.php';
        $controller = new ManifestationController();
        $controller->index();
    }



$content = ob_get_clean();

?>




<!DOCTYPE html>



<!--[if IE 7]>
<html class="ie ie7" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" lang="en-US">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="en-US">
<!--<![endif]-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Aviators, http://themes.byaviators.com">

    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/png">

    <!--[if lt IE 9]>
    <script src="assets/js/html5.js" type="text/javascript"></script>
    <![endif]-->

    <meta name='robots' content='noindex,nofollow'/>

    <link rel='stylesheet' id='font-css'
          href='http://fonts.googleapis.com/css?family=Open+Sans%3A400%2C700%2C300&#038;subset=latin%2Clatin-ext&#038;ver=3.6'
          type='text/css' media='all'/>


    <link rel='stylesheet' id='revolution-fullwidth' href='assets/libraries/rs-plugin/css/fullwidth.css' type='text/css' media='all'/>
    <link rel='stylesheet' id='revolution-settings' href='assets/libraries/rs-plugin/css/settings.css' type='text/css' media='all'/>
    <link rel='stylesheet' id='bootstrap-css' href='assets/libraries/bootstrap/css/bootstrap.min.css' type='text/css' media='all'/>
    <link rel='stylesheet' id='bootstrap-responsive-css' href='assets/libraries/bootstrap/css/bootstrap-responsive.min.css' type='text/css' media='all'/>

    <link rel='stylesheet' id='pictopro-normal-css' href='assets/icons/pictopro-normal/style.css' type='text/css' media='all'/>
    <link rel='stylesheet' id='justvector-web-font-css' href='assets/icons/justvector-web-font/stylesheet.css' type='text/css' media='all'/>
    <link rel='stylesheet' id='chosen-css' href='assets/libraries/chosen/chosen.css' type='text/css' media='all'/>

    <link href="assets/css/jqvmap.css" media="screen" rel="stylesheet" type="text/css" />
    <link rel='stylesheet' id='aviators-css' href='assets/css/jquery.bxslider.css' type='text/css' media='all'/>
    <link rel='stylesheet' id='properta-css' href='assets/css/properta.css' type='text/css' media='all'/>

    <script type='text/javascript' src='http://code.jquery.com/jquery-1.7.2.min.js'></script>
    <script src="assets/js/jquery.vmap.js" type="text/javascript"></script>
    <script src="assets/js/jquery.vmap.france.js" type="text/javascript"></script>
    <script src="assets/js/jquery.vmap.colorsFrance.js" type="text/javascript"></script>
    <script type='text/javascript' src='assets/js/aviators-settings.js'></script>
    <script type='text/javascript' src='assets/libraries/chosen/chosen.jquery.min.js'></script>
    <script type='text/javascript' src='assets/libraries/rs-plugin/js/jquery.themepunch.revolution.min.js'></script>
    <script type='text/javascript' src='assets/libraries/rs-plugin/js/jquery.themepunch.plugins.min.js'></script>
    <script type="text/javascript" src="assets/js/notify.min.js"></script>
    <title> CodiOne </title>
</head>

<body class="home page page-template">


<?php
    include('views/headerView.php');
    echo $content;
    if(!isset($_GET['section']))
    {
        include('views/home.php');
    }

    include('views/footerView.php');

    if(isset($_SESSION['message'])){
    echo $_SESSION['message'];
    ?>
    <script>
        $.notify(
            '<?php echo $_SESSION['message']?>',
            {
                className: "success",
                position:"bottom right"
            }
        );
    </script>
    <?php
        $_SESSION['message']= "";
    }
?>

