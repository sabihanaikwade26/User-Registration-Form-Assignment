<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Form</title>
</head>
<body>
    <div class="container">
    <h2 class="heading">User Registration</h2>

    <?php
        // Handles form submission
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"];
            $streetAddress = $_POST["street_address"];
            $city = $_POST["city"];
            $state = $_POST["state"];
            $postalCode = $_POST["postal_code"];

            // Connect to the database
            $db_host = "localhost";
            $db_user = "root"; 
            $db_pass = ""; 
            $db_name = "user_address_db"; 

            $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

            if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
            }
            // Insert user information into the 'User' table
            $insertUserSql = "INSERT INTO User (name) VALUES ('$name')";
            if ($conn->query($insertUserSql) === FALSE) {
               echo "Error: " . $insertUserSql . "<br>" . $conn->error;
            }

            // Get the ID of the newly inserted user
            $userId = $conn->insert_id;

            // Insert address information into the 'Address' table
            $insertAddressSql = "INSERT INTO Address (user_id, street_address, city, state, postal_code)
                             VALUES ('$userId', '$streetAddress', '$city', '$state', '$postalCode')";
            if ($conn->query($insertAddressSql) === FALSE) {
               echo "Error: " . $insertAddressSql . "<br>" . $conn->error;
            }

            echo "User registration successful!";
            $conn->close();
        }
    ?>
    <form class="registration" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>>
        
        <input type="text" name="name" placeholder='Name' required><br>

        <input type="text" name="street_address" placeholder='Street Address' required><br>

        <input type="text" name="city" placeholder='City' required><br>

        <input type="text" name="state" placeholder='State' required><br>

        <input type="text" name="postal_code" placeholder='Postal Code' required><br>

        <button class="btn">Submit</button>
    </form>
    </div>
</body>
</html>