<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>My Order History</title>
</head>

<h2 align = "center"> My Order History </h2>

<body>

<?php

$conn = oci_connect('zjia', '1A2b3c4d!!', 'oracle.cise.ufl.edu:1521/orcl');
session_start();

$s_select_all = oci_parse($conn, "Select song.title as title, singer.name as name, genre.name as genre, orders.time as purchasetime
                                         from song, orders, genre, singer where orders.customer = :username and orders.song_id = song.id
                                         and song.genre_id = genre.id and song.singer_id = singer.id");

//oci_bind_by_name($sss, ':searchprice111', $_SESSION['searchprice']);
oci_bind_by_name($s_select_all, ':username', $_SESSION['userName']);        
oci_execute($s_select_all); 

?>


<?php

echo "<table width='300' border='2' align = 'center' >

	<tr>

	<td width = '100'> Rank </td>
	<td width = '200'> Song Name </td>
	<td width = '200'> Artist </td>
	<td width = '200'> Genre </td>
	<td width = '200'> Purchase date </td>

	</tr>";

$i = 1;

	while ($row = oci_fetch_array($s_select_all, OCI_BOTH)) {

	    echo "<tr>";

	    echo "<td>" . $i	   	. "</td>";
	    echo "<td>" . $row['TITLE']  . "</td>";
	    echo "<td>" . $row['NAME']  . "</td>";
	    echo "<td>" . $row['GENRE']  . "</td>";
	    echo "<td>" . $row['PURCHASETIME']  . "</td>";

	    echo "</tr>";
            
         	$i++;


	}


echo "</table>";
    
?>

</body>
</html>

