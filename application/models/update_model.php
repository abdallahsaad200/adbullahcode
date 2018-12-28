<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class update_model extends CI_Model {
  function __construct() {
    parent::__construct();
  }
  function updatebook() {
    $isbn = $this->input->post("isbn");
  $id = $this->input->post("id");
  $bookname = $this->input->post("booktitle");
  $numpages = $this->input->post("numberofpages");
  $publishdate = $this->input->post("dateofpublish");
  $bestof = $this->input->post("bestofcollections");



  $sql = "update books
  set booktitle='$bookname',
  isbn=$isbn,
  numberofpages=$numpages,
  dateofpublish='$publishdate',
  bestofcollections='$bestof'
  where id=$id";
  $query = $this->db->query($sql);


  $editions = $this->input->post("edtionnumber");
  $printdate = $this->input->post("printdate");

  $sql = "update edtion
  set
  edtionnumber=$editions,
  printdate='$printdate'
  where id=$id";
  $query = $this->db->query($sql);


  $sql = "delete from authors_has_books where id = $id";
  $query = $this->db->query($sql);

  $a = $this->input->post("author");
  if(!isset($a))
  {
    return 1;
  }
  foreach($a as $a)
  {

    $data = array(
            'id' => $id,
            'authorid' => $a,
    );
    $this->db->insert('authors_has_books', $data);
  }

  $sql = "delete from books_has_genre where id = $id";
  $query = $this->db->query($sql);

  $genre = $this->input->post("genre");
  if(!isset($genre))
  {
    return 1;
  }
  foreach($genre as $genre)
  {
    $data = array(
            'id' => $id,
            'genreid' => $genre,
    );
    $this->db->insert('books_has_genre', $data);
  }


  $sql = "delete from format_has_books where id = $id";
  $query = $this->db->query($sql);

  $format = $this->input->post("format");
  if(!isset($format))
  {
    return 1;
  }
  foreach($format as $format)
  {
    $data = array(
            'id' => $id,
            'formatid' => $format,
    );
    $this->db->insert('format_has_books', $data);
  }


  return 1;
}

function getgenrebyID($id)
  {
    $sql = "select * from books_has_genre where id=$id";
      $query = $this->db->query($sql);
        $results = array();
        foreach ($query->result() as $result) {
          $results[] = $result;
        }
        return $results;
      }

      function getbookformatbyID($id)
        {
          $sql = "select * from format_has_books where id=$id";
            $query = $this->db->query($sql);
              $results = array();
              foreach ($query->result() as $result) {
                $results[] = $result;
              }
              return $results;
            }

  function getbookbyID($id)
  {
    $sql = "select * from books inner join edtion on books.id=edtion.id where books.id=$id";
    $query = $this->db->query($sql);
    return $query->result();
  }

  function getauthorbyID($id)
      {
        $sql = "select * from authors_has_books where id=$id";
          $query = $this->db->query($sql);
            $results = array();
            foreach ($query->result() as $result) {
              $results[] = $result;
            }
            return $results;
          }
}
