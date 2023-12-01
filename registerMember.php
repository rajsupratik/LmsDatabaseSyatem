<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "librarysystem";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the form
$member_id = $_POST['member_id'];
$name = $_POST['name'];
$address = $_POST['address'];
$member_date = $_POST['member_date'];
$expiry_date = $_POST['expiry_date'];
$available = $_POST['available'];

// SQL query to insert data into the 'members' table
$sql = "INSERT INTO `members` (`member_id`, `name`, `address`, `member_date`, `expiry_date`, `available`) 
        VALUES ('$member_id', '$name', '$address', '$member_date', '$expiry_date', '$available')";

// Execute the SQL query
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
