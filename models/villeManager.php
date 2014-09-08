<?php
/**
 * Created by PhpStorm.
 * User: relbachiri
 * Date: 18/07/14
 * Time: 12:54
 */

include_once('models/Ville.php');
include_once('models/Department.php');

class villeManager
{

    private $_db;

    public function __construct(PDO $db)
    {
        $this->_db = $db;
    }

    public function getRandomCities($dept){
        $villes = NULL;
        $q = $this->_db->prepare('SELECT * FROM villes WHERE department = :dept or CONCAT(\'0\',department) like :dept ORDER BY RAND() DESC LIMIT 0,4');
        $q->bindValue(':dept',$dept, PDO::PARAM_INT);
        $q->execute();
        while($data = $q->fetch(PDO::FETCH_ASSOC))
        {
            $villes[] = new Ville($data);
        }

        return $villes;
    }

    public function getDeptRegion($region){
        $villes = NULL;
        $q = $this->_db->prepare('SELECT * FROM department WHERE region = :region');
        $q->bindValue(':region',$region, PDO::PARAM_INT);
        $q->execute();
        while($data = $q->fetch(PDO::FETCH_ASSOC))
        {
            $villes[] = new Department($data);
        }

        return $villes;
    }
    public function get($info)
    {
        if(is_string($info)){
            $data = NULL ;
            $q = $this->_db->prepare('SELECT * FROM villes WHERE ville_slug = :name OR ville_nom_reel = :name');
            $q->bindValue(':name',$info, PDO::PARAM_STR);
            $q->execute();
            $data = $q->fetch(PDO::FETCH_ASSOC);
            try{
            $m = new Ville($data);
            }
            catch(Exception $e)
            {
                $_SESSION['error'] = "Ville inexistante";
            }
        }
        else{
            $data = NULL ;
            $q = $this->_db->prepare('SELECT * FROM villes WHERE zipCode = :zipCode');
            $q->bindValue(':zipCode',$info, PDO::PARAM_INT);
            $q->execute();
            $data = $q->fetch(PDO::FETCH_ASSOC);
        $m = new Ville($data);
        }
        return $m;
    }

    public function getAll()
    {
        $villes = NULL;
        $q = $this->_db->prepare('SELECT * FROM villes');
        $q->execute();
        while($data = $q->fetch(PDO::FETCH_ASSOC))
        {
            $villes[] = new Ville($data);
        }

        return $villes;
    }

    public function getAutoComplete($info){

        $villes = NULL;
        $q = $this->_db->prepare('SELECT * FROM villes WHERE ville_nom_reel like \''.$info.'%\' LIMIT 10');
        $q->bindValue(':name', $info, PDO::PARAM_STR);
        $q->execute();
        while($data = $q->fetch(PDO::FETCH_ASSOC))
        {
            $villes[] = new Ville($data);
        }

        return $villes;

    }

    public function exists($name){
        $q = $this->_db->prepare('SELECT COUNT(*) FROM villes WHERE ville_nom_reel = :n OR ville_slug = :n');
        $q->bindValue(':n', $name, PDO::PARAM_STR);
        $q->execute();
        if(!$q->fetchColumn(0))
            return false;
        else
            return true;
    }

}

?>