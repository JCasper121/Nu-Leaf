<?php
/*Modification log
 * 
 * date          name              change
 * 2/12/21      J.C                 Added visitor class
 */
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Visitor {
    private $name, $email, $phone, $message, $homeType, $contact, $visitDate, $employee;

    public function __construct() {
        $this->name = '';
        $this->email = '';
        $this->phone = 0;
        $this->message = '';
        $this->homeType = '';
        $this->contact = '';
        $this->visitDate = 0;
        $this->employee = null;

    }
    
    public function getID() {
        return $this->id;
    }

    public function setID($value) {
        $this->id = $value;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($value) {
        $this->name = $value;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($value) {
        $this->email = $value;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($value) {
        $this->phone = $value;
    }

    public function getMessage() {
        return $this->message;
    }

    public function setMessage($value) {
        $this->message = $value;
    }
    
    public function getHomeType() {
        return $this->homeType;
    }
    
    public function setHomeType($value) {
        $this->homeType = $value;
    }
    
    public function getContact() {
        return $this->contact;
    }
    
    public function setContact($value) {
        $this->contact = $value;
    }
    
    public function getEmployee() {
        return $this->employee;
    }
    
    public function setEmployee($value) {
        $this->employee = $value;
    }
    
    public function getVisitDate() {
        return $this->visitDate;
    }
    
    public function setVisitDate($value) {
        $this->visitDate = $value;
    }
    
   
}
?>