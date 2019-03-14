<?php
session_start();
$DB_HOST = 'project-4910.cnt6obvbfmv5.us-east-1.rds.amazonaws.com';
$DB_USER = 'bwindha';
$DB_PASS = 'ourdb4910$';
$DB_NAME = 'db4910';
$radio = $_POST['radio'];

// Try and connect using the info above.
$mysqli = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

$stmt = 'DELETE FROM Driver WHERE driverName = ?';

if ($stmt = $mysqli->prepare("{$stmt}")) {
    $stmt->bind_param('s',$_POST['username']);
    $stmt->execute();
    echo("Error description: " . mysqli_error($stmt));

} else {
    echo "cannot prepare statement";
}
?>