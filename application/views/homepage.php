<?php
defined('BASEPATH') OR exit('No direct script access allowed');
isset($_SESSION['isuserloggedin']) OR exit('please login');
$this->load->helper('url');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Axcel libarary</title>


</head>
<body>

<div><h1></h1></div>
<div><h2>Select An a choice </h2></div>
<a href="<?php echo base_url();?>/index.php/My_controller/add_book">add books</a></br>
<a href="<?php echo base_url();?>index.php/My_controller/search_books">search </a></br>
<a href="<?php echo base_url();?>index.php/My_controller/showallbooks">see me here </a></br>
<a href="<?php echo base_url();?>index.php/My_controller/add_genere">add genere</a></br>
<a href="<?php echo base_url();?>index.php/My_controller/add_author">add_author</a></br>
<a href="<?php echo base_url();?>index.php/My_controller">logout</a>

</body>
</html>
