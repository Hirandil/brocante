<?php
/**
 * Created by PhpStorm.
 * User: relbachiri
 * Date: 18/07/14
 * Time: 12:05
 */

    class department{

        private $_id;
        private $_name;
        private $_region;
        private $_zipCode;
        private $_upperName;
        private $_slug;

        public function __construct($data){
            $this->_id = $data['id'];
            $this->_name = $data['name'];
            $this->_zipCode = $data['zipCode'];
            $this->_region = $data['region'];
            $this->_upperName = $data['upperName'];
            $this->_slug = $data['slug'];
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
         * @param mixed $region
         */
        public function setRegion($region)
        {
            $this->_region = $region;
        }

        /**
         * @return mixed
         */
        public function getRegion()
        {
            return $this->_region;
        }

        /**
         * @param mixed $slug
         */
        public function setSlug($slug)
        {
            $this->_slug = $slug;
        }

        /**
         * @return mixed
         */
        public function getSlug()
        {
            return $this->_slug;
        }

        /**
         * @param mixed $upperName
         */
        public function setUpperName($upperName)
        {
            $this->_upperName = $upperName;
        }

        /**
         * @return mixed
         */
        public function getUpperName()
        {
            return $this->_upperName;
        }

        /**
         * @param mixed $zipCode
         */
        public function setZipCode($zipCode)
        {
            $this->_zipCode = $zipCode;
        }

        /**
         * @return mixed
         */
        public function getZipCode()
        {
            return $this->_zipCode;
        }


    }
?>