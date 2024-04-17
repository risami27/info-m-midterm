<?php
// Start session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perform authentication (e.g., check against a database)
    // For demonstration purposes, let's assume hardcoded credentials
    $username = "username";
    $password = "password";

    if ($username === $username && $password === $password) {
        // Authentication successful
        // Set session variables
        $_SESSION['username'] = $username;
        // Redirect to welcome page or any other authenticated page
        header("Location: welcome.php");
        exit();
    } else {
        // Authentication failed
        echo "Invalid username or password.";
    }
}
?>
