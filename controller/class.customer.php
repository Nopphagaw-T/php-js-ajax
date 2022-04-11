<?php
  include_once 'db.php';
  class customer extends database{
    
    public function selectAll(){
      $sql = "SELECT * FROM `customers`";
      $statement = $this->conn->query($sql);
      $statement->execute();
      $result = $statement->fetchAll(PDO::FETCH_ASSOC);

      if(count($result)){
        $response = array();
        $response["status"] = true;
        $response["response"] = $result;
      }else{
        $response = array();
        $response["status"] = false;
        $response["response"] = "N/A";
      }
      echo json_encode($response);
    }

    public function selectPages($page, $perpage=5){
      $start = ($page-1)* $perpage;
      $sql = "SELECT * FROM `customers` limit {$start}, {$perpage}";
      $statement = $this->conn->query($sql);
      $statement->execute();
      $result = $statement->fetchAll(PDO::FETCH_ASSOC);

      if(count($result)){
        $response = array();
        $response["status"] = true;
        $response["response"] = $result;
      }else{
        $response = array();
        $response["status"] = false;
        $response["response"] = "N/A";
      }
      echo json_encode($response);
    }

    public function count(){
      $sql = "SELECT CustomerID FROM customers";
      $statement = $this->conn->query($sql);
      $statement->execute();
      $row = $statement->rowCount();
      return $row;
    }

    public function add_customer($info){
      //$info = json_decode($info);
      //$info = [':Cust_Name'=>'Nopphagaw T.', ":ContactName"=>'Nop9',
      //         ':Address'=>'kmutnb', ':City'=>'prachinburi',
      //         ':PostalCode'=>'20230', ':Country'=>'thailand'];
      $sql = "INSERT INTO `customers`(`CustomerName`, `ContactName`, `Address`,".
             "`City`, `PostalCode`, `Country`)".
             "VALUES (:Cust_Name, :ContactName, :Address,".
                     ":City, :PostalCode, :Country)";
      $statement = $this->conn->prepare($sql);
      $statement->execute($info);

      $response = array();
      $response["status"] = true;
      //$response["response"] = "Insert Sucessed";
      echo json_encode($response);
    }

    public function del_byid($id){
      //DELETE FROM `customers` WHERE `CustomerID`
      $sql = "delete from customers where CustomerID= ?";
      try{
        $this->conn->prepare($sql)->execute([$id]);
        $response = array();
        $response["status"] = true;
      }catch(PDOException $e){
        $response["status"] = false;
      }
      echo json_encode($response);
    }

  }
 ?>
