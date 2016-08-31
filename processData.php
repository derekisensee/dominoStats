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
    mysqli_query($con, "INSERT INTO player (name, wins, losses, timesInYard) VALUES ('$name', '$wins', '$losses', '$yard')");
?>
<!--This sends the browser back to the home page-->
<script>
    setTimeout(function() {
       window.location.href='/dominoStats/index.php';
    }, 1500);
</script>