<?php
/**
 * Created by PhpStorm.
 * User: relbachiri
 * Date: 18/07/14
 * Time: 12:54
 */

include_once('models/Department.php');

class departmentManager
{

    private $_db;

    public function __construct(PDO $db)
    {
        $this->_db = $db;
    }

    public function get($zipCode)
    {
        $data = NULL ;
        $q = $this->_db->prepare('SELECT * FROM department WHERE zipCode = :code');
        $q->bindValue(':code', (int)$zipCode, PDO::PARAM_INT);
        $q->execute();
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $m = new Department($data);

        return $m;
    }

    public function getAll()
    {
        $departments = NULL;
        $q = $this->_db->prepare('SELECT * FROM department ORDER BY zipCode');
        $q->execute();
        while($data = $q->fetch(PDO::FETCH_ASSOC))
        {
            $departments[] = new Department($data);
        }

        return $departments;
    }

    public function getAutoComplete($info){

        $departments = NULL;
        $q = $this->_db->prepare('SELECT * FROM department WHERE name like \''.$info.'%\' or slug like \''.$info.'%\'');
        $q->bindValue(':name', $info, PDO::PARAM_STR);
        $q->execute();
        while($data = $q->fetch(PDO::FETCH_ASSOC))
        {
            $departments[] = new Department($data);
        }

        return $departments;
    }

}

?>