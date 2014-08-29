<?php
require_once 'models/User.php';
require_once 'models/Type.php';
require_once 'models/Manifestation.php';
require_once 'models/Ville.php';
require_once 'models/Region.php';
require_once 'models/Department.php';
require_once 'models/userManager.php';
require_once 'models/villeManager.php';
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
    private $_vm;

    public function __construct()
    {
        parent::__construct();
        $this->_um = new UserManager($this->_db);
        $this->_mm = new manifestationManager(($this->_db));
        $this->_tm = new typeManager($this->_db);
        $this->_rm = new regionManager($this->_db);
        $this->_dm = new departmentManager($this->_db);
        $this->_vm = new villeManager($this->_db);
    }


    public function add()
    {
        $_SESSION['title'] = "Annoncer une manifestation";
        $_SESSION['ariane'] = "Nouvelle manifestation";
        $_SESSION['description'] = "Annoncer votre " . $_SESSION['type'] . " sur 123Brocante et alerter des centaines d'internautes dans toute la France !";
        if (isset($_SESSION['userLogin'])) {

            if (isset($_POST['title'], $_POST['route'], $_POST['city'], $_POST['department'], $_POST['region'], $_POST['dateStart'], $_POST['dateEnd'], $_POST['timeStart'], $_POST['timeEnd'], $_POST['type'])) {
                if (($_POST['title'] != "") && ($_POST['route'] != "") && ($_POST['city'] != "") && ($_POST['department'] != "") && ($_POST['region'] != "") && ($_POST['dateStart'] != "") && ($_POST['dateEnd'] != "") && ($_POST['timeStart'] != "") && ($_POST['timeEnd'] != "") && ($_POST['type'] != "")) {

                    $dateStart = date('Y-m-d H:i:s', strtotime($_POST['dateStart']));
                    $dateEnd = date('Y-m-d H:i:s', strtotime($_POST['dateEnd']));
                    function removeSpecialCarac($chaine,$charset='utf-8')
                    {
                        $chaine = htmlentities($chaine, ENT_NOQUOTES, $charset);
                        $caracteres = array(
                            'À' => 'a', 'Á' => 'a', 'Â' => 'a', 'Ä' => 'a', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ä' => 'a', '@' => 'a',
                            'È' => 'e', 'É' => 'e', 'Ê' => 'e', 'Ë' => 'e', 'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', '€' => 'e',
                            'Ì' => 'i', 'Í' => 'i', 'Î' => 'i', 'Ï' => 'i', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
                            'Ò' => 'o', 'Ó' => 'o', 'Ô' => 'o', 'Ö' => 'o', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'ö' => 'o',
                            'Ù' => 'u', 'Ú' => 'u', 'Û' => 'u', 'Ü' => 'u', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'µ' => 'u',
                            'Œ' => 'oe', 'œ' => 'oe',
                            '$' => 's');

                        $chaine = strtr($chaine, $caracteres);
                        $chaine = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $chaine);
                        $chaine = preg_replace('#[^A-Za-z0-9]+#', '-', $chaine);
                        $chaine = trim($chaine, '-');
                        $chaine = strtolower($chaine);

                        return $chaine;
                    }
                    //Fonction pour upload l'image ainsi que le path
                    function upload($index, $destination, $maxsize = FALSE, $extensions = FALSE)
                    {
                        if (!isset($_FILES[$index]) OR $_FILES[$index]['error'] > 0) return FALSE;

                        if ($maxsize !== FALSE AND $_FILES[$index]['size'] > $maxsize) return FALSE;

                        $ext = substr(strrchr($_FILES[$index]['name'], '.'), 1);
                        if ($extensions !== FALSE AND !in_array($ext, $extensions)) return FALSE;

                        return move_uploaded_file($_FILES[$index]['tmp_name'], $destination);
                    }

                    //Test de la présence de l'image et upload l'image
                    if ($_FILES['image'] != null) {
                        $nom = md5(uniqid(rand(), true));
                        $ext = substr(strrchr($_FILES['image']['name'], '.'), 1);
                        $path = "assets/img/manifestations/" . $nom . "." . $ext;
                        $valid_extensions = array('jpg', 'jpeg', 'png');
                        if (!(upload('image', $path, 6291456, $valid_extensions))) {
                            $_SESSION['error'] = "Problème lors de l'upload du fichier";
                            $path = "assets/img/manifestations/thumbnail-default.jpg";
                        }
                    } else {
                        $path = "assets/img/manifestations/thumbnail-default.jpg";
                    }
                    $region = $_POST['region'];
                    $department = $_POST['department'];
                    $city = $this->_vm->get($_POST['city']);
                    if ($city->getId() == "") {
                        $city->setDepartment(75);
                        $_SESSION['error'] = "Ville inexistante!";
                    }
                    //Test région et departement
                    if ($region == "null") {
                        $dept = $this->_dm->getDept($city->getDepartment());
                        $region = $this->_rm->get((int)$dept->getRegion())->getName();
                    }

                    if ($department == "null") {
                        $department = $this->_dm->getDept($city->getDepartment())->getName();
                    }

                    if ($dateStart > $dateEnd) {
                        $_SESSION['error'] = 'Dates Invalides';
                        header('Location: /Manifestation/Annoncer-une-manifestation');
                        exit;
                    }
                    if ($this->_mm->exists($_POST['title'])) {
                        $_SESSION['error'] = "Nom deja utilisé";
                        header('Location: /Manifestation/Annoncer-une-manifestation');
                        exit;
                    }
                    $nameUrl = removeSpecialCarac(htmlentities($_POST['title']));
                    $schedule = "De " . $_POST['timeStart'] . " à " . $_POST['timeEnd'];
                    $array = array('idManifestation' => 0, 'name' => $_POST['title'],'nameUrl' => $nameUrl, 'city' => $_POST['city'],
                        'department' => $department, 'address' => $_POST['route'], 'region' => $region,
                        'start' => $dateStart, 'end' => $dateEnd, 'idOrganiser' => $_SESSION['userId'],
                        'type' => $_POST['type'], 'site' => $_POST['site'], 'price' => $_POST['price'],
                        'exhibitorNumber' => $_POST['exhibitorNumber'], 'exhibitorPrice' => $_POST['exhibitorPrice'], 'contact' => $_POST['contact'],
                        'schedule' => $schedule, 'image' => $path, 'parking' => $_POST['parking'], 'informations' => $_POST['content']);
                    $manifestation = new Manifestation($array);
                    $this->_mm->create($manifestation);
                    if (!isset($_SESSION['error']))
                        $_SESSION['message'] = 'Manifestation crée';

                    header('Location: /User/manifestations');
                    exit;

                } else {
                    $departments = $this->_dm->getAll();
                    $regions = $this->_rm->getAll();
                    $types = $this->_tm->getAll();
                    include 'views/manifestations/add.php';
                }
            } else {
                $departments = $this->_dm->getAll();
                $regions = $this->_rm->getAll();
                $types = $this->_tm->getAll();
                include 'views/manifestations/add.php';
            }
        } else {
            $_SESSION['error'] = 'Vous devez être connecté';
            include 'views/login.html';
        }
    }

    public function destroy()
    {
        $_SESSION['ariane'] = "Supprimer une manifestation";
        $_SESSION['title'] = "Supprimer une manifestation";
        if (isset($_GET['id'])) {
            $manif = $this->_mm->get((int)$_GET['id']);
            if ($manif->getIdOrganiser() == $_SESSION['userId']) {
                $this->_mm->destroy((int)$_GET['id']);
                $_SESSION['message'] = 'Manifestation supprimé';
                header('Location: /User/manifestations');
                exit;
            } else {
                $_SESSION['error'] = "Problème d'utilisateur";
                header('Location: /User/manifestations');
                exit;
            }
        }
    }

    public function rechercher()
    {
        $_SESSION['title'] = "Rechercher une manifestation";
        $_SESSION['ariane'] = "<a href=\"Manifestation/Rechercher-des-manifestations\">Recherche</a> > Résultats";
        $_SESSION['description'] = "Rechercher des " . $_SESSION['type'] . " et plus encore dans votre region et dans toute la France avec 123Brocante";
        if (isset($_POST['region'], $_POST['department'])) {
            $filtre = array();
            $manifestations = NULL;
            if ($_POST['region'] != "null" && $_POST['department'] == "null"
                && isset($_POST['type']) && ($_POST['type'] == "null" || $_POST['type'] == "------")
                && isset($_POST['start']) && $_POST['start'] == null
                && isset($_POST['end']) && $_POST['end'] == null
            ) {
                $region = $this->_rm->get($_POST['region']);
                header('Location: /Manifestation/region/' . str_replace(" ", "-", $region->getName()) . '/' . $region->getId());
            } else if ($_POST['department'] != "null" && $_POST['region'] == "null"
                && isset($_POST['type']) && ($_POST['type'] == "null" || $_POST['type'] == "------")
                && isset($_POST['start']) && $_POST['start'] == null
                && isset($_POST['end']) && $_POST['end'] == null
            ) {
                $department = $this->_dm->getByName(htmlentities($_POST['department']));
                $region = $this->_rm->get((int)$department->getRegion());
                header('Location: /Manifestation/' . str_replace(" ", "-", $region->getName()) . '/' . str_replace(" ", "-", $department->getName()) . '/' . $department->getZipCode());
            } else if ($_POST['region'] != "null" && isset($_POST['city']) && $_POST['city'] == null)
            {
                $department = $this->_dm->getByName(htmlentities($_POST['department']));
                $region = $this->_rm->get((int)$department->getRegion());
                header('Location: /Manifestation/' . str_replace(" ", "-", $region->getName()) . '/' . str_replace(" ", "-", $department->getName()) . '/' . $department->getZipCode());
            } else if ($_POST['city'] != null && $_POST['region'] == "null")
            {
                if($this->_vm->exists(htmlentities($_POST['city']))){
                    $city = $this->_vm->get(htmlentities($_POST['city']));
                    header('Location: /Manifestation/ville/'.$city->getDepartment  ().'/'.$city->getName());
                }else{
                    $_SESSION['error'] = "La ville n'existe pas";
                    header('Location /');
                    exit;
                }
            }
            else {
                if (isset($_POST['city'])) {
                    if ($_POST['city'] != null) {
                        $filtre['where'][] = 'city=:city';
                        $filtre['PDOargument']['city'] = htmlspecialchars($_POST['city']);
                    }
                }

                if (isset($_POST['type'], $_POST['start'], $_POST['end'])) {
                    if ($_POST['start'] != null) {
                        $filtre['where'][] = 'start>=:start';
                        $filtre['PDOargument']['start'] = htmlspecialchars($_POST['start']);
                    }
                    if ($_POST['end'] != null) {
                        $filtre['where'][] = 'end<=:end';
                        $filtre['PDOargument']['end'] = htmlspecialchars($_POST['end']);
                    }
                    if (($_POST['type']) != "------" && $_POST['type'] != "null") {
                        $filtre['where'][] = 'type=:type';
                        $filtre['PDOargument']['type'] = htmlspecialchars($_POST['type']);
                    }

                }

                if ($_POST['region'] != "null") {
                    $filtre['where'][] = 'region=:region';
                    $filtre['PDOargument']['region'] = htmlspecialchars($_POST['region']);
                }
                if ($_POST['department'] != "null") {
                    $filtre['where'][] = 'department=:department';
                    $filtre['PDOargument']['department'] = htmlspecialchars($_POST['department']);
                }
                if (!empty($filtre)) {
                    $manifestations = $this->_mm->search($filtre);
                    include('views/manifestations/results.php');

                } else {
                    $_SESSION['message'] = "Toutes les manifestations";
                    $manifestations = $this->_mm->getAll();
                    include('views/manifestations/results.php');
                }
            }
        } else if (isset($_POST['date'])) {

            if (isset($_POST['department']) && $_POST['department'] != "null" && $_POST['types'] == "null" && $_POST['date'] == "null") {
                $department = $this->_dm->getByName(htmlentities($_POST['department']));
                $region = $this->_rm->get((int)$department->getRegion());
                header('Location: /Manifestation/' . str_replace(" ", "-", $region->getName()) . '/' . str_replace(" ", "-", $department->getName()) . '/' . $department->getZipCode());
            } else if (isset($_POST['region']) && $_POST['region'] != "null" && $_POST['types'] == "null" && $_POST['date'] == "null") {
                $region = $this->_rm->get($_POST['region']);
                header('Location: /Manifestation/region/' . str_replace(" ", "-", $region->getName()) . '/' . $region->getId());
            } else {
                if ($_POST['types'] != "null") {
                    $filtre['where'][] = 'type=:type';
                    $filtre['PDOargument']['type'] = htmlspecialchars($_POST['types']);
                }
                if ($_POST['date'] != "null") {
                    $filtre['where'][] = '(start = CURDATE() + INTERVAL :date DAY OR start < CURDATE() + INTERVAL :date + 6 DAY AND start > CURDATE() + INTERVAL :date DAY)';
                    $filtre['PDOargument']['date'] = htmlspecialchars($_POST['date']);
                }
                if (isset($_POST['region'])) {
                    if ($_POST['region'] != "null") {
                        $filtre['where'][] = 'region=:region';
                        $filtre['PDOargument']['region'] = htmlspecialchars($_POST['region']);
                    }
                }
                if (isset($_POST['department'])) {
                    if ($_POST['department'] != "null") {
                        $filtre['where'][] = 'department=:department';
                        $filtre['PDOargument']['department'] = htmlspecialchars($_POST['department']);
                    }
                }
                if (!empty($filtre)) {
                    $manifestations = $this->_mm->search($filtre);
                    include('views/manifestations/results.php');
                } else {
                    $manifestations = $this->_mm->getAll();
                    include('views/manifestations/results.php');
                }
            }
        } else {
            $_SESSION['ariane'] = "Recherche";
            $regions = $this->_rm->getAll();
            $departments = $this->_dm->getAll();
            $types = $this->_tm->getAll();

            include('views/manifestations/search.php');
        }
    }

    public function index()
    {
        $_SESSION['description'] = "123brocante.com est un agenda des vide-greniers en France. Le site 123brocante.com propose aux internautes les informations utiles sur
le vide-grenier à coté de chez eux. Les videgreniers sont classés par régions (Ile de France, Provence Alpes Côte d'azur PACA) et par départements (Bouches du Rhône, Haute Garonne, Gironde...).";
        $regions = null;
        $regions_tmp = $this->_rm->getAll();
        foreach ($regions_tmp as $r) {
            $regions[$r->getId()] = $r;
        }
        $departments = $this->_dm->getAll();
        include('views/home.php');
    }

    public function department()
    {
        if (isset($_GET['id']) && $this->_dm->exists($_GET['id'])) {
            $types = $this->_tm->getAll();
            $departments = $this->_dm->getAll();
            $department = $this->_dm->get($_GET['id']);
            $region = $this->_rm->get((int)$department->getRegion());
            $nearRegion = $this->_mm->getNearRegion($region->getName());
            $manifestations = $this->_mm->getByDepartment($department->getName());
            $manifestationsPro = $this->_mm->getProByDepartment($department->getName());

            for ($i = 0; $i <= 30; $i++) {
                ${'tomorrow'.$i} = $this->_mm->getTomorrowDept($i, $department->getName());
                ${'manifTomorrow'.$i} = array();
                foreach ((array)${'tomorrow'.$i} as $m) {
                    if (!array_key_exists($m->getStart(), ${'manifTomorrow'.$i})) {
                        ${'manifTomorrow'.$i}[$m->getStart()] = array();
                        ${'manifTomorrow'.$i}[$m->getStart()][] = $m;
                    } else {
                        ${'manifTomorrow'.$i}[$m->getStart()][] = $m;
                    }
                }
            }

//            $tomorrow = $this->_mm->getTomorrowDept(0, $department->getName());
//            $tomorrow1 = $this->_mm->getTomorrowDept(1, $department->getName());
//            $tomorrow2 = $this->_mm->getTomorrowDept(2, $department->getName());
            $manifProByDate = array();
            $manifByDate = array();
//            $manifTomorrow = array();
//            $manifTomorrow1 = array();
//            $manifTomorrow2 = array();
            foreach ((array)$manifestations as $m) {
                if (!array_key_exists($m->getStart(), $manifByDate)) {
                    $manifByDate[$m->getStart()] = array();
                    $manifByDate[$m->getStart()][] = $m;
                } else {
                    $manifByDate[$m->getStart()][] = $m;
                }
            }
//            foreach ((array)$tomorrow0 as $m) {
//                if (!array_key_exists($m->getStart(), $manifTomorrow0)) {
//                    $manifTomorrow0[$m->getStart()] = array();
//                    $manifTomorrow0[$m->getStart()][] = $m;
//                } else {
//                    $manifTomorrow0[$m->getStart()][] = $m;
//                }
//            }
//            foreach ((array)$tomorrow1 as $m) {
//                if (!array_key_exists($m->getStart(), $manifTomorrow1)) {
//                    $manifTomorrow1[$m->getStart()] = array();
//                    $manifTomorrow1[$m->getStart()][] = $m;
//                } else {
//                    $manifTomorrow1[$m->getStart()][] = $m;
//                }
//            }
//            foreach ((array)$tomorrow2 as $m) {
//                if (!array_key_exists($m->getStart(), $manifTomorrow2)) {
//                    $manifTomorrow2[$m->getStart()] = array();
//                    $manifTomorrow2[$m->getStart()][] = $m;
//                } else {
//                    $manifTomorrow2[$m->getStart()][] = $m;
//                }
//            }
            foreach ((array)$manifestationsPro as $m) {
                if (!array_key_exists($m->getStart(), $manifProByDate)) {
                    $manifProByDate[$m->getStart()] = array();
                    $manifProByDate[$m->getStart()][] = $m;
                } else {
                    $manifProByDate[$m->getStart()][] = $m;
                }
            }
            $_SESSION['description'] = $department->getName().": consultez toutes les brocantes, vide-greniers et salons des collectionneurs pour le département ".$department->getName()." sur 123Brocante.com";
            $_SESSION['ariane'] = "Département > " . $department->getName();
            $_SESSION['title'] = "Brocantes ".$department->getName()." (".$department->getZipCode()."):  vide-greniers et salons de collectionneurs";
            include('views/department/show.php');
        } else {
            $_SESSION['error'] = "Ce département n'existe pas";
            header('Location: /');
            exit;
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

            for ($i = 0; $i <= 30; $i++) {
                ${'tomorrow'.$i} = $this->_mm->getTomorrowRegion($i, $region->getName());
                ${'manifTomorrow'.$i} = array();
                foreach ((array)${'tomorrow'.$i} as $m) {
                    if (!array_key_exists($m->getStart(), ${'manifTomorrow'.$i})) {
                        ${'manifTomorrow'.$i}[$m->getStart()] = array();
                        ${'manifTomorrow'.$i}[$m->getStart()][] = $m;
                    } else {
                        ${'manifTomorrow'.$i}[$m->getStart()][] = $m;
                    }
                }
            }

//            $tomorrow = $this->_mm->getTomorrowRegion(0, $region->getName());
//            $tomorrow1 = $this->_mm->getTomorrowRegion(1, $region->getName());
//            $tomorrow2 = $this->_mm->getTomorrowRegion(2, $region->getName());
            $manifByDate = array();
//            $manifTomorrow = array();
//            $manifTomorrow1 = array();
//            $manifTomorrow2 = array();
            foreach ((array)$manifestations as $m) {
                if (!array_key_exists($m->getStart(), $manifByDate)) {
                    $manifByDate[$m->getStart()] = array();
                    $manifByDate[$m->getStart()][] = $m;
                } else {
                    $manifByDate[$m->getStart()][] = $m;
                }
            }
//            foreach ((array)$tomorrow as $m) {
//                if (!array_key_exists($m->getStart(), $manifTomorrow)) {
//                    $manifTomorrow[$m->getStart()] = array();
//                    $manifTomorrow[$m->getStart()][] = $m;
//                } else {
//                    $manifTomorrow[$m->getStart()][] = $m;
//                }
//            }
//            foreach ((array)$tomorrow1 as $m) {
//                if (!array_key_exists($m->getStart(), $manifTomorrow1)) {
//                    $manifTomorrow1[$m->getStart()] = array();
//                    $manifTomorrow1[$m->getStart()][] = $m;
//                } else {
//                    $manifTomorrow1[$m->getStart()][] = $m;
//                }
//            }
//            foreach ((array)$tomorrow2 as $m) {
//                if (!array_key_exists($m->getStart(), $manifTomorrow2)) {
//                    $manifTomorrow2[$m->getStart()] = array();
//                    $manifTomorrow2[$m->getStart()][] = $m;
//                } else {
//                    $manifTomorrow2[$m->getStart()][] = $m;
//                }
//            }
            $_SESSION['description'] = $region->getName().": consultez toutes les brocantes, vide-greniers et salons des collectionneurs pour la région".$region->getName()."sur 123Brocante.com";
            $_SESSION['ariane'] = "Region > " . $region->getName();
            $_SESSION['title'] = "Brocantes ".$region->getName()." : vide-greniers et salons de collectionneurs";
            include('views/region/show.php');
        } else {
            $_SESSION['error'] = "Cette région n'existe pas";
            header('Location: /');
            exit;
        }
    }

    public function ville()
    {
        if (isset($_GET['id']) && $this->_vm->exists($_GET['id'])) {
            $ville = $this->_vm->get($_GET['id']);
            $types = $this->_tm->getAll();
            $departments = $this->_dm->getAll();
            $department = $this->_dm->get($_GET['dept']);
            $region = $this->_rm->get((int)$department->getRegion());
            $nearRegion = $this->_mm->getNearRegion($region->getName());
            $manifestations = $this->_mm->getByCity($_GET['id']);
            $manifestationsPro = $this->_mm->getProByCity($_GET['id']);

            for ($i = 0; $i <= 30; $i++) {
                ${'tomorrow'.$i} = $this->_mm->getTomorrowCity($i, $_GET['id']);
                ${'manifTomorrow'.$i} = array();
                foreach ((array)${'tomorrow'.$i} as $m) {
                    if (!array_key_exists($m->getStart(), ${'manifTomorrow'.$i})) {
                        ${'manifTomorrow'.$i}[$m->getStart()] = array();
                        ${'manifTomorrow'.$i}[$m->getStart()][] = $m;
                    } else {
                        ${'manifTomorrow'.$i}[$m->getStart()][] = $m;
                    }
                }
            }

            $manifProByDate = array();
            $manifByDate = array();

            foreach ((array)$manifestations as $m) {
                if (!array_key_exists($m->getStart(), $manifByDate)) {
                    $manifByDate[$m->getStart()] = array();
                    $manifByDate[$m->getStart()][] = $m;
                } else {
                    $manifByDate[$m->getStart()][] = $m;
                }
            }
            foreach ((array)$manifestationsPro as $m) {
                if (!array_key_exists($m->getStart(), $manifProByDate)) {
                    $manifProByDate[$m->getStart()] = array();
                    $manifProByDate[$m->getStart()][] = $m;
                } else {
                    $manifProByDate[$m->getStart()][] = $m;
                }
            }
            $_SESSION['description'] = $_GET['id'].": consultez toutes les brocantes, vide-greniers et salons des collectionneurs pour ".$_GET['id']." sur 123Brocante.com";
            $_SESSION['ariane'] = "Ville > " . $ville->getName();
            $_SESSION['title'] = "Brocantes ".$_GET['id']." (".$ville->getDepartment()."): vide-greniers et salons de collectionneurs";
            include('views/city/show.php');
        } else {
            $_SESSION['error'] = "Cette ville n'existe pas";
            header('Location: /');
            exit;
        }

    }

    public function show()
    {

        if (isset($_GET['name'])) {
            $name = $_GET['name'];
            if ($this->_mm->exists($name)) {
                $manifestation = $this->_mm->get($name);
                date_default_timezone_set('Europe/Paris');
                setlocale (LC_TIME, 'fr_FR.utf8','fra');
                $dateStart = date('d/m/Y', strtotime($manifestation->getStart()));
                $dateEnd = date('d/m/Y', strtotime($manifestation->getEnd()));
                $department = $this->_dm->getByName($manifestation->getDepartment());
                $region = $this->_rm->get($manifestation->getRegion());
                $nearTowns = $this->_mm->getNearTowns($department->getZipCode());
                $organiser = $this->_um->get((int)$manifestation->getIdOrganiser());
                $type = $this->_tm->get($manifestation->getType());
                if (isset($_SESSION['userId']) && $manifestation->getIdOrganiser() != $_SESSION['userId'])
                    $this->_mm->upVisits($_GET['name']);
                $_SESSION['ariane'] = "<a href=\"/Manifestation/region/".str_replace(' ','-',$region->getName())."/" . $region->getId() ."\">" . $region->getName() . "</a>
                 > <a href=\"/Manifestation/".str_replace(" ","-",$region->getName())."/".str_replace(" ","-",$department->getName())."/".str_replace(" ","-",$department->getZipCode())."\" >".$department->getName()."</a>".
                    " > " . $manifestation->getName();
                $_SESSION['title'] = $manifestation->getName()." - ".$manifestation->getCity()." - ".$department->getZipCode()." - ".$department->getName();
                $_SESSION['description'] = $manifestation->getName().": consultez toutes les infos pratiques. Lieu, nombre d'exposants, prix de l'entrée";
                include 'views/manifestations/show.php';

            } else {
                $_SESSION['error'] = "Ce nom n'existe pas";
                header('Location: /');
                exit;
            }
        } else {
            header('Location: /');
        }

    }

    public function update()
    {
        $_SESSION['ariane'] = "Modifier mon annonce";
        $_SESSION['title'] = "Modifier mon annonce";
        if (isset($_POST['title'], $_POST['route'], $_POST['city'], $_POST['department'], $_POST['region'], $_POST['dateStart'], $_POST['dateEnd'], $_POST['timeStart'], $_POST['timeEnd'], $_POST['type'])) {
            $dateStart = date('Y-m-d H:i:s', strtotime($_POST['dateStart']));
            $dateEnd = date('Y-m-d H:i:s', strtotime($_POST['dateEnd']));
            $formerManifestation = $this->_mm->get((int)$_POST['idManif']);
            $schedule = "De " . $_POST['timeStart'] . " à " . $_POST['timeEnd'];
            function removeSpecialCarac($chaine,$charset='utf-8')
            {
                $chaine = htmlentities($chaine, ENT_NOQUOTES, $charset);
                $caracteres = array(
                    'À' => 'a', 'Á' => 'a', 'Â' => 'a', 'Ä' => 'a', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ä' => 'a', '@' => 'a',
                    'È' => 'e', 'É' => 'e', 'Ê' => 'e', 'Ë' => 'e', 'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', '€' => 'e',
                    'Ì' => 'i', 'Í' => 'i', 'Î' => 'i', 'Ï' => 'i', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
                    'Ò' => 'o', 'Ó' => 'o', 'Ô' => 'o', 'Ö' => 'o', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'ö' => 'o',
                    'Ù' => 'u', 'Ú' => 'u', 'Û' => 'u', 'Ü' => 'u', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'µ' => 'u',
                    'Œ' => 'oe', 'œ' => 'oe',
                    '$' => 's');

                $chaine = strtr($chaine, $caracteres);
                $chaine = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $chaine);
                $chaine = preg_replace('#[^A-Za-z0-9]+#', '-', $chaine);
                $chaine = trim($chaine, '-');
                $chaine = strtolower($chaine);

                return $chaine;
            }
            function upload($index, $destination, $maxsize = FALSE, $extensions = FALSE)
            {
                if (!isset($_FILES[$index]) OR $_FILES[$index]['error'] > 0) return FALSE;

                if ($maxsize !== FALSE AND $_FILES[$index]['size'] > $maxsize) return FALSE;

                $ext = substr(strrchr($_FILES[$index]['name'], '.'), 1);
                if ($extensions !== FALSE AND !in_array($ext, $extensions)) return FALSE;

                return move_uploaded_file($_FILES[$index]['tmp_name'], $destination);
            }

            if ($_FILES['image'] != NULL) {
                $nom = md5(uniqid(rand(), true));
                $ext = substr(strrchr($_FILES['image']['name'], '.'), 1);
                $path = "assets/img/manifestations/" . $nom . "." . $ext;
                $valid_extensions = array('jpg', 'jpeg', 'png');
                if (!(upload('image', $path, 6291456, $valid_extensions))) {
                    $_SESSION['error'] = "Problème lors de l'upload du fichier";
                    $path = $formerManifestation->getImage();
                }
            } else {
                $path = $formerManifestation->getImage();
            }

            if ($_POST['parking'] != NULL)
                $parking = htmlspecialchars($_POST['parking']);
            else
                $parking = $formerManifestation->getParking();

            if ($dateStart > $dateEnd) {
                $_SESSION['error'] = 'Dates Invalides';
                header('Location: /Manifestation/update/' . $formerManifestation->getId());
                exit;
            }
            $nameUrl = removeSpecialCarac($_POST['title']);
            $array = array('idManifestation' => $_POST['manifId'], 'name' => $_POST['title'],'nameUrl' => $nameUrl, 'city' => $_POST['city'], 'department' => $_POST['department'], 'address' => $_POST['route'], 'region' => $_POST['region'], 'contact' => $_POST['contact'], 'start' => $dateStart, 'end' => $dateEnd, 'idOrganiser' => $_SESSION['userId'], 'type' => $_POST['type'], 'site' => $_POST['site'], 'price' => $_POST['price'], 'exhibitorNumber' => $_POST['exhibitorNumber'], 'exhibitorPrice' => $_POST['exhibitorPrice'], 'schedule' => $schedule, 'image' => $path, 'informations' => $_POST['content'], 'parking' => $parking);
            $manifestation = new Manifestation($array);
            $this->_mm->update($manifestation);
            if (!isset($_SESSION['error']))
                $_SESSION['message'] = 'Manifestation mise à jour';

            header('Location: /Manifestation/' . str_replace(" ", "-", $manifestation->getRegion()) . '/' . str_replace(" ", "-", $manifestation->getDepartment()) . '/' . str_replace(" ", "-", $manifestation->getCity()) . '/' . str_replace(' ', '-', $manifestation->getNameUrl()));
            exit;
        } else {
            $departments = $this->_dm->getAll();
            $regions = $this->_rm->getAll();
            $types = $this->_tm->getAll();
            $manifestation = $this->_mm->get((int)$_GET['id']);
            if ($manifestation->getIdOrganiser() == $_SESSION['userId'] || $_SESSION['admin'] == 1) {
                $start = substr($manifestation->getSchedule(), 3, 5);
                $end = substr($manifestation->getSchedule(), 11, 6);
                include_once('views/manifestations/add.php');
            } else {
                header('Location: index.php');
            }
        }
    }

    public function all()
    {
        if ($_SESSION['userId'] && $_SESSION['admin'] == 1) {
            $manifestations = $this->_mm->getAll();
            foreach ($manifestations as $m) {
                $user = $this->_um->get((int)$m->getIdOrganiser());
                $m->organiser = $user;
            }
            include 'views/admin/manifestations.php';

        } else {
            header('Location: /');
        }
    }


}

?>