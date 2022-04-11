<?php
  require_once 'class.customer.php';
  $requestMethod = $_SERVER['REQUEST_METHOD'];
  $cust = new customer();
  $response = array();
  $response["code"] = $requestMethod;

  if($requestMethod=="GET"){
    //check current page
    if(isset($_GET["page"]))
    $cust->selectPages($_GET["page"], $_GET["perpage"]);
  }else if($requestMethod=="POST" || $requestMethod=="PUT" ){
    // get json content that buddle in html
    $content = trim(file_get_contents("php://input"));
    $decoded = (array) json_decode($content);
    //check post or put method
    if($requestMethod == "POST")
      $cust->add_customer($decoded);
    else
      $cust->update($decode);
  }else if($requestMethod=="DELETE"){
    if(isset($_GET["id"]))
    $cust->del_byid($_GET["id"]);
  }
?>
