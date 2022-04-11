<?php
  class database{
    protected $conn = null;         protected $host = "localhost";
    protected $username = "root";   protected $password = "";
    protected $dbname = "demo";
    public function __construct(){
      try{
        $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname",
        $this->username, $this->password);
      }catch(PDOException $e){
        echo "Connection failed:", $e->getMessage();
        exit();
      }
    }
  }
 ?>
