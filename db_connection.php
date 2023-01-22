<?php
$db_connection = mysqli_connect("Your_db_host","db_username","db_password","db_name");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>