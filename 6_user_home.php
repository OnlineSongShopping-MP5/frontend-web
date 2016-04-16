<?php
$conn = oci_connect('yw0', 'DBdb1234', 'oracle.cise.ufl.edu:1521/orcl');
//include '3_log_in.php';
$userData = $_SESSION['userName'];


	if(!isset($_SESSION['userName'])){
	header("location:3_log_in.php");
	exit();
	}else{
	$userData = $_SESSION['userName'];

	//$userData = getUserData($_SESSION['userName']);
		}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Customer Homepage</title>

<link href="style.css" rel="stylesheet" type="text/css">
<style>
.container {
    position: relative;
}

.bottomcenter {
    position: absolute;
	left: 0;
    bottom: 28px;
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
  
  <div id = "navRight"><h1>Welcome <?php $userData['userName'] ?> to Dashboard</h1>
  </div>
  <br class = "clearFix">


</div>
<div class="container">

<p style="text-align: center;">
<img src="xiaowu.jpeg" alt=""/>
</p>

<p align="center"> <a href="12_order_history.php">My Purchase History</a> </p>

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

<h2 >Please see our picks for you!</h2>

 <form>
  <input type="radio" name="Info" value="For You" checked> For You<br>
  <input type="radio" name="Info" value="Hottest Singers"> Hottest Singers<br>
  <input type="radio" name="Info" value="Popular Songs"> Popular Songs<br>
 </form>
 
 <br><br>


<h2>Please select the functionality from below:</h2>

<form>
  <input type="radio" name="Info" value="Account Management" checked> Account Management<br>
  <input type="radio" name="Info" value="Profile Management"> Profile Management<br>
  <input type="radio" name="Info" value="Order Management"> Order Management<br>
  <input type="radio" name="Info" value="Account Balance"> Account Balance<br>
  <input type="radio" name="Info" value="Purchase History"> Purchase History<br>
  <input type="radio" name="Info" value="Rate Purchased Order(s)"> Rate Purchased Order(s)<br>
  <input type="radio" name="Info" value="Purchase History"> Purchase History<br>
  <input type="radio" name="Info" value="Purchase History"> Purchase History<br>
</form>

</body>
</html>













