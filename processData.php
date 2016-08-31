<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "players";
    $name = $_POST['name'];
    $wins = $_POST['wins'];
    $losses = $_POST['losses'];
    $yard = $_POST['yard'];

    $con = mysqli_connect($servername, $username, $password, $dbname);
?>
<!--This sends the browser back to the home page-->
<script>
</script>