<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">
	<title>loginpage</title>

	<script type="text/javascript">
	   <!--
	      
	      function validateForm()
	      {
	         if( document.forms["login"]["username"].value == "" )
	         {
	            alert( "enter username" );
	            return false;
	         }
	         if( document.forms["login"]["userpassword"].value == "" )
	         {
	            alert( "enter password" );
	            return false;
	         }
	      }
	   //-->
	</script>
</head>
<body>
	<div><h1>Login</h1></div>
	<form name="login" action="<?php echo base_url(); ?>index.php/My_controller/loginrequest" onsubmit="return validateForm()" method="post">
	 username <br><input type="text" name="username"><br>
	 password <br><input type="password" name="userpassword"><br>
	 <input type="submit" value="Submit">
	 </form>

</body>
</html>
