<?php 
  class Pages extends Controller{
    public function __construct(){
      
    }
    
    public function index() {
      $data = [
        'title' => 'sharePost',
        
      ];

      $this->view('pages/index', $data);
    }
    public function about() {
      $data = [
        'title' => 'Share Post'
      ];

      $this->view('pages/about', $data);
    }
  }