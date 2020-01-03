<?php
  class Posts extends Controller {
    public function __construct() {
      // Load The model
      $this->postmodel = $this->model('post');
      // Check Logged in
      if(!isLoggedIn()){
        redirect('users/login');
      }
    }
    // Index Func
    public function index() {
      $posts = $this->postmodel->getPosts(15);

      // Get The data
      $data = [
        'post' => $posts,
      ];
      $this->view('posts/index', $data);
    }
    // ADD method
    public function add() {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      // Check Submit
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get The data
        $data = [
          'title' => trim($_POST['title']),
          'body' => trim($_POST['body']),
          'file' => trim($_POST['files']),
          'user_id' => $_SESSION['user_id'],
          'title_err' => '',
          'body_err' => ''
        ];

        // Validate The data
        if($data['title'] == '') {
          $data['title_err'] = 'You must put The title';
        }

        if($data['body'] == '') {
          $data['body_err'] = 'You must put The Body';
        }

        // sure that all data not empty
        if(empty($data['title_err']) && empty($data['body_err']) ){
          if($this->postmodel->addpost($data)) {
            redirect('posts/index');
          } else {
            die('Something went wrong');
          }
        } else {
          // View add with errors
          $this->view('posts/add', $data);
        }
        
      }
    }
      // EDIT Post
      public function edit($id = '') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);   
          // Get The data
          if(!($id == '')) {
            $_SESSION['post_id'] = $id;
          }
          
          $post = $this->postmodel->getPostById($id);
            if($post) {
              
              $data = [
                'posts' => $post,
              ];
              $this->view('posts/edit', $data);
              $post = false;
                        
            } else {
              // Check Submit
            if(isset($_POST['update'])) {
            // Get The data
            $data = [
              'id' => $_SESSION['post_id'],
              'title' => trim($_POST['title']),
              'body' => trim($_POST['body']),
              'file' => trim($_POST['files']),
              'user_id' => $_SESSION['user_id'],
              'title_err' => '',
              'body_err' => ''
            ];
    
            // Validate The data
            if($data['title'] == '') {
              $data['title_err'] = 'You must put The title';
            }
            if($data['body'] == '') {
              $data['body_err'] = 'You must put The Body';
            }
              
            // sure that all data not empty
            if(empty($data['title_err']) && empty($data['body_err']) ){
              if($this->postmodel->editpost($data)) {
                redirect('posts/index');
              } else {
                die('Something went wrong');
              }
            } else {
              // View add with errors
              $this->view('posts/add', $data);
            }
 
          } 
            }   
      }// Edit
      public function delete($id) {
        if($this->postmodel->deletepost($id)) {
          redirect('posts/');
        } else {
          die('Some thing wrong');
        }        
      }
    }