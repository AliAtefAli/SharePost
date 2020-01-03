<?php
  function is_email($email) {
    if(preg_match('/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0-9._-]{2,}/'
    , $email)) {
      return true;
    } else {
      return false;
    }
  }
  function is_name($name) {
    if( preg_match('/^[a-zA-Z. ]*$/', $name) ) {
      return true;
    } else {
      return false;
    }
  }