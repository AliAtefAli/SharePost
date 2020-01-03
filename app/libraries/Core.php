<?php
  /*
   * App Core Class
   * Creates URL & loads core controller
   * URL FORMAT - /controller/method/params
   */
  class Core {
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){
      // print_r($this->getUrl());

      $url = $this->getUrl();
      // Look in controller if the firts index is exist
      if(file_exists('../app/controllers/' . ucWords($url[0]) . '.php')){
        // Set as current controller
        $this->currentController =ucWords($url[0]);

        // Uset first index
        unset($url[0]);
      }
      // Require The controller
      require_once('../app/controllers/' . $this->currentController . '.php');

      // Instantiated it
      $this->currentController = new $this->currentController;

      // Check The second Param
      if(isset($url[1])){
        if(method_exists($this->currentController, $url[1])){
          // Set as current method
          $this->currentMethod = $url[1];

          // Check Login, register Method to unset The session
          // if($this->currentMethod == 'login' || $this->currentMethod == 'register'){
          //   unset($_SESSION);
          // }
          // Unset second index
          unset($url[1]);
        }
      }

      // Get The params
      $this->params = $url ? array_values($url) : [];

      // Call The call function 
      call_user_func_array([$this->currentController, $this->currentMethod], 
      $this->params);
    }

    public function getUrl(){
      if(isset($_GET['url'])){
        $url = explode('/', $_GET['url']);
        return $url;
      }
    }
  } 
  
  