<?php
  class Post {
    private $db;

    public function __construct(){
      // Instance the database
      $this->db = new Database;

      $user_id = $_SESSION['user_id'];
    }

    public function getPosts($userID){
      $this->db->query('SELECT *,
                        posts.id as id
                        FROM posts
                        INNER JOIN users
                        ON posts.user_id =  users.id  
                        AND posts.user_id = 15
                        /* WHERE  user_id = :userID */');

      // $this->db->bind(':user_id', $userID);

      $results = $this->db->resultset();

      return $results;
    }
    // Get Single Row
    public function getPostById($id){
      $this->db->query('SELECT * FROM posts WHERE id = :id');
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    }
    // ADD POST
    public function addpost($data) {
      $this->db->query('INSERT INTO posts (user_id, title, body) 
      VALUES (:user_id, :title, :body)');

      $this->db->bind(':user_id', $data['user_id']);
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':body', $data['body']);

      // Check Excute
      if($this->db->excute()) {
        return true;
        $data['title'] = '';
      } else {
        return false;
      }
    }
    // ADD POST
    public function editpost($data) {
      $this->db->query('UPDATE posts SET `user_id` = :user_id, `title` = :title, 
      `body` = :body WHERE `id` = :id');

      $this->db->bind(':id', $data['id']);
      $this->db->bind(':user_id', $data['user_id']);
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':body', $data['body']);
      // $this->db->bind(':id', $data['id']);

      // Check Excute
      if($this->db->excute()) {
        return true;
      } else {
        return false;
      }
    }
    public function deletepost($id) {
        $this->db->query('DELETE FROM posts WHERE `id` = :id');
      // $this->db->bind(':id', $param);
      // Bind values
      $this->db->bind(':id', $id);

      if($this->db->excute()) {
        return true;
      } else {
        return false;
      }
    }
  }