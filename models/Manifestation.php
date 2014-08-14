<?php
    class Manifestation
    {
        private $_id;
        private $_name;
        private $_city;
        private $_department;
        private $_region;
        private $_address;
        private $_start;
        private $_end;
        private $_type;
        private $_schedule;
        private $_idOrganiser;
        private $_site;
        private $_price;
        private $_exhibitorNumber;
        private $_exhibitorPrice;
        private $_image;
        private $_informations;
        private $_parking;
        private $_visits;
        private $_contact;

        public function __construct ($data){
            $this->_id = $data['idManifestation'];
            $this->_name = $data['name'];
            $this->_city = $data['city'];
            $this->_department = $data['department'];
            $this->_region = $data['region'];
            $this->_address = $data['address'];
            $this->_start = $data['start'];
            $this->_end = $data['end'];
            $this->_type = $data['type'];
            $this->_schedule = $data['schedule'];
            $this->_idOrganiser = $data['idOrganiser'];
            $this->_site = $data['site'];
            $this->_price = $data['price'];
            $this->_exhibitorNumber = $data['exhibitorNumber'];
            $this->_exhibitorPrice = $data['exhibitorPrice'];
            $this->_image = $data['image'];
            $this->_informations = $data['informations'];
            $this->_parking = $data['parking'];
            $this->_contact = $data['contact'];
        }

        /**
         * @param mixed $contact
         */
        public function setContact($contact)
        {
            $this->_contact = $contact;
        }

        /**
         * @return mixed
         */
        public function getContact()
        {
            return $this->_contact;
        }


        /**
         * @param mixed $informations
         */
        public function setInformations($informations)
        {
            $this->_informations = $informations;
        }

        /**
         * @return mixed
         */
        public function getInformations()
        {
            return $this->_informations;
        }

        /**
         * @param mixed $parking
         */
        public function setParking($parking)
        {
            $this->_parking = $parking;
        }

        /**
         * @return mixed
         */
        public function getParking()
        {
            return $this->_parking;
        }

        /**
         * @param mixed $visits
         */
        public function setVisits($visits)
        {
            $this->_visits = $visits;
        }

        /**
         * @return mixed
         */
        public function getVisits()
        {
            return $this->_visits;
        }

        public function getImage()
        {
            return $this->_image;
        }

        public function setImage($url){
            $this->_image = $url;
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
         * @param mixed $city
         */
        public function setCity($city)
        {
            $this->_city = $city;
        }

        /**
         * @return mixed
         */
        public function getCity()
        {
            return $this->_city;
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
         * @param mixed $department
         */
        public function setDepartment($department)
        {
            $this->_department = $department;
        }

        /**
         * @return mixed
         */
        public function getDepartment()
        {
            return $this->_department;
        }

        /**
         * @param mixed $end
         */
        public function setEnd($end)
        {
            $this->_end = $end;
        }

        /**
         * @return mixed
         */
        public function getEnd()
        {
            return $this->_end;
        }

        /**
         * @param mixed $exhibitorPrice
         */
        public function setExhibitorPrice($exhibitorPrice)
        {
            $this->_exhibitorPrice = $exhibitorPrice;
        }

        /**
         * @return mixed
         */
        public function getExhibitorPrice()
        {
            return $this->_exhibitorPrice;
        }

        /**
         * @param mixed $exhibitorNumber
         */
        public function setExhibitorNumber($exhibitorNumber)
        {
            $this->_exhibitorNumber = $exhibitorNumber;
        }

        /**
         * @return mixed
         */
        public function getExhibitorNumber()
        {
            return $this->_exhibitorNumber;
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
         * @param mixed $idOrganiser
         */
        public function setIdOrganiser($idOrganiser)
        {
            $this->_idOrganiser = $idOrganiser;
        }

        /**
         * @return mixed
         */
        public function getIdOrganiser()
        {
            return $this->_idOrganiser;
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
         * @param mixed $price
         */
        public function setPrice($price)
        {
            $this->_price = $price;
        }

        /**
         * @return mixed
         */
        public function getPrice()
        {
            return $this->_price;
        }

        /**
         * @param mixed $schedule
         */
        public function setSchedule($schedule)
        {
            $this->_schedule = $schedule;
        }

        /**
         * @return mixed
         */
        public function getSchedule()
        {
            return $this->_schedule;
        }

        /**
         * @param mixed $site
         */
        public function setSite($site)
        {
            $this->_site = $site;
        }

        /**
         * @return mixed
         */
        public function getSite()
        {
            return $this->_site;
        }

        /**
         * @param mixed $start
         */
        public function setStart($start)
        {
            $this->_start = $start;
        }

        /**
         * @return mixed
         */
        public function getStart()
        {
            return $this->_start;
        }

        /**
         * @param mixed $type
         */
        public function setType($type)
        {
            $this->_type = $type;
        }

        /**
         * @return mixed
         */
        public function getType()
        {
            return $this->_type;
        }



    }
?>