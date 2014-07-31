<?php

require_once 'models/Department.php';
require_once 'models/departmentManager.php';
require_once 'Controller/Controller.php';


class DepartmentController extends Controller
{
    private $_dm;

    public function __construct(){
        parent::__construct();
        $this->_dm = new departmentManager($this->_db);
    }

    public function getRegion(){
        $region = $this->_dm->getRegion($_GET['region']);
        $regionJSON = null;
        $regionJSON[0] = $region->getName();

        echo json_encode($regionJSON);
        //return json_encode($villesJSON);

    }

}