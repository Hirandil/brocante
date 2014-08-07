<?php

    class User
    {

        // Attributes

        private $_id;
        private $_email;
        private $_firstName;
        private $_lastName;
        private $_phone;
        private $_password;
        private $_admin;
        private $_pro;
        private $_confirmed;


        // Functions

        public function __construct($data) {

            $this->_id = $data['id'];
            $this->_email = $data['email'];
            $this->_firstName = $data['firstName'];
            $this->_lastName = $data['lastName'];
            $this->_phone = $data['phone'];
            $this->_password = $data['password'];
            $this->_admin = $data['admin'];
            $this->_pro = $data['professional'];
            $this->_confirmed = $data['confirmed'];
        }

        /**
         * @param mixed $confirmed
         */
        public function setConfirmed($confirmed)
        {
            $this->_confirmed = $confirmed;
        }

        /**
         * @return mixed
         */
        public function getConfirmed()
        {
            return $this->_confirmed;
        }

        /**
         * @param mixed $admin
         */
        public function setAdmin($admin)
        {
            $this->_admin = $admin;
        }

        public function isPro(){
            return $this->_pro;
        }

        /**
         * @return mixed
         */
        public function getAdmin()
        {
            return $this->_admin;
        }

        /**
         * @param mixed $email
         */
        public function setEmail($email)
        {
            $this->_email = $email;
        }

        /**
         * @return mixed
         */
        public function getEmail()
        {
            return $this->_email;
        }

        /**
         * @param mixed $firstName
         */
        public function setFirstName($firstName)
        {
            if (is_string($firstName))
            $this->_firstName = $firstName;
        }

        /**
         * @return mixed
         */
        public function getFirstName()
        {
            return $this->_firstName;
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
         * @param mixed $lastName
         */
        public function setLastName($lastName)
        {
            if (is_string($lastName))
                $this->_lastName = $lastName;
        }

        /**
         * @return mixed
         */
        public function getLastName()
        {
            return $this->_lastName;
        }

        /**
         * @param mixed $password
         */
        public function setPassword($password)
        {
            $this->_password = $password;
        }

        /**
         * @return mixed
         */
        public function getPassword()
        {
            return $this->_password;
        }

        /**
         * @param mixed $phone
         */
        public function setPhone($phone)
        {
            $this->_phone = $phone;
        }

        /**
         * @return mixed
         */
        public function getPhone()
        {
            return $this->_phone;
        }

    }

