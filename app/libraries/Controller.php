<?php
  class Controller {
    /*
     * Base controller
     * load models and views
     */

    // Load Model
    public function model($model, $data = []){
      // Check Exists
      if(file_exists('../app/models/' . $model . '.php')){
        // require view
        require_once('../app/models/' . $model . '.php');
        // Instantiated model
        return new $model();
      } else {
        die('MODEL Not Found');
      }

      
    }
    // Load View
    public function view($view, $data = []){
      // Check Isset
      if(file_exists('../app/views/' . $view . '.php')){
        // require view
        require_once('../app/views/' . $view . '.php');
      }else {
        // die('View does not found');
      }
    }
  }