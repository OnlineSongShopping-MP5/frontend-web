<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Recommend songs based on the singers</title>
</head>

<h2 align = "center"> Recommend songs based on the singers </h2>

<body>

<?php

$conn = oci_connect('zjia', '1A2b3c4d!!', 'oracle.cise.ufl.edu:1521/orcl');
session_start();

$recommend = 	"select * from
(select *
from song
where song.singer_id = 
(select fs from
(select song.singer_id as fs
from orders, song
where orders.customer = :username and orders.song_id = song.id
group by song.singer_id
order by count(*) DESC)
where rownum = 1)
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
