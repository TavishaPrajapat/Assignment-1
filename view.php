<!DOCTYPE html>
<html>
<head>
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

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        /* Style the footer */
footer {
    background-color: #333;
    color: white;
    padding: 20px 0;
    text-align: center;
}

    </style>
</head>
<body>
<nav>
     <div class="navbar">
        <a href="index.html">Home</a>
        <a href="view.php">Data</a>
        <a href="index.html">Contact</a>
    </div>
</nav>
<img src="images/pizza.jpg" alt="pizza" style="height:500px;width:100%;">
<?php
// PHP code to retrieve and display data from the database
$host = "localhost"; // Change to your database host
$username = "root"; // Change to your database username
$password = "200554770"; // Change to your database password
$database = "form"; // Change to your database name

// Create a database connection
$conn = mysqli_connect($host, $username, $password);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Create the database if it doesn't exist
$createDBSQL = "CREATE DATABASE IF NOT EXISTS $database";
if (mysqli_query($conn, $createDBSQL)) {
    // Select the database
    mysqli_select_db($conn, $database);}

// Retrieve data from the database
$sql = "SELECT * FROM user_data"; // Replace 'user_data' with your actual table name
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {



    
    echo "<table>";
    echo "<tr><th>First Name</th><th>Last Name</th><th>Street Address</th><th>City</th><th>Province</th><th>Phone Number</th><th>Email</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["first_name"] . "</td>";
        echo "<td>" . $row["last_name"] . "</td>";
        echo "<td>" . $row["street_address"] . "</td>";
        echo "<td>" . $row["city"] . "</td>";
        echo "<td>" . $row["province"] . "</td>";
        echo "<td>" . $row["phone_number"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} 
else {
    echo "No data found in the database.";
}
?>
<footer>
        <p>&copy; 2023 Your Company Name. All rights reserved.</p>
</footer>
</body>
</html>