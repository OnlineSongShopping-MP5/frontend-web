<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>People bought these songs also bought</title>
</head>

<h2 align = "center"> People bought these songs also bought </h2>

<body>

<?php

$conn = oci_connect('zjia', '1A2b3c4d!!', 'oracle.cise.ufl.edu:1521/orcl');
session_start();

$recommend = 	"select Title 
		from
		(select song.*
		from song,
		(select distinct orders.song_id
		from orders,
		(select distinct o2.customer
		from orders o1, orders o2
		where o1.customer = :username and o2.song_id = o1.song_id and o2.customer != :username) c
		where orders.customer = c.customer) o
		where song.id = o.song_id
		order by song.avg_rate desc)
		where rownum <= 10";

$s_select_all = oci_parse($conn, $recommend);
oci_bind_by_name($s_select_all, ':username', $_SESSION['userName']);

//oci_bind_by_name($sss, ':searchprice111', $_SESSION['searchprice']);
        
oci_execute($s_select_all); 

?>


<?php

echo "<table width='300' border='2' align = 'center' >

	<tr>

	<td width = '100'> No. </td>
	<td width = '200'> Song Name </td>

	</tr>";

$i = 1;

	while ($row = oci_fetch_array($s_select_all, OCI_BOTH)) {

	    echo "<tr>";

	    echo "<td>" . $i	   	. "</td>";
	    echo "<td>" . $row['TITLE']  . "</td>";

	    echo "</tr>";
            
         	$i++;


	}

echo "</table>";
    
?>

</body>
</html>
