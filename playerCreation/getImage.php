<?php

  $id = $_GET['id'];
  // do some validation here to ensure id is safe
  $servername = "localhost";
  $username = "phpmyadmin";
  $password = "dominoStatsYo";
  $dbname = "domino";
  $con = mysqli_connect($servername,$username,$password,$dbname);
  mysql_select_db("dvddb");
  $sql = "SELECT profile FROM player WHERE id=$id";
  $result = mysql_query("$sql");
  $row = mysql_fetch_assoc($result);
  mysql_close($con);

  header("Content-type: image/jpg");
  echo $row['picture'];
?>
