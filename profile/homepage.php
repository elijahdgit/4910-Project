<?php
session_start();

$link_address = 'http://google.com';

if($_SESSION['radio'] == 'driver') {
    $link_address = 'http://ec2-18-207-218-17.compute-1.amazonaws.com/profile/driver.php';
} else if($_SESSION['radio'] == 'sponsor') {
    $link_address = 'http://google.com';
} else {
    $link_address = 'http://google.com';
    }
?>

<html lang="en">
<head>
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
            <a class="navbar-brand" href="<?php echo $link_address;?>">GoodDriver</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="faq.html">Faq</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo $link_address;?>"><span class="glyphicon glyphicon-user"></span> Account</a></li>
        </ul>
    </div>
</nav>

<div class="container">
    <p>Generic information about the app</p>
</div>

</body>
</html>
