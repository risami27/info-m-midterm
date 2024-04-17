<?php
// Database connection parameters
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "sampledb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullName = $_POST['fullName'];
    $birthdate = $_POST['birthdate'];
    $phoneNumber = $_POST['phoneNumber'];
    $address = $_POST['address'];

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO purok1 (full_name, birthdate, phone_number, address) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $fullName, $birthdate, $phoneNumber, $address);

    // Execute the statement
    $stmt->execute();

    // Close statement
    $stmt->close();
}

// Retrieve data from the database
$sql = "SELECT * FROM purok1";
$result = $conn->query($sql);

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purok 1</title>
    <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
      margin: 0;
      padding: 20px;
      background-image: url(bg.jpg);
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

    table {
      width: 100%;
    }

    table tr {
      border-bottom: 1px solid #ccc;
    }

    table tr:last-child {
      border-bottom: none;
    }

    table td {
      padding: 10px;
    }

    label {
      font-weight: bold;
    }

    input[type="text"],
    input[type="date"],
    input[type="tel"],
    textarea {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 3px;
      box-sizing: border-box;
      margin-top: 5px;
      margin-bottom: 10px;
    }

    button[type="submit"] {
      background-color: #67167b;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 3px;
      cursor: pointer;
    }

    button[type="submit"]:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
    <div class="container">
        <h1>Purok 1 Form</h1>
        <!-- Form for collecting information -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <table>
                <tr>
                    <td><label for="fullName">Full Name:</label></td>
                    <td><input type="text" id="fullName" name="fullName" required></td>
                </tr>
                <tr>
                    <td><label for="birthdate">Birthdate:</label></td>
                    <td><input type="date" id="birthdate" name="birthdate" required></td>
                </tr>
                <tr>
                    <td><label for="phoneNumber">Phone Number:</label></td>
                    <td><input type="tel" id="phoneNumber" name="phoneNumber" required></td>
                </tr>
                <tr>
                    <td><label for="address">Address:</label></td>
                    <td><textarea id="address" name="address" required></textarea></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <button type="submit">Submit</button>
                    </td>
                </tr>
            </table>
        </form>

        <!-- Display submitted data -->
        <h2>Submitted Data</h2>
        <table border="1">
            <tr>
                <th>Username</th>
                <th>Full Name</th>
                <th>Birthdate</th>
                <th>Phone Number</th>
                <th>Address</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["username"] . "</td>";
                    echo "<td>" . $row["full_name"] . "</td>";
                    echo "<td>" . $row["birthdate"] . "</td>";
                    echo "<td>" . $row["phone_number"] . "</td>";
                    echo "<td>" . $row["address"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No data available</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
