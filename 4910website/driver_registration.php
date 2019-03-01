<?php
/**
 * Created by PhpStorm.
 * User: elijah
 * Date: 2019-02-28
 * Time: 16:23
 */

// Change this to your connection info.
$DB_HOST = 'project-4910.cnt6obvbfmv5.us-east-1.rds.amazonaws.com';
$DB_USER = 'bwindha';
$DB_PASS = 'ourdb4910$';
$DB_NAME = 'db4910';

// Try and connect using the info above.
$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($mysqli->connect_errno) {
// If there is an error with the connection, stop the script and display the error.
    die ('Failed to connect to MySQL: ' . $mysqli->connect_errno);
}

// Now we check if the data was submitted, isset will check if the data exists.
if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
// Could not get the data that should have been sent.
    die ('Please complete the registration form!<br><a href="driver_registration.html">Back</a>');
}

$rand = rand(1, 500000);
$x = 0;

$tempStmt1 = 'SELECT driverID, driverPassword FROM Driver WHERE driverName = ?';
$tempStmt2 = 'INSERT INTO Driver (driverID, driverName, driverPassword, driverEmail, driverPhone
, sponsorEmail, driverPoints, driverLicense, driverStatus, timeWithSponsor) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';

// We need to check if the account with that username exists
if ($stmt = $mysqli->prepare("{$tempStmt1}")) {
// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.

    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();

// Store the result so we can check if the account exists in the database.
    if ($stmt->num_rows > 0) {
// Username already exists
        echo 'Username exists, please choose another!<br><a href="driver_registration.html">Back</a>';
    } else {
 //Username doesnt exists, insert new account
        if ($stmt = $mysqli->prepare("{$tempStmt2}")) {

// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
            //$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $password = $_POST['password'];
            $stmt->bind_param('ssssssssss', $rand, $_POST['username'], $password, $_POST['email'], $_POST['phone'],
                $_POST['sponsorEmail'], $x, $_POST['driverLicense'], $_POST['status'], $_POST['time']);
            $stmt->execute();
            printf("Error: %s.\n", $stmt->error);

            echo 'You have successfully registered, you can now login!<br><a href="login.html">Login</a>';
        } else {
            echo 'Could not prepare statement2!';
        }
    }
    $stmt->close();
} else {
    echo 'Could not prepare statement1!';
}
$mysqli->close();
?>


