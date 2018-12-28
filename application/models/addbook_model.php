<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class addbook_model extends CI_Model {
  function __construct() {
    parent::__construct();
  }


  function addbooks() {
        $data = array(
          'isbn' => $this->input->post("isbn"),

              'booktitle' => $this->input->post("booktitle"),
              'numberofpages' => $this->input->post("numberofpages"),
              'dateofpublish' => $this->input->post("dateofpublish"),
              'bestofcollections' => $this->input->post("bestofcollections"),

      );

      $this->db->insert('books', $data);
      $lastBookID =$this->db->insert_id();

 $editionnum = $this->input->post("edtionnumber");
 $printd = $this->input->post("printdate");

$sql="insert into edtion ( id, edtionnumber, printdate) values ($lastBookID,$editionnum, '$printd')";
$query = $this->db->query($sql);


      $formats = $this->input->post("format");
    foreach($formats as $format)
{
      $data = array(
              'id' => $lastBookID,
              'formatid' => $format,
      );
      $this->db->insert('format_has_books', $data);
    }

    $authors = $this->input->post("author");
  foreach($authors as $author)
  {
    $data = array(
            'id' => $lastBookID,
            'authorid' => $author,
    );
    $this->db->insert('authors_has_books', $data);
  }
  $genres = $this->input->post("genre");
  foreach($genres as $genre)
  {
  $data = array(
          'id' => $lastBookID,
          'genreid' => $genre,
  );
  $this->db->insert('books_has_genre', $data);
  }
}

  function getformat() {
      $sql = "select * from format";
      $query = $this->db->query($sql);
      $results = array();
      foreach ($query->result() as $result) {
        $results[] = $result;
      }
      return $results;
    }
    function getauthors() {
      $sql = "select * from authors";
      $query = $this->db->query($sql);
      $results = array();
      foreach ($query->result() as $result) {
        $results[] = $result;
      }
      return $results;
    }
    function getgenres() {
      $sql = "select * from genre";
      $query = $this->db->query($sql);
      $results = array();
      foreach ($query->result() as $result) {
        $results[] = $result;
      }
      return $results;
    }
}
