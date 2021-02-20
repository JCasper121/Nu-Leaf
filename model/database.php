<?php
/*Modification log
 * 
 * date          name              change
 * 2/12/21      J.C                 Added database class
 */
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Database {
    private static $dsn = 'mysql:host=localhost;dbname=nuleaf';
    private static $username = 'root'; 
    private static $password = 'Pa$$w0rd';
    private static $db;
    
    private function __construct() {}

        
    public static function getDB() {
        if(!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn, self::$username, self::$password);

            } catch (Exception $ex) {
                $error = $ex->getMessage();
                echo "Database error: " . $error;
                exit();
            }
        }
        return self::$db;
    }
}


?>