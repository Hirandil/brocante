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
        $q = $this->_db->prepare('INSERT INTO Manifestations (name,city,department,region,address,start,end,type ,schedule,site,price,exhibitorNumber,exhibitorPrice,idOrganiser,image,informations,parking,contact) VALUES(:name,:city,:dept,:region,:add,:start,:end,:type,:schedule,:site,:price,:exNumb,:exPrice,:organiser,:image,:infos,:parking,:contact) ');
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
        $q->bindValue(':image', $m->getImage(), PDO::PARAM_STR);
        $q->bindValue(':infos', $m->getInformations(), PDO::PARAM_STR);
        $q->bindValue(':parking', $m->getParking(), PDO::PARAM_INT);
        $q->bindValue(':contact', $m->getContact(), PDO::PARAM_STR);
        try
        {
            $q->execute();
        }
        catch(Exception $e)
        {
            echo $e;
            echo "Error at manifestation creation";
        }
    }

    public function exists($info)
    {
        if (is_string($info)) {

            $q = $this->_db->prepare('SELECT COUNT(*) FROM Manifestations WHERE name = :name');
            $q->bindValue(':name', $info, PDO::PARAM_STR);
            $q->execute();
            if(!$q->fetchColumn(0))
                return false;
            else
                return true;
        }
        else {
            $id = (int) $info;

            $q = $this->_db->prepare('SELECT COUNT(*) FROM Manifestations WHERE idManifestation = :id');
            $q->bindValue(':id', $id, PDO::PARAM_INT);
            $q->execute();
            if(!$q->fetchColumn(0))
                return false;
            else
                return true;
        }

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

            $q = $this->_db->prepare('SELECT * FROM Manifestations WHERE idManifestation = :id');
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
            $q = $this->_db->prepare('DELETE FROM Manifestations WHERE idManifestation = :id');
            $q->bindValue(':id', $id, PDO::PARAM_INT);
            $q->execute();
        }
    }

    public function getProByCity($city)
    {
        $manifestations = NULL;
        $q = $this->_db->prepare('SELECT * FROM Manifestations WHERE city = :city AND idOrganiser in
                                    (SELECT id from users WHERE professional = 1) ORDER BY idManifestation');
        $q->bindValue(':city',$city,PDO::PARAM_STR);
        $q->execute();
        while($data = $q->fetch(PDO::FETCH_ASSOC))
        {
            $manifestations[] = new Manifestation($data);
        }
        return $manifestations;
    }

    public function getByCity($city)
    {
        $manifestations = NULL;
        $q = $this->_db->prepare('SELECT * FROM Manifestations WHERE city = :city ORDER BY idManifestation');
        $q->bindValue(':city',$city,PDO::PARAM_STR);
        $q->execute();
        while($data = $q->fetch(PDO::FETCH_ASSOC))
        {
            $manifestations[] = new Manifestation($data);
        }
        return $manifestations;
    }


    public function getProByDepartment($dept)
    {
        $manifestations = NULL;
        $q = $this->_db->prepare('SELECT * FROM Manifestations WHERE department = :dept AND idOrganiser in
                                    (SELECT id from users WHERE professional = 1) ORDER BY idManifestation');
        $q->bindValue(':dept',$dept,PDO::PARAM_STR);
        $q->execute();
        while($data = $q->fetch(PDO::FETCH_ASSOC))
        {
            $manifestations[] = new Manifestation($data);
        }
        return $manifestations;
    }

    public function getByDepartment($dept)
    {
        $manifestations = NULL;
        $q = $this->_db->prepare('SELECT * FROM Manifestations WHERE department = :dept ORDER BY idManifestation');
        $q->bindValue(':dept',$dept,PDO::PARAM_STR);
        $q->execute();
        while($data = $q->fetch(PDO::FETCH_ASSOC))
        {
            $manifestations[] = new Manifestation($data);
        }
        return $manifestations;
    }

    public function getProByRegion($region){

        $manifestations = NULL;
        $q = $this->_db->prepare('SELECT * FROM Manifestations WHERE region = :region AND idOrganiser in
                                    (SELECT id from users WHERE professional = 1) ORDER BY idManifestation');
        $q->bindValue(':region',$region,PDO::PARAM_STR);
        $q->execute();
        while($data = $q->fetch(PDO::FETCH_ASSOC))
        {
            $manifestations[] = new Manifestation($data);
        }
        return $manifestations;
    }

    public function getByRegion($region)
    {
        $manifestations = NULL;
        $q = $this->_db->prepare('SELECT * FROM Manifestations WHERE region = :region ORDER BY idManifestation');
        $q->bindValue(':region',$region,PDO::PARAM_STR);
        $q->execute();
        while($data = $q->fetch(PDO::FETCH_ASSOC))
        {
            $manifestations[] = new Manifestation($data);
        }
        return $manifestations;
    }

    public function update(Manifestation $m)
    {
        $q = $this->_db->prepare('UPDATE Manifestations SET name= :name ,city= :city,department = :dept,region = :region,address = :add,start = :start,end = :end ,type = :type,schedule = :schedule,site = :site,price = :price,exhibitorNumber = :exNumb,exhibitorPrice = :exPrice,idOrganiser = :organiser,image = :image, informations = :infos,parking = :parking,contact = :contact WHERE idManifestation = :id');
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
        $q->bindValue(':image', $m->getImage(), PDO::PARAM_STR);
        $q->bindValue(':infos', $m->getInformations(), PDO::PARAM_STR);
        $q->bindValue(':parking', $m->getParking(), PDO::PARAM_INT);
        $q->bindValue(':contact', $m->getContact(), PDO::PARAM_STR);
        $q->execute();
    }

    public function search(Array $filtre)
    {
        $manifestations = NULL;
        try
        {
            $q = $this->_db->prepare('SELECT * FROM Manifestations WHERE '.implode(' AND ', $filtre['where']).' ORDER BY start');
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
        $manifestations = NULL;
        $q = $this->_db->prepare('SELECT * FROM Manifestations');
        $q->execute();
        while($data = $q->fetch(PDO::FETCH_ASSOC))
        {
            $manifestations[] = new Manifestation($data);
        }
        return $manifestations;
    }
    public function getSoon($time,$limit)
    {
        $manifestations = NULL;
        $q = $this->_db->prepare('SELECT * FROM Manifestations WHERE TO_DAYS(start) - TO_DAYS(NOW()) < '.$time.' LIMIT '.$limit);
        $q->execute();
        while($data = $q->fetch(PDO::FETCH_ASSOC))
        {
            $manifestations[] = new Manifestation($data);
        }
        return $manifestations;
    }

    public function getTomorrowDept($nbNextDay,$dept)
    {
        $manifestations = NULL;
        $q = $this->_db->prepare('SELECT * FROM Manifestations WHERE start = CURDATE() + INTERVAL :nb DAY AND department = :dept');
        $q->bindValue(':nb', $nbNextDay, PDO::PARAM_INT);
        $q->bindValue(':dept', $dept, PDO::PARAM_STR);
        $q->execute();
        while($data = $q->fetch(PDO::FETCH_ASSOC))
        {
            $manifestations[] = new Manifestation($data);
        }
        return $manifestations;
    }

    public function getTomorrowRegion($nbNextDay,$region)
    {
        $manifestations = NULL;
        $q = $this->_db->prepare('SELECT * FROM Manifestations WHERE start = CURDATE() + INTERVAL :nb DAY AND region = :region');
        $q->bindValue(':nb', $nbNextDay, PDO::PARAM_INT);
        $q->bindValue(':region', $region, PDO::PARAM_STR);
        $q->execute();
        while($data = $q->fetch(PDO::FETCH_ASSOC))
        {
            $manifestations[] = new Manifestation($data);
        }
        return $manifestations;
    }

    public function getLast()
    {
        $manifestations = NULL;
        $q = $this->_db->prepare('SELECT * FROM Manifestations ORDER BY idManifestation DESC LIMIT 3');
        $q->execute();
        while($data = $q->fetch(PDO::FETCH_ASSOC))
        {
            $manifestations[] = new Manifestation($data);
        }
        return $manifestations;
    }

    public function getVisited()
    {
        $manifestations = NULL;
        $q = $this->_db->prepare('SELECT * FROM Manifestations ORDER BY visits DESC LIMIT 3');
        $q->execute();
        while($data = $q->fetch(PDO::FETCH_ASSOC))
        {
            $manifestations[] = new Manifestation($data);
        }
        return $manifestations;
    }
    public function getNearTowns($dept)
    {
        $manifestations = NULL;
        $q = $this->_db->prepare('SELECT v.id,v.department,v.name,v.zipCode FROM villes v WHERE v.department = :dept AND(SELECT COUNT(*) FROM Manifestations WHERE city = v.name) > 0 LIMIT 0,3');
        $q->bindValue(':dept', $dept, PDO::PARAM_INT);
        $q->execute();
        while($data = $q->fetch(PDO::FETCH_ASSOC))
        {
            $villes[] = new Ville($data);
        }
        return $villes;
    }

    public function getNearRegion($region)
    {
        $manifestations = NULL;
        $q = $this->_db->prepare('SELECT * FROM Manifestations WHERE region = :region ORDER BY idManifestation LIMIT 0,3');
        $q->bindValue(':region', $region, PDO::PARAM_INT);
        $q->execute();
        while($data = $q->fetch(PDO::FETCH_ASSOC))
        {
            $manifestations[] = new Manifestation($data);
        }
        return $manifestations;
    }

    public function getMyManifestations($userId)
    {
        $manifestations = array();
        $q = $this->_db->prepare('SELECT * FROM Manifestations WHERE idOrganiser = :id');
        $q->bindValue(':id', $userId, PDO::PARAM_INT);
        $q->execute();
        while($data = $q->fetch(PDO::FETCH_ASSOC))
        {
            $manifestations[] = new Manifestation($data);
        }
        return $manifestations;
    }

    public function upVisits($info)
    {
        if (is_string($info)) {
            $q = $this->_db->prepare('UPDATE Manifestations SET visits = visits + 1 WHERE name = :name');
            $q->bindValue(':name', $info, PDO::PARAM_STR);
            $q->execute();
        }
        else {
            $id = (int) $info;
            $q = $this->_db->prepare('UPDATE Manifestations SET visits = visits + 1 WHERE idManifestation = :id');
            $q->bindValue(':id', $id, PDO::PARAM_INT);
            $q->execute();
        }

    }

}
?>
