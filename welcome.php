<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome</title>
  <style>
   body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f0f0f0;
      position: relative;
      background-image: url(bg.jpg);
    }
    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(255, 255, 255, 0.5); /* Semi-transparent white */
      z-index: -1;
    }
    .container {
      width: 1000px;
      max-width: 90%;
      margin: 20px auto;
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
      box-sizing: border-box;
    }
    @media screen and (max-width: 768px) {
      .container {
        width: 90%;
        margin: 10px auto;
      }
    }
    .content {
      padding: 20px;
    }
    .menu-bar {
      position: relative;
    }
    .sidebar {
      position: absolute;
      top: 0;
      left: -200px; /* Initially hidden */
      width: 200px;
      background-color: #f7f4f4;
      color: #0a0a0a;
      padding: 20px;
      transition: left 0.3s ease;
      height: 90vh;
    }
    .menu-bar:hover .sidebar {
      left: 0; /* Show sidebar when menu bar is hovered */
    }
    .content {
      margin-left: 200px; /* Adjust content area when sidebar is visible */
      padding: 20px;
    }
    h2 {
      margin-top: 0;
    }
    .menu-item {
      margin-bottom: 10px;
      position: relative;
    }
    .submenu-container {
      position: relative; /* Make submenu container relative for absolute positioning of submenu */
    }
    .submenu {
      position: absolute;
      top: calc(100% + 5px);
      left: 0;
      background-color: #444;
      color: #fff;
      padding: 10px;
      border-radius: 5px;
      display: none; /* Initially hidden */
      z-index: 999; /* Ensure submenu appears above other elements */
    }
    .menu-item:hover .submenu,
    .submenu-container:hover .submenu,
    .menu-checkbox:checked + .sidebar .submenu {
      display: block; /* Show submenu on hover or when submenu container is hovered, or when checkbox is checked */
    }
    .menu-item:focus-within .submenu,
    .submenu-container:focus-within .submenu {
      display: block; /* Show submenu when menu item is focused */
    }
    .submenu a {
      display: block;
      color: #fff;
      text-decoration: none;
      padding: 5px 10px;
      margin-bottom: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    .submenu a:hover {
      background-color: #555;
    }
    .menu-checkbox {
      display: none;
    }
    .notification-icon {
      position: absolute;
      top: 10px;
      right: 20px;
      color: #333;
      font-size: 24px;
      cursor: pointer;
    }
    .profile-icon {
      position: absolute;
      top: 10px;
      right: 70px;
      color: #333;
      font-size: 24px;
      cursor: pointer;
    }
    .menu-checkbox:checked + .sidebar {
      left: 0; /* Show sidebar when checkbox is checked */
    }
    .settings-submenu {
      position: absolute;
      top: 0;
      right: -200px; /* Position the submenu to the right of the menu item */
      background-color: #444;
      color: #fff;
      padding: 10px;
      border-radius: 5px;
      display: none; /* Initially hidden */
      z-index: 999; /* Ensure submenu appears above other elements */
    }
    .menu-item:hover .settings-submenu,
    .submenu-container:hover .settings-submenu,
    .menu-checkbox:checked + .sidebar .settings-submenu {
      display: block; /* Show submenu on hover or when submenu container is hovered, or when checkbox is checked */
      right: 0; /* Align submenu with the right edge of the menu item */
    }
    .menu-item:focus-within .settings-submenu,
    .submenu-container:focus-within .settings-submenu {
      display: block; /* Show submenu when menu item is focused */
      right: 0; /* Align submenu with the right edge of the menu item */
    }
  </style>
</head>
<body>
<div class="menu-bar">
    <label for="toggleSidebar" class="notification-icon">&#128276;</label> <!-- Bell icon -->
    <input type="checkbox" id="toggleSidebar" class="menu-checkbox">
    <input type="checkbox" id="toggleProfile" class="profile-checkbox">
    <label for="toggleProfile" class="profile-icon">&#128100;</label> <!-- Profile icon -->
    <div class="sidebar">
      <div class="menu-item">
        <a href="announcement.html">Announcement</a>
      </div>
      <div class="menu-item">
        <span class="barangay">Barangay</span>
        <input type="checkbox" id="toggleSubmenu" class="submenu-checkbox">
        <div class="submenu-container">
          <div class="submenu">
            <a href="brgy13.html">Brgy 13</a>
            <a href="brgylunao.html">Brgy Lunao</a>
            <a href="brgyAgay-ayan.html">Brgy Agay-ayan</a>
            <a href="brgy24A.html">Brgy 24A</a>
          </div>
        </div>
      </div>
      <div class="menu-item">
        <span class="settings">Settings</span>
        <input type="checkbox" id="toggleSettingsSubmenu" class="submenu-checkbox">
        <div class="submenu-container">
          <div class="submenu settings-submenu">
            <a href="profile.html">Profile</a>
            <a href="notifications.html">Notifications</a>
            <a href="privacy.html">Privacy</a>
          </div>
        </div>
      </div>
      <div class="menu-item">
        <a href="login.html">Log Out</a>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="content">
      <h2>Welcome</h2>
      <p>You have successfully logged in!</p>
      
      <h3>Dashboard</h3>
      <table border="1">
        <tr>
          <th>Username</th>
          <th>Name</th>
          <th>Age</th>
          <th>Email</th>
        </tr>
        <?php
        // Connect to your database
        $servername = "localhost";
        $username = "username";
        $password = "password";
        $dbname = "sampledb";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $sampledb);
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            echo "Connected successfully";
        }
        

        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        // Query database for records
        $sql = "SELECT username, name, age, email FROM welcome";
        $result = $conn->query($sql);

        // Display records in table rows
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["username"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["age"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='4'>No records found</td></tr>";
        }
        $conn->close();
        ?>
      </table>
    </div>
  </div>
</body>
</html>
