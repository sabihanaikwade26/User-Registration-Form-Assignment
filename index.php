<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Form</title>
</head>
<body>
    <div>
    <h2>User Registration</h2>

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

        }
    ?>
    <form>
        
        <input type="text" name="name" placeholder='Name' required><br>

        <input type="text" name="street_address" placeholder='Street Address' required><br>

        <input type="text" name="city" placeholder='City' required><br>

        <input type="text" name="state" placeholder='State' required><br>

        <input type="text" name="postal_code" placeholder='Postal Code' required><br>

        <button>Submit</button>
    </form>
    </div>
</body>
</html>