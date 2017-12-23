<?php
  $db = mysqli_connect("gautams.ipagemysql.com", "core", "core@core", "core");
  if($db->connect_error){
    header("location: chal.php");
  }  
?>