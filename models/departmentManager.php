<?php
/**
 * Created by PhpStorm.
 * User: relbachiri
 * Date: 18/07/14
 * Time: 12:54
 */

include_once('models/Department.php');
include_once('models/Region.php');

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
        $q->bindValue(':code', $zipCode, PDO::PARAM_INT);
        $q->execute();
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $m = new Department($data);

        return $m;
    }

    public function getByName($name)
    {
        $data = NULL ;
        $q = $this->_db->prepare('SELECT * FROM department WHERE name = :n');
        $q->bindValue(':n', $name, PDO::PARAM_STR);
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

    public function exists($id){
        $q = $this->_db->prepare('SELECT COUNT(*) FROM department WHERE zipCode = :id');
        $q->bindValue(':id', $id, PDO::PARAM_INT);
        $q->execute();
        if(!$q->fetchColumn(0))
        return false;
        else
        return true;
    }

    public function getRegion($name){
        $region = NULL;
        $q = $this->_db->prepare('SELECT * FROM region WHERE id = (SELECT region FROM department WHERE name = :name or slug = :name)');
        $q->bindValue(':name', $name, PDO::PARAM_STR);
        $q->execute();
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $region = new Region($data);
        return $region;

    }

    public function getDept($ville)
    {
        $q = $this->_db->prepare('SELECT * FROM department WHERE zipCode = :ville');
        $q->bindValue(':ville', $ville, PDO::PARAM_INT);
        $q->execute();
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $m = new Department($data);
        return $m;
    }
}

?>