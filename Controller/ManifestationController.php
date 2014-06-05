<?php
    require_once 'models/User.php';
    require_once 'models/Manifestation.php';
    require_once 'controllers/Controller.php';

    class ManifestionController extends Controller
    {
        private $_um;

        public function __construct(){
            parent::__construct();
            $this->_um = new UserManager($this->_db);
        }


    }
?>