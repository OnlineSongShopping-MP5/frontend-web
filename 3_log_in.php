
<?php

$conn = oci_connect('yw0', 'DBdb1234', 'oracle.cise.ufl.edu:1521/orcl');

if(isset($_POST['Submit'])){
	
	$userName = $_POST['userName'];
	$passWord = $_POST['passWord'];	

	$stid = oci_parse($conn, "select * from Customer where username = :userName and passWd = :passWord");	

	//$query = "select * from Customer where userName = :userName and passWord = :passWord limit 1"
        //$s = oci_parse($conn, $query)  
       
        oci_bind_by_name($stid, ':userName', $userName);
        oci_bind_by_name($stid, ':passWord', $passWord);
        oci_execute($stid); 
 
	if(($row = oci_fetch_array($stid, OCI_ASSOC)) != null){
		//login success
		//$data = oci_fetch_array($stid, 1);
		//$_SESSION['userName'] = $data['userName'];
		$_SESSION['userName'] = $row['userName'];
		sesssion_start();
		header("location:6_user_home.php");
		
		echo "Success!!!!!!";
		}else{
			//login failed
			$error = "invalid Login";
			}
	}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Log In</title>

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
 
  <div id = "navRight">Welcome back to the New Songs Database! Please Log In</div>
  <br class = "clearFix">
</div>
</body>
</html>