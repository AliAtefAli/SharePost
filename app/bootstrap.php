<?php
  // Load Config 
  require_once( 'config/config.php');
  // Load helper
  require_once( 'helpers/url_helpers.php');
  require_once( 'helpers/regular_expression.php');
  require_once( 'helpers/session_helper.php');

  // Auto Load
  spl_autoload_register(function($className) {
    require_once 'libraries/' . $className . '.php';
  });