<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "domino";
	$id = Rand(0, 30);
    //$firstName = $_POST['firstName'];
	//$lastName = $_POST['lastName'];
    //$win = $_POST['win'];
    //$lost = $_POST['lost'];
	$wFirst = $_POST['wFirst'];
	$wLast = $_POST['wLast'];
	$lFirst = $_POST['lFirst'];
	$lLast = $_POST['lLast'];
    $date = $_POST['date'];
	$fDownLastName = $_POST['fDownLastName'];
	$wDrawTimes = $_POST['wDrawTimes'];
	$wBones = $_POST['wBones'];
	$wScore = $_POST['wScore'];
	$lDrawTimes = $_POST['lDrawTimes'];
	$lBones = $_POST['lBones'];
	$lScore = $_POST['lScore'];
	
    $con = mysqli_connect($servername, $username, $password, $dbname);
    mysqli_query($con, "INSERT INTO game (id, wFirst, wLast, lFirst, lLast, date, fDownLastName, wDrawTimes, wBones, wScore, lDrawTimes, lBones, lScore) VALUES ('$id', '$wFirst', '$wLast', '$lFirst', '$lLast', '$date', '$fDownLastName', '$wDrawTimes', '$wBones', '$wScore', '$lDrawTimes', '$lBones', '$lScore')");

    //$con = mysqli_connect($servername, $username, $password, $dbname);
    //mysqli_query($con, "INSERT INTO player (id, firstName, lastName, win, lost) VALUES ('$id', '$firstName','$lastName', '$win', '$lost')");
?>
<!--This sends the browser back to the home page-->
<script>
    /*setTimeout(function() {
       window.location.href='/dominoStats-1/index.php';
    }, 1500);
</script>