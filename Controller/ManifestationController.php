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
            $_SESSION['title'] = "Annoncer une manifestation";
            $_SESSION['ariane'] = "Nouvelle manifestation";
            $_SESSION['description'] = "Annoncer votre ".$_SESSION['type']." sur 123Brocante et alerter des centaines d'internautes dans toute la France !";
            if ( isset($_SESSION['userLogin']) ){

                if ( isset($_POST['title'],$_POST['route'],$_POST['city'],$_POST['department'],$_POST['region'],$_POST['dateStart'],$_POST['dateEnd'],$_POST['timeStart'],$_POST['timeEnd'],$_POST['type'])){
                    if ( ($_POST['title'] != "") && ($_POST['route'] != "") && ($_POST['city'] != "") && ($_POST['department'] != "") && ($_POST['region'] != "") && ($_POST['dateStart'] != "") && ($_POST['dateEnd'] != "") && ($_POST['timeStart'] != "") && ($_POST['timeEnd'] != "") && ($_POST['type'] != "")){

                        //Fonction pour upload l'image ainsi que le path
                        function upload($index,$destination,$maxsize=FALSE,$extensions=FALSE)
                        {
                            if (!isset($_FILES[$index]) OR $_FILES[$index]['error'] > 0) return FALSE;

                            if ($maxsize !== FALSE AND $_FILES[$index]['size'] > $maxsize) return FALSE;

                            $ext = substr(strrchr($_FILES[$index]['name'],'.'),1);
                            if ($extensions !== FALSE AND !in_array($ext,$extensions)) return FALSE;

                            return move_uploaded_file($_FILES[$index]['tmp_name'],$destination);
                        }
                        if($_POST['image'] != null) {
                                $nom = md5(uniqid(rand(), true));
                                $ext = substr(strrchr($_FILES['image']['name'],'.'),1);
                                $path = "assets/img/manifestations/".$nom.".".$ext;
                                $schedule = "De ".$_POST['timeStart']." à ".$_POST['timeEnd'];
                                $valid_extensions = array( 'jpg' , 'jpeg' ,'png' );
                                if(!(upload('image',$path,6291456,$valid_extensions))){
                                    $_SESSION['message'] = "Il y a eu un problème lors de l'upload du fichier";
                                }
                        }
                        else{
                            $path = "assets/img/manifestations/thumbnail-default.jpg";
                        }
                        $array = array('idManifestation' => 0, 'name' => $_POST['title'],'city' => $_POST['city'],
                            'department' => $_POST['department'], 'address' => $_POST['route'],'region' => $_POST['region'],
                            'start' => $_POST['dateStart'], 'end' => $_POST['dateEnd'] , 'idOrganiser' => $_SESSION['userId'],
                            'type' => $_POST['type'],'site' => $_POST['site'], 'price' => $_POST['price'],
                            'exhibitorNumber' => $_POST['exhibitorNumber'], 'exhibitorPrice' => $_POST['exhibitorPrice'],
                            'schedule' => $schedule, 'image' => $path,'parking' =>$_POST['parking'],'informations' => $_POST['content']);
                        $manifestation = new Manifestation($array);
                        $this->_mm->create($manifestation);
                        $_SESSION['message'] = 'Manifestation crée';
                        header('Location: /User/manifestations');

                    }
                    else{
                        $departments = $this->_dm->getAll();
                        $regions = $this->_rm->getAll();
                        $types = $this->_tm->getAll();
                        include 'views/manifestations/add.php';
                    }
                }
                else{
                    $departments = $this->_dm->getAll();
                    $regions = $this->_rm->getAll();
                    $types = $this->_tm->getAll();
                    include 'views/manifestations/add.php';
                }
            }
            else{
                include 'views/login.html';
            }
        }

        public function destroy() {
            $_SESSION['ariane'] = "Supprimer une manifestation";
            $_SESSION['title'] = "Supprimer une manifestation";
            if(isset($_GET['id'])){
               $manif = $this->_mm->get((int)$_GET['id']);
                if($manif->getIdOrganiser() == $_SESSION['userId']){
                    $this->_mm->destroy((int)$_GET['id']);
                    header('Location: /User/manifestations');
                }
                else{
                    header('Location: /');
                }
            }
        }

        public function rechercher() {
            $_SESSION['title'] = "Rechercher une manifestation";
            $_SESSION['ariane'] = "Manifestation > Rechercher";
            $_SESSION['description'] = "Rechercher des ".$_SESSION['type']." et plus encore dans votre region et dans toute la France avec 123Brocante";
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
               $regions = $this->_rm->getAll();
               $departments = $this->_dm->getAll();
               $types = $this->_tm->getAll();
               include('views/manifestations/search.php');
           }
        }

        public function index() {
            $_SESSION['description'] =  "123Brocante est un agenda regroupant Brocantes,Vide-Greniers,Marché aux puces,etc
                                    dans toute la France. Découvrer les manifestations près de chez vous!";
            $regions = null;
            $regions_tmp = $this->_rm->getAll();
            foreach ($regions_tmp as $r) {
                $regions[$r->getId()] = $r;
            }
            $departments = $this->_dm->getAll();
            include('views/home.php');
        }

        public function department(){
            if (isset($_GET['id']) && $this->_dm->exists($_GET['id'])) {
                $types = $this->_tm->getAll();
            $departments = $this->_dm->getAll();
            $department = $this->_dm->get($_GET['id']);
            $region = $this->_rm->get((int)$department->getRegion());
            $nearRegion = $this->_mm->getNearRegion($region->getName());
            $manifestations = $this->_mm->getByDepartment($department->getName());
            $manifestationsPro = $this->_mm->getProByDepartment($department->getName());
            $tomorrow =  $this->_mm->getTomorrowDept(0,$department->getName());
            $tomorrow1 =  $this->_mm->getTomorrowDept(1,$department->getName());
            $tomorrow2 =  $this->_mm->getTomorrowDept(2,$department->getName());
            $manifProByDate = array();
            $manifByDate = array();
            $manifTomorrow = array();
            $manifTomorrow1 = array();
            $manifTomorrow2 = array();
            foreach((array)$manifestations as $m)
            {
                if(!array_key_exists($m->getStart(),$manifByDate)){
                    $manifByDate[$m->getStart()] = array();
                    $manifByDate[$m->getStart()][] = $m;
                }
                else{
                    $manifByDate[$m->getStart()][] = $m;
                }
            }
            foreach((array)$tomorrow as $m)
            {
                if(!array_key_exists($m->getStart(),$manifTomorrow)){
                    $manifTomorrow[$m->getStart()] = array();
                    $manifTomorrow[$m->getStart()][] = $m;
                }
                else{
                    $manifTomorrow[$m->getStart()][] = $m;
                }
            }
            foreach((array)$tomorrow1 as $m)
            {
                if(!array_key_exists($m->getStart(),$manifTomorrow1)){
                    $manifTomorrow1[$m->getStart()] = array();
                    $manifTomorrow1[$m->getStart()][] = $m;
                }
                else{
                    $manifTomorrow1[$m->getStart()][] = $m;
                }
            }
            foreach((array)$tomorrow2 as $m)
            {
                if(!array_key_exists($m->getStart(),$manifTomorrow2)){
                    $manifTomorrow2[$m->getStart()] = array();
                    $manifTomorrow2[$m->getStart()][] = $m;
                }
                else{
                    $manifTomorrow2[$m->getStart()][] = $m;
                }
            }
            foreach((array)$manifestationsPro as $m)
            {
                if(!array_key_exists($m->getStart(),$manifProByDate)){
                    $manifProByDate[$m->getStart()] = array();
                    $manifProByDate[$m->getStart()][] = $m;
                }
                else{
                    $manifProByDate[$m->getStart()][] = $m;
                }
            }
            $_SESSION['description'] = "Toutes les manifestations dans le département ".$department->getName().",venez les découvrir :";
            $_SESSION['ariane'] = "Manifestations > Département > ".$department->getName();
            $_SESSION['title'] = "Brocante - ".$region->getName() . ", " . $department->getName();
            include('views/department/show.php');
            }
            else {
                header('Location: /');
            }

        }

    public function region()
    {
        if (isset($_GET['id']) && $this->_rm->exists($_GET['id'])) {
            $types = $this->_tm->getAll();
            $region = $this->_rm->get((int)$_GET['id']);
            $regions = $this->_rm->getAll();
            $nearRegion = $this->_mm->getNearRegion($region->getName());
            $manifestations = $this->_mm->getByRegion($region->getName());
            $tomorrow =  $this->_mm->getTomorrowRegion(0,$region->getName());
            $tomorrow1 =  $this->_mm->getTomorrowRegion(1,$region->getName());
            $tomorrow2 =  $this->_mm->getTomorrowRegion(2,$region->getName());
            $manifByDate = array();
            $manifTomorrow = array();
            $manifTomorrow1 = array();
            $manifTomorrow2 = array();
            foreach((array)$manifestations as $m)
            {
                if(!array_key_exists($m->getStart(),$manifByDate)){
                    $manifByDate[$m->getStart()] = array();
                    $manifByDate[$m->getStart()][] = $m;
                }
                else{
                    $manifByDate[$m->getStart()][] = $m;
                }
            }
            foreach((array)$tomorrow as $m)
            {
                if(!array_key_exists($m->getStart(),$manifTomorrow)){
                    $manifTomorrow[$m->getStart()] = array();
                    $manifTomorrow[$m->getStart()][] = $m;
                }
                else{
                    $manifTomorrow[$m->getStart()][] = $m;
                }
            }
            foreach((array)$tomorrow1 as $m)
            {
                if(!array_key_exists($m->getStart(),$manifTomorrow1)){
                    $manifTomorrow1[$m->getStart()] = array();
                    $manifTomorrow1[$m->getStart()][] = $m;
                }
                else{
                    $manifTomorrow1[$m->getStart()][] = $m;
                }
            }
            foreach((array)$tomorrow2 as $m)
            {
                if(!array_key_exists($m->getStart(),$manifTomorrow2)){
                    $manifTomorrow2[$m->getStart()] = array();
                    $manifTomorrow2[$m->getStart()][] = $m;
                }
                else{
                    $manifTomorrow2[$m->getStart()][] = $m;
                }
            }
            $_SESSION['description'] = "Toutes les manifestations dans la region ".$region->getName().",venez les découvrir !";
            $_SESSION['ariane'] = "Manifestations > Region > ".$region->getName();
            $_SESSION['title'] = "Brocante - ".$region->getName() . ", Tout département";
            include('views/region/show.php');
        }
            else {
                header('Location: /');
            }
        }

        public function show(){

            if (isset($_GET['name'])) {
                $name = htmlspecialchars(str_replace("_"," ",$_GET['name']));
                if ($this->_mm->exists($name)) {
                    $manifestation = $this->_mm->get($name);
                    $nearTowns = $this->_mm->getNearTowns($manifestation->getDepartment());
                    $organiser = $this->_um->get((int)$manifestation->getIdOrganiser());
                    if (isset($_SESSION['userId']) && $manifestation->getIdOrganiser() != $_SESSION['userId'])
                        $this->_mm->upVisits($_GET['name']);
                    $_SESSION['ariane'] = $manifestation->getRegion()." > ".$manifestation->getDepartment()." > ".$manifestation->getName();
                    $_SESSION['title'] = $manifestation->getDepartment()." - ".$manifestation->getName();
                    $_SESSION['description'] = "Découvrer ".$manifestation->getName()." dans la region ".$manifestation->getRegion()." (".$manifestation->getDepartment().") le ".$manifestation->getStart()." !";
                    include 'views/manifestations/show.php';
                } else {
                    header('Location: /User/manifestations');
                }
            }
            else{
                header('Location: /');
            }

        }

    public function update()
    {
        $_SESSION['ariane'] = "Modifier mon annonce";
        $_SESSION['title'] = "Modifier mon annonce";
        if (isset($_POST['title'], $_POST['route'], $_POST['city'], $_POST['department'], $_POST['region'], $_POST['dateStart'], $_POST['dateEnd'], $_POST['timeStart'], $_POST['timeEnd'], $_POST['type'])) {

                $formerManifestation = $this->_mm->get((int)$_POST['idManif']);
                $schedule = "De ".$_POST['timeStart']." à ".$_POST['timeEnd'];
                function upload($index,$destination,$maxsize=FALSE,$extensions=FALSE)
                {
                    if (!isset($_FILES[$index]) OR $_FILES[$index]['error'] > 0) return FALSE;

                    if ($maxsize !== FALSE AND $_FILES[$index]['size'] > $maxsize) return FALSE;

                    $ext = substr(strrchr($_FILES[$index]['name'],'.'),1);
                    if ($extensions !== FALSE AND !in_array($ext,$extensions)) return FALSE;

                    return move_uploaded_file($_FILES[$index]['tmp_name'],$destination);
                }
                if( $_POST['image'] != NULL){
                    $nom = md5(uniqid(rand(), true));
                    $ext = substr(strrchr($_FILES['image']['name'],'.'),1);
                    $path = "assets/img/manifestations/".$nom.".".$ext;
                    $valid_extensions = array( 'jpg' , 'jpeg' ,'png' );
                    if(!(upload('image',$path,6291456,$valid_extensions))){
                        $_SESSION['message'] = "Il y a eu un problème lors de l'upload du fichier";
                    }
                }
                else{
                    $path = $formerManifestation->getImage();
                }

                if($_POST['parking'] != NULL)
                    $parking = htmlspecialchars($_POST['parking']);
                else
                    $parking = $formerManifestation->getParking();

            $array = array('idManifestation' => $_POST['manifId'], 'name' => $_POST['title'], 'city' => $_POST['city'], 'department' => $_POST['department'], 'address' => $_POST['route'], 'region' => $_POST['region'], 'start' => $_POST['dateStart'], 'end' => $_POST['dateEnd'], 'idOrganiser' => $_SESSION['userId'], 'type' => $_POST['type'], 'site' => $_POST['site'], 'price' => $_POST['price'], 'exhibitorNumber' => $_POST['exhibitorNumber'], 'exhibitorPrice' => $_POST['exhibitorPrice'], 'schedule' => $schedule, 'image' => $path, 'informations' => $_POST['content'], 'parking' => $parking);
            $manifestation = new Manifestation($array);
            $this->_mm->update($manifestation);
            header('Location: /Manifestation/' . str_replace(" ", "_", $manifestation->getRegion()) . '/' . str_replace(" ", "_", $manifestation->getDepartment()) . '/' . str_replace(" ", "_", $manifestation->getCity()) . '/' . str_replace(' ', '_', $manifestation->getName()));
        } else {
            $departments = $this->_dm->getAll();
            $regions = $this->_rm->getAll();
            $types = $this->_tm->getAll();
            $manifestation = $this->_mm->get((int)$_GET['id']);
            if ($manifestation->getIdOrganiser() == $_SESSION['userId']) {
                $start = substr($manifestation->getSchedule(), 3, 5);
                $end = substr($manifestation->getSchedule(), 11, 6);
                include_once('views/manifestations/add.php');
            } else {
                header('Location: index.php');
            }
        }
    }

}

?>