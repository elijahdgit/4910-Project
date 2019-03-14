<?php
session_start();
$DB_HOST = 'project-4910.cnt6obvbfmv5.us-east-1.rds.amazonaws.com';
$DB_USER = 'bwindha';
$DB_PASS = 'ourdb4910$';
$DB_NAME = 'db4910';

// Try and connect using the info above.
$mysqli = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = 'SELECT * FROM Driver';
$mysqli->prepare("{$stmt}");
$stmt->execute();
echo("Error description: " . mysqli_error($stmt));
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["driverID"]. " - Name: " . $row["driverName"]. " - Email: " . $row["driverEmail"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>