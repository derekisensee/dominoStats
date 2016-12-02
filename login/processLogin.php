<?php
$servername = "localhost";
$username = "phpmyadmin";
$password = "dominoStatsYo";
$database = "domino";
$con = mysqli_connect($servername, $username, $password, $database);

$user = $_POST["username"];
$pass = $_POST["password"];

$hashed = hash('sha512', $pass);

$player = mysqli_query($con, "SELECT * FROM player");
$val = -1;
while($row = mysqli_fetch_assoc($player)){
	if($row['username'] == $user && $row['hash'] == $hashed){
		$val = 1;
		break;
	}
	else{
		$val = 0;
	}
}
if($val==1){
	echo "Welcome back, redirecting in 3 seconds.";
	header('Refresh: 3; url=10.55.246.13/index.php');
}
else{
	echo "Sorry, please try again, redirecting in 3 seconds.";
	header('Refresh: 3; url= login.php');
}
?>
