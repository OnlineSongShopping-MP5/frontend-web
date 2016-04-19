
<?php


$conn = oci_connect('yw0', 'DBdb1234', 'oracle.cise.ufl.edu:1521/orcl');

$stid = oci_parse($conn, "select * from Singers");
oci_execute($stid);

/*
while (($row = oci_fetch_object($stid))) {
    var_dump($row);
}
*/

echo "<table>\n";
while (($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "  <td>".($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;")."</td>\n";
    }
    echo "</tr>\n";
}
echo "</table>\n";

oci_free_statement($stid);
oci_close($conn);

?>

