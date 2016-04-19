<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Most popular song during specific age group</title>
</head>

<h2 align = "center"> Most popular song during specific age group </h2>

<body>

<?php

$conn = oci_connect('zjia', '1A2b3c4d!!', 'oracle.cise.ufl.edu:1521/orcl');
session_start();

$recommend = 	"select song.title
		from song,
		(select orders.song_id as oid
		from customer, orders
		where customer.age >= 20 and customer.age <= 30 and customer.username = orders.customer
		group by orders.song_id
		order by count(*) desc)
		where song.id = oid
             and rownum <=10";

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
