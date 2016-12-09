<?php
$servername = "localhost";
$username = "phpmyadmin";
$password = "dominoStatsYo";
$database = "domino";
$con = mysqli_connect($servername, $username, $password, $database);
$pass = $_POST['password'];
$user = $_POST['username'];
$hashed = hash('sha512', $pass);
$player = mysqli_query($con, "SELECT * FROM player");
while($row = mysqli_fetch_assoc($player)){
	$pass = $_POST['password'];
	$user = $_POST['username'];
	$hash = hash('sha512', $pass);
	if($row['username'] == $user && $row['hash'] == $hash){
		session_start();
		echo $row['username'];
		echo $row['hash'];
		$_SESSION['user'] = $user;
		header("location: /index.php");
	} 
}
echo "Sorry try again";
header('Refresh: 3; url = login.php');
//else{	
//	header('location: login.php');
//}
?>
