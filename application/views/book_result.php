<?php
defined('BASEPATH') OR exit('No direct script access allowed');
isset($_SESSION['isuserloggedin']) OR exit('please login');
$this->load->helper('url');
?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">
	<title>book</title>


</head>
<body>
	<div><h1>Add book</h1></div>
	<h3>book Added Successfully</h3>
	<a href="<?php echo base_url();?>/index.php/My_controller/homepage">go back</a>





</body>
</html>
