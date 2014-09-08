<?php
require_once 'models/User.php';
require_once 'models/userManager.php';
require_once 'Controller/Controller.php';
require_once 'models/Manifestation.php';
require_once 'models/manifestationManager.php';
require_once 'models/Department.php';
require_once 'models/departmentManager.php';

class UserController extends Controller
{
    private $_um;
    private $_mm;
    private $_dm;
    public function __construct(){
        parent::__construct();
        $this->_um = new UserManager($this->_db);
        $this->_mm = new manifestationManager($this->_db);
        $this->_dm = new departmentManager($this->_db);
    }

    public function login(){
        $_SESSION['ariane'] = "Connexion / Inscription";
        $_SESSION['title'] = "Connexion / Inscription";
        $_SESSION['description'] = "Connecter vous et partager votre passion de la brocante avec des centaines d'internautes!";
        if (isset($_POST['userLogin']) && isset($_POST['password'])){
            if ( $this->_um->exists($_POST['userLogin'])){
                $user = $this->_um->get($_POST['userLogin']);
                if($user->getConfirmed() == 1){
                    $_SESSION['password'] = $_POST['password'];
                    if (sha1($_POST['password']) == $user->getPassword()){
                        $_SESSION['userLogin'] = $_POST['userLogin'];
                        $_SESSION['userId'] = $user->getId();
                        $_SESSION['message'] = 'Connection réussie!';
                        $_SESSION['admin'] = $user->getAdmin();
                        header('Location: /');
                        exit;
                    }
                    else
                    {
                        $_SESSION['error'] = 'Mauvais mot de passe';
                        header('Location: /User/login');
                        exit;
                    }
                }
                else{
                    $_SESSION['error'] = 'Confirmer le compte !';
                    header('Location: /User/login');
                    exit;
                }

            }
            else{
                $_SESSION['error'] = 'Compte inexistant';
                header('Location: /User/login');
                exit;

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

    public function inscription(){
        $_SESSION['ariane'] = "Inscription";
        $_SESSION['title'] = "Inscription";
        $_SESSION['description'] = "Inscriver vous et rejoigner une grande communauté sur 123Brocante !";
        if ( isset($_POST['userLogin']) && isset($_POST['password']) && isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['phone'])){
            if($this->_um->exists($_POST['userLogin'])){
                $_SESSION['error'] = 'Utilisateur existe déjà';
                header('Location: /User/login');
                exit;
            }
            else if ($_POST['password'] != $_POST['password2']) {
                $_SESSION['error'] = 'Les mot de passe ne correspondent pas';
                header('Location: /User/login');
                exit;
            }
            else{
                $array = array('id' => 0, 'email' => $_POST['userLogin'],'firstName'  => $_POST['firstName'],'lastName' => $_POST['lastName'], 'password' => sha1($_POST['password']),'phone' => $_POST['phone']);
                $user = new User($array);
                $this->_um->create($user);
                $this->_um->cleanToken($_POST['userLogin']);
                $token = md5(rand());
                $this->_um->generate($token,$_POST['userLogin'],2);
                if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $_POST['userLogin']))
                    $passage_ligne = "\r\n";
                else
                    $passage_ligne = "\n";

                //=====Déclaration des messages au format texte et au format HTML.
                $message_txt = "Bonjour,

                Pour proceder a la confirmation de votre compte, suivez le lien suivant :
                http://123Brocante.com/User/inscription/".$token;

                $boundary = "-----=".md5(rand());

                $sujet = "123Brocante - Confirmer votre compte";

                $header = "From: \"123Brocante\"<no-reply@123Brocante.com>".$passage_ligne;
                $header.= "MIME-Version: 1.0".$passage_ligne;
                $header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;

                $message = $passage_ligne."--".$boundary.$passage_ligne;

                $message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
                $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
                $message.= $passage_ligne."--".$boundary.$passage_ligne;

                $message.= $passage_ligne.$message_txt.$passage_ligne;

                $message.= $passage_ligne."--".$boundary."--".$passage_ligne;

                mail($_POST['userLogin'],$sujet,$message,$header);

                $_SESSION['message'] = 'Confirmation envoyée !';
                header('Location: /User/sent');
                exit;
            }

        }
        else if(isset($_GET['id'])){
            if($this->_um->existToken($_GET['id'])){
                $this->_um->updateToConfirmed($_GET['id']);
                $this->_um->cleanToken($_GET['id']);
                $_SESSION['message'] = "Compte validé !";
                header('Location: /User/login');
                exit;
            }
            else{
                $_SESSION['error'] = "Le token n'est plus valable";
                header('Location: /User/login');
                exit;
            }
        }
        else{
            include 'views/login.html';
        }
    }

    public function sent(){
        echo '<br><label style="text-align: center">Une confirmation vous a été envoyée par e-mail à l\'adresse spécifiée.</label>';
    }
    public function manifestations()
    {
        $_SESSION['ariane'] = "Mes manifestations";
        $_SESSION['title'] = "Mes manifestations";
        $manifestations = $this->_mm->getMyManifestations($_SESSION['userId']);
        include('views/manifestations/mine.php');
    }

    public function myusers(){
        if(isset($_SESSION['userId'])){
            $users = $this->_um->getAllUsers();
            include('views/admin/users.php');
        }
        else{
            header('Location: /User/login');
        }
    }

    public function updatePro(){
        $_SESSION['ariane'] = "Passer pro !";
        $_SESSION['title'] = "Passer pro !";
        $_SESSION['description'] = "Passer votre compte pro et profiter d'avantages supplémentaires !";
        if (isset($_SESSION['userLogin'])){
            $user = $this->_um->get((int)$_SESSION['userId']);
            include('views/pricing.php');
        }
        else{
            header('Location: /User/login');
        }
    }

    public function redefine(){
        $_SESSION['ariane'] = "Mot de passe oublié";
        $_SESSION['title'] = "Redéfinir mon mot de passe";
        $_SESSION['description'] = "Vous pourrez ici redefinir votre de passe";
        if(isset($_POST['email'])){
            if($this->_um->exists($_POST['email'])){
                $this->_um->cleanToken($_POST['email']);
                $token = md5(rand());
                $this->_um->generate($token,$_POST['email'],1);

                if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $_POST['email']))
                    $passage_ligne = "\r\n";
                else
                    $passage_ligne = "\n";
                //=====Déclaration des messages au format texte et au format HTML.
                $message_txt = "Bonjour,

                Pour procéder au changement de votre mot de passe suivez le lien suivant :
                http://123Brocante.com/User/redefine/".$token;


                //$message_html = "<html><head></head><body><b>Bonjour,</b><br><p> Pour procéder au changement de votre mot de passe suivez le lien suivant :</p><br> <a href=\"http://123Brocante.com/User/redefine/".$token."\">Redefinir le mot de passe </a></body></html>";

                $boundary = "-----=".md5(rand());

                $sujet = "123Brocante - Redefinition de mot de passe";

                $header = "From: \"123Brocante\"<no-reply@123Brocante.com>".$passage_ligne;
                $header.= "MIME-Version: 1.0".$passage_ligne;
                $header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;

                $message = $passage_ligne."--".$boundary.$passage_ligne;

                $message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
                $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
                $message = $passage_ligne."--".$boundary.$passage_ligne;

                $message.= $passage_ligne.$message_txt.$passage_ligne;

                $message.= $passage_ligne."--".$boundary."--".$passage_ligne;

                mail($_POST['email'],$sujet,$message,$header);

            }
            else{
                $_SESSION['error'] = "Email introuvable";
                header('Location: User/login');
                exit;
            }
        }
        else if(isset($_POST['newPassword'],$_POST['newPassword2'])){
            if($_POST['newPassword'] == $_POST['newPassword2']){
                $this->_um->redefine(sha1($_POST['newPassword']),$_POST['token']);
                $this->_um->cleanToken($_POST['token']);
                $_SESSION['message'] = "Mot de passe redefini";
                header('Location: /User/login');
                exit;
            }
            else{
                $_SESSION['error'] = "Confirmer bien le mot de passe";
                header('Location: /User/login');
                exit;
            }
        }
        else if(isset($_GET['id']) && !isset($_POST['newPassword']) && $this->_um->existToken($_GET['id'])){
            include('views/redefine.php');
        }
        else{
            include('views/redefine.php');
        }
    }
    public function update(){
        $_SESSION['ariane'] = "Mon profil";
        $_SESSION['title'] = "Mon profil";
        $_SESSION['description'] = "Vous pouver accéder à vos informations personnelles et les modifier";
        if(isset($_SESSION['userLogin'])){
            $user = $this->_um->get((int)$_SESSION['userId']);
            if (isset($_POST['userLogin']) && isset($_POST['password']) && isset($_POST['newPassword']) && isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['phone'])){
                if(sha1($_POST['password']) != $user->getPassword()){
                    $_SESSION['error'] = 'Mauvais mot de passe';
                    header('Location: /User/update');
                    exit;
                }
                else{
                    $user->setEmail($_POST['userLogin']);
                    $user->setFirstName($_POST['firstName']);
                    $user->setLastName($_POST['lastName']);
                    $user->setPassword(sha1($_POST['newPassword']));
                    $user->setPhone($_POST['phone']);
                    $this->_um->update($user);
                    $_SESSION['message'] = "Mis à jour !";
                    header('Location: /User/update');
                    exit;
                }
            }
            else
            {
                include('views/update.php');
            }
        }
        else
            header('Location: /User/login');
    }


    public function view(){
        if(isset($_SESSION['userLogin'])){
            $admin = $this->_um->get((int)$_SESSION['userId']);
            if($admin->getAdmin() == 1){
                $user = $this->_um->get((int) $_GET['id']);
                // If we manage to get the User according to the GET parameter
                if (isset($_POST['userLogin']) && isset($_POST['password']) && isset($_POST['newPassword']) && isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['phone'])){
                    $user->setEmail($_POST['userLogin']);
                    $user->setFirstName($_POST['firstName']);
                    $user->setLastName($_POST['lastName']);
                    $user->setPassword(sha1($_POST['newPassword']));
                    $user->setPhone($_POST['phone']);
                    $this->_um->update($user);
                    $_SESSION['message'] = "Mis à jour !";
                    header('Location: /User/view/'.$user->getId());
                    exit;
                }
                else{
                    include('views/updateuser.php');
                }
            }
            else{
                // Redirect on main page if the user is not an Admin
                header('Location: /');
            }
        }
    }



    public function delete(){
        if(isset($_SESSION['userLogin'])){
            if(isset($_GET['id'])){
                $user = $this->_um->get((int) $_GET['id']);
                $admin = $this->_um->get((int)$_SESSION['userId']);
                if($admin->getAdmin() == 1){
                    if($user->getId() > 0){
                        $this->_um->deleteUser($user->getId());
                        $_SESSION['message'] = "Utilisateur supprimé !";
                        header('Location: /User/myusers');
                    }
                }
            }
        }
        else{
            header('Location: /');
        }
    }

    public function newsletter(){
        if(isset($_SESSION['userId'])){
            if(isset($_POST['email']) &&(isset($_POST['veille']) || isset($_POST['week']) || isset($_POST['zone']) || isset($_POST['month'])) && $_POST['email'] != ""){
                $zone = htmlentities($_POST['zone']);
                $email = htmlentities($_POST['email']);
                if(preg_match("#[0-9]+#",$_POST['zone'])){
                    $dept = $this->_dm->get($_POST['zone']);
                    $zone = $dept->getName();
                }
                try{
                    if(isset($_POST['veille']))
                        $this->_um->subscribe($zone,$email,$_POST['veille']);
                    if(isset($_POST['week']))
                        $this->_um->subscribe($zone,$email,$_POST['week']);
                    if(isset($_POST['month']))
                        $this->_um->subscribe($zone,$email,$_POST['month']);

                    $_SESSION['message'] = "Inscris à la newsletter!";
                    $page = $_SERVER['PHP_SELF'];
                    header("Location: $page");
                    exit;
                }
                catch(Exception $e)
                {
                    $_SESSION['error'] = "Deja inscrit";
                    $page = $_SERVER['PHP_SELF'];
                    header("Location: $page");
                    exit;
                }
            }
            else{
                $_SESSION['error'] = "Email non renseigné";
                header('Location: /');
                exit;
            }
        }
        else{
            header('Location: /User/inscription');
        }
    }
}
?>