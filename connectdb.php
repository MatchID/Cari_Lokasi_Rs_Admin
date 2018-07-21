<?php
error_reporting(0);

  $db_username = "root";
  $db_hostname = "localhost";
  $db_password = "";
  $db_name = "db_gis_rs";

  $con = _connect($db_hostname, $db_username, $db_password);
  $db  = _select_db($db_name, $con);

 
  
?>
