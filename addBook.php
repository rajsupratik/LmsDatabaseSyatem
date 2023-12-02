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
$title = $_POST['title'];
$author = $_POST['author'];
$isbn = $_POST['isbn'];
$quantity = $_POST['quantity'];

// SQL query to insert data into the 'books' table
$sql = "INSERT INTO `books` (`title`, `author`, `isbn`, `quantity`) 
        VALUES ('$title', '$author', '$isbn', '$quantity')";

// Execute the SQL query
if ($conn->query($sql) === TRUE) {
    echo "New book added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
