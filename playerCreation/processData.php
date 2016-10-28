<?php
    $servername = "localhost";
    $username = "phpmyadmin";
    $password = "dominoStatsYo";
    $dbname = "domino";
	$id = Rand(0, 99999999);
    $firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
    $con = mysqli_connect($servername, $username, $password, $dbname);
    if (!mysqli_query($con, "INSERT INTO player (id, firstName, lastName, win, lost) VALUES ('$id', '$firstName','$lastName', 0, 0)")){echo "err:" . mysqli_error($con);}
    echo "Redirecting. . .";
?>
<!--This sends the browser back to the home page-->
<script>
    setTimeout(function() {
       window.location.href='/dominoStats/playerCreation/index.php';
    }, 1000);
</script>
