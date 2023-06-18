<style>
    /* Table styling */
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    /* Table header styling */
    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    /* Alternate row background color */
    tr:nth-child(even) {
        background-color: #f9f9f9;
    }
</style>



<?php
    // Database connection
    $servername = "localhost"; // Replace with your server name
    $username = "root"; // Replace with your database username
    $password = ""; // Replace with your database password
    $dbname = "bankingsystem";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve data from the customer table
    $sql = "SELECT * FROM customer";
    $result = $conn->query($sql);

    // Check if any rows are returned
    if ($result->num_rows > 0) {
        // Table header
        echo "<table>
                <tr>
                    <th>Account No</th>
                    <th>Customer Name</th>
                    <th>Email ID</th>
                    <th>Phone No</th>
                    <th>Current Balance</th>
                    <th>Action</th>
                </tr>";

        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["accountno"] . "</td>
                    <td>" . $row["name"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["phone no"] . "</td>
                    <td>" . $row["current bal"] . "</td>
                    <td><a href='view.php?id=" . $row["accountno"] . "'>View</a></td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    // Close the connection
    $conn->close();
?>
