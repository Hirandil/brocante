<?php

    include_once('global.php');
    require_once 'models/Manifestation.php';
    require_once 'models/manifestationManager.php';

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
                $_SESSION["soon"] = $mm->getSoon(7,3);
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