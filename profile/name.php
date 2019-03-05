<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Maru inc</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<div class="w3-top">
  <div class="w3-bar w3-border w3-light-grey">
    <a href="homepage.html" class="w3-bar-item w3-button">Home</a>
    <a href="#" class="w3-bar-item w3-button">Link 1</a>
    <a href="faq.html" class="w3-bar-item w3-button">FAQ</a>
    <a href="home.html" class="w3-bar-item w3-button w3-black w3-right">login</a>
  </div>
</div>

</head>

<br><br>
<body>
<p> Please only put text in fields you intend to change</p>
<tr>
	<td>Current Name: name</td><br>
</tr>
<tr>
	<td>change Username<br>
    <INPUT style='width:99%' TYPE='Text' Name=penname maxlength=30  size=35 required class='penname' title="Valid characters: A-Z a-z 0-9 . ' -"  placeholder="new Username">
    </td>
</tr>
<tr>
	<td>change password<br>
    <INPUT style='width:99%' TYPE='Text' Name=password maxlength=30  size=35 required class='penname' title="Valid characters: A-Z a-z 0-9 . ' -"  placeholder="new Password">
    </td>
</tr>
<tr>
	<td>change email<br>
    <INPUT style='width:99%' TYPE='Text' Name=email maxlength=30  size=35 required class='penname' title="Valid characters: A-Z a-z 0-9 . ' -"  placeholder="new email">
    </td>
</tr>
<tr>
	<td>change address<br>
    <INPUT style='width:99%' TYPE='Text' Name=address maxlength=30  size=35 required class='penname' title="Valid characters: A-Z a-z 0-9 . ' -" placeholder="new address">
		</td>
</tr>


<tr>
	<td>save changes<br>
        <input style='width:99%' type='password' name=oldpassword id=oldpassword required title='Enter your current password'>
        </td>
</tr>
<tr>
	<td>
    <button type='submit' class='btn btn-block'>Update information</button>
    </td>
</tr>
</body>
</html>
