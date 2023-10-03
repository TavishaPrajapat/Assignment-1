<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Navbar styles */
        .navbar {
            background-color: #333;
            overflow: hidden;
        }

        .navbar a {
            float: left;
            font-size: 16px;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
        /* Style the footer */
        footer {
            background-color: #333;
            color: white;
            padding: 20px 0;
            text-align: center;
            margin-top:300px;
        }
       

    </style>
</head>
<body>
<header>
        <nav>
            <div class="navbar">
                <a href="index.html">Home</a>
                <a href="view.php">Data</a>
                <a href="index.html">Contact</a>
        </div>
        </nav>
        <img src="images/pizza.jpg" alt="pizza" style="height:500px;width:100%;">
</header>
<main>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Database Connectivity
    $servername = "localhost";
    $username = "root";
    $password = "200554770";
    $database = "form";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Create the database if it doesn't exist
    $createDBSQL = "CREATE DATABASE IF NOT EXISTS $database";
    if (mysqli_query($conn, $createDBSQL)) {
        // Select the database
        mysqli_select_db($conn, $database);

        // Create the table if it doesn't exist
        $createTableSQL = "CREATE TABLE IF NOT EXISTS user_data (
            first_name TEXT NOT NULL,
            last_name TEXT NOT NULL,
            street_address TEXT NOT NULL,
            city TEXT NOT NULL,
            province TEXT NOT NULL,
            phone_number BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            email TEXT NOT NULL
        )";

        if (mysqli_query($conn, $createTableSQL)) {
            // Retrieve form data and perform validation
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $street_address = $_POST['street_address'];
            $city = $_POST['city'];
            $province = $_POST['province'];
            $phone_number = $_POST['phone_number'];
            $email = $_POST['email'];

            // Insert data into the table
            $insertDataSQL = "INSERT INTO user_data (first_name, last_name, street_address, city, province, phone_number, email)
            VALUES ('$first_name', '$last_name', '$street_address', '$city', '$province', '$phone_number', '$email')";

            if (mysqli_query($conn, $insertDataSQL)) {
                $successMessage = "Data inserted successfully !";
            } else {
                echo "Data not inserted due to " . mysqli_error($conn);
            }
        } else {
            echo "Table creation failed: " . mysqli_error($conn);
        }
    } else {
        echo "Database creation failed: " . mysqli_error($conn);
    }
}
?>
<!-- Display success message with CSS styling -->
<div style="text-align: center; margin-top: 20px;">
        <p style="color: green; font-weight: bold;font-size:80px;">
        <?php 
        echo $successMessage; 
        ?></p>
</div>
</main>
<!--- Footer --->
<footer>
    <p>&copy; 2023 Your Company Name. All rights reserved.</p>
</footer>
	<!--# Footer #-->
</body>
</html>