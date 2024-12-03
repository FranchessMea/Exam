<?php
$servername = "localhost";
$username = "root";  // Change as per your MySQL credentials
$password = "";  // Change as per your MySQL credentials
$dbname = "employee_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
