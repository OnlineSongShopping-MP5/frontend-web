<?php
require("config.php");

if(!isset($_SESSION['userID'])){
	header("location:index.php");
	exit();
	}else{
		$userData = getUserData($_SESSION['userID']);
		}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id = "mainFrame">

  <div id = "navLeft">
  
  <ul id="menu">
  <li><a href = "logout.php">Logout</a></li></ul>
  
  </div>
  
  <div id = "navRight"><h1>Welcome <?php echo $userData['name']; ?> to Dashboard</h1>
  </div>
  <br class = "clearFix">
</div>
</body>
</html>