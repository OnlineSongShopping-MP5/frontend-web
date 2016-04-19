<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Time Range Search:</title>
</head>

<h2 align = "center"> Time Range Search: </h2>

<body>

<?php

$conn = oci_connect('zjia', '1A2b3c4d!!', 'oracle.cise.ufl.edu:1521/orcl');
session_start();

if(isset($_POST['Submit'])){

        $starttime = $_POST['starttime'];
        $endtime = $_POST['endtime'];
        
$recommend = 	"select count(*) as count
from orders, song, provider 
where orders.song_id = song.id and song.provider_name = provider.company and provider.username = :username and orders.time <= to_timestamp(:endtime, 'dd-mm-yyyy')
and orders.time >= to_timestamp(:starttime, 'dd-mm-yyyy')";

$s_select_all = oci_parse($conn, $recommend);

oci_bind_by_name($s_select_all, ':username', $_SESSION['userName']);
oci_bind_by_name($s_select_all, ':starttime', $starttime);
oci_bind_by_name($s_select_all, ':endtime', $endtime);


//oci_bind_by_name($sss, ':searchprice111', $_SESSION['searchprice']);
        
oci_execute($s_select_all); 
}
?>


<?php

echo "
<form action = '' method = 'post'>
<table width='300' border='2' align = 'center' >
 <td><input type='submit' name='Submit' id='Submit' value='Submit'></td>";
echo " <tr>
      <td>Start time:</td>
      <td><input name = 'starttime' type='text'></td>
      <td> Format = dd-mm-yyyy </td>

    </tr>
    <tr>
      <td>End time:</td>
      <td><input name = 'endtime' type='text'></td>
      <td> Format = dd-mm-yyyy </td>    </tr>";
while ($row = oci_fetch_array($s_select_all, OCI_BOTH)) {
    echo " <td> Count:</td>";

    echo " <td> ".$row['COUNT']."</td>";
}
echo " 
</table>
</form>";

?>

    
</body>
</html>