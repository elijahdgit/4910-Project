<?php
$DB_HOST = 'project-4910.cnt6obvbfmv5.us-east-1.rds.amazonaws.com';
$DB_USER = 'bwindha';
$DB_PASS = 'ourdb4910$';
$DB_NAME = 'db4910';

// Create connection
$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT driverName, driverEmail, driverPhone, driverPoints, sponsorEmail, driverLicense, driverStatus FROM Driver";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

mysqli_close($conn);
?>

<html>
    <head>
        <meta charset="ISO-8859-1">
        <title>Driver Page</title>
        <title>Home Page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>

    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="http://ec2-18-207-218-17.compute-1.amazonaws.com/profile/homepage.php">GoodDriver</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="homepage.html">Home</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo $link_address;?>"><span class="glyphicon glyphicon-user"></span> Account</a></li>
                </ul>
            </div>
        </nav>
        <div class="container-fluid">
            <table style="width:90%">
              <tr>
                   <td>Name</td>
                   <td> <?php echo $row['driverName']?></td>
              </tr>
              <tr>
                   <td>Email</td>
                   <td><?php echo $row['driverEmail']?></td>
              </tr>
              <tr>
                   <td>Phone</td>
                   <td><?php echo $row['driverPhone']?></td>
              </tr>
               <tr>
                   <td>Points</td>
                   <td><?php echo $row['driverPoints']?></td>
               </tr>
               <tr>
                   <td>Sponsor Email</td>
                   <td><?php echo $row['sponsorEmail']?></td>
               </tr>
               <tr>
                   <td>Driver License</td>
                   <td><?php echo $row['driverLicense']?></td>
               </tr>
               <tr>
                   <td>Status</td>
                   <td><?php echo $row['driverStatus']?></td>
               </tr>
            </table>
        </div>
    <form action="/edit.php" method="get">
        <button name="edit" type="submit" value="HTML">edit</button>
    </form>
    </body>
</html>

