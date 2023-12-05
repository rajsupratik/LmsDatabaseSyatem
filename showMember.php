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

  // SQL query to select all members
  $sql = "SELECT * FROM `members`";

  // Execute the SQL query
  $result = $conn->query($sql);

  // Check if there are results
  if ($result->num_rows > 0) {
      // Output data of each row
      echo "<table border='1'>
            <tr>
                <th>Member ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Member Date</th>
                <th>Expiry Date</th>
                <th>Available</th>
            </tr>";
      while ($row = $result->fetch_assoc()) {
          echo "<tr>
                    <td>" . $row["member_id"] . "</td>
                    <td>" . $row["name"] . "</td>
                    <td>" . $row["address"] . "</td>
                    <td>" . $row["member_date"] . "</td>
                    <td>" . $row["expiry_date"] . "</td>
                    <td>" . ($row["available"] ? 'Yes' : 'No') . "</td>
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
