<?php

  
  
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'vitallife');

 
function dbConnection(){
    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
      if(mysqli_errno($conn)){
         die('COULD NOT CONNECT TO THE DATABASE');    
      }else{
         
      }
   
      return $conn;
}

$db = dbConnection();


