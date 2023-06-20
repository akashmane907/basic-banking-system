<style>
    /* Table styling */
    table {
        border-collapse: collapse;
        width: 100%;
    }

.button {
            display: inline-block;
            background-color: #4CAF50;
            border: none;
            color: #f0f5f6;
            padding: 12px 24px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            margin: 10px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

    th, td {
        padding: 8px;
        text-align: center;
        font-size: 20px;
        border-bottom: 1px solid #ddd;
    }

    /* Table header styling */
    th {
        font-size: 20px;
        color: #15c1a1;
        background-color: #333;
        font-weight: bold;
    }

    /* Alternate row background color */
    tr:nth-child(even) {
        background-color: #6da5c0;
    }
 tr:nth-child(odd) {
        background-color: #66a8cf;
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
                   
                    <th>Current Balance</th>
                    <th>Action</th>
                </tr>";

        // Output data of each row
        while ($row = $result->fetch_assoc()) {
           echo '<tr>
        <td>' . $row["accountno"] . '</td>
        <td>' . $row["name"] . '</td>
        <td>' . $row["email"] . '</td>
        <td>' . $row["current bal"] . '</td>
                <td><a class=button href="view.php?id=' . $row['accountno'] . '">view</a><a class="button" href="transferin.php? source_account=' . $row['accountno'] . '">Transfer Money</a></td>
    </tr>';

        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    // Close the connection
    $conn->close();
?>
