<?php

/* 
 * Modification log
 * 
 * added appointmentDB         2/19/21              J.C
 */
class AppointmentDB {
    public function getAppointmentsByState() {
        $db = Database::getDB();
        $query = 'SELECT * FROM appointment WHERE state = :state';
        $statement = $db->prepare($query);
        $statement->execute();
        
        $appointments = array();
        foreach ($statement as $row) {
            $appointment = new Appointment();
            $appointment->setID($row['appointmentID']);
            $appointment->setFirstName($row['firstName']);
            $appointment->setLastName($row['lastName']);
            $appointment->setAddress($row['address']);
            $appointment->setCity($row['city']);
            $appointment->setState($row['state']);
            $appointment->setZip($row['zip']);
            $appointment->setDateTime($row['dateTime']);
            $appointments[] = $appointment;
        }
        return $appointments;
    }
    
    public function addAppointment($appointment) {
        $db = Database::getDB();
        
        $firstName = $appointment->getFirstName();
        $lastName = $appointment->getLastName();
        $address = $appointment->getAddress();
        $city = $appointment->getCity();
        $state = $appointment->getState();
        $zip = $appointment->getZip();
        $dateTime = $appointment->getDateTime();
        
        $query = 'INSERT INTO appointment (firstName, lastName, address, city, state, zip, dateTime)'
                . 'VALUES (:firstName, :lastName, :address, :city, :state, :zip, :dateTime)';
        $statement = $db->prepare($query);
        $statement->bindValue(':firstName', $firstName);
        $statement->bindValue(':lastName', $lastName);
        $statement->bindValue(':address', $address);
        $statement->bindValue(':city', $city);
        $statement->bindValue(':state', $state);
        $statement->bindValue(':zip', $zip);
        $statement->bindValue(':dateTime', $dateTime);
        $statement->execute();
        $statement->closeCursor();
        
    }

//    public function getEmployee($employee_id) {
//        $db = Database::getDB();
//        $query = 'SELECT * FROM employee
//                  WHERE employeeID = :employee_id';    
//        $statement = $db->prepare($query);
//        $statement->bindValue(':employee_id', $employee_id);
//        $statement->execute();    
//        $row = $statement->fetch();
//        $statement->closeCursor();    
//        $employee = new Employee();
//        $employee->setID($row['employeeID']);
//        $employee->setFirstName($row['firstName']);
//        $employee->setLastName($row['lastName']);
//        return $employee;
//    }
}

?>