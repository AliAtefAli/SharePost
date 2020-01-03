<?php
  /*
   * PDO Database Class
   * Connect to database
   * Create prepared statements
   * Bind values
   * Return rows and results
   */
  class Database {
    
    private $db_host = DB_HOST;
    private $db_user = DB_USER;
    private $db_pass = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh;
    private $stmt;
    private $error;

    public function __construct() {
      // set The DSN
      $dsn = 'mysql:host=' . $this->db_host . ';dbname='. $this->db_name ;

      $options = array(
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      );
      
      // Create Instantiated PDO
      try{
        $this->dbh = new PDO($dsn, $this->db_user, $this->db_pass, $options);
      } catch (PDOEception $e) {
        $this->error = $e->getMessage();
        echo $this->error;
      }
    }

    // Prepare The statment with Query
    public function query($sql) {
      $this->stmt = $this->dbh->prepare($sql);
    }
    // Bind Values
    public function bind($params, $value, $type = null) {
      // Check The type
      if(is_null($type)) {
        switch(true) {
          case is_int($value):
            $type = PDO::PARAM_INT;
          case is_bool($value):
            $type = PDO::PARAM_BOOL;
          case is_null($value):
            $type = PDO::PARAM_NULL;
          default :
            $type = PDO::PARAM_STR;
        }
      }
      $this->stmt->bindValue($params, $value, $type);
    }
    // Excute The Query
    public function excute() {
      return $this->stmt->execute();
    }
    // Get The result as Array
    public function resultset() {
      $this->excute();
      return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
    // Get as Single row
    public function single() {
      $this->excute();
      return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
    // Get row count
    public function rowCount(){
      return $this->stmt->rowCount();
    }

  }