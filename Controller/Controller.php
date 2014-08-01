<?php

    include_once('global.php');
    require_once 'models/Manifestation.php';
    require_once 'models/manifestationManager.php';
    require_once 'models/News.php';
    require_once 'models/newsManager.php';

    class Controller
    {

        protected $_db;

        public function __construct()
        {

            try {
                $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                $this->_db = new PDO(SQL_DSN,SQL_USERNAME,SQL_PASSWORD,$pdo_options);
                $this->_db->exec('SET NAMES utf8');
                $mm = new manifestationManager($this->_db);
                $nm = new newsManager($this->_db);
                $_SESSION['last'] = $mm->getLast();
                $_SESSION["visited"] = $mm->getVisited();
                $_SESSION["news"] = $nm->getSomeNews(3);
                $_SESSION['title'] = "123Brocante.com";
                $_SESSION['ariane'] = "";
                $_SESSION['type'] =  "Brocantes, Vide-Grenier, Marché aux puces,etc ";
                $_SESSION['description'] = "123Brocante est un agenda regroupant Brocantes,Vide-Greniers,Marché aux puces,etc
                                    dans toute la France. Découvrer les manifestations près de chez vous!";
                }
            catch(Exception $e)
            {
                echo 'Error while connecting to the database';
                echo $e;
                exit;
            }
        }
    }
?>