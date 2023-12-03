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

// Retrieve search term from the form
$search = $_POST['search'];

// SQL query to search for books by title
$sql = "SELECT * FROM `books` WHERE `title` LIKE '%$search%'";

// Execute the SQL query
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Output data of each row
    echo "<h2>Search Results</h2>";
    echo "<table border='1'>
          <tr>
              <th>Book ID</th>
              <th>Title</th>
              <th>Author</th>
              <th>ISBN</th>
              <th>Quantity</th>
          </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                  <td>" . $row["book_id"] . "</td>
                  <td>" . $row["title"] . "</td>
                  <td>" . $row["author"] . "</td>
                  <td>" . $row["isbn"] . "</td>
                  <td>" . $row["quantity"] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No results found";
}

// Close the database connection
$conn->close();
?>
