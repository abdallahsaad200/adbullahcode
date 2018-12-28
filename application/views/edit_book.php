<?php
defined('BASEPATH') OR exit('No direct script access allowed');
isset($_SESSION['isuserloggedin']) OR exit('please login');
$this->load->helper('url');
?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">
	<title>Students</title>

	<script type="text/javascript">
	   <!--
	      // Form validation code will come here.
	      function validateForm()
	      {
	         if( document.forms["updatebook"]["booktitle"].value == "" )
	         {
	            alert( "Please provide book name!" );
	            return false;
	         }
	         if( document.forms["updatebook"]["numberofpages"].value == "" )
	         {
	            alert( "Please number of pages !" );
	            return false;
	         }
					 if( document.forms["updatebook"]["isbn"].value == "" )
	         {
	            alert( "Please enter number of isbn !" );
	            return false;
	         }
					 if( document.forms["updatebook"]["numberofpages"].value < 0 )
	         {
	            alert( "Please provide student age greater than 0!" );
	            return false;
	         }
					 if( document.forms["updatebook"]["isbn"].value < 0 )
					{
						 alert( "Please provide isbn greater than 0!" );
						 return false;
					}
	      }
	   //-->
	</script>
</head>
<body>
	<div><h1>Edit Book</h1></div>
	<form name="updatebook" action="<?php echo base_url(); ?>index.php/My_controller/update_book" onsubmit="return validateForm()" method="post">
	 booktitle: <input type="text" name="booktitle" value="<?php echo $books->booktitle ?>"><br>
	 isbn: <input type="text" name="isbn" value="<?php echo $books->isbn?>"><br>
	 dateofpublish: <input type="date" name="dateofpublish" value="<?php echo $books->dateofpublish?>"><br>
	 numberofpages: <input type="text" name="numberofpages" value="<?php echo $books->numberofpages?>"><br>
	 bestofcollections: <input type="text" name="bestofcollections" value="<?php echo $books->bestofcollections?>"><br>
	 editionnumber: <input type="text" name="edtionnumber" value="<?php echo $books->edtionnumber?>"><br>
	 printdate: <input type="date" name="printdate" value="<?php echo $books->printdate?>"><br>



	<?php

		 echo '<br><br> authors <br>';
		 foreach ($authorslist as $a)
		 {
			 $isthere = 0;
			 foreach($authors_has_books as $selected)
			 {
				 if($a->authorid == $selected->authorid)
				 {
					 $isthere = 1;
					 break;
				 }
			 }
			 if($isthere == 1)
			 {
				 echo '<input checked type="checkbox" name="author[]" value="'.$a->authorid.'"> '.$a->authorname.'<br>';
			 }
			 else
			 {
				 echo '<input type="checkbox" name="authors[]" value="'.$a->authorid.'"> '.$a->authorname.'<br>';
			 }
		 }

		 echo '<br><br> Genres <br>';
		 foreach ($genrelist as $genre)
		 {
			 $isthere = 0;
			 foreach($books_has_genre as $selected)
			 {
				 if($genre->genreid == $selected->genreid)
				 {
					 $isthere = 1;
					 break;
				 }
			 }
			 if($isthere == 1)
			 {
				 echo '<input checked type="checkbox" name="genre[]" value="'.$genre->genreid.'"> '.$genre->genrename.'<br>';
			 }
			 else
			 {
				 echo '<input type="checkbox" name="genre[]" value="'.$genre->genreid.'"> '.$genre->genrename.'<br>';
			 }
		 }

		 echo '<br><br> Genres <br>';
		foreach ($formatlist as $format)
		{
			$isthere = 0;
			foreach($format_has_books as $selected)
			{
				if($format->formatid == $selected->formatid)
				{
					$isthere = 1;
					break;
				}
			}
			if($isthere == 1)
			{
				echo '<input checked type="checkbox" name="format[]" value="'.$format->formatid.'"> '.$format->formatname.'<br>';
			}
			else
			{
				echo '<input type="checkbox" name="format[]" value="'.$format->formatid.'"> '.$format->formatname.'<br>';
			}
		}
		  echo'    <input type="hidden" name="id" value="'.$books->id.'">
			<input type="submit" value="Update">
		  </form>';
	?>






</body>
</html>
