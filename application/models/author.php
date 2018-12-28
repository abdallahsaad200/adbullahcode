<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class author extends CI_Model {


  function __construct() {
    parent::__construct();
  }
  function allgenere(){
     $sql = "select * authors";
     $query = $this->db->query($sql);
     $results = array();
     foreach ($query->result() as $result) {
       $results[] = $result;
     }
     return $results;
   }

   function add_author() {
       $data = array(
             'authorid' => $this->input->post("authorid"),
             'authorname' => $this->input->post("authorname"),

     );

     $this->db->insert('authors', $data);
     return 1;
     }




}
?>
