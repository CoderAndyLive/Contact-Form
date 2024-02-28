<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vorname = isset($_POST["Vorname"]) ? htmlspecialchars(trim($_POST["Vorname"])) : "";
    $name = isset($_POST["name"]) ? htmlspecialchars(trim($_POST["name"])) : "";
    $email = isset($_POST["email"]) ? filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) : "";
    $message = isset($_POST["message"]) ? htmlspecialchars(trim($_POST["message"])) : "";

    if (empty($vorname) || empty($name) || empty($email) || empty($message)) {
        echo "Bitte füllen Sie alle erforderlichen Felder aus.";
    } elseif (!$email) {
        echo "Bitte geben Sie eine gültige E-Mail-Adresse ein.";
    } else {
        $to = "andy.nguyen@bene-edu.ch";  
        $subject = "Neue Kontaktanfrage von $vorname $name";
        $headers = "From: $email";

        if (mail($to, $subject, $message, $headers)) {
            echo "Gesendet!";
        } else {
            echo "Fehler beim Senden der Nachricht. Bitte versuchen Sie es erneut.";
        }
    }
} else {
    echo "Ungültige Anforderungsmethode";
}
?>
