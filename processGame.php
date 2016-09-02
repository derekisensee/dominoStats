<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "domino";
	$id = Rand(0, 30);
    $wFirst = $_POST['firstName'];
	$wLast = $_POST['lastName'];
	$lFirst = $_POST['firstName'];
	$lLast = $_POST['lastName'];
    $win = $_POST['win'];
    $lost = $_POST['lost'];

    $con = mysqli_connect($servername, $username, $password, $dbname);
    mysqli_query($con, "INSERT INTO game (id, wFirst, wlast, lfirst, lLast) VALUES ('$id', '$firstName','$lastName', '$win', '$lost')");
?>
<!--This sends the browser back to the home page-->
<script>
    setTimeout(function() {
       window.location.href='/dominoStats-1/index.php';
    }, 1500);
</script>