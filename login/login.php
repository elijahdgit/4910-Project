<?php
/**
 * Created by PhpStorm.
 * User: elijah
 * Date: 2019-03-01
 * Time: 11:11
 */
session_start();
$DB_HOST = 'project-4910.cnt6obvbfmv5.us-east-1.rds.amazonaws.com';
$DB_USER = 'bwindha';
$DB_PASS = 'ourdb4910$';
$DB_NAME = 'db4910';
$radio = $_POST['radio'];

// Try and connect using the info above.
$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// Now we check if the data was submitted, isset will check if the data exists.
if ( !isset($_POST['username'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
	die ('Username and/or password does not exist!');
}

if($radio == "driver") {
    $tempStmt = 'SELECT driverID, driverPassword FROM Driver WHERE driverName = ?';
} else if ($radio == "sponsor") {
    $tempStmt = 'SELECT sponsorID, sponsorPassword FROM Sponsor WHERE sponsorName = ?';
} else if($radio == "admin") {
    $tempStmt = 'SELECT adminID, adminPassword FROM Admin WHERE adminName = ?';
}

// Prepare our SQL
if ($stmt = $con->prepare("{$tempStmt}")) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		$stmt->bind_result($id, $password);
		$stmt->fetch();
		// Account exists, now we verify the password.
		if (password_verify($_POST['password'], $password)) {
		//if($_POST['password'] == $password){
			// Verification success! User has loggedin!
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['name'] = $_POST['username'];
			$_SESSION['id'] = $id;

			if($radio == "driver") {
				$_SESSION['type'] = 'driver';
			} else if ($radio == "sponsor") {
				$_SESSION[''] = 'sponsor';
			} else if($radio == "admin") {
				$_SESSION['admin'] = 'admin';
			}
			//echo 'Welcome ' . $_SESSION['name'] . '!';
			header('Location: http://ec2-18-207-218-17.compute-1.amazonaws.com/profile/homepage.html');
		} else {
			echo 'Incorrect username and/or password1!';
		}
	} else {
		echo 'Incorrect username and/or password2!';
	}
	$stmt->close();
} else {
	echo 'Could not prepare statement!';
}
?>
