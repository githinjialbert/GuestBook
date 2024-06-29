<?php

require_once 'guest_model.inc.php';
require_once 'sessions.php';

class GuestControl {
    private $sync;

    public function __construct() {
        $this->sync = new GuestModel();
    }

    public function guestBook() {
        
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            
            $fname = trim(htmlspecialchars($_POST["fname"]));
            $lname = trim(htmlspecialchars($_POST["lname"]));
            $email = trim(htmlspecialchars($_POST["email"]));
            $passport = htmlspecialchars($_POST["passport"]); // Passport numbers may include letters and are not trimmed
            $address = htmlspecialchars($_POST["address"]);
            $address2 = htmlspecialchars($_POST["address2"]);
            $city = trim(htmlspecialchars($_POST["city"]));
            $county = trim(htmlspecialchars($_POST["county"]));
            $postal = trim(htmlspecialchars($_POST["postal"]));
            $country = trim(htmlspecialchars($_POST["country"]));

            //Handling the uploaded files 
            
            if (isset($_FILES["file"])) {
                
                $image_filename = htmlspecialchars($_FILES["file"]["name"]);
                $image_path = $_FILES(["file"]["tmp_name"]);
                $image_mime_type = $_FILES(["file"]["type"]);
                $image_size = $_FILES(["file"]["size"]);
            
            //Move target files to a desired location 
            
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($image_filename);
            
                if (move_uploaded_file($image_path, $target_file)) {
                    
                    $image_path = $target_file;
                } 
                else {
                    throw new Exception("File upload failed.");
                }
            }   
        }
        if (empty($fname) || empty($lname) || empty($email) || empty($passport) || empty($address) || empty($address2) || empty($city) 
        || empty($postal) || empty($country) || empty($image_filename) || empty($image_path) || empty($image_mime_type) || empty($image_size)) {
    throw new Exception("Fill in all fields.");
        }  
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            throw new Exception("Please enter a valid email address.");
        }
    }    
}