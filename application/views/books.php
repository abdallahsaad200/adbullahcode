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
	<div><h1>view all books </h1></div>

	<form action="<?php echo base_url(); ?>index.php/My_controller/showallbooks" method="post">
   book Name: <input type="text" name="booktitle"><br>
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
		<div class="divTableHead">ISBN</div>

	  <div class="divTableHead">booktitle</div>
    <div class="divTableHead">publishingdate</div>
    <div class="divTableHead">numberofpages</div>
		<div class="divTableHead">Best of collection</div>
		<div class="divTableHead">editon number</div>
		<div class="divTableHead">print date</div>
		<div class="divTableHead">Authors</div>
		<div class="divTableHead">genre</div>
		<div class="divTableHead">format</div>

		<div class="divTableHead">edit</div>
		<div class="divTableHead">delete</div>

	  </div>
	  </div>
	  <div class="divTableBody">';
	  			foreach ($books as $books) {
	  				echo '<div class="divTableRow">';
						echo '<div class="divTableCell">'.$books->isbn.'</div>';

	  				echo '<div class="divTableCell">'.$books->booktitle.'</div>';
            echo '<div class="divTableCell">'.$books->dateofpublish.'</div>';
            echo '<div class="divTableCell">'.$books->numberofpages.'</div>';
						echo '<div class="divTableCell">'.$books->bestofcollections.'</div>';
						echo '<div class="divTableCell">'.$books->editionnumbers.'</div>';
						echo '<div class="divTableCell">'.$books->printsdate.'</div>';
						echo '<div class="divTableCell">'.$bookauthors->bookauthors.'</div>';
						echo '<div class="divTableCell">'.$bookgenres->bookgenre.'</div>';
						echo '<div class="divTableCell">'.$bookformats->bookformats.'</div>';

						echo '<div class="divTableCell"><a href="'. base_url().'index.php/My_controller/editbook/'.$books->id	.'">edit</a></div>';

						echo '<div class="divTableCell"><a href="'. base_url().'index.php/My_controller/delete/'.$books->id	.'">delete</a></div>';



	  				echo '</div>';
	  			}
	  	echo"</div></div>";
	 }
	}
 ?>


</body>
</html>
