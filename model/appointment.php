<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Appointment {
    private $appointmentID, $firstName, $lastName, $address, $city, $state, $zip, $dateTime;
    
    public function getID() {
        return $this->appointmentID;
    }
    
    public function setID($value) {
        $this->appointmentID = $value;
    }
    
    public function getFirstName() {
        return $this->firstName;
    }
    
    public function setFirstName($value) {
        $this->firstName = $value;
    }
    
    public function getLastName() {
        return $this->lastName;
    }
    
    public function setLastName($value) {
        $this->lastName = $value;
    }
    
    public function getAddress() {
        return $this->address;
    }
    
    public function setAddress($value) {
        $this->address = $value;
    }
    
    public function getCity() {
        return $this->city;
    }
    
    public function setCity($value) {
        $this->city = $value;
    }
    
    public function getState() {
        return $this->state;
    }
    
    public function setState($value) {
        $this->state = $value;
    }
    
    public function getZip() {
        return $this->zip;
    }
    
    public function setZip($value) {
        $this->zip = $value;
    }
    
    public function getDateTime() {
        return $this->dateTime;
    }
    
    public function setDateTime($value) {
        $this->dateTime = $value;
    }
}
?>