<?php
    $servername = "localhost";
    $username = "phpmyadmin";
    $password = "dominoStatsYo";
    $dbname = "domino";

    //here we split up first and last name.
	$wName = $_POST['wName'];
	$lName = $_POST['lName'];
    $wFirstLast = explode(" ", $wName);
    $wFirst = $wFirstLast[0];
    $wLast = $wFirstLast[1];

    $lFirstLast = explode(" ", $lName);
    $lFirst = $lFirstLast[0];
    $lLast = $lFirstLast[1];

    $date = $_POST['date'];
	$fDownLastName = $_POST['fDownLastName'];
	$wDrawTimes = $_POST['wDrawTimes'];
	$wBones = $_POST['wBones'];
	$wScore = $_POST['wScore'];
	$lDrawTimes = $_POST['lDrawTimes'];
	$lBones = $_POST['lBones'];
	$lScore = $_POST['lScore'];

    $con = mysqli_connect($servername, $username, $password, $dbname);
    if (!mysqli_query($con, "INSERT INTO game (wFirst, wLast, lFirst, lLast, date, fDownLastName, wDrawTimes, wBones, wScore, lDrawTimes, lBones, lScore) VALUES ('$wFirst', '$wLast', '$lFirst', '$lLast', '$date', '$fDownLastName', '$wDrawTimes', '$wBones', '$wScore', '$lDrawTimes', '$lBones', '$lScore')")) {{echo "err:" . mysqli_error($con);}
    }

    mysqli_query($con, "UPDATE player SET win = win + 1 WHERE lastName = '$wLast' AND firstName='$wFirst'");
    mysqli_query($con, "UPDATE player SET lost = lost +1 WHERE lastName = '$lLast' AND firstName='$lFirst'");

    //echo "Redirecting. . ."
?>
<!--This sends the browser back to the home page-->
<script>
    setTimeout(function() {
       window.location.href='/index.php';
    }, 1000);
</script>
