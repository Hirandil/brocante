<?php
/**
 * Created by PhpStorm.
 * User: relbachiri
 * Date: 22/07/14
 * Time: 10:34
 */

    class News{

        private $_id;
        private $_title;
        private $_content;
        private $_createdAt;

        public function __construct(array $data){
            $this->_id = $data['id'];
            $this->_title = $data['title'];
            $this->_content = $data['content'];
        }

        /**
         * @param mixed $id
         */
        public function setId($id)
        {
            $this->_id = $id;
        }

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->_id;
        }

        /**
         * @param mixed $content
         */
        public function setContent($content)
        {
            $this->_content = $content;
        }

        /**
         * @return mixed
         */
        public function getContent()
        {
            return $this->_content;
        }

        /**
         * @param mixed $createdAt
         */
        public function setCreatedAt($createdAt)
        {
            $this->_createdAt = $createdAt;
        }

        /**
         * @return mixed
         */
        public function getCreatedAt()
        {
            return $this->_createdAt;
        }

        /**
         * @param mixed $title
         */
        public function setTitle($title)
        {
            $this->_title = $title;
        }

        /**
         * @return mixed
         */
        public function getTitle()
        {
            return $this->_title;
        }


    }

?>