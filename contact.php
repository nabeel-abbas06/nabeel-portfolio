<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "portfolio_db";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    echo "error";
    exit;
}

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$stmt = $conn->prepare(
    "INSERT INTO contacts (name, email, subject, message)
     VALUES (?, ?, ?, ?)"
);

$stmt->bind_param("ssss", $name, $email, $subject, $message);

if ($stmt->execute()) {
    echo "success";
} else {
    echo "error";
}

$stmt->close();
$conn->close();
?>
