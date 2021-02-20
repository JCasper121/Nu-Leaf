<?php
/*Modification log
 * 
 * date          name              change
 * 2/12/21      J.C                 Added visitorDB class
 */
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class VisitorDB {
    public function getVisitorsByEmp($employee_id) {
        $db = Database::getDB();

//        $category = CategoryDB::getCategory($category_id);
        $employeeDB = new EmployeeDB();
        $employee = $employeeDB->getEmployee($employee_id);

        $query = 'SELECT * FROM visitor
                  WHERE visitor.employeeID = :employee_id
                  ORDER BY visitorID';
        $statement = $db->prepare($query);
        $statement->bindValue(":employee_id", $employee_id);
        $statement->execute();
        $rows = $statement->fetchAll();
        $statement->closeCursor();
        
        $visitors = array();
        foreach ($rows as $row) {
            $visitor = new Visitor();
            $visitor->setID($row['visitorID']);
            $visitor->setName($row['name']);
            $visitor->setEmail($row['email']);
            $visitor->setPhone($row['phone']);
            $visitor->setHomeType($row['homeType']);
            $visitor->setContact($row['contact']);
            $visitor->setMessage($row['message']);
            $visitor->setVisitDate($row['visitDate']);
            $visitor->setEmployee($employee);
            
            $visitors[] = $visitor;
        }
        return $visitors;
    }

    public function getVisitor($visitor_id) {
        $db = Database::getDB();
        $query = 'SELECT * FROM visitor
                  WHERE visitorID = :visitor_id';
        $statement = $db->prepare($query);
        $statement->bindValue(":visitor_id", $visitor_id);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
    
//        $category = CategoryDB::getCategory($row['categoryID']);
        $employeeDB = new EmployeeDB();
        $employee = $employeeDB->getEmployee($row['employeeID']);
        
        $visitor = new Visitor();
        $visitor->setID($row['visitorID']);   
        $visitor->setName($row['name']);
        $visitor->setEmail($row['email']);
        $visitor->setPhone($row['phone']);
        $visitor->setHomeType($row['homeType']);
        $visitor->setContact($row['contact']);
        $visitor->setMessage($row['message']);
        $visitor->setVisitDate($row['visitDate']);
        $visitor->setEmployee($employee);
        
        return $visitor;
    }

    public function deleteVisitor($visitor_id) {
        $db = Database::getDB();
        $query = 'DELETE FROM visitor
                  WHERE visitorID = :visitor_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':visitor_id', $visitor_id);
        $statement->execute();
        $statement->closeCursor();
    }

    public function addVisitor($visitor) {
        $db = Database::getDB();

        $employee_id = mt_rand(1, 20);
        $email = $visitor->getEmail();
        $name = $visitor->getName();
        $phone = $visitor->getPhone();
        $home_type = $visitor->getHomeType();
        $contact = $visitor->getContact();
        $message = $visitor->getMessage();

        $query = 'INSERT INTO visitor
                     (name, email, phone, homeType, message, contact, visitDate, employeeID)
                  VALUES
                     (:name, :email, :phone, :home_type, :message, :contact, NOW(), :employeeID)';
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':phone', $phone);
        $statement->bindValue(':home_type', $home_type);
        $statement->bindValue(':message', $message);
        $statement->bindValue(':contact', $contact);
        $statement->bindValue(':employeeID', $employee_id);
        $statement->execute();
        $statement->closeCursor();
    }
}
?>