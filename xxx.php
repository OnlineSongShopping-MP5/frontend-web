<!DOCTYPE HTML> 
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 

<?php
$nameErr = $singerErr = $genreErr = $rateErr = $dateErr = $priceErr = "";
$searchsong = $searchsinger = $searchgenre = $searchrate = $searchdate = $searchprice = "";

session_start();

        
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    
if(isset($_POST['clear'])){
	$_SESSION['searchsong'] = $_SESSION['searchsinger'] = $_SESSION['searchgenre'] =
        $_SESSION['searchrate'] =  $_SESSION['searchdate'] = $_SESSION['searchprice'] = null;
        header("location:xxx.php");
	exit();
	}
    
   if (empty($_POST["searchsong"])) {
     $nameErr = "Song name is required";
   } else {
     $searchsong = test_input($_POST["searchsong"]);
	 $_SESSION["searchsong"] = $_POST["searchsong"];
   }
   
   if (empty($_POST["searchsinger"])) {
     $singerErr = "Singer name is required";
   } else {
     $searchsinger = test_input($_POST["searchsinger"]);
	 $_SESSION["searchsinger"] = $_POST["searchsinger"];
   }
   
   if (empty($_POST["searchgenre"])) {
     $genreErr = "Genre name is required";
   } else {
     $searchgenre = test_input($_POST["searchgenre"]);
	 $_SESSION["searchgenre"] = $_POST["searchgenre"];
   }
   
   if (empty($_POST["searchrate"])) {
     $rateErr = "Rate is required";
   } else {
     $searchrate = test_input($_POST["searchrate"]);
	 $_SESSION["searchrate"] = $_POST["searchrate"];
   }
   
   if (empty($_POST["searchdate"])) {
     $dateErr = "Date name is required";
   } else {
     $searchdate = test_input($_POST["searchdate"]);
	 $_SESSION["searchdate"] = $_POST["searchdate"];
   }
   
   if (empty($_POST["searchprice"])) {
     $priceErr = "Price name is required";
   } else {
     $searchprice = test_input($_POST["searchprice"]);
	 $_SESSION["searchprice"] = $_POST["searchprice"];
   }
    if(empty($_SESSION['searchsong']) 
       && empty($_SESSION['searchsinger']) 
       && empty($_SESSION['searchgenre']) 
       && empty($_SESSION['searchrate']) 
       && empty($_SESSION['searchdate']) 
       && empty($_SESSION['searchprice'])){
           header("location:xxx.php");
           exit();
    } else {
            header("location:7_search_result.php");
            exit();
    }
              
  
}



function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

echo $searchsong;

?>

<h2>Search Song</h2>
<p>
	<span class="error">
	<br>
	Please input at least one item.	
	</span>
</p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
    <input type="submit" name="clear" value="clear"> <br>
   
   Song name:<input type="text" name="searchsong">
<!--   <span class="error">* <?php echo $nameErr;?></span>-->
   <br><br>
   
   Singer:   <input type="text" name="searchsinger">
<!--   <span class="error">* <?php echo $singerErr;?></span>-->
   <br><br>
   
   Genre:    <input type="text" name="searchgenre">
<!--   <span class="error">* <?php echo $genreErr;?></span>-->
   <br><br>
   
   Rate:     <input type="text" name="searchrate">
   <!--<span class="error">* <?php echo $rateErr;?></span>-->
   <br><br>
   
   Date:     <input type="text" name="searchdate">
   <!--<span class="error">* <?php echo $dateErr;?></span>-->
   <br><br>
   
   Price:    <input type="text" name="searchprice">
   <!--<span class="error">* <?php echo $priceErr;?></span>-->
   <br><br>
   
   <input type="submit" name="submit" value="submit"> 
</form>

</body>
</html>


