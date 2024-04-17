<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Submission Display</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
      margin: 0;
      padding: 20px;
    }

    .container {
      max-width: 600px;
      margin: 0 auto;
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 20px;
    }

    h1 {
      text-align: center;
    }

    p {
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Brgy 13 Purok 1</h1>
    <?php
    // Check if the form data is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $fullName = isset($_POST['fullName']) ? $_POST['fullName'] : '';
        $birthdate = isset($_POST['birthdate']) ? $_POST['birthdate'] : '';
        $phoneNumber = isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : '';
        $address = isset($_POST['address']) ? $_POST['address'] : '';

        // Display the form data
        echo "<p><strong>Full Name:</strong> $fullName</p>";
        echo "<p><strong>Birthdate:</strong> $birthdate</p>";
        echo "<p><strong>Phone Number:</strong> $phoneNumber</p>";
        echo "<p><strong>Address:</strong> $address</p>";
    } else {
        // If form data is not submitted, display a message
        echo "<p>No form data submitted.</p>";
    }
    ?>
  </div>
</body>
</html>
