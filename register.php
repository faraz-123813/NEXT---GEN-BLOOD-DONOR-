<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'blood_donor_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$blood_group = $_POST['blood_group'];
$age = $_POST['age'];
$area = $_POST['area'];
$mobile = $_POST['mobile'];

// Insert into database
$sql = "INSERT INTO donors (name, blood_group, age, area, mobile) VALUES ('$name', '$blood_group', '$age', '$area', '$mobile')";

if ($conn->query($sql) === TRUE) {
    echo "Donor Registered Successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
