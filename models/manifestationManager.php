<?php
/**
 * Created by PhpStorm.
 * User: relbachiri
 * Date: 05/06/14
 * Time: 14:14
 */

include_once('models/Manifestation.php');

class manifestationManager
{

    private $_db;

    public function __construct(PDO $db)
    {
        $this->_db = $db;
    }

    public function create(Manifestation $m)
    {
        $q = $this->_db->prepare('INSERT INTO Manifestations (name,city,department,region,address,start,end,type ,schedule,site,price,exhibitorNumber,exhibitorPrice,organiser) VALUES(:name,:city,:region,:dept,:add,:start,:end,:type,:schedule,:site,:price,:exNumb,:exPrice,:organiser) ');

        $q->bindValue(':name', $m->getName(), PDO::PARAM_STR);
        $q->bindValue(':city', $m->getCity(), PDO::PARAM_STR);
        $q->bindValue(':dept', $m->getDepartment(), PDO::PARAM_STR);
        $q->bindValue(':region', $m->getRegion(), PDO::PARAM_STR);
        $q->bindValue(':add', $m->getAddress(), PDO::PARAM_STR);
        $q->bindValue(':start', $m->getStart(), PDO::PARAM_STR);
        $q->bindValue(':end', $m->getEnd(), PDO::PARAM_STR);
        $q->bindValue(':type', $m->getType(), PDO::PARAM_STR);
        $q->bindValue(':schedule', $m->getSchedule(), PDO::PARAM_STR);
        $q->bindValue(':site', $m->getSite(), PDO::PARAM_STR);
        $q->bindValue(':price', $m->getPrice(), PDO::PARAM_INT);
        $q->bindValue(':exNumb', $m->getExhibitorNumber(), PDO::PARAM_INT);
        $q->bindValue(':exPrice', $m->getExhibitorPrice(), PDO::PARAM_INT);
        $q->bindValue(':organiser', $m->getIdOrganiser(), PDO::PARAM_INT);
        try
        {
            $q->execute();
        }
        catch(Exception $e)
        {
            echo "Error at manifestation creation";
        }
    }

    public function exists($id)
    {
        $q = $this->_db->prepare('SELECT COUNT(*) FROM Manifestations WHERE id = :id');
        $q->bindValue(':id', $id, PDO::PARAM_INT);
        $q->execute();
        if(!$q->fetchColumn(0))
            return false;
        else
            return true;
    }

    public function get($info)
    {
        $data = NULL ;
        if (is_string($info)) {

            $q = $this->_db->prepare('SELECT * FROM Manifestations WHERE name = :nameM');
            $q->bindValue(':nameM', $info, PDO::PARAM_STR);
            $q->execute();
            $data = $q->fetch(PDO::FETCH_ASSOC);
            $m = new Manifestation($data);
        }
        else {
            $id = (int) $info;

            $q = $this->_db->prepare('SELECT * FROM Manifestations WHERE id = :id');
            $q->bindValue(':id', $id, PDO::PARAM_INT);
            $q->execute();
            $data = $q->fetch(PDO::FETCH_ASSOC);
            $m = new Manifestation($data);
        }
        return $m;
    }

    public function destroy($info)
    {
        $data = NULL ;
        if (is_string($info)) {

            $q = $this->_db->prepare('DELETE FROM Manifestations WHERE name = :nameM');
            $q->bindValue(':nameM', $info, PDO::PARAM_STR);
            $q->execute();

        }
        else {
            $id = (int) $info;

            $q = $this->_db->prepare('DELETE FROM Manifestations WHERE id = :id');
            $q->bindValue(':id', $id, PDO::PARAM_INT);
            $q->execute();
        }
    }

    public function update(Manifestation $m)
    {
        $q = $this->_db->prepare('UPDATE Manifestations SET name= :name ,city= :city,department = :dept,region = :region,address = :add,start = :start,end = :end ,type = :type,schedule = :schedule,site = :site,price = :price,exhibitorNumber = :exNumb,exhibitorPrice = :exPrice,organiser = :organiser WHERE id = :id');
        $q->bindValue(':id', $m->getId(), PDO::PARAM_INT);
        $q->bindValue(':name', $m->getName(), PDO::PARAM_STR);
        $q->bindValue(':city', $m->getCity(), PDO::PARAM_STR);
        $q->bindValue(':dept', $m->getDepartment(), PDO::PARAM_STR);
        $q->bindValue(':region', $m->getRegion(), PDO::PARAM_STR);
        $q->bindValue(':add', $m->getAddress(), PDO::PARAM_STR);
        $q->bindValue(':start', $m->getStart(), PDO::PARAM_STR);
        $q->bindValue(':end', $m->getEnd(), PDO::PARAM_STR);
        $q->bindValue(':type', $m->getType(), PDO::PARAM_STR);
        $q->bindValue(':schedule', $m->getSchedule(), PDO::PARAM_STR);
        $q->bindValue(':site', $m->getSite(), PDO::PARAM_STR);
        $q->bindValue(':price', $m->getPrice(), PDO::PARAM_INT);
        $q->bindValue(':exNumb', $m->getExhibitorNumber(), PDO::PARAM_INT);
        $q->bindValue(':exPrice', $m->getExhibitorPrice(), PDO::PARAM_INT);
        $q->bindValue(':organiser', $m->getIdOrganiser(), PDO::PARAM_INT);
        $q->execute();
    }

    public function search(Array $filtre)
    {
        $manifestations = NULL;
        try
        {
            $q = $this->_db->prepare('SELECT * FROM Manifestations WHERE'.implode(' AND ', $filtre['where']).' ORDER BY start');
            $q->execute($filtre['PDOargument']);
            while($data = $q->fetch(PDO::FETCH_ASSOC))
            {
                $manifestations[] = new Manifestation($data);
            }
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
        return $manifestations;
    }

    public function getAll()
    {
        $q = $this->_db->prepare('SELECT * FROM Manifestations');
        $q->execute();
        while($data = $q->fetch(PDO::FETCH_ASSOC))
        {
            $manifestations[] = new Manifestation($data);
        }
        return $manifestations;
    }
}