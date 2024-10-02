<?php
// Database connection credentials
$servername = "localhost";  // Your server name
$username = "root";         // Your MySQL username (usually 'root' for local server)
$password = "";             // Your MySQL password (leave empty if no password on local server)
$dbname = "blood_donation_db"; // The name of your database

// Create connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve all records from the 'donors' table
$sql = "SELECT donor_name, blood_group, donation_date, receipt_number FROM donors";
$result = $conn->query($sql);

// Initialize an empty array to store donor data
$donors = [];

// Check if there are records returned from the query
if ($result->num_rows > 0) {
    // Loop through each record and store it in the $donors array
    while ($row = $result->fetch_assoc()) {
        $donors[] = $row;
    }
}

// Close the database connection
$conn->close();

// Set the Content-Type to application/json to return the data in JSON format
header('Content-Type: application/json');

// Encode the $donors array into a JSON string and output it
echo json_encode($donors);
?>
