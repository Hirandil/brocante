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


        class NewsController extends Controller
        {
            private $_um;
            private $_nm;

            public function __construct(){
                parent::__construct();
                $this->_um = new UserManager($this->_db);
                $this->_nm = new NewsManager($this->_db);
            }

            public function create() {
                if(isset($_POST['title'],$_POST['content']))
                {
                    if($_POST['title'] != "" && $_POST['content'] != "")
                    {
                        $curr_user = $this->_um->get((int)$_SESSION['userId']);
                        if($curr_user->getAdmin() == true){
                            $array = array('id'=> 0,'title'=> htmlspecialchars($_POST['title']),'content'=> htmlspecialchars($_POST['content']));
                            $news = new News($array);
                            $this->_nm->create($news);
                            $_SESSION['message'] = "Post crée";
                            header('Location: /News/all');
                        }
                        else{
                            echo "no rights";
                            $_SESSION['message'] = "Vous n'avez pas les droits";
                        }
                    }
                    else
                    {
                        echo "no fields";
                        $_SESSION['message'] = "Remplissez les champs";
                    }
                }
                else{
                    $update = false;
                    include('views/news/add.php');
                }
            }

            public function all(){
                $news = $this->_nm->getAll();
                include('views/news/news.php');
            }

            public function update(){
                $update = true;
                include('views/news/add.php');
            }

            public function show(){
                if(isset($_GET['id'])){
                    $news = $this->_nm->get((int)$_GET['id']);
                    include('views/news/show.php');
                }
            }

        }
?>