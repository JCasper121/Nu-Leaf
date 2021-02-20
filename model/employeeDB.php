<?php
/*Modification log
 * 
 * date          name              change
 * 2/12/21      J.C                 Added employeeDB class
 */
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class EmployeeDB {
    public function getEmployees() {
        $db = Database::getDB();
        $query = 'SELECT * FROM employee
                  ORDER BY employeeID';
        $statement = $db->prepare($query);
        $statement->execute();
        
        $employees = array();
        foreach ($statement as $row) {
            $employee = new Employee();
            $employee->setID($row['employeeID']);
            $employee->setFirstName($row['firstName']);
            $employee->setLastName($row['lastName']);
            $employees[] = $employee;
        }
        return $employees;
    }

    public function getEmployee($employee_id) {
        $db = Database::getDB();
        $query = 'SELECT * FROM employee
                  WHERE employeeID = :employee_id';    
        $statement = $db->prepare($query);
        $statement->bindValue(':employee_id', $employee_id);
        $statement->execute();    
        $row = $statement->fetch();
        $statement->closeCursor();    
        $employee = new Employee();
        $employee->setID($row['employeeID']);
        $employee->setFirstName($row['firstName']);
        $employee->setLastName($row['lastName']);
        return $employee;
    }
}