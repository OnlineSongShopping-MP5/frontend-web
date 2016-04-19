<?php
//$nameErr = "";

$conn = oci_connect('zjia', '1A2b3c4d!!', 'oracle.cise.ufl.edu:1521/orcl');
session_start();


$userName = $_SESSION['userName'];

session_unset();

$_SESSION['userName'] = $userName;

if(!$userName){
	header("location:3_log_in.php");
	exit();
}
	
	/*
	$searchsong = $_POST['searchsong'];
	$searchsinger = $_POST['searchsinger'];	
	$searchgenre = $_POST['searchgenre'];	
	$searchrate = $_POST['searchrate'];
	$searchdate = $_POST['searchdate'];		
	$searchprice = $_POST['searchprice'];	

	$_SESSION['searchsong'] = $searchsong;
	$_SESSION['searchsinger'] = $searchsinger;
	$_SESSION['searchgenre'] = $searchgenre;
	$_SESSION['searchrate'] = $searchrate;
	$_SESSION['searchdate'] = $searchdate;
	$_SESSION['searchprice'] = $searchprice;
	*/

	

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
            <li><a href = "23_logout.php">Logout</a></li>
	</ul>
	</div>

	<div id = "navRight">
	       <h1>Welcome <?php echo $_SESSION['userName'] ?> to Dashboard</h1>
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



<p align="center"> <a href="xxx.php">Search Songs</a> </p>

<p align="center"> <a href="9.1_top_ten_songs.php">Top Ten Songs</a> </p><br>
<p align="center"> <a href="9.2_top_ten_singers.php">Top Ten Singers</a> </p><br>
<p align="center"> <a href="9.3_recommend_songs_genre.php">Recommend songs based on the genres</a> </p><br>
<p align="center"> <a href="9.4_recommend_songs_singer.php">Recommend songs based on the singers</a> </p><br>
<p align="center"> <a href="9.5_recommend_songs_people_also_bought.php">People bought these songs also bought</a> </p><br>
<p align="center"> <a href="9.6_recommend_songs_age_group.php">Most popular song of specific age group</a> </p><br>
<p align="center"> <a href="top_ten_rating_songs.php">Top Ten Rating Songs</a> </p><br>



<!--

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

-->
