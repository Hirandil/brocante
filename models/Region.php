<?php
/**
 * Created by PhpStorm.
 * User: relbachiri
 * Date: 18/07/14
 * Time: 11:57
 */
    class Region {
        private $_id;
        private $_name;

        public function __construct($data){
            $this->_id = $data['id'];
            $this->_name = $data['name'];
        }

        /**
         * @param mixed $name
         */
        public function setName($name)
        {
            $this->_name = $name;
        }

        /**
         * @return mixed
         */
        public function getName()
        {
            return $this->_name;
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


    }


?>