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

                    header('Location: /');
                }
                else
                {
                    $_SESSION['message'] = 'Mauvais mot de passe';
                    header('Location: /User/login');
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
        header("Location: /");
    }

    public function register(){
        if ( isset($_POST['userLogin']) && isset($_POST['password']) && isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['address']) && isset($_POST['phone'])){
            if($this->_um->exists($_POST['userLogin'])){
                $_SESSION['Message'] = 'Utilisateur existe déjà';
                header('Location: /');
            }
            elseif ($_POST['password'] != $_POST['password2']) {
                $_SESSION['Message'] = 'Les passwords ne correspondent pas';
                header('Location: /');
            }
            else{
                // TODO : Complété création tableau
                $array = array('id' => 0, 'email' => $_POST['userLogin'],'firstName'  => $_POST['firstName'],'lastName' => $_POST['lastName'], 'password' => sha1($_POST['password']),'address' => $_POST['address'],'phone' => $_POST['phone']);
                $user = new User($array);
                $this->_um->create($user);
                $_SESSION['Message'] = 'Compte crée';
                // TODO : Redirigé vers la connexion
                header('Location: /');
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
            header('Location: /User/login');
        }
    }

    public function redefine(){
        if(isset($_POST['email'])){
            if($this->_um->exists($_POST['email'])){
                $this->_um->cleanToken($_POST['email']);
                $token = md5(rand());
                $this->_um->generate($token,$_POST['email']);

                if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $_POST['email']))
                    $passage_ligne = "\r\n";
                else
                    $passage_ligne = "\n";
                //=====Déclaration des messages au format texte et au format HTML.
                //$message_txt = "Salut à tous, voici un e-mail envoyé par un script PHP.";
                $message_html = "<html><head></head><body><b>Bonjour,</b><br><p> Pour procéder au changement de votre mot de passe suivez le lien suivant :</p><br> <a href=\"http://www.aw6.fr/User/redefine/".$token."\">Redefinir le mot de passe </a></body></html>";

                $boundary = "-----=".md5(rand());

                $sujet = "123Brocante - Redefinition de mot de passe";

                $header = "From: \"123Brocante\"<eredoine@gmail.com>".$passage_ligne;
                $header.= "MIME-Version: 1.0".$passage_ligne;
                $header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;

                $message = $passage_ligne."--".$boundary.$passage_ligne;

                $message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
                $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
                $message.= $passage_ligne.$message_html.$passage_ligne;

                $message.= $passage_ligne."--".$boundary.$passage_ligne;

                $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
                $message.= $passage_ligne."--".$boundary."--".$passage_ligne;

                mail($_POST['email'],$sujet,$message,$header);

                }
            else{
                $_SESSION['message'] = "Email introuvable";
            }
        }
        else if(isset($_POST['newPassword'],$_POST['newPassword2'])){
            if($_POST['newPassword'] == $_POST['newPassword2']){
                $this->_um->redefine(sha1($_POST['newPassword']),$_POST['token']);
                $this->_um->cleanToken($_POST['token']);
            }
            else{
                $_SESSION['message'] = "Confirmer bien le mot de passe";
            }
        }
        else if(isset($_GET['token']) && !isset($_POST['newPassword'])){
            include('views/redefine.php');
        }
        else{
            include('views/redefine.php');
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
                    header('Location: /User/update');
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
            header('Location: /');
    }
}
?>