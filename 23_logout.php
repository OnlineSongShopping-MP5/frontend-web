<?php
session_start();
session_unset();
session_destroy();
	header("location:1_welcome.php");
	exit();
        
?>