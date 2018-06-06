<?php
include '../globals.php';

  $dbh = mysqli_connect($DBHost, $DBUser, $DBPass);
  if (!$dbh){
    die("Connection failed: . $e->getMessage()");
  }else{
    echo "holi " . $DBName;
  } 
?>