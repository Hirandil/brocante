<?php
require_once 'models/Ville.php';
require_once 'models/villeManager.php';
require_once 'Controller/Controller.php';


class VilleController extends Controller
{
    private $_vm;

    public function __construct(){
        parent::__construct();
        $this->_vm = new villeManager($this->_db);
    }

    public function autocomplete(){
        $villes = $this->_vm->getAutoComplete($_POST['key']);
        $villesJSON = null;
        $i = 0;
        foreach((array)$villes as $v){
            //echo $v->getName().'\n';
            $villesJSON[$i] = $v->getName();
            //array_push($villesJSON,$v->getName());
            $i++;
        }
        echo json_encode($villesJSON);
        //return json_encode($villesJSON);

    }

}
?>