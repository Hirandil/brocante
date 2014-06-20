<?php
    require_once 'models/User.php';
    require_once 'models/Type.php';
    require_once 'models/Manifestation.php';
    require_once 'models/userManager.php';
    require_once 'models/manifestationManager.php';
    require_once 'models/typeManager.php';
    require_once 'Controller/Controller.php';

    class ManifestationController extends Controller
    {
        private $_um;
        private $_mm;
        private $_tm;

        public function __construct(){
            parent::__construct();
            $this->_um = new UserManager($this->_db);
            $this->_mm = new manifestationManager(($this->_db));
            $this->_tm = new typeManager($this->_db);
        }

        public function add(){
            if ( isset($_SESSION['userLogin']) ){
                if ( isset($_POST['title']) && isset($_POST['route']) && isset($_POST['city']) && isset($_POST['department']) && isset($_POST['region']) && isset($_POST['dateStart']) && isset($_POST['dateEnd']) && isset($_POST['timeStart']) && isset($_POST['dateEnd'])){
                    // TODO : Verifie si c'est pas vide
                    // TODO : Completer le tableau
                    $array = array('idManifestation' => 0, 'name' => $_POST['title'],'city'  => $_POST['city'],'department' => $_POST['department'], 'address' => $_POST['route'],'country' => $_POST['region'],'start' => $_POST['dateStart'], 'end' => $_POST['dateEnd'] );
                    $manifestation = new Manifestation($array);
                    $this->_mm->create($manifestation);
                    $_SESSION['Manifestation crée'];

                    header('Location: index.php');
                }
                else
                    include 'views/manifestations/add.html';
            }
            else{
                include 'views/login.html';
            }
        }

        public function search() {

           if(isset($_POST['type'],$_POST['region'],$_POST['department']))
           {
                $filtre = array();
                $manifestations = NULL;
                if(($_POST['type']) != "------") {
                    $filtre['where'][] = 'type=:type';
                    $filtre['PDOargument']['type'] = htmlspecialchars($_POST['type']);
                }
                if($_POST['region'] != "------") {
                    $filtre['where'][] = 'region=:region';
                    $filtre['PDOargument']['region'] = htmlspecialchars($_POST['region']);
                }
                if($_POST['department'] != "------") {
                    $filtre['where'][] = 'department=:department';
                    $filtre['PDOargument']['region'] = htmlspecialchars($_POST['department']);
                }

                if (!empty($filtre))
                {

                    $manifestations = $this->_mm->search($filtre);
                    include('views/manifestations/results.html');

                }
                else
                {
                    $manifestations = $this->_mm->getAll();
                    include('views/manifestations/results.html');
                }
           }
           else
           {
               $types = $this->_tm->getAll();
               include('views/manifestations/search.html');
           }
        }


    }
?>