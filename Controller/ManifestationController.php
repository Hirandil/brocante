<?php
    require_once 'models/User.php';
    require_once 'models/Type.php';
    require_once 'models/Manifestation.php';
    require_once 'models/Region.php';
    require_once 'models/Department.php';
    require_once 'models/userManager.php';
    require_once 'models/manifestationManager.php';
    require_once 'models/typeManager.php';
    require_once 'models/departmentManager.php';
    require_once 'models/regionManager.php';
    require_once 'Controller/Controller.php';

    class ManifestationController extends Controller
    {
        private $_um;
        private $_mm;
        private $_tm;
        private $_rm;
        private $_dm;

        public function __construct(){
            parent::__construct();
            $this->_um = new UserManager($this->_db);
            $this->_mm = new manifestationManager(($this->_db));
            $this->_tm = new typeManager($this->_db);
            $this->_rm = new regionManager($this->_db);
            $this->_dm = new departmentManager($this->_db);
        }



        public function add(){
            if ( isset($_SESSION['userLogin']) ){

                if ( isset($_POST['title'],$_POST['route'],$_POST['city'],$_POST['department'],$_POST['region'],$_POST['dateStart'],$_POST['dateEnd'],$_POST['timeStart'],$_POST['timeEnd'],$_POST['type'])){
                    if ( ($_POST['title'] != "") && ($_POST['route'] != "") && ($_POST['city'] != "") && ($_POST['department'] != "") && ($_POST['region'] != "") && ($_POST['dateStart'] != "") && ($_POST['dateEnd'] != "") && ($_POST['timeStart'] != "") && ($_POST['timeEnd'] != "") && ($_POST['type'] != "")){

                        function upload($index,$destination,$maxsize=FALSE,$extensions=FALSE)
                        {
                            if (!isset($_FILES[$index]) OR $_FILES[$index]['error'] > 0) return FALSE;

                            if ($maxsize !== FALSE AND $_FILES[$index]['size'] > $maxsize) return FALSE;

                            $ext = substr(strrchr($_FILES[$index]['name'],'.'),1);
                            if ($extensions !== FALSE AND !in_array($ext,$extensions)) return FALSE;

                            return move_uploaded_file($_FILES[$index]['tmp_name'],$destination);
                        }

                        $nom = md5(uniqid(rand(), true));
                        $ext = substr(strrchr($_FILES['image']['name'],'.'),1);
                        $path = "assets/img/manifestations/".$nom.".".$ext;
                        $schedule = "De ".$_POST['timeStart']." à ".$_POST['timeEnd'];
                        $valid_extensions = array( 'jpg' , 'jpeg' ,'png' );
                        if(!(upload('image',$path,6291456,$valid_extensions))){
                            $_SESSION['message'] = "Il y a eu un problème lors de l'upload du fichier";
                         //   header('Location: index.php?section=Manifestation&action=add');
                        }
                        echo $path;
                        $array = array('idManifestation' => 0, 'name' => $_POST['title'],'city' => $_POST['city'],'department' => $_POST['department'], 'address' => $_POST['route'],'region' => $_POST['region'],'start' => $_POST['dateStart'], 'end' => $_POST['dateEnd'] , 'idOrganiser' => $_SESSION['userId'],'type' => $_POST['type'],'site' => $_POST['site'], 'price' => $_POST['price'], 'exhibitorNumber' => $_POST['exhibitorNumber'], 'exhibitorPrice' => $_POST['exhibitorPrice'], 'schedule' => $schedule, 'image' => $path);
                        $manifestation = new Manifestation($array);
                        $this->_mm->create($manifestation);
                        $_SESSION['message'] = 'Manifestation crée';

                       //header('Location: index.php?section=Manifestation&action=add');

                    }
                    else{
                        $types = $this->_tm->getAll();
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

        public function destroy() {

            if(isset($_GET['id'])){
               $manif = $this->_mm->get((int)$_GET['id']);
                if($manif->getIdOrganiser() == $_SESSION['userId']){
                    $this->_mm->destroy((int)$_GET['id']);
                    header('Location: /index.php?section=User&action=manifestations');
                }
                else{
                    header('Location: index.php');
                }
            }
        }

        public function search() {

           if(isset($_POST['region'],$_POST['department']))
           {
                $filtre = array();
                $manifestations = NULL;

                if(isset($_POST['city'])){
                    if($_POST['city'] != null){
                        $filtre['where'][] = 'city=:city';
                        $filtre['PDOargument']['city'] = htmlspecialchars($_POST['city']);
                    }
                }

                if(isset($_POST['type'],$_POST['start'],$_POST['end'])){
                    if($_POST['start'] != null){
                        $filtre['where'][] = 'start>=:start';
                        $filtre['PDOargument']['start'] = htmlspecialchars($_POST['start']);
                    }
                    if($_POST['end'] != null){
                        $filtre['where'][] = 'end<=:end';
                        $filtre['PDOargument']['end'] = htmlspecialchars($_POST['end']);
                    }
                    if(($_POST['type']) != "------" && $_POST['type'] != null) {
                        $filtre['where'][] = 'type=:type';
                        $filtre['PDOargument']['type'] = htmlspecialchars($_POST['type']);
                    }

                }


                if($_POST['region'] != null) {
                    $filtre['where'][] = 'region=:region';
                    $filtre['PDOargument']['region'] = htmlspecialchars($_POST['region']);
                }
                if($_POST['department'] != null) {
                    $filtre['where'][] = 'department=:department';
                    $filtre['PDOargument']['department'] = htmlspecialchars($_POST['department']);
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
            $regions = $this->_rm->getAll();
            $departments = $this->_dm->getAll();
            include('views/home.php');
        }

        public function Department(){

            $department = $this->_dm->get($_GET['zipCode']);
            $region = $this->_rm->get((int)$department->getRegion());
            $manifestations = $this->_mm->getByDepartment($department->getName());
            $manifByDate = array();
            foreach((array)$manifestations as $m)
            {
                if(!array_key_exists($m->getStart(),$manifByDate)){
                    $manifByDate[$m->getStart()] = [];
                    $manifByDate[$m->getStart()][] = $m;
                }
                else{
                    $manifByDate[$m->getStart()][] = $m;
                }
            }
            include('views/department/show.php');

        }

        public function Region(){

            $region = $this->_rm->get((int)$_GET['id']);
            $manifestations = $this->_mm->getByDepartment($region->getName());
            include('views/region/show.php');
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

        public function update() {

            if ( isset($_POST['title'],$_POST['route'],$_POST['city'],$_POST['department'],$_POST['region'],$_POST['dateStart'],$_POST['dateEnd'],$_POST['timeStart'],$_POST['timeEnd'],$_POST['type'])){

                $schedule = "De ".$_POST['timeStart']." à ".$_POST['timeEnd'];
                function upload($index,$destination,$maxsize=FALSE,$extensions=FALSE)
                {
                    if (!isset($_FILES[$index]) OR $_FILES[$index]['error'] > 0) return FALSE;

                    if ($maxsize !== FALSE AND $_FILES[$index]['size'] > $maxsize) return FALSE;

                    $ext = substr(strrchr($_FILES[$index]['name'],'.'),1);
                    if ($extensions !== FALSE AND !in_array($ext,$extensions)) return FALSE;

                    return move_uploaded_file($_FILES[$index]['tmp_name'],$destination);
                }

                $nom = md5(uniqid(rand(), true));
                $ext = substr(strrchr($_FILES['image']['name'],'.'),1);
                $path = "assets/img/manifestations/".$nom.".".$ext;
                $valid_extensions = array( 'jpg' , 'jpeg' ,'png' );
                if(!(upload('image',$path,6291456,$valid_extensions))){
                    $_SESSION['message'] = "Il y a eu un problème lors de l'upload du fichier";
                    //   header('Location: index.php?section=Manifestation&action=add');
                }
                $array = array('idManifestation' => $_POST['manifId'], 'name' => $_POST['title'],'city' => $_POST['city'],'department' => $_POST['department'], 'address' => $_POST['route'],'region' => $_POST['region'],'start' => $_POST['dateStart'], 'end' => $_POST['dateEnd'] , 'idOrganiser' => $_SESSION['userId'],'type' => $_POST['type'],'site' => $_POST['site'], 'price' => $_POST['price'], 'exhibitorNumber' => $_POST['exhibitorNumber'], 'exhibitorPrice' => $_POST['exhibitorPrice'], 'schedule' => $schedule, 'image' => $path);
                $manifestation = new Manifestation($array);
                $this->_mm->update($manifestation);
                header('Location: index.php?section=Manifestation&action=show&id='.$manifestation->getId());
            }
            else{
                $types = $this->_tm->getAll();
                $manifestation = $this->_mm->get((int)$_GET['id']);
                if($manifestation->getIdOrganiser() == $_SESSION['userId']){
                    $start = substr($manifestation->getSchedule(),3,5);
                    $end = substr($manifestation->getSchedule(),11,6);
                    include_once('views/manifestations/add.php');
                }
                else{
                    header('Location: index.php');
                }
            }
        }

    }
?>