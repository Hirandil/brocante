<?php
require_once 'models/User.php';
require_once 'controllers/Controller.php';

class UserController extends Controller
{
    private $_um;

    public function __construct(){
        parent::__construct();
        $this->_um = new UserManager($this->_db);
    }

    public function login(){
        if (isset($_POST['userLogin']) && isset($_POST['password'])){
            if ( $this->_um->exists($_POST['userEmail'])){
                $user = $this->_um->get($_POST['userEmail']);
                $_SESSION['password'] = $_POST['password'];
                if (sha1($_POST['password']) == $user->getPassword()){
                    $_SESSION['userLogin'] = $_POST['userLogin'];
                    $_SESSION['userId'] = $user->getId();
                    // TODO : Redirection connecte
                }
                else
                    $_SESSION['Message'] = 'Mauvais mot de passe';


            }
            else{
                // TODO : Redirection non connecte
                $_SESSION['Message'] = 'Compte invalide';
                header('Location: index.php');

            }

        }
        else
            include 'views/connect.php';
    }

    public function logout(){
        session_destroy();
        header("Location: index.php");
    }

    public function register(){
        if ( isset($_POST['userLogin']) && isset($_POST['password'])){
            if($this->_um->exists($_POST['email']) || ($_POST['userEmail'] == "" )|| ($_POST['password'])){
                $_SESSION['Message'] = 'Utilisateur existe déjà';
                header('Location: index.php');
            }
            elseif ($_POST['password'] != $_POST['password2']) {
                $_SESSION['Message'] = 'Les passwords ne correspondent pas';
                header('Location: index.php');
            }
            else{
                // TODO : Complété création tableau
                $array = array('id' => 0, 'email' => $_POST['email'], 'password' => $_POST['password']);
                $user = new User($array);
                $this->_um->create($user);
                $_SESSION['Message'] = 'Compte crée';
                // TODO : Redirigé vers la connexion
                header('Location: index.php');
            }

        }
        else{
            include 'views/register.php';
        }
    }

    public function update(){
        if (isset($_SESSION['email']) && isset($_POST['password']) && isset($_POST['password']) && isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['address']) && isset($_POST['phone'])){
            if($_POST['password'] != $_POST['password']){
                $_SESSION['Message'] = 'Mots de passe non identiques';
                // TODO : Redirigé vers la connexion
                header('Location: index.php');
            }
            else{
                $user = $this->_um->get($_SESSION['userId']);
                $user->setAddress($_POST['address']);
                $user->setEmail($_POST['email']);
                $user->setFirstName($_POST['firstName']);
                $user->setLastName($_POST['lastName']);
                $user->setPassword($_POST['password']);
                $user->setPhone($_POST['phone']);
            }
        }
    }
}
?>