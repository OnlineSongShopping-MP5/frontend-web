<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Order Details</title>
</head>

<h2 align = "center"> Here are the songs in your cart: </h2>
<?php
$conn = oci_connect('zjia', '1A2b3c4d!!', 'oracle.cise.ufl.edu:1521/orcl');
session_start();

$select_orders = "
	select 
	  s.title as SONG_NAME, 
	  sin.name as SINGER_NAME, 
	  g.name as GENRE_NAME,
	  o.price as PRICE,
        o.order_id as ORDER_ID

	from orders o, song s, genre g, singer sin
	where o.customer = :customer
	  and o.song_id = s.id
	  and s.genre_id = g.id
	  and sin.id = s.singer_id
        and o.paid = 0";

$update_orders = "
       update orders set paid = 1 where order_id = :order_id";
$clean_cart = "
        delete from ORDERS where customer = :customer and paid = 0";

$s_select_all = oci_parse($conn, $select_orders);
oci_bind_by_name($s_select_all, ':customer', $_SESSION['userName']);
oci_execute($s_select_all);


if(isset($_POST['checkout_button'])){
    foreach($_POST['check'] as $order_id) {
        $s_update = oci_parse($conn, $update_orders);
        oci_bind_by_name($s_update, ':order_id', $order_id);
        oci_execute($s_update);
    }
    
    $s_clean = oci_parse($conn, $clean_cart);
    oci_bind_by_name($s_clean, ':customer', $_SESSION['userName']);
    oci_execute($s_clean);
    
    oci_commit($conn);
    header('location:11_order_details.php');
    exit();
}



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

<br>
<h2>Here is the info you required:</h2>
<br>

<form action="" method="post">
    <p align="center"><a href="6_user_home.php"> HOME </a></p><br>
<?php
echo "<table width='500' border='4'>
<tr>

<td>Song</td>
<td>Singer</td>
<td>Genre</td>
<td>Price</td>
<td>Select to buy</td>

</tr>";

while ($row = oci_fetch_array($s_select_all, OCI_BOTH)) {
// Use the uppercase column names for the associative array indices

    echo "<tr>";

    echo "<td>" . $row['SONG_NAME'] . "</td>";
    echo "<td>" . $row['SINGER_NAME'] . "</td>";
    echo "<td>" . $row['GENRE_NAME'] . "</td>";
    echo "<td>" . $row['PRICE'] . "</td>";
    $order_id = $row['ORDER_ID'];
    echo "<td>" . "<input type='checkbox' name='check[]' value=$order_id>" . "</td>";

    echo "</tr>";
}

echo "<td>" . "<input type='submit' name='checkout_button' value='checkout'>". "</td>";

echo "</table>";
    
?>
    
</form>



<?php
oci_free_statement($stid);
oci_close($conn);
?>


</body>
</html>

