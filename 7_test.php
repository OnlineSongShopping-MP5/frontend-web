<?php
$conn = oci_connect('yw0', 'DBdb1234', 'oracle.cise.ufl.edu:1521/orcl');
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
    s.PRICE as PRICE 
    
    from Song s, Singer i, Genre g where s.singer_id = i.ID AND s.Genre_id = g.ID";

if (empty($_SESSION["searchsong"])) {
    $s2 = "";
} else {
    $s2 = " AND s.title = :searchsong111";
}

if (empty($_SESSION["searchsinger"])) {
    $s3 = "";
} else {
    $s3 = " AND i.name = :searchsinger111";
}

if (empty($_SESSION["searchgenre"])) {
   $s4 = "";
} else {
   $s4 = " AND g.name = :searchgenre111";
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

$sss = oci_parse($conn, $s_total);

oci_bind_by_name($sss, ':searchsong111', $_SESSION['searchsong']);
oci_bind_by_name($sss, ':searchsinger111', $_SESSION['searchsinger']);
oci_bind_by_name($sss, ':searchgenre111', $_SESSION['searchgenre']);
oci_bind_by_name($sss, ':searchrate111', $_SESSION['searchrate']);
oci_bind_by_name($sss, ':searchdate111', $_SESSION['searchdate']);
oci_bind_by_name($sss, ':searchprice111', $_SESSION['searchprice']);

oci_execute($sss); 
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

<?php
echo "<table width='500' border='4'>
<tr>

<td>Song</td>
<td>Singer</td>
<td>Genre</td>
<td>Rate</td>
<td>Date</td>
<td>Price</td>
<td>Order</td>
</tr>";

while ($row = oci_fetch_array($sss, OCI_BOTH)) {
// Use the uppercase column names for the associative array indices

    echo "<tr>";

    echo "<td>" . $row['TITLE'] . "</td>";
    echo "<td>" . $row['SINGER_NAME'] . "</td>";
    echo "<td>" . $row['GENRE'] . "</td>";
    echo "<td>" . $row['AVG_RATE'] . "</td>";
    echo "<td>" . $row['RELEASE_DATE'] . "</td>";
    echo "<td>" . $row['PRICE'] . "</td>";
    echo "<td>" . "<input type='checkbox' name='check[]' value = '1'>" . "</td>";
        

    echo "</tr>";
}

echo "</table>";
    
?>

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

session_destroy();
?>








<h2>Please See The Hottest Hits:</h2>

<p><a href="9.1_top _ten_songs.php">Top Ten Songs</a></p>

<p><a href="9.2_top _ten_singers.php">Top Ten Singers</a></p>

<p>You May Also Like</p>



</body>
</html>

