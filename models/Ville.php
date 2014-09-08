<?php
/**
 * Created by PhpStorm.
 * User: relbachiri
 * Date: 18/07/14
 * Time: 12:05
 */

class ville{

    private $_id;
    private $_name;
    private $_nameUrl;
    private $_department;
    private $_zipCode;

    public function __construct($data){
        $this->_id = $data['id'];
        $this->_name = $data['ville_nom_reel'];
        $this->_nameUrl = $data['ville_slug'];
        $this->_zipCode = $data['zipCode'];
        $this->_department = $data['department'];
    }

    /**
     * @param mixed $nameUrl
     */
    public function setNameUrl($nameUrl)
    {
        $this->_nameUrl = $nameUrl;
    }

    /**
     * @return mixed
     */
    public function getNameUrl()
    {
        return $this->_nameUrl;
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