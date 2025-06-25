<?php

$conn = new mysqli("localhost", "root", "", "portfolio_db");
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];


$stmt = $conn->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $message);
$stmt->execute();

echo "Form submitted"; // Debugging message
exit; 

?>
