<?php
/**
 * Created by PhpStorm.
 * User: abrantes
 * Date: 20/06/14
 * Time: 10:27
 */

    class Type
    {
        private $_id;
        private $_libelle;

        public function __construct ($data){
            $this->_id = $data['id'];
            $this->_libelle = $data['libelle'];
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
         * @param mixed $libelle
         */
        public function setLibelle($libelle)
        {
            $this->_libelle = $libelle;
        }

        /**
         * @return mixed
         */
        public function getLibelle()
        {
            return $this->_libelle;
        }



    }
?>