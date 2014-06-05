<?php

    class User
    {

        // Attributes

        private $_id;
        private $_email;
        private $_firstName;
        private $_lastName;
        private $_address;
        private $_phone;
        private $_password;

        // Functions

        public function __construct(array $data) {

            $this->_id = $data['id'];
            $this->_email = $data['email'];
            $this->_firstName = $data['firstName'];
            $this->_lastName = $data['lastName'];
            $this->_address = $data['address'];
            $this->_phone = $data['phone'];
            $this->_password = $data['password'];
        }

        /**
         * @param mixed $address
         */
        public function setAddress($address)
        {
            $this->_address = $address;
        }

        /**
         * @return mixed
         */
        public function getAddress()
        {
            return $this->_address;
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

