	<?php
defined('BASEPATH') OR exit('No direct script access allowed');
isset($_SESSION['isuserloggedin']) OR exit('please login');
$this->load->helper('url');
?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">
	<title>addbook</title>

	<script type="text/javascript">
	   <!--
	      // Form validation code will come here.
	      function validateForm()
	      {
	         //if( document.forms["addbook"]["isbn"].value == "" )
	         //{
	            //alert( "Please provide book isbn" );
	            //return false;
	         //}
	         if( document.forms["addbook"]["booktitle"].value == "" )
	         {
	            alert( "Please provide booktitle!" );
	            return false;
	         }


					if( document.forms["addbook"]["isbn"].value == "" )
				 {
						alert( "Please provide isbn!" );
						return false;
				 }

				 	 if( document.forms["addbook"]["author"].value == "" )
	         {
	            alert( "Please provide  author" );
	            return false;
	         }

	      }


	   //-->
	</script>
</head>
<body>
	<div><h1>Add Book</h1></div>
	<form name="addbook" action="<?php echo base_url(); ?>index.php/My_controller/add_book_result" onsubmit="return validateForm()" method="post">
			 isbn:<input type="text" name="isbn"pattern="[0-9]+"title="no letters allowed"><br>
	 booktitle: <input type="text" name="booktitle" pattern="[A-Za-z\s]{1,15}"title="no numbers allowed"><br>
	 numberofpages: <input type="text" name="numberofpages"><br>
	 dateofpublish: <input type="date" name="dateofpublish"><br>
	 <div>
	bestofcollections: <br><input type="radio" name="bestofcollections" value="Best"><p1>Best</p1>
	<br>
	 <input type="radio" name="bestofcollections" value=""><p1>not best </p1><br>
</div>
edition: <input type="text" name="edtionnumber"><br>
print date: <input type="date" name="printdate"><br>





	<?php

		 echo '<br><br> authors <br>';
		 foreach ($authorslist as $authors)
		 {
			 echo '<input type="checkbox" name="author[]" value="'.$authors->authorid.'"> '.$authors->authorname.'<br>';
		 }

		 echo '<br><br> genre <br>';
		 foreach ($genrelist as $genre)
		 {
			 echo '<input type="checkbox" name="genre[]" value="'.$genre->genreid.'"> '.$genre->genrename.'<br>';
		 }

		 echo '<br><br> format <br>';
		 foreach ($formatlist as $format)
		 {
			 echo '<input type="checkbox" name="format[]" value="'.$format->formatid.'"> '.$format->formatname.'<br>';
		 }
		  echo'  <input type="submit" value="Submit">
		  </form>';
	?>






</body>
</html>
