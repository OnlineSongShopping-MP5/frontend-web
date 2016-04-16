<?php
/*require("config.php");

if(!isset($_SESSION['userID'])){
	header("location:index.php");
	exit();
	}else{
		$userData = getUserData($_SESSION['userID']);
		}
*/
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Provider Homepage</title>

<link href="style.css" rel="stylesheet" type="text/css">
<style>
.container {
    position: relative;
}

.bottomcenter {
    position: absolute;
	left: 0;
    bottom: 18px;
	width: 100%;
   	text-align: center;
    font-size: 24px;
}

img { 
    width: 30%;
    height: auto;
    opacity: 0.6;
}
</style>

</head>

<body>
<div id = "mainFrame">

  <div id = "navLeft">
  
  <ul id="menu">
  <li><a href = "23_logout.php">Logout</a></li></ul>
  
  </div>
  
  <div id = "navRight"><h1>Welcome Provider - <?php /*echo $userData['name']; */?> to Dashboard</h1>
  </div>
  <br class = "clearFix">


</div>
<div class="container">

<p style="text-align: center;">
<img src="xiaowu.jpeg" alt=""/>
</p>


  <div class="bottomcenter">Welcome! LOGO</div>
</div>
<br><br>
<table width="500" border="1">
  <tbody>
    <tr>
      <td width = "25%">Search</td>
      <td width = "75%">&nbsp;</td>
    </tr>
  </tbody>
</table>
<br><br>
<h2>Please select the functionality from below:</h2>

<form>
  <input type="radio" name="Info" value="Account Management" checked> Account Management<br>
  <input type="radio" name="Info" value="Profile Management"> Profile Management<br>
  <input type="radio" name="Info" value="Upload New Albums"> Upload New Albums<br>
  <input type="radio" name="Info" value="Upload New Songs"> Upload New Songs<br>
  <input type="radio" name="Info" value="Order Management"> Order Management<br>
</form>
 

</body>
</html>