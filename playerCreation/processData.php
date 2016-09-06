<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "domino";
	$id = Rand(0, 30);
    $firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
    $win = $_POST['win'];
    $lost = $_POST['lost'];
    $con = mysqli_connect($servername, $username, $password, $dbname);
    mysqli_query($con, "INSERT INTO player (id, firstName, lastName, win, lost) VALUES ('$id', '$firstName','$lastName', '$win', '$lost')");
?>
<!--This sends the browser back to the home page-->
<script>
    setTimeout(function() {
       window.location.href='/dominoStats/index.php';
    }, 1500);
</script>