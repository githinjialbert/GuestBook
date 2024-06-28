<?php

class GuestModel {
    private $dbserver = 'localhost';
    private $dbname = 'guestform';
    private $dbusername = 'root';
    private $dbpassword = '';
    private $conn;

    public function __construct() {

        try {
            $this->conn = new PDO("mysql:host={$this->dbserver}; dbname={$this->dbname}", $this->dbusername, $this->dbpassword);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new Exception("Connection Failed: " . $e->getMessage());
        }
    }

    public function takeGuestInfo($fname, $lname, $email, $passport, $address, $address2, $city, 
    $county, $postal, $country, $image_filename, $image_path, $image_mime_type, $image_size) {
        try {
            $stmt = $this->conn->prepare("INSERT INTO guest_registration(fname, lname, email, passport, 
            address, address2, city, county, postal, country, image_filename, image_path, image_mime_type, image_size) 
            VALUES(:fname, :lname, :email, :passport, :address, :address2, :city, :county, :postal, :country, 
            :image_filename, :image_path, :image_mime_type, :image_size);");

            $stmt->bindParam(":fname", $fname);
            $stmt->bindParam(":lname", $lname);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":passport", $passport);
            $stmt->bindParam(":address", $address);
            $stmt->bindParam(":address2", $address2);
            $stmt->bindParam(":city", $city);
            $stmt->bindParam(":county", $county);
            $stmt->bindParam(":postal", $postal);
            $stmt->bindParam(":country", $country);
            $stmt->bindParam(":image_filename", $image_filename);
            $stmt->bindParam(":image_path", $image_path);
            $stmt->bindParam(":image_mime_type", $image_mime_type);
            $stmt->bindParam(":image_size", $image_size);

            return $stmt->execute();


        } catch (PDOException $e) {
            throw new Exception ("Failed to submit guest information: " . $e->getMessage());
        }
    }
}