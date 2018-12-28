<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class admin_model extends CI_Model {
  function __construct() {
    parent::__construct();
  }
  function login($username, $userpassword)
  {
    $sql = "select * from users where username ='$username' AND userpassword='$userpassword'";
    $query = $this->db->query($sql);
    if(count($query->result()) == 1)
    {
      return 1;
    }
    else {
      return 0;
    }
  }
}
