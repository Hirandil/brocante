<?php
/**
 * Created by PhpStorm.
 * User: relbachiri
 * Date: 22/07/14
 * Time: 11:02
 */
require_once 'models/User.php';
require_once 'models/News.php';
require_once 'models/userManager.php';
require_once 'models/newsManager.php';
require_once 'Controller/Controller.php';


class InformationsController extends Controller
{
    private $_um;
    private $_nm;

    public function __construct()
    {
        parent::__construct();
        $this->_um = new UserManager($this->_db);
        $this->_nm = new NewsManager($this->_db);
    }

    public function create()
    {
        $_SESSION['title'] = "Nouvelle actualité";
        $_SESSION['ariane'] = "Nouvelle actualité";
        if (isset($_POST['title'], $_POST['content'])) {
            if ($_POST['title'] != "" && $_POST['content'] != "") {
                $curr_user = $this->_um->get((int)$_SESSION['userId']);
                if ($curr_user->getAdmin() == true) {
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
                        $path = "assets/img/news/" . $nom . "." . $ext;
                        $valid_extensions = array('jpg', 'jpeg', 'png');
                        if (!(upload('image', $path, 6291456, $valid_extensions))) {
                            $_SESSION['error'] = "Problème lors de l'upload du fichier";
                            $path = "assets/img/news/default-news.png";
                        }
                    } else {
                        $path = "assets/img/news/default-news.png";
                    }
                    $titleUrl = removeSpecialCarac($_POST['title']);
                    $array = array('id' => 0, 'title' => htmlspecialchars($_POST['title']),'titleUrl' => $titleUrl, 'content' => htmlspecialchars($_POST['content']),'image' => $path);
                    $news = new News($array);
                    $this->_nm->create($news);
                    $_SESSION['message'] = "Actualité crée";
                    header('Location: /Informations/actualites');
                    exit;
                } else {
                    $_SESSION['error'] = "Vous n'avez pas les droits";
                }
            } else {
                $_SESSION['error'] = "Remplisser tous les champs";
            }
        } else {
            $update = false;
            include('views/news/add.php');
        }
    }

    public function actualites()
    {
        $_SESSION['ariane'] = "Toutes les actualités";
        $_SESSION['title'] = "Actualités Brocante, Vide-Greniers: infos sur le marché, ventes, insolite - 123Brocante";
        $_SESSION['description'] = "Consultez toutes les actualités du monde des brocantes et des vide-greniers sur 123Brocante.com";
        if(isset($_SESSION['userId']))
        {
            $user = $this->_um->get((int)$_SESSION['userId']);
        }
        $news = $this->_nm->getAll();
        include('views/news/news.php');
    }

    public function update()
    {
        $_SESSION['ariane'] = "Modifier une actualité";
        $_SESSION['title'] = "Modifier mon actualité";
        $update = true;
        if (isset($_POST['title'], $_POST['content'])) {
            if ($_POST['title'] != "" && $_POST['content'] != "") {
                $formerNews = $this->_nm->get((int)$_POST['id']);
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
                //Upload d'image
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
                    $path = "assets/img/news/" . $nom . "." . $ext;
                    $valid_extensions = array('jpg', 'jpeg', 'png');
                    if (!(upload('image', $path, 6291456, $valid_extensions))) {
                        $_SESSION['error'] = "Problème lors de l'upload du fichier";
                        $path = $formerNews->getImage();
                    }
                } else {
                    $path = $formerNews->getImage();
                }
                $titleUrl = removeSpecialCarac($_POST['title']);
                $array = array('id' => $_POST['id'],'title' => $_POST['title'],'titleUrl' => $titleUrl,'content' => $_POST['content'],'image' => $path);
                $news = new News($array);
                $this->_nm->update($news);
                $_SESSION['message'] = "Actualité modifiée";
                header('Location: /Informations/actualites');
                exit;
            }
            else
            {
                $_SESSION['message'] = "Remplissez tous les champs";
            }
        }
        else {
            $news = $this->_nm->get((int)$_GET['id']);
            include('views/news/add.php');
        }
    }

    public function destroy()
    {
        $_SESSION['ariane'] = "Supprimer une actualité";
        $_SESSION['title'] = "Supprimer une actualité";
        if(isset($_GET['id'])){
            $user = $this->_um->get((int)$_SESSION['userId']);
            if($user->getAdmin()){
                $this->_nm->destroy((int)$_GET['id']);
                $_SESSION['message'] = "Actualité supprimé";
                header('Location: /Informations/actualites');
                exit;
            }
            else{
                header('Location: /');
            }
        }
        else{
            header('Location: /');
        }
    }

    public function show()
    {
        if (isset($_GET['id'])) {
            $name = $_GET['id'];
            if($this->_nm->exists($name)){
                $news = $this->_nm->get($name);
                $_SESSION['description'] = html_entity_decode(substr($news->getContent(),0,140));
                $_SESSION['ariane'] = "Actualités > ".$news->getTitle();
                $_SESSION['title'] = $news->getTitle();
                include('views/news/show.php');
            }
        }
        else{
            header('Location: /');
        }
    }

}

?>