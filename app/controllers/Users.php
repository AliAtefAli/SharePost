<?php 
  class Users extends Controller{
    public function __construct() {
      $this->usermodel = $this->model('user');
    }

    // The register
    public function register() {
      // Check For Post 
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Proccess The form

        // Sanitize The post data
        // $_POST = FILTER_INPUT_ARRAY(INPUT_POST);

        // Init The data
        $data = [
          'name' => trim($_POST['name']),
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'confirm_password' => trim($_POST['confirm_password']),
          'name_err' => '',
          'email_err' => '',
          'password_err' => '',
          'confirm_password_err' => '',
          
        ];

        // Validate The Name error
        if(empty($_POST['name'])) {
          $data['name_err'] = 'Please Name is Require' ;
        } else {
          // Regular Expression
          if(!is_name($_POST['name'])){ 
            $data['name_err'] = 'Only spaces and White spaces';
          }
        }
        // Validate The Email error
        if(empty($_POST['email'])) {
          $data['email_err'] = 'Please Email is Require' ;
        } else {
          // Regular Expression
          if(!is_email($_POST['email'])){ 
            $data['email_err'] = 'Invalid Email format';
          } 
          // Check Email is Exist
          if ($this->usermodel->findUserByEmail($data['email'])){
            // $data['email_err'] = 'Email already taken';
            flash('register', 'You already have this email');
            $data['password'] = '';
            $this->view('users/login', $data);
            exit;
          }
        }
        // Validate The Password error
        if(empty($_POST['password'])) {
          $data['password_err'] = 'Please Password is Require' ;
        } elseif(strlen($_POST['password']) < 6) {
          $data['password_err'] = 'Password must be 9 letters at least' ;
        }
        // Validate The confirm password error
        if(empty($_POST['confirm_password'])) {
          $data['confirm_password_err'] = 'Please Password is Require' ;
        } elseif($_POST['password'] != $_POST['confirm_password']) {
          $data['password_err'] = 'Passwords not match' ;
        }

        // Check all input not empty
        if(empty($data['name_err']) && empty($data['email_err']) && 
        empty($data['password_err']) && empty($data['confirm_password_err'])) {
          // Hash The password
          echo $data['password'];
          $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
          if($this->usermodel->addUser($data)){
            flash('new_register', 'Hello, You can Login');
            redirect('users/login');
          }
        } else {
          // View The register with errors
          $this->view('users/register', $data);
        }

      } else {
        // Init The data
        $data = [
          'name' => '',
          'email' => '',
          'password' => '',
          'confirm_password' => '',
          'name_err' => '',
          'email_err' => '',
          'password_err' => '',
          'confirm_password_err' => '',
          
        ];

        // View This Reigster
        $this->view('users/register', $data);
      }
    }

    // Load The login
    public function login() {
      // Check Is post
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Proccess The form

        // Sanitize The post data
        // $_POST = FILTER_INPUT_ARRAY(INPUT_POST);

        // Init The data
        $data = [
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'email_err' => '',
          'password_err' => '',
        ];
        // Validate The Email error
        if(empty($_POST['email'])) {
          $data['email_err'] = 'Please Email is Require' ;
        }
        // Validate The Password error
        if(empty($_POST['password'])) {
          $data['password_err'] = 'Please Password is Require' ;
        } elseif(strlen($_POST['password']) < 6) {
          $data['password_err'] = 'Password must be 9 letters at least' ;
        }

        // check the email

        // $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        if($this->usermodel->findUserByEmail($data['email'])) {
          // Check The password
          $loggedInUser = $this->usermodel->login($data['email'], $data['password']);
          if($loggedInUser) {
            // Session User
            $this->userSession($loggedInUser);
          } else {
            $data['password_err'] = 'Icorrect Password';
          }
        } else {
          $data['email_err'] = 'Email not found';
        }
        // Check all input not empty
        if(empty($data['email_err']) && empty($data['password_err'])) {
          $this->view('', $data);
        } else {
          // All data are completly
          $this->view('users/login', $data);
        }
      } else {
        // Init The data
        $data = [
          'email' => '',
          'pass' => '',
          'email_err' => '',
          'password_err' => '',
          
        ];
      }

      $this->view('users/login', $data);
    }

    public function userSession($user) {
      $_SESSION['user_id'] = $user->id;
      $_SESSION['user_email'] = $user->email;
      $_SESSION['user_name'] = $user->name;
      redirect('posts/index');
    }
    public function logout() {
      unset($_SESSION['user_id']);
      unset($_SESSION['user_email']);
      unset($_SESSION['user_name']);
      session_destroy($_SESSION);
      redirect('users/login');
    }
  }