<?php

    include_once('global.php');

    class Controller
    {

        protected $_db;

        public function __construct()
        {
            try {
                $this->_db = new PDO(SQL_DSN,SQL_USERNAME,SQL_PASSWORD);
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