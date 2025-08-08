<?php
session_start();

// Show errors (for debugging)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Get the form data
$email = $_POST['email'];
$password = $_POST['password'];

// Connect to database
$conn = new mysqli("localhost", "root", "", "star_organic");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Find the user by email
$stmt = $conn->prepare("SELECT name, email, password_hash FROM customers WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Check if user exists
if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();

    // If password is hashed in DB
    if ($password === $row['password_hash']) {
        // Store name in session
        $_SESSION['name'] = $row['name'];

        // Redirect to homepage
        header("Location: homepage.html");
        exit();
    } else {
        echo "Incorrect password.";
    }
} else {
    echo "Email not found.";
}

// Close connections
$stmt->close();
$conn->close();
?>
