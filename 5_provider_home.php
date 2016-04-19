<?php
/**/

$conn = oci_connect('yw0', 'DBdb1234', 'oracle.cise.ufl.edu:1521/orcl');
if ($conn == null) {
	echo 'connect failed';
}

if(isset($_POST['Submit'])){
    
    
	$song_id = $_POST['song_id'];
	$song_name = $_POST['song_name'];	
	$avg_rate = '0.0';	
	$release_date = $_POST['release_date'];
	$duration = $_POST['duration'];		
	$price = $_POST['price'];	
	$provider_name = $_POST['provider_name'];	
	$genre_id = $_POST['genre_id'];	
	$singer_id = $_POST['singer_id'];	
        $download = 0;
        
        
        if (!$song_id || !$song_name || !$avg_rate || !$release_date || !$duration || !$price || 
              !$provider_name || !$genre_id || !$singer_id) {
		header("location:5_provider_home.php");
                echo "Please provide complete information";
		return;
	}

	$stid = oci_parse($conn, 'Insert into song values (:id, :title, :avg_rate, :release_date, :duration, :price, :provider_name, :genre_id, :singer_id, :download)');

	oci_bind_by_name($stid, ':id', $song_id);
	oci_bind_by_name($stid, ':title', $song_name);
	oci_bind_by_name($stid, ':avg_rate', $avg_rate);
	oci_bind_by_name($stid, ':release_date', $release_date);
	oci_bind_by_name($stid, ':duration', $duration);
	oci_bind_by_name($stid, ':price', $price);
	oci_bind_by_name($stid, ':provider_name', $provider_name);
	oci_bind_by_name($stid, ':genre_id', $genre_id);
 	oci_bind_by_name($stid, ':singer_id', $singer_id);
	oci_bind_by_name($stid, ':download', $download);
               
        oci_execute($stid);

	$commit = oci_commit($conn);
	if (!$commit) {
		echo 'commit null';
	} else {
		echo 'commit success';
	}

	//header("location:5_provider_home.php");
        echo "Upload Succeeded";
}

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
  
  <div id = "navRight"><h1>Welcome Provider - <?php echo $_SESSION['userName'] ?> to Dashboard</h1>
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

<form action = "" method = "post">
<table width="100%" border="0" cellpadding="3" cellspacing="1" class="table">
    <tr>
      <td width="36%" align="right">song_id:</td>
      <td width="64%"><input name = "song_id" type="text"></td>
    </tr>
    <tr>
      <td width="36%" align="right">song_name:</td>
      <td width="64%"><input name = "song_name" type="text"></td>
    </tr>
    <tr>
      <td width="36%" align="right">release_date:</td>
      <td width="64%"><input name = "release_date" type="text"></td>
    </tr>
    <tr>
      <td width="36%" align="right">duration:</td>
      <td width="64%"><input name = "duration" type="text"></td>
    </tr>
    <tr>
      <td width="36%" align="right">price:</td>
      <td width="64%"><input name = "price" type="text"></td>
    </tr>
    <tr>
      <td width="36%" align="right">provider_name:</td>
      <td width="64%"><input name = "provider_name" type="text"></td>
    </tr>
    <tr>
      <td width="36%" align="right">genre_id:</td>
      <td width="64%"><input name = "genre_id" type="text"></td>
    </tr>
    <tr>
      <td width="36%" align="right">singer_id:</td>
      <td width="64%"><input name = "singer_id" type="text"></td>
    </tr>
    
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" id="Submit" value="Submit"></td>
    </tr>
</table>
</form>
    


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