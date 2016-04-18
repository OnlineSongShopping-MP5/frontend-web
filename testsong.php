
<?php


$conn = oci_connect('yw0', 'DBdb1234', 'oracle.cise.ufl.edu:1521/orcl');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
$stid = oci_parse($conn, 'select * from genre');
oci_execute($stid);
/*
while (($row = oci_fetch_object($stid))) {
    var_dump($row);
}
*/

echo "<table>\n";
while (($row = oci_fetch_array($stid, OCI_ASSOC)) != false) {
    echo "<tr>\n";
    echo "hello";
    foreach ($row as $item) {
        echo "  <td>".($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;")."</td>\n";
    }
    echo "</tr>\n";
}
echo "</table>\n";

oci_free_statement($stid);
oci_close($conn);

?>


