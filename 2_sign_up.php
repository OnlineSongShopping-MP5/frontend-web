
<?php
/*require("666_config.php");*/

$conn = oci_connect('zjia', '1A2b3c4d!!', 'oracle.cise.ufl.edu:1521/orcl');
if ($conn == null) {
	echo 'connect failed';
}

if(isset($_POST['Submit'])){
	$userName = $_POST['userName'];
	$passWord = $_POST['passWord'];	
	$street = $_POST['street'];	
	$zip = $_POST['zip'];
	$state = $_POST['state'];		
	$city = $_POST['city'];	
	$country = $_POST['country'];	
	$fname = $_POST['fname'];	
	$lname = $_POST['lname'];	
	$gender = $_POST['gender'];	
	$age = $_POST['age'];
	if (!$fname || !$lname || !$userName || !$passWord) {
		header("location:2_sign_up.php");
		return;
	}

	$stid = oci_parse($conn, "select * from Customer where userName = :userName");

	//$query = "select * from Customer where username = :userName";
        
        //$s = oci_parse($conn, $query);  
       
        oci_bind_by_name($stid, ':userName', $userName);
                
       	oci_execute($stid);
 	$row = oci_fetch_array($stid, OCI_ASSOC);
	if($row != null){
		//username taken
		echo 'user name exists';
	}else{
		echo 'username not exist';
		//create account
	$si = oci_parse($conn, "Insert into Customer values(:newuserName, :passWord, :street, :zip, :state, :city, :country, :fname, :lname, :gender, :age)");
	
	oci_bind_by_name($si, ':newuserName', $userName);
        oci_bind_by_name($si, ':passWord', $passWord);
	oci_bind_by_name($si, ':street', $street);
	oci_bind_by_name($si, ':zip', $zip);
	oci_bind_by_name($si, ':state', $state);
	oci_bind_by_name($si, ':city', $city);
	oci_bind_by_name($si, ':country', $country);
	oci_bind_by_name($si, ':fname', $fname);
	oci_bind_by_name($si, ':lname', $lname);
	oci_bind_by_name($si, ':gender', $gender);
	oci_bind_by_name($si, ':age', $age);

        //$s = oci_parse($conn, "commit");
        oci_execute($si);
	//oci_execute($s);
       
        
	$commit = oci_commit($conn);
	if (!$commit) {
		echo 'commit null';
	} else {
		echo 'commit success';
	}

	header("location:3_log_in.php");
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
      <td align="right">Street:</td>
      <td><input name="street" id="street">        </td>
    </tr>
     <tr>
      <td align="right">Zip Code:</td>
      <td><input name="zip" id="zip">        </td>
    </tr> <tr>
      <td align="right">State:</td>
      <td><input name="state" id="state">        </td>
    </tr>
     <tr>
      <td align="right">City:</td>
      <td><input name="city" id="city">        </td>
    </tr>
     <tr>
      <td align="right">Country:</td>
      <td><input name="country" id="country">        </td>
    </tr>
     <tr>
      <td align="right">First Name(*):</td>
      <td><input name="fname" id="fname">        </td>
    </tr>
     <tr>
      <td align="right">Last Name(*):</td>
      <td><input name="lname" id="lname">        </td>
    </tr>
     <tr>
      <td align="right">Gender:(M/F/N)</td>
      <td><input name="gender" id="gender">        </td>
    </tr>
     <tr>
      <td align="right">Age:</td>
      <td><input name="age" id="age">        </td>
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


