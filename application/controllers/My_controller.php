<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_controller extends CI_Controller{
//loading the model meanging that we are telling the controller that those models exsit and not unknown

  public function __construct() {
    parent::__construct();

    $this->load->model('admin_model');
    $this->load->model('my_model');
    $this->load->model('addbook_model');
    $this->load->model('update_model');
    $this->load->model('genere');
    $this->load->model('author');
    $this->load->helper('url');
  }
// view the admin page
  function index(){

$this->load->view('admin_login');
}
// view the homepage
function homepage(){

  $this->load->view('homepage');
}

// we are calling the admin_model to either allow the user login into thw system or if the user puts wrong password or username
// user will not be able to login and would get an error message
  public function loginrequest()
  	{

  		$result = $this->admin_model->login($this->input->post("username"),$this->input->post("userpassword"));
  		if($result!=0)
  		{
  			$this->session->set_userdata('isuserloggedin', 'true');

  			redirect('My_controller/homepage');
  		}
  		else
  		{
  			//disply an error to the user
  			echo "wrong username or password";
  		}
  	}
    // here we are calling my_model to have the ability to view all the books in the database
// in the my_model model we are using the functions show books.showbookauthors,showformats.showbookgenres to view
// all those things in our program

  public function showallbooks()
  	{

  			$result = $this->my_model->showbooks();
  			$data = array();
  			$data['books'] = $result;


  	$result = $this->my_model->showbookauthors();
  	$data['bookauthors'] = array_pop($result);
  			$result = $this->my_model->showbookgenres();
  			$data['bookgenres'] = array_pop($result);

  			$result = $this->my_model->showbookformats();
  			$data['bookformats'] = array_pop($result);
  			$this->load->view('books',$data);


  }


//in this function we are searching book by name we are using my_model model to exucte the function inside it which is
//search_books to searchbooks by name
      public function search_books()
      	{
      		if($this->input->post("booktitle"))
      		{
      			$result = $this->my_model->searchbooks($this->input->post("booktitle"));
      			$data = array();
      	    $data['books'] = $result;
      			$this->load->view('search_books',$data);
      		}
      		else
      		{
      			$this->load->view('search_books');
      		}

      	}

// in this function we are getting author,genre,format in a list so we can choose from them later
// this function is called when you go to http://localhost/axcel-library//index.php/My_controller/add_book
        public function add_book()
        {
        	$result = $this->addbook_model->getauthors();
        	$data = array();
        	$data['authorslist'] = $result;
        	$result = $this->addbook_model->getgenres();
        	$data['genrelist'] = $result;
        	$result = $this->addbook_model->getformat();
        	$data['formatlist'] = $result;

        	$this->load->view('add_Book',$data);
        }
//in this function add_book_result is the action from the from in  http://localhost/axcel-library//index.php/My_controller/add_book
	 // we call add_book model function to insert the new book to the database
        public function add_book_result()
        	{
        		if($this->input->post("isbn") ||$this->input->post("booktitle") ||$this->input->post("id")
            || $this->input->post("numberofpages") || $this->input->post("dateofpublish")
            || $this->input->post("edtionnumber") || $this->input->post("bestofcollections") ||$this->input->post("printdate")
        		|| $this->input->post("formatid")|| $this->input->post("authorid")
        		|| $this->input->post("genreid"))
        		{
        			$result = $this->addbook_model->addbooks();
        			$data = array();
        			$data['result'] = $result;
        			$this->load->view('book_result',$data);
        		}

        	}

// in this function we are getting the author,genre,format,bookid, to see them in our view and after that we have used two
// diffrent models which are the addbookl and update model those two are the ones that have been called
// for our view and of couse each one of thoes two models have the functions that do the work explained above
          public function editbook($id)
          	{
          		$result = $this->addbook_model->getauthors();
          		$data = array();
          		$data['authorslist'] = $result;
          		$result = $this->addbook_model->getgenres();
          		$data['genrelist'] = $result;
          		$result = $this->addbook_model->getformat();
          		$data['formatlist'] = $result;
          		$result = $this->update_model->getbookbyID($id);
          		$data['books'] = array_pop($result);
          		$result = $this->update_model->getauthorbyID($id);
          		$data['authors_has_books'] = $result;
          		$result = $this->update_model->getbookformatbyID($id);
          		$data['format_has_books'] = $result;
          		$result = $this->update_model->getgenrebyID($id);
          		$data['books_has_genre'] = $result;
          		$this->load->view('edit_book',$data);
          	}
            //in this function we are going to edit the book arttuibies
            //we are calling the update_model and the function updatbook

          	public function update_book()
          	{
          		if($this->input->post("booktitle") || $this->input->post("numberofpages")
          		|| $this->input->post("dateofpublish")
          		|| $this->input->post("bestofcollections")|| $this->input->post("edtionid")
              || $this->input->post("isbn")
          		|| $this->input->post("edtionnumber")|| $this->input->post("printdate")
          		|| $this->input->post("formatid")|| $this->input->post("authorid")
          		|| $this->input->post("genreid")|| $this->input->post("id"))
          		{
          			$result = $this->update_model->updatebook();
          			$data = array();
          			$data['result'] = $result;
          			$this->load->view('edit_sucess',$data);
          		}
          	}
            // this function is pretty simple
            // we are adding a new genre we are calling the genre model and running the function insdie it called add_genre
            // which will allow us to add a new genre
            public function add_genere()
            {
            if($this->input->post("genreid") || $this->input->post("genrename"))
            {
              $result = $this->genere->add_genere();
              $data = array();
              $data['result'] = $result;
              $this->load->view('view_genere',$data);
            }
            else
              {
                $this->load->view('view_genere');
              }


            }
            // just like th add genre function in this function we are going to add a new author
            //we do that by calling the author model and the add_author  function
            //that we  we will be able to add a new author
            public function add_author()
            {
            if($this->input->post("authorid") || $this->input->post("authorname"))
            {
              $result = $this->author->add_author();
              $data = array();
              $data['result'] = $result;
              $this->load->view('view_authors',$data);
            }
            else
              {
                $this->load->view('view_authors');
              }


            }
// this function all it does is which when you go to see me here(show all books)
//and press on delete it delets the whole row that you have chosen to delete which means
// that the book no longer exsit in the database
public function delete($id){
$result = $this->my_model->delet($id);
redirect('My_controller/showallbooks');
}






  }







 ?>
