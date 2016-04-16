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
<title>Search Result</title>

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
  
  <div id = "navRight"><h1>Search Results</h1>
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
<br>
<h2>Here is the info you required:</h2>
<br>
<table width="500" border="1">
  <tbody>
    <tr>
      <td width = "30%">Artist:</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Song Title:</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Album:</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Style/Genre:</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Released Year:</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Awards:</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>

<h2>Please See The Hottest Hits:</h2>

<p><a href="9.1_top _ten_songs.php">Top Ten Songs</a></p>

<p><a href="9.2_top _ten_singers.php">Top Ten Singers</a></p>

<p>You May Also Like</p>



</body>
</html>

