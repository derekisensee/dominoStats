<?php
$servername = "localhost";
$username = "phpmyadmin";
$password = "dominoStatsYo";
$database = "domino";
$con = mysqli_connect($servername, $username, $password, $database);

$user = $_POST["username"];
$pass = $_POST["password"];

$hashed = hash('sha512', $pass);

echo $hashed;

$check = mysqli_query($con, "SELECT username, password FROM player WHERE username = '$user' AND password = '$hashed'");
if($check)
?>