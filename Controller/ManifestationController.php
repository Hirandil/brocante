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

                if ( isset($_POST['title'],$_POST['route'],$_POST['city'],$_POST['department'],$_POST['region'],$_POST['dateStart'],$_POST['dateEnd'],$_POST['timeStart'],$_POST['timeEnd'],$_POST['type'])){
                    if ( ($_POST['title'] != "") && ($_POST['route'] != "") && ($_POST['city'] != "") && ($_POST['department'] != "") && ($_POST['region'] != "") && ($_POST['dateStart'] != "") && ($_POST['dateEnd'] != "") && ($_POST['timeStart'] != "") && ($_POST['timeEnd'] != "") && ($_POST['type'] != "")){
                    $schedule = "De ".$_POST['timeStart']." à ".$_POST['timeEnd'];
                    $array = array('idManifestation' => 0, 'name' => $_POST['title'],'city' => $_POST['city'],'department' => $_POST['department'], 'address' => $_POST['route'],'region' => $_POST['region'],'start' => $_POST['dateStart'], 'end' => $_POST['dateEnd'] , 'idOrganiser' => $_SESSION['userId'],'type' => $_POST['type'],'site' => $_POST['site'], 'price' => $_POST['price'], 'exhibitorNumber' => $_POST['exhibitorNumber'], 'exhibitorPrice' => $_POST['exhibitorPrice'], 'schedule' => $schedule, 'image' => "");
                    $manifestation = new Manifestation($array);
                    $this->_mm->create($manifestation);
                    $_SESSION['message'] = 'Manifestation crée';

                    //header('Location: index.php');

                    }
                    else{
                        include 'views/manifestations/add.php';
                    }
                }
                else{
                    $types = $this->_tm->getAll();
                    include 'views/manifestations/add.php';
                }
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
                if($_POST['region'] != null) {
                    $filtre['where'][] = 'region=:region';
                    $filtre['PDOargument']['region'] = htmlspecialchars($_POST['region']);
                }
                if($_POST['department'] != null) {
                    $filtre['where'][] = 'department=:department';
                    $filtre['PDOargument']['region'] = htmlspecialchars($_POST['department']);
                }
               if($_POST['start'] != null){
                   $filtre['where'][] = 'start>=:start';
                   $filtre['PDOargument']['start'] = htmlspecialchars($_POST['start']);
               }
               if($_POST['end'] != null){
                   $filtre['where'][] = 'end<=:end';
                   $filtre['PDOargument']['end'] = htmlspecialchars($_POST['end']);
               }

                if (!empty($filtre))
                {
                  /*  $manif_page = 5;
                    $nb_total = sizeof($this->_mm->getAll());
                    $nb_page = ceil($nb_total/$manif_page);

                    if(isset($_GET['page']))
                    {
                        $pageActuelle=intval($_GET['page']);

                        if($pageActuelle>$nb_page)
                        {
                            $pageActuelle=$nb_page;
                        }
                    }
                    else
                    {
                        $pageActuelle=1;
                    }
                    $premiereEntree=($pageActuelle-1)*$manif_page;*/
                    $manifestations = $this->_mm->search($filtre);
                    include('views/manifestations/results.php');

                }
                else
                {
                    $manifestations = $this->_mm->getAll();
                    include('views/manifestations/results.php');
                }
           }
           else
           {
               $types = $this->_tm->getAll();
               include('views/manifestations/search.php');
           }
        }

        public function index() {

        }

        public function show(){

            if (isset($_GET['id'])){
                $id = (int) htmlspecialchars($_GET['id']);
                if($this->_mm->exists($id)){
                    $manifestation = $this->_mm->get($id);
                    $nearTowns = $this->_mm->getNearTowns($manifestation->getDepartment());
                    include 'views/manifestations/show.php';
                }
                else{
                    header('Location: index.php');
                }
            }
            else
                header('Location: index.php');

        }


    }
?>