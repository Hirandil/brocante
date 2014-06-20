<?php

    include_once('global.php');

    class Controller
    {

        protected $_db;

        public function __construct()
        {
            try {
                $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                $this->_db = new PDO(SQL_DSN,SQL_USERNAME,SQL_PASSWORD,$pdo_options);
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