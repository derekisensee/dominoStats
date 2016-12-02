<?php
$servername = "localhost";
$username = "phpmyadmin";
$password = "dominoStatsYo";
$database = "domino";
$con = mysqli_connect($servername, $username, $password, $database);

$id = rand(0, 99999999);
$user = $_POST["uname"];
$hashed = hash('sha512', $_POST["password"]);
$first = $_POST["firstName"];
$last = $_POST["lastName"];
$player = mysqli_query($con, "SELECT * FROM player");
$val = -1;
while($row = mysqli_fetch_assoc($player)){
	if($row['username'] == $user){
		$val = 0;
		break;
	}
	else{
		$val = 1;
	}
}
if($val==1){
	mysqli_query($con, "INSERT INTO player (id, firstName, lastName, win, lost, username, hash) VALUES ($id, '$first', '$last', 0, 0, '$user', '$hashed')");
}
else{
	echo "Sorry, this username has been used, please go back and choose a different username.";
}
?>
