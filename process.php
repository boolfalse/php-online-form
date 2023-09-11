<?php

require 'vendor/autoload.php';
use Mailgun\Mailgun;

session_start();

function getEnvVariable(string $name): string {
    try {
        $env_file_path = realpath(__DIR__."/.env");
        $env_file = fopen($env_file_path, "r");
        $env_file_content = fread($env_file, filesize($env_file_path));
        fclose($env_file);
        preg_match("/".$name."=(.*)/", $env_file_content, $matches);
        $api_key = $matches[1];

        return $api_key;
    } catch (Exception $e) {
        return "";
    }
}

function sendEmail(array $data, $files): bool {
    $html = "<h1>Application Form</h1>";
    $html .= "<p>First Name: " . $data["first_name"] . "</p>";
    $html .= "<p>Middle Name: " . $data["middle_name"] . "</p>";
    $html .= "<p>Last Name: " . $data["last_name"] . "</p>";
    $html .= "<p>Address: " . $data["address"] . "</p>";
    $html .= "<p>State: " . $data["state"] . "</p>";
    $html .= "<p>City: " . $data["city"] . "</p>";
    $html .= "<p>Zip Code: " . $data["zip_code"] . "</p>";
    $html .= "<p>Email: " . $data["email"] . "</p>";
    $html .= "<p>Phone: " . $data["phone"] . "</p>";
    $html .= "<p>SSN: " . $data["ssn"] . "</p>";

    try {
        $mail_from = getEnvVariable("MAIL_FROM_ADDRESS");
        // $mail_to = getEnvVariable("MAIL_TO_ADDRESS");
        $mailgun_api_key = getEnvVariable("MAILGUN_API_KEY");
        $domain = getEnvVariable("MAILGUN_DOMAIN");
        $mg = Mailgun::create($mailgun_api_key); // For US servers
        $result = $mg->messages()->send($domain, [
            'from' => $mail_from, // 'Mailgun Sandbox <postmaster@sandbox...>',
            'to' => $domain, // 'Your Name <your_email_address>',
            'subject' => 'Mail from ' . $data["first_name"] . " " . $data["last_name"],
            'html' => $html,
            'attachment' => $files,
        ]);

        return true;
    } catch (Exception $e) {
        return false;
    }
}

function validateName(string $name): bool {return preg_match("/^[a-zA-Z]{4,100}$/", $name);}
function validateAddress(string $address): bool {return strlen($address) >= 10 && strlen($address) <= 100;}
function validateState(string $state): bool {return preg_match("/^[A-Z]{2}$/", $state);}
function validateCity(string $city): bool {return strlen($city) >= 2 && strlen($city) <= 100;}
function validateZipCode(string $zip_code): bool {return preg_match("/^[0-9]{5,6}$/", $zip_code);}
function validateEmail(string $email): bool {return filter_var($email, FILTER_VALIDATE_EMAIL);}
function validatePhone(string $phone): bool {return preg_match("/^[0-9\-\s\+]{10,20}$/", $phone);}
function validateSSN(string $ssn): bool {return preg_match("/^[0-9\s\-]{9,13}$/", $ssn);}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $validation_errors = [];

    if ($_SERVER["CONTENT_LENGTH"] > 10 * 1024 * 1024) {$validation_errors['attachments'] = "File(s) size is too large!";}
    if (!$_POST["first_name"] || !validateName($_POST["first_name"])) {$validation_errors['first_name'] = "First name is invalid!";}
    if ($_POST["middle_name"] && !validateName($_POST["middle_name"])) {$validation_errors['middle_name'] = "Middle name is invalid!";}
    if (!$_POST["last_name"] || !validateName($_POST["last_name"])) {$validation_errors['last_name'] = "Last name is invalid!";}
    if (!$_POST["address"] || !validateAddress($_POST["address"])) {$validation_errors['address'] = "Address is invalid!";}
    if (!$_POST["state"] || !validateState($_POST["state"])) {$validation_errors['state'] = "State is invalid!";}
    if (!$_POST["city"] || !validateCity($_POST["city"])) {$validation_errors['city'] = "City is invalid!";}
    if (!$_POST["zip_code"] || !validateZipCode($_POST["zip_code"])) {$validation_errors['zip_code'] = "Zip code is invalid!";}
    if (!$_POST["email"] || !validateEmail($_POST["email"])) {$validation_errors['email'] = "Email is invalid!";}
    if (!$_POST["phone"] || !validatePhone($_POST["phone"])) {$validation_errors['phone'] = "Phone is invalid!";}
    if (!$_POST["ssn"] || !validateSSN($_POST["ssn"])) {$validation_errors['ssn'] = "SSN is invalid!";}

    if (count($validation_errors) > 0) {
        $_SESSION["validation_errors"] = $validation_errors;

        $_SESSION["first_name"] = $_POST["first_name"];
        $_SESSION["middle_name"] = $_POST["middle_name"];
        $_SESSION["last_name"] = $_POST["last_name"];
        $_SESSION["address"] = $_POST["address"];
        $_SESSION["state"] = $_POST["state"];
        $_SESSION["city"] = $_POST["city"];
        $_SESSION["zip_code"] = $_POST["zip_code"];
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["phone"] = $_POST["phone"];
        $_SESSION["ssn"] = $_POST["ssn"];
    } else {
        $data = [
            "first_name" => $_POST["first_name"],
            "middle_name" => $_POST["middle_name"],
            "last_name" => $_POST["last_name"],
            "address" => $_POST["address"],
            "state" => $_POST["state"],
            "city" => $_POST["city"],
            "zip_code" => $_POST["zip_code"],
            "email" => $_POST["email"],
            "phone" => $_POST["phone"],
            "ssn" => $_POST["ssn"],
        ];

        $files = [];
        foreach ($_FILES["attachments"]["name"] as $key => $name) {
            $files[] = [
                "filePath" => $_FILES["attachments"]["tmp_name"][$key],
                "filename" => $name,
            ];
        }

        $sent = sendEmail($data, $files);
        if ($sent) {
            $_SESSION["message"] = "Your application has been submitted successfully!";
        } else {
            $_SESSION["message"] = "Email could not be sent!";
            $_SESSION["mail_error"] = true;
        }
    }
}

header("Location: index.php");
exit();
