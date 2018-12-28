<?php
defined('BASEPATH') OR exit('No direct script access allowed');
isset($_SESSION['isuserloggedin']) OR exit('please login');
$this->load->helper('url');
?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">
	<title>books</title>


</head>
<body>
	<div><h1>Search  books By Name</h1></div>

	<form action="<?php echo base_url(); ?>index.php/My_controller/search_books" method="post">
   booktitle: <input type="text" name="booktitle"><br>
	 <a href="<?php echo base_url();?>/index.php/My_controller/homepage">go back</a>

   <input type="submit" value="Submit">
 </form>
 <?php
 if(isset($books))
 {
	 if(count($books) == 0)
	 {
		 echo "no results found";
	 }
	 else {
	 	echo '<div><h1>Search result</h1></div>
	  <div class="divTable">
	  <div class="divTableHeading">
	  <div class="divTableRow">
		<div class="divTableHead">isbn</div>
	  <div class="divTableHead">booktitle</div>
    <div class="divTableHead">Publishing Date</div>
    <div class="divTableHead">Numberofpages</div>
		<div class="divTableHead">delete</div>

	  </div>
	  </div>
	  <div class="divTableBody">';
	  			foreach ($books as $s) {
	  				echo '<div class="divTableRow">';
						echo '<div class="divTableCell">'.$s->isbn.'</div>';
	  				echo '<div class="divTableCell">'.$s->booktitle.'</div>';
            echo '<div class="divTableCell">'.$s->dateofpublish.'</div>';
            echo '<div class="divTableCell">'.$s->numberofpages.'</div>';
						echo '<div class="divTableCell"><a href="'. base_url().'index.php/My_controller/delete/'.$s->id.'">delete</a></div>';



	  				echo '</div>';
	  			}
	  	echo"</div></div>";
	 }
	}
 ?>


</body>
</html>
