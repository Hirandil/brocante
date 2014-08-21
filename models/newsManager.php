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
            $q = $this->_db->prepare('INSERT INTO news (title,titleUrl,content,createdAt,image) VALUES (:title,:titleUrl,:content,SYSDATE(),:image)');
            $q->bindValue(':title', $n->getTitle(), PDO::PARAM_STR);
            $q->bindValue(':titleUrl', $n->getTitleUrl(), PDO::PARAM_STR);
            $q->bindValue(':content', $n->getContent(), PDO::PARAM_STR);
            $q->bindValue(':image', $n->getImage(), PDO::PARAM_STR);
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

                $q = $this->_db->prepare('SELECT * FROM news WHERE title = :title OR titleUrl = :title');
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
            $q = $this->_db->prepare('UPDATE news SET title = :title,titleUrl = :titleUrl,content = :content,image = :image WHERE id = :id');
            $q->bindValue(':title', $n->getTitle(), PDO::PARAM_STR);
            $q->bindValue(':titleUrl', $n->getTitleUrl(), PDO::PARAM_STR);
            $q->bindValue(':content', $n->getContent(), PDO::PARAM_STR);
            $q->bindValue(':id', $n->getId(), PDO::PARAM_INT);
            $q->bindValue(':image', $n->getImage(), PDO::PARAM_STR);
            $q->execute();
        }

        public function getAll(){
            $news = NULL;
            $q = $this->_db->prepare('SELECT * from news ORDER BY id DESC');
            $q->execute();
            while($data = $q->fetch(PDO::FETCH_ASSOC)){
                $news[] = new News($data);
            }
            return $news;
        }

        public function getSomeNews($limit)
        {
            $news = NULL;
            $q = $this->_db->prepare('SELECT * from news ORDER BY id DESC LIMIT '.$limit);
            $q->execute();
            while($data = $q->fetch(PDO::FETCH_ASSOC)){
                $news[] = new News($data);
            }
            return $news;
        }

        public function exists($info){
            if(is_string($info)){
            $q = $this->_db->prepare('SELECT COUNT(*) FROM news WHERE title = :title OR titleUrl = :title');
            $q->bindValue(':title', $info, PDO::PARAM_INT);
            $q->execute();
            if(!$q->fetchColumn(0))
                return false;
            else
                return true;
            }
            else{
                $id = (int)$info;
                $q = $this->_db->prepare('SELECT COUNT(*) FROM news WHERE id = :id');
                $q->bindValue(':id', $id, PDO::PARAM_INT);
                $q->execute();
                if(!$q->fetchColumn(0))
                    return false;
                else
                    return true;
            }
        }
    }
