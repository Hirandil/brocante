<?php
/**
 * Created by PhpStorm.
 * User: abrantes
 * Date: 20/06/14
 * Time: 10:59
 */

include_once('models/Type.php');

class typeManager{

    private $_db;

    public function __construct(PDO $db){
        $this->_db = $db;
    }

    public function create(Type $t){
        $q = $this->_db->prepare('INSERT INTO Types (libelle) VALUES (:libelle)');
        $q->bindValue(':libelle', $t->getLibelle(), PDO::PARAM_STR);
        try{
            $q->execute();
        }
        catch(Exception $e)
        {
            echo "Error at type creation";
        }
    }

    public function exists($id){
        $q = $this->_db->prepare('SELECT COUNT(*) FROM Types WHERE id = :id');
        $q->bindValue(':id',$id,PDO::PARAM_INT);
        $q->execute();
        if (!$q->fetchColumn(0))
            return false;
        else
            return true;
    }

    public function get($id){
        $q = $this->_db->prepare('SELECT * FROM Types WHERE id = :id');
        $q->bindValue(':id', $id, PDO::PARAM_INT);
        $q->execute();
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $t = new Type($data);

        return $t;
    }

    public function destroy($id){
        $q = $this->_db->prepare('DELETE FROM Types WHERE id = :id');
        $q->bindValue(':id',$id,PDO::PARAM_INT);
        $q->execute();
    }

    public function update(Type $t){
        $q = $this->_db->prepare('UPDATE Types SET libelle= :libelle WHERE id = :id');
        $q->bindValue(':id', $t->getId(), PDO::PARAM_INT);
        $q->bindValue(':libelle', $t->getLibelle(), PDO::PARAM_STR);
        $q->execute();
    }

    public function getAll(){
        $q = $this->_db->prepare('SELECT * from Types ORDER BY libelle ASC');
        $q->execute();
        while($data = $q->fetch(PDO::FETCH_ASSOC)){
            $types[] = new Type($data);
        }
        return $types;
    }
}
?>