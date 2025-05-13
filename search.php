<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'blood_donor_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$blood_group = $_POST['blood_group'];
$area = $_POST['area'];

// Search for donors
$sql = "SELECT * FROM donors WHERE blood_group = '$blood_group' AND area = '$area'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Donor List</h2>";
    while($row = $result->fetch_assoc()) {
        echo "Name: " . $row['name'] . "<br>";
        echo "Blood Group: " . $row['blood_group'] . "<br>";
        echo "Age: " . $row['age'] . "<br>";
        echo "Area: " . $row['area'] . "<br>";
        echo "Mobile: " . $row['mobile'] . "<br><br>";
    }
} else {
    echo "No donors found";
}

$conn->close();
?>
