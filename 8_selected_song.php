<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Selected Song</title>
</head>
<body>

<h3> You selected:</h3>
<br>
<h2 align="center"> Song Name (PHP code here) ---- <a href="10_cart.php">Add To Cart!</a> </h2>

<img src="samplecover.jpg" width="560" height="auto" alt=""/>
<?php
$conn = oci_connect('zjia', '1A2b3c4d!!', 'oracle.cise.ufl.edu:1521/orcl');
session_start();

if(isset($_POST['check'])){

//    $check = $_POST['check'];
    echo "cart_button set";

}

echo "this is: " . $_POST['check'];

?>



<table width="500" border="1">
  <tbody>
    <tr>
      <td width = "30%">Artist:</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Song Title:</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Album:</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Style/Genre:</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Released Year:</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Awards:</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>

<h2> You May Also Like: </h2>

</body>
</html>