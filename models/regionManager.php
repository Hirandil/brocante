<?php
/**
 * Created by PhpStorm.
 * User: relbachiri
 * Date: 18/07/14
 * Time: 12:54
 */
include_once('models/Region.php');

class regionManager
{

    private $_db;

    public function __construct(PDO $db)
    {
        $this->_db = $db;
    }

    public function get($info)
    {
        $data = NULL ;
        if (is_string($info)) {

            $q = $this->_db->prepare('SELECT * FROM region WHERE name = :name');
            $q->bindValue(':name', $info, PDO::PARAM_STR);
            $q->execute();
            $data = $q->fetch(PDO::FETCH_ASSOC);
            $r = new Region($data);
        }
        else {
            $id = (int) $info;

            $q = $this->_db->prepare('SELECT * FROM region WHERE id = :id');
            $q->bindValue(':id', $id, PDO::PARAM_INT);
            $q->execute();
            $data = $q->fetch(PDO::FETCH_ASSOC);
            $r = new Region($data);
        }
        return $r;
    }

    public function getAutoComplete($info){

        $q = $this->_db->prepare('SELECT * FROM region WHERE name like \''.$info.'%\'');
        //$q->bindValue(':name', $info, PDO::PARAM_STR);
        $q->execute();
        while($data = $q->fetch(PDO::FETCH_ASSOC))
        {
            $regions[] = new Region($data);
        }

        return $regions;
    }

}


?>