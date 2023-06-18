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

// Retrieve the source account number and transfer amount from the form submission
$sourceAccount = $_POST['source_account'];
$transferAmount = $_POST['transfer_amount'];

// Retrieve the source customer details
$sourceQuery = "SELECT * FROM customer WHERE accountno = '$sourceAccount'";
$sourceResult = $conn->query($sourceQuery);
$sourceRow = $sourceResult->fetch_assoc();

// Check if the source customer exists
if ($sourceResult->num_rows > 0) {
    // Check if the source customer has sufficient balance
    $destinationAccount = $_POST['destination_account'];

    // Retrieve the destination customer details
    $destinationQuery = "SELECT * FROM customer WHERE accountno = '$destinationAccount'";
    $destinationResult = $conn->query($destinationQuery);
    $destinationRow = $destinationResult->fetch_assoc();

    // Check if the destination customer exists
    if ($destinationResult->num_rows > 0) {
        // Perform the transfer
        $newSourceBalance = $sourceRow['current bal'] - $transferAmount;
        $newDestinationBalance = $destinationRow['current bal'] + $transferAmount;

        /// Update the source customer's balance
$updateSourceQuery = "UPDATE customer SET `current bal` = '$newSourceBalance' WHERE accountno = '$sourceAccount'";
$conn->query($updateSourceQuery);

// Update the destination customer's balance
$updateDestinationQuery = "UPDATE customer SET `current bal` = '$newDestinationBalance' WHERE accountno = '$destinationAccount'";
$conn->query($updateDestinationQuery);


        echo "Funds transferred successfully!";
    } else {
        echo "Invalid destination account.";
    }
} else {
    echo "Invalid source account.";
}

// Close the database connection
$conn->close();
?>
