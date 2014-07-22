<?php
/**
 * Created by PhpStorm.
 * User: relbachiri
 * Date: 22/07/14
 * Time: 10:38
 */
    include_once('models/News.php');

    class newsManager {

        private $_db;

        public function __construct(PDO $db)
        {
            $this->_db = $db;
        }

        public function get($info)
        {
            $data = NULL;
            if (is_string($info)) {

                $q = $this->_db->prepare('SELECT * FROM news WHERE title = :title');
                $q->bindValue(':title', $info, PDO::PARAM_STR);
                $q->execute();
                $data = $q->fetch(PDO::FETCH_ASSOC);
                $n = new News($data);
            }
            else {
                $id = (int) $info;

                $q = $this->_db->prepare('SELECT * FROM news WHERE id = :id');
                $q->bindValue(':id', $id, PDO::PARAM_INT);
                $q->execute();
                $data = $q->fetch(PDO::FETCH_ASSOC);
                $n = new News($data);
            }
            return $n;
        }
    }
