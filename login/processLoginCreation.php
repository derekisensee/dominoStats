<?php
$servername = "localhost";
$username = "phpmyadmin";
$password = "dominoStatsYo";
$database = "domino";
$con = mysqli_connect($servername, $username, $password, $database);

$id = rand(0, 99999999);
$user = $_POST["uname"];
$hashed = hash('sha512', $_POST["password"]);
$first = $_POST["firstName"];
$last = $_POST["lastName"];

mysqli_query($con, "INSERT INTO player (id, firstName, lastName, win, lost, username, password) VALUES ($id, '$first', '$last', 0, 0, '$user', '$hashed')");
?>