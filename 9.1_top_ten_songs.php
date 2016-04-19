<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Top Ten Songs</title>
</head>

<h2 align = "center"> Top Ten Songs from Our Database </h2>

<body>

<?php

$conn = oci_connect('zjia', '1A2b3c4d!!', 'oracle.cise.ufl.edu:1521/orcl');
session_start();

$s_select_all = oci_parse($conn, "Select title from (Select title from song order by download desc) where rownum <= 10");

//oci_bind_by_name($sss, ':searchprice111', $_SESSION['searchprice']);
        
oci_execute($s_select_all); 

?>


<?php

echo "<table width='300' border='2' align = 'center' >

	<tr>

	<td width = '100'> Rank </td>
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
