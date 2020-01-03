<?php
  class User {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }
    // Find user by email
    public function findUserByEmail($email){
      $this->db->query('SELECT * FROM users WHERE email = :email');
      $this->db->bind(':email', $email);;

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }

    // Add User
    public function addUser($data) {
      $this->db->query('INSERT INTO users (name, email, password) 
      VALUES (:name, :email, :password)');

      $this->db->bind(':name', $data['name']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':password', $data['password']);

      // Check Excute
      if($this->db->excute()) {
        return true;
      } else {
        return false;
      }
    }
    // Login 
    public function login($email, $password){
      $this->db->query('SELECT * FROM users WHERE email = :email 
        /* AND :password = password */ ');
      $this->db->bind(':email', $email);
      // $this->db->bind(':password', $password);

      $row = $this->db->single();

      $hashed_password = $row->password;

      // Check row
      if(password_verify($password, $hashed_password)){
        return $row ;
      } else {
        return false;
      }
    }
  }