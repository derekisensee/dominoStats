<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "players";
    $name = $_POST['name'];
    $wins = $_POST['wins'];
    $losses = $_POST['losses'];

    $con = mysqli_connect($servername, $username, $password, $dbname);
?>