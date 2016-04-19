<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>genre statistics:</title>
</head>

<h2 align = "center"> Genre statistics: </h2>

<body>

<?php

$conn = oci_connect('zjia', '1A2b3c4d!!', 'oracle.cise.ufl.edu:1521/orcl');
session_start();

$recommend = 	"select genre.name as genre, count(*) as total
from song, genre, provider
where song.genre_id = genre.id and song.provider_name = provider.company and provider.username = :username
group by genre.name";

$s_select_all = oci_parse($conn, $recommend);
oci_bind_by_name($s_select_all, ':username', $_SESSION['userName']);

//oci_bind_by_name($sss, ':searchprice111', $_SESSION['searchprice']);
        
oci_execute($s_select_all); 

?>


<?php

echo "<table width='300' border='2' align = 'center' >

	<tr>

	<td width = '100'> Genre. </td>
	<td width = '200'> Count </td>

	</tr>";

$i = 1;

	while ($row = oci_fetch_array($s_select_all, OCI_BOTH)) {

	    echo "<tr>";

	    echo "<td>" . $row['GENRE']   	. "</td>";
	    echo "<td>" . $row['TOTAL']  . "</td>";

	    echo "</tr>";
            
         	$i++;


	}

echo "</table>";
    
?>

</body>
</html>
