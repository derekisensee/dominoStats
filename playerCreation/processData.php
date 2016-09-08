<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "domino";
	$id = Rand(0, 999999);
    $firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
    $con = mysqli_connect($servername, $username, $password, $dbname);
    mysqli_query($con, "INSERT INTO player (id, firstName, lastName) VALUES ('$id', '$firstName','$lastName')");
?>
<!--This sends the browser back to the home page-->
<script>
    /*setTimeout(function() {
       window.location.href='/dominoStats/index.php';
    }, 1500);
</script>