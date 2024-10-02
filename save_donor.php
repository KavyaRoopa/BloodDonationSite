<?php
$servername = "localhost";
$username = "root";  // Replace with your MySQL username
$password = "";  // Replace with your MySQL password
$dbname = "blood_donation_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $donor_name = $_POST['donor_name'];
    $blood_group = $_POST['blood_group'];
    $donation_date = $_POST['donation_date'];
    $receipt_number = $_POST['receipt_number'];

    $sql = "INSERT INTO donors (donor_name, blood_group, donation_date, receipt_number) 
            VALUES ('$donor_name', '$blood_group', '$donation_date', '$receipt_number')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
