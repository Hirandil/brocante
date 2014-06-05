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

        // Getters

        public function getId()
        {
            return this->_id;
        }

        public function getEmail()
        {
            return this->_email;
        }

        public function getFirstName()
        {
            return this->_firstName;
        }

        public function getLastName()
        {
            return this->_lastName;
        }

        public function getAddress()
        {
            return this->_address;
        }

        public function getPhone()
        {
            return this->_phone;
        }

        public function getPassword()
        {
            return this->_password;
        }

        // Setters

        public function setId($id)
        {
            $id = (int) $id;
        	if ($id >0)
        	{
        		$this->_id = $id;
        	}

  		}

  		public function setEmail($email)
  		{
  		    if(is_string($email))
  		    {
  		        $this->_email = $email;
  		    }
  		}


  		public function setFirstName($firstName)
  		{
            if(is_string($firstName))
             {
                $this->_firstName = $firstName;
       	     }
        }

        public function setLastName($lastName)
        {
             if(is_string($lastName))
             {
                 $this->_lastName = $lastName;
             }
        }

        public function setAddress($address)
        {
             if(is_string($address))
  		     {
   		         $this->_address = $address;
             }
        }

        public function setPhone($phone)
        {
            if(is_string($phone))
            {
                $this->_phone = $phone;
            }
        }

        public function setPassword($pass)
        {
            $this->_password = $password;
        }
    }
?>