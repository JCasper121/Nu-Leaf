<?php
/*Modification log
 * 
 * date          name              change
 * 2/12/21      J.C                 Added employee class
 */
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Employee {
    private $employeeID, $firstName, $lastName;
    
    public function __construct() {
        $this->employeeID = 0;
        $this->firstName = '';
        $this->lastName = '';
    }
    
    public function getID() {
        return $this->employeeID;
    }
    
    public function setID($value) {
        $this->employeeID = $value;
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

}
?>