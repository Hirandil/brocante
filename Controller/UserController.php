<?php
require_once 'models/User.php';
require_once 'models/userManager.php';
require_once 'Controller/Controller.php';

class UserController extends Controller
{
    private $_um;

    public function __construct(){
        parent::__construct();
        $this->_um = new UserManager($this->_db);
    }

    public function login(){
        if (isset($_POST['userLogin']) && isset($_POST['password'])){
            if ( $this->_um->exists($_POST['userLogin'])){
                $user = $this->_um->get($_POST['userLogin']);
                $_SESSION['password'] = $_POST['password'];
                echo $_POST['password'].' '.$user->getEmail();
                if ($_POST['password'] == $user->getPassword()){
                        echo 'Salut';
                    $_SESSION['userLogin'] = $_POST['userLogin'];
                    $_SESSION['userId'] = $user->getId();
                    // TODO : Redirection connecte

                    header('Location: index.php');
                    echo 'Header';
                }
                else
                    $_SESSION['Message'] = 'Mauvais mot de passe';


            }
            else{
                // TODO : Redirection non connecte
                $_SESSION['Message'] = 'Compte invalide';
                echo '<p>SALUT</p>';

            }

        }
        else
            include 'views/login.html';
            //echo '<p>Salut</p>';}
    }

    public function logout(){
        session_destroy();
        header("Location: index.php");
    }

    public function register(){
        if ( isset($_POST['userLogin']) && isset($_POST['password']) && isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['address']) && isset($_POST['phone'])){
            if($this->_um->exists($_POST['userLogin'])){
                $_SESSION['Message'] = 'Utilisateur existe déjà';
                header('Location: index.php');
            }
            elseif ($_POST['password'] != $_POST['password2']) {
                $_SESSION['Message'] = 'Les passwords ne correspondent pas';
                header('Location: index.php');
            }
            else{
                // TODO : Complété création tableau
                $array = array('id' => 0, 'email' => $_POST['userLogin'],'firstName'  => $_POST['firstName'],'lastName' => $_POST['lastName'], 'password' => sha1($_POST['password']),'address' => $_POST['address'],'phone' => $_POST['phone']);
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