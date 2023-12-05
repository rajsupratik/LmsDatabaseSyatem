<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Library Management - Catalog</title>
  <style>
    /* Your CSS styling here */
  </style>
</head>
<body>
  <h2>Library Catalog</h2>

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

  // SQL query to select all books
  $sql = "SELECT * FROM `books`";

  // Execute the SQL query
  $result = $conn->query($sql);

  // Check if there are results
  if ($result->num_rows > 0) {
      // Output data of each row
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
      echo "0 results";
  }

  // Close the database connection
  $conn->close();
  ?>
</body>
</html>
