<?php
// Enable error reporting (for debugging)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Collect form data
$name = $_POST['name'];
$email = $_POST['email'];
$password_hash = $_POST['password_hash'];
$phone = $_POST['phone'];

// Connect to database
$conn = new mysqli('localhost', 'root', '', 'star_organic');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    // Prepare statement
    $stmt = $conn->prepare("INSERT INTO new_users (name, email, password_hash, phone) VALUES (?, ?, ?, ?)");
    
    // Bind parameters
    $stmt->bind_param("ssss", $name, $email, $password_hash, $phone);
    
    // Execute
    if ($stmt->execute()) {
        echo "Registration successful";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close
    $stmt->close();
    $conn->close();
}
?>