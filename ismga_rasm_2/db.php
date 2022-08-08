<?php
  $host = 'localhost';
  $username = 'u6178_darknet_2';
  $password = "darknetuzb02";
  $dbname = "u6178_darknet_2";

  $conn = mysqli_connect($host,$username,$password,$dbname);
  if (!$conn) {
    echo "MYSQLI_ERROR\n\n" . mysqli_error($conn);
  }
  function  realString($text) {
    global $conn;
    return mysqli_real_escape_string($conn, $text);
  }
 
  $admin = "1020678098";
?>