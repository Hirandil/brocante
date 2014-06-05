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
<<<<<<< HEAD
            return this->_id;
=======
            return $this->_id;
>>>>>>> 4e8676b67cb11c38fb8be863f58d186b6d1766c0
        }

        public function getEmail()
        {
<<<<<<< HEAD
            return this->_email;
=======
            return $this->_email;
>>>>>>> 4e8676b67cb11c38fb8be863f58d186b6d1766c0
        }

        public function getFirstName()
        {
<<<<<<< HEAD
            return this->_firstName;
=======
            return $this->_firstName;
>>>>>>> 4e8676b67cb11c38fb8be863f58d186b6d1766c0
        }

        public function getLastName()
        {
<<<<<<< HEAD
            return this->_lastName;
=======
            return $this->_lastName;
>>>>>>> 4e8676b67cb11c38fb8be863f58d186b6d1766c0
        }

        public function getAddress()
        {
<<<<<<< HEAD
            return this->_address;
=======
            return $this->_address;
>>>>>>> 4e8676b67cb11c38fb8be863f58d186b6d1766c0
        }

        public function getPhone()
        {
<<<<<<< HEAD
            return this->_phone;
=======
            return $this->_phone;
>>>>>>> 4e8676b67cb11c38fb8be863f58d186b6d1766c0
        }

        public function getPassword()
        {
<<<<<<< HEAD
            return this->_password;
=======
            return $this->_password;
>>>>>>> 4e8676b67cb11c38fb8be863f58d186b6d1766c0
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
<<<<<<< HEAD
            $this->_password = $password;
=======
            $this->_password = $pass;
>>>>>>> 4e8676b67cb11c38fb8be863f58d186b6d1766c0
        }
    }
?>