<?php
$conn = oci_connect('zjia', '1A2b3c4d!!', 'oracle.cise.ufl.edu:1521/orcl');
session_start();


$searchsong111 = $_SESSION['searchsong'];
$searchsinger111 = $_SESSION['searchsinger'];
$searchgenre111 = $_SESSION['searchgenre'];
$searchrate111 = $_SESSION['searchrate'];
$searchdate111 = $_SESSION['searchdate'];
$searchprice111 = $_SESSION['searchprice'];

    echo "<td>" . $row['TITLE'] . "</td>";
    echo "<td>" . $row['NAME'] . "</td>";
    echo "<td>" . $row['NAME'] . "</td>";
    echo "<td>" . $row['AVG_RATE'] . "</td>";
    echo "<td>" . $row['RELEASE_DATE'] . "</td>";
    echo "<td>" . $row['PRICE'] . "</td>";

$s1 = "select s.TITLE as TITLE, 
    i.NAME as SINGER_NAME, 
    g.NAME as GENRE, 
    s.AVG_RATE as AVG_RATE, 
    s.RELEASE_DATE as RELEASE_DATE, 
    s.PRICE as PRICE,
    s.ID as SONG_ID
    
    from Song s, Singer i, Genre g where s.singer_id = i.ID AND s.Genre_id = g.ID";

if (empty($_SESSION["searchsong"])) {
    $s2 = "";
} else {
    $_SESSION['searchsong'] = '%' . $_SESSION['searchsong'] . '%';
    $s2 = " AND lower(s.title) like lower(:searchsong111)";
}

if (empty($_SESSION["searchsinger"])) {
    $s3 = "";
} else {
    $s3 = " AND lower(i.name) like lower(:searchsinger111)";
    $_SESSION['searchsinger'] = '%' . $_SESSION['searchsinger'] . '%';
}

if (empty($_SESSION["searchgenre"])) {
   $s4 = "";
} else {
   $s4 = " AND lower(g.name) like lower(:searchgenre111)";
   $_SESSION['searchgenre'] = '%' . $_SESSION['searchgenre'] . '%';
}

if (empty($_SESSION["searchrate"])) {
   $s5 = "";
} else {
   $s5 = " AND s.avg_rate >= :searchrate111";
}

if (empty($_SESSION["searchdate"])) {
   $s6 = "";
} else {
   $s6 = " AND s.release_date >= :searchdate111";
}

if (empty($_SESSION["searchprice"])) {
   $s7 = "";
} else {
   $s7 = " AND s.price <= :searchprice111";
}

$s_total = $s1 . $s2 . $s3 . $s4 . $s5 . $s6 . $s7;

$s_select_all = oci_parse($conn, $s_total);

oci_bind_by_name($s_select_all, ':searchsong111', $_SESSION['searchsong']);
oci_bind_by_name($s_select_all, ':searchsinger111', $_SESSION['searchsinger']);
oci_bind_by_name($s_select_all, ':searchgenre111', $_SESSION['searchgenre']);
oci_bind_by_name($s_select_all, ':searchrate111', $_SESSION['searchrate']);
oci_bind_by_name($s_select_all, ':searchdate111', $_SESSION['searchdate']);
oci_bind_by_name($s_select_all, ':searchprice111', $_SESSION['searchprice']);

oci_execute($s_select_all);
oci_commit($conn);

if(isset($_POST['cart_button'])){
    //echo "check is: '".implode("','",$_POST['check'])."'<br>";
    foreach($_POST['check'] as $whichRow) {
//       foreach($_SESSION['attributes'][$whichRow] as $attr_list) {
//           echo $attr_list[0];
//       foreach($_SESSION['attributes'][$whichRow] as $key=>$value) {
//           echo '<p>'.$key.' - '.$value.'</p>';
//       }
//           echo 'hello';
//            echo 'keys '.$whichRow;
//           $INSERT_ORDER = "
//                INSERT INTO ORDERS (CUSTOMER, ORDER_ID, SONG_ID, TIME, PRICE)
//                VALUES (:customer, :order_id, :song_id, :time, :price)";

            $INSERT_ORDER = 'begin insertOrder(:customer_id, :song_id, :order_id); end;';
           //echo $attr_list['CUSTOMER'] . $attr_list['ORDER_ID'];
            $userName = $_SESSION['userName'];
            $order_id = $userName . $whichRow;
            $insert = oci_parse($conn, $INSERT_ORDER);
            oci_bind_by_name($insert, ':customer_id', $userName);
            oci_bind_by_name($insert, ':song_id', $whichRow);
            oci_bind_by_name($insert, ':order_id', $order_id);
            oci_execute($insert);
//           oci_bind_array_by_name($insert, ':time',       );
//           oci_bind_array_by_name($insert, ':price', );
           
//           oci_bind_array_by_name($insert, ':customer', $attr_list['CUSTOMER']);
//           oci_bind_array_by_name($insert, ':order_id', $attr_list['ORDER_ID']);
//           oci_bind_array_by_name($insert, ':song_id', $attr_list['SONG_ID']);
//           oci_bind_array_by_name($insert, ':time', $attr_list['TIME']);
//           oci_bind_array_by_name($insert, ':price', $attr_list['PRICE']);
$c123 = "";
           $commit = oci_execute($insert);
           oci_commit($conn);
           echo $commit;
           if ($commit) {
           $c123 = 'You have already bought it.';
           }
    }
    oci_commit($conn);
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
<br>
<?php 
echo "<p align= 'center' style='color:red;'>" . $c123 ."</p>";
?>
<br>

<br>
<h2 align="center">Here is the info you required:</h2>
<br>

<form action="" method="post">
    <p align="center"><a href="11_order_details.php"> My Cart! </a></p><br>
<?php
echo "<table width='1000' border='4' align='center'>
    
<tr>

<td>Song</td>
<td>Singer</td>
<td>Genre</td>
<td>Rate</td>
<td>Release Year</td>
<td>Price</td>
<td>Order</td>

</tr>";
$_SESSION['attributes'] = array();
$whichRow = 0;
while ($row = oci_fetch_array($s_select_all, OCI_BOTH)) {
// Use the uppercase column names for the associative array indices

    echo "<tr>";

    echo "<td>" . $row['TITLE'] . "</td>";
    echo "<td>" . $row['SINGER_NAME'] . "</td>";
    echo "<td>" . $row['GENRE'] . "</td>";
    echo "<td>" . $row['AVG_RATE'] . "</td>";
    echo "<td>" . $row['RELEASE_DATE'] . "</td>";
    echo "<td>" . $row['PRICE'] . "</td>";
    $song_id = $row['SONG_ID'];
    $cur_attr = array('CUSTOMER'=>$_SESSION['username'],
            'ORDER_ID'=>$_SESSION['username'] . $row['SONG_ID'],
            'SONG_ID'=>$row['SONG_ID'],
//            'TIME'=>$row['TIME'],
            'PRICE'=>$row['PRICE']);
//    
//    $_SESSION['attributes'][$whichRow] = $cur_attr;
    
    echo "<td>" . "<input type='checkbox' name='check[]' value = $song_id>" . "</td>";

    echo "</tr>";
    $whichRow += 1;
}

echo "<td>" . "<input type='submit' name='cart_button' value='addToCart'>". "</td>";

echo "</table>";
    
?>
</form>

<?php
oci_free_statement($stid);
oci_close($conn);

//echo "<table>\n";
//$row = oci_fetch_array($sss, OCI_ASSOC+OCI_RETURN_NULLS);
//if ($row == false) {
//    echo 'NO RESULT';
//} else {
//    echo "<tr>\n";
//    foreach ($row as $item) {
//        echo "  <td>".($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;")."</td>\n";
//    }
//    echo "</tr>\n";
//    while (($row = oci_fetch_array($sss, OCI_BOTH+OCI_RETURN_NULLS)) != false) {
//        echo "<tr>\n";
//        foreach ($row as $item) {
//            echo "  <td>".($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;")."</td>\n";
//            //array_push($name_array, $item[0];
//        }
//        echo "</tr>\n";
//    }
//}
//echo "</table>\n";

//session_destroy();
?>








<h2 align="center">Please See The Hottest Hits:</h2>

<p align="center"><a href="9.1_top_ten_songs.php">Top Ten Songs</a></p><br>

<p align="center"><a href="9.2_top_ten_singers.php">Top Ten Singers</a></p><br>
<p align="center"> <a href="9.3_recommend_songs_genre.php">Recommend songs based on the genres</a> </p><br>
<p align="center"> <a href="9.4_recommend_songs_singer.php">Recommend songs based on the singers</a> </p><br>
<p align="center"> <a href="9.5_recommend_songs_people_also_bought.php">People bought these songs also bought</a> </p><br>
<p align="center"> <a href="9.6_recommend_songs_age_group.php">Most popular song of specific age group</a> </p><br>


<p>You May Also Like</p>



</body>
</html>

