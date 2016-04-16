
<?php
/*require("666_config.php");*/
echo "123";
$conn = oci_connect('yw0', 'DBdb1234', 'oracle.cise.ufl.edu:1521/orcl');

echo "123456";

if(isset($_POST['Submit'])){
	
	$userName = $_POST['userName'];
	$passWord = $_POST['passWord'];	
	
	$stid = oci_parse($conn, "select * from Customer where userName = :userName");
	

	//$query = "select * from Customer where username = :userName";
        
        //$s = oci_parse($conn, $query);  
       
        oci_bind_by_name($stid, ':userName', $userName);
        oci_bind_by_name($stid, ':passWord', $passWord);
                
       	oci_execute($stid);
 
	if($row = oci_fetch_array($s, OCI_ASSOC) != null){
		//username taken
		echo 'user name exists';
		}else{
			//create account
			$insert = "Insert into Customer values (:userName, :passWord)";
                        $i = oci_parse($conn, $insert);
                        oci_execute($i);
			}
	}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sign Up</title>

<link href="style.css" rel="stylesheet" type="text/css">

</head>

<body>
<div id = "mainFrame">

  <div id = "navLeft">
 <form action = "" method = "post">
  
  <table width="100%" border="0" cellpadding="3" cellspacing="1" class="table">
  
    <?php if(isset($error)){ ?>
  <tr>
  <td colspan="2" align="center"><strong class = "error"><?php echo $error; ?></td>
  </tr>
  <?php } ?>
  
  <tr>
      <td width="36%" align="right">Username:</td>
      <td width="64%"><input name = "userName" type="text"></td>
    </tr>
    <tr>
      <td align="right">Password:</td>
      <td><input type="password" name="passWord" id="passWord">        </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" id="Submit" value="Submit"></td>
    </tr>
</table>
</form>
 
  </div>
 
  <div id = "navRight">Welcome to the New Songs Database! Please Sign Up</div>
  <br class = "clearFix">
</div>
</body>
</html>
