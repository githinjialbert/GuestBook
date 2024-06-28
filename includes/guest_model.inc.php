<?php

class GuestModel {
    private $dbserver = 'localhost';
    private $dbname = 'guestform';
    private $dbusername = 'root';
    private $dbpassword = '';
    private $conn;

    public function __construct() {

        try {
            $this->conn = PDO("mysql:host={$this->dbserver}; dbname={$this->dbname}", $this->dbusername, $this->dbpassword);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection Failed: " . $e->getMessage());
        }
    }

    public function takeGuestInfo() {

    }

}