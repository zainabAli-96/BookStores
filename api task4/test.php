<?php
//This is for creating a new store 
require_once__DIR__.'/config/main-local.php';
  $response = array();
   $db = new connect;
  try{

    $result = $db->query("Select * From stores");
        }
        
catch(PDOException $ex)
{
die($ex->getMessage());
}
    
if ($result->rowCount() > 0) {
  
    $response["stores"] = array();
    while ($row = $result->fetch()) {

    $store = array();
    $store["store_ID"] = $row["store_ID"];
    $store["store_Name"] = $row["store_Name"];
    $store["store_Logo"] = $row["store_Logo"];
    
    array_push($response["stores"], $store);
    }
    
    $response["success"] = 1;
   
    echo json_encode($response);
    } else {
 
    $response["success"] = 0;
    $response["message"] = "No stores found";
    echo json_encode($response);
    }
      

?>