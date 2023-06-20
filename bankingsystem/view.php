 <style>
        body {
      font-size: 20px;
      font-family: Arial, sans-serif;
background-color: #0f969c;
      margin: 0;
      padding: 0;
   /*   background-image: url("2283451.jpg");*/
      background-repeat: no-repeat;
      background-size: contain;
      background-position: center top 200px;
    }


         header {
      background-color: #333;
      color: #15c1a1;
      padding: 20px;
      text-align: center;
    }
        h1 {
            margin: 0;
        }

      main {
      padding: 20px;
      border-radius: 10px;
      margin: 20px auto;
      max-width: 600px;
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 10px;
      }

        footer {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
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
        .button:hover {
            background-color: #45a049;
        }
        .customer-details {
            background-color: #f5f5f5;
            border-radius: 4px;
            padding: 20px;
        }
        .customer-details p {
            margin: 10px 0;
        }
    </style>\ <header>
    <h1>CUSTOMER DETAILS</h1>
  </header>

<main>
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

// Retrieve the customer ID from the URL parameter
$customerID = $_GET['id'];

// Construct the SQL query with proper parameter binding
$sql = "SELECT * FROM customer WHERE accountno = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $customerID);
$stmt->execute();

// Get the query result
$result = $stmt->get_result();

// Check if a row is returned
if ($result->num_rows > 0) {
    // Fetch the customer data
    $row = $result->fetch_assoc();

    // Display the customer details
    
    echo "<p><strong>Account No:</strong> " . $row["accountno"] . "</p>";
    echo "<p><strong>Customer Name:</strong> " . $row["name"] . "</p>";
    echo "<p><strong>Email ID:</strong> " . $row["email"] . "</p>";
    echo "<p><strong>Phone No:</strong> " . $row["phone no"] . "</p>";
    echo "<p><strong>Current Balance:</strong> " . $row["current bal"] . "</p>";

    // Display the Transfer Money button
    echo '<a class="button" href="bs_table.php?source_account=' . $row['accountno'] . '">Back</a>';
} else {
    echo "No customer found.";
}

// Close the statement and the connection
$stmt->close();
$conn->close();
?>
</main>
