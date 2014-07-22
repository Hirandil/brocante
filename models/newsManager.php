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

        public function create(News $n)
        {
            $q = $this->_db->prepare('INSERT INTO news (title,content,createdAt) VALUES (:title,:content,sysdate)');
            $q->bindValue(':title', $n->getTitle(), PDO::PARAM_STR);
            $q->bindValue(':content', $n->getContent(), PDO::PARAM_STR);
            try{
                $q->execute();
            }
            catch(Exception $e)
            {
                echo "Error at type creation";
            }
        }

        public function get($info)
        {
            $data = NULL;
            $n = NULL;
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

        public function destroy($id){
            $q = $this->_db->prepare('DELETE FROM news WHERE id = :id');
            $q->bindValue(':id',$id,PDO::PARAM_INT);
            $q->execute();
        }

        public function update(News $n){
            $q = $this->_db->prepare('UPDATE news SET title = :title,content = :content WHERE id = :id');
            $q->bindValue(':title', $n->getTitle(), PDO::PARAM_STR);
            $q->bindValue(':content', $n->getContent(), PDO::PARAM_STR);
            $q->bindValue(':id', $n->getId(), PDO::PARAM_INT);
            $q->execute();
        }

        public function getAll(){
            $news = NULL;
            $q = $this->_db->prepare('SELECT * from news');
            $q->execute();
            while($data = $q->fetch(PDO::FETCH_ASSOC)){
                $news[] = new News($data);
            }
            return $news;
        }
    }
