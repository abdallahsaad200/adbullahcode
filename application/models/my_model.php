<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class my_model extends CI_Model {
  function __construct() {
    parent::__construct();
  }

  function showbooks() {
    $sql = " SELECT books.id, books.booktitle, books.dateofpublish, books.isbn, books.bestofcollections,
     books.numberofpages, GROUP_CONCAT( edtion.edtionnumber SEPARATOR ',') editionnumbers, GROUP_CONCAT( edtion.printdate SEPARATOR ',') printsdate
     FROM books inner join edtion on books.id=edtion.id GROUP BY books.id  ";
    $query = $this->db->query($sql);
    $results = array();
    foreach ($query->result() as $result) {
      $results[] = $result;
    }
    return $results;
  }


  function showbookauthors() {
    $sql = "SELECT  GROUP_CONCAT( authors.authorname SEPARATOR ',') bookauthors
     FROM ( books inner join authors_has_books on books.id=authors_has_books.id )
      inner join authors on authors_has_books.authorid=authors.authorid group by books.id ";
    $query = $this->db->query($sql);
    $results = array();
    foreach ($query->result() as $result) {
      $results[] = $result;
    }
    return $results;
  }

  function showbookgenres() {
    $sql = " select  GROUP_CONCAT( genre.genrename SEPARATOR ',') bookgenre from (books inner join books_has_genre on books.id=books_has_genre.id)
     inner join genre on books_has_genre.genreid=genre.genreid group by books.id ";
    $query = $this->db->query($sql);
    $results = array();
    foreach ($query->result() as $result) {
      $results[] = $result;
    }
    return $results;
  }

  function showbookformats() {
    $sql = "  select GROUP_CONCAT( format.formatname SEPARATOR ',') bookformats from (books inner join format_has_books on books.id=format_has_books.id)
    inner join format on format_has_books.formatid=format.formatid  group by books.id";
    $query = $this->db->query($sql);
    $results = array();
    foreach ($query->result() as $result) {
      $results[] = $result;
    }
    return $results;
  }


function searchbooks($booktitle) {
    $sql = "SELECT * FROM books  where booktitle LIKE '%{$booktitle}%'";
    $query = $this->db->query($sql);

    $results = array();
    foreach ($query->result() as $result) {
      $results[] = $result;
    }
    return $results;

  }




function delet($id){
  $sql="delete from books where id=$id";
  $query = $this->db->query($sql);
  return 1;

}

}
