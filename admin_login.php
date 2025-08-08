<?php
session_start();

// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Get form input
$email = $_POST['email'];
$password = $_POST['password'];

// Connect to database
$conn = new mysqli("localhost", "root", "", "star_organic");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query admin by email
$stmt = $conn->prepare("SELECT name, email, password_hash FROM admins WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// If admin found
if ($result->num_rows === 1) {
    $admin = $result->fetch_assoc();

    // Verify password
    if ($password === $admin['password_hash']) {
        // Save admin info in session
        $_SESSION['admin_name'] = $admin['name'];
        $_SESSION['admin_email'] = $admin['email'];

        // Redirect to admin.html
        header("Location: admin.html");
        exit();
    } else {
        echo "❌ Incorrect password.";
    }
} else {
    echo "❌ Email not found.";
}

$stmt->close();
$conn->close();
?>
