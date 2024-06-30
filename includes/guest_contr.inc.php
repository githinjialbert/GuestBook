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

        //PASSPORT IDENTIFICATION

        function validateCountryCode($countryCode, $passportNumber) {

            $patterns = [

                'US' => '/^[a-zA-Z0-9]{9}/',
                'KE' => '/^[a-zA-Z]{3}[0-9]{6}/',
                'RWND' => '/^[a-zA-Z]{4}[0-9]{5}/',
                'TZ' => '/^[a-zA-Z]{2}[0-9]{7}/',
                'UG' => '/^[a-zA-Z]{2}[0-9]{7}/',
                'SA' => '/^[a-zA-Z]{2}[0-9]{7}/',
                'ETH' => '/^[a-zA-Z]{3}[0-9]{6}/',

            ];

            if(!isset($patterns[$countryCode])) {
                throw new Exception("Unsupported country codes.");
            }

            if (preg_match($patterns[$countryCode], $passportNumber)) {

                return true;

            } else {
                throw new Exception("Invalid Passport Number");
            }
        }

        function extractCountryCodeAndPassportNumber($passport) {
            $countryCode = substr($passport, 0, 2);
            $passportNumber = substr($passport, 2);

            return [$countryCode, $passportNumber];
        }

        if (!preg_match("/^\d+ [a-zA-Z]+, \d+ [a-zA-Z]+, [a-zA-Z]+$/", $address, $address2)) {
            throw new Exception("Invalid address format");
        }

        if(!preg_match("/^\d{6}-\d{5}/$", $postal)) {
            throw new Exception("This postal address does not exist.");
        }

        try {
            $this->sync->takeGuestInfo($fname, $lname, $email, $passport, $address, $address2, $city, 
            $county, $postal, $country, $image_filename, $image_path, $image_mime_type, $image_size);
            echo "Welcome. Your information has been submitted successfully";
        } catch (PDOException $e) {
            echo "An error occurred. Your information could not be submitted successfully.";
        }
    }    
}

$guestControl = new GuestControl();
$guestControl->guestBook();