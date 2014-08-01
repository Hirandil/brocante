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
                    $array = array('id' => 0, 'title' => htmlspecialchars($_POST['title']), 'content' => htmlspecialchars($_POST['content']));
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
        $_SESSION['title'] = "Toutes les news";
        $_SESSION['description'] = "Retrouvez toutes les actualités de vos ".$_SESSION['type']." sur votre site 123Brocante.com!";
        $user = $this->_um->get((int)$_SESSION['userId']);
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
                $array = array('id' => $_POST['id'],'title' => $_POST['title'],'content' => $_POST['content']);
                $news = new News($array);
                $this->_nm->update($news);
                $_SESSION['message'] = "Actualité modifiée";
                header('Refresh: 2; url= /Informations/actualites');
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
                header('Location: /Informations/actualites');
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
            $name = htmlspecialchars(str_replace("_"," ",$_GET['id']));
            if($this->_nm->exists($name)){
                $news = $this->_nm->get($name);
                $_SESSION['description'] = $news->getTitle().", retrouver toutes vos actualités sur 123Brocante.com!";
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