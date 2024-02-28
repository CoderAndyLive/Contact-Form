<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstlastname = isset($_POST["firstname"]) ? htmlspecialchars(trim($_POST["firstname"])) : "";
    $lastname = isset($_POST["lastname"]) ? htmlspecialchars(trim($_POST["lastname"])) : "";
    $email = isset($_POST["email"]) ? filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) : "";
    $message = isset($_POST["message"]) ? htmlspecialchars(trim($_POST["message"])) : "";

    if (empty($firstlastname) || empty($lastname) || empty($email) || empty($message)) {
        echo "Please fill out all Required fields!.";
    } elseif (!$email) {
        echo "Please enter a Valid Email Adresse";
    } else {
        $to = "andy.nguyen@bene-edu.ch";  
        $subject = "New Contact request from: $firstlastname $lastname";
        $headers = "From: $email";

        if (mail($to, $subject, $message, $headers)) {
            echo "Send!";
        } else {
            echo "An Error occured while sending your message, please try again!";
        }
    }
} else {
    echo "Invalid Request Method!";
}
?>
