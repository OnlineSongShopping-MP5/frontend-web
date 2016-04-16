<?php

$conn = oci_connect('yw0', 'DBdb1234', 'oracle.cise.ufl.edu:1521/orcl');

/*
$stid = oci_parse($conn, "select * from city where country = 'CN' and province = 'Ningxia Huizu'");
oci_execute($stid);

session_start();
//mysql connection
$con = mysql_connect("localhost", "root", "");
mysql_select_db("usersystem",$con);

function getUserData($userID){
	
	$query = mysql_query("select * from tbl_users where userID = $userID limit 1");
	return mysql_fetch_array($query,1);
	
	}
*/
echo "6666666666";

oci_free_statement($stid);
oci_close($conn);

?>
