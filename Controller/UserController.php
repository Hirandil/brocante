<?php
require_once 'models/User.php';
require_once 'models/userManager.php';
require_once 'Controller/Controller.php';
require_once 'models/Manifestation.php';
require_once 'models/manifestationManager.php';

class UserController extends Controller
{
    private $_um;
    private $_mm;

    public function __construct(){
        parent::__construct();
        $this->_um = new UserManager($this->_db);
        $this->_mm = new manifestationManager($this->_db);
    }

    public function login(){
        if (isset($_POST['userLogin']) && isset($_POST['password'])){
            if ( $this->_um->exists($_POST['userLogin'])){
                $user = $this->_um->get($_POST['userLogin']);
                $_SESSION['password'] = $_POST['password'];
                if (sha1($_POST['password']) == $user->getPassword()){
                    $_SESSION['userLogin'] = $_POST['userLogin'];
                    $_SESSION['userId'] = $user->getId();

                    header('Location: index.php');
                }
                else
                {
                    $_SESSION['message'] = 'Mauvais mot de passe';
                    header('Location: index.php?section=User&action=login');
                }

            }
            else{
                $_SESSION['message'] = 'Compte inexistant';

            }

        }
        else
        {
            include 'views/login.html';
        }
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
            include 'views/login.html';
        }
    }

    public function manifestations()
    {
        $manifestations = $this->_mm->getMyManifestations($_SESSION['userId']);
        include('views/manifestations/mine.php');
    }

    public function updatePro(){
        if (isset($_SESSION['userLogin'])){
            $user = $this->_um->get((int)$_SESSION['userId']);
            include('views/pricing.php');
        }
        else{
            header('Location: index.php?section=user&action=login');
        }
    }

    public function update(){
        if(isset($_SESSION['userLogin'])){
            $user = $this->_um->get((int)$_SESSION['userId']);
            if (isset($_POST['userLogin']) && isset($_POST['password']) && isset($_POST['newPassword']) && isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['address']) && isset($_POST['phone'])){
                if(sha1($_POST['password']) != $user->getPassword()){
                    echo "sha1";
                    $_SESSION['Message'] = 'Mots de passe non identiques';
                    // TODO : Redirigé vers la connexion
                    header('Location: index.php?section=user&action=update');
                }
                else{
                    $user->setAddress($_POST['address']);
                    $user->setEmail($_POST['userLogin']);
                    $user->setFirstName($_POST['firstName']);
                    $user->setLastName($_POST['lastName']);
                    $user->setPassword(sha1($_POST['newPassword']));
                    $user->setPhone($_POST['phone']);
                    $this->_um->update($user);
                }
            }
            else
            {
                include('views/update.php');
            }
        }
        else
            header('Location: index.php');
    }
}
?>