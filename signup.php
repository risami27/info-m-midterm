<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $phonenumber = $_POST['phonenumber'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Perform any necessary validation (e.g., checking if passwords match)

    // If validation passes, you can proceed with further actions such as storing data in a database

    // For demonstration purposes, let's just display the submitted data
    echo "Username: " . $username . "<br>";
    echo "Phonenumber: " . $phonenumber. "<br>";
    echo "Password: " . $password . "<br>";
    echo "Confirm Password: " . $confirm_password . "<br>";

    // You can then redirect the user to the login page
    header("Location: login.html");
    exit;
}
?>
