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
$image = $_POST["image"];
$player = mysqli_query($con, "SELECT * FROM player");
$uploadfile = "/var/www/html/playerCreation/images/" . basename($_FILES['image']['name']);
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
	$imageName = addslashes($_FILES['image']['name']);
	$image = addslashes($_FILES['image']['tmp_name']);
	$image = file_get_contents($image);
	$image = base64_encode($image);
	move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile);
	mysqli_query($con, "INSERT INTO player (id, firstName, lastName, win, lost, username, hash, name, profile) VALUES ($id, '$first', '$last', 0, 0, '$user', '$hashed', '$imageName', '$image')");
	echo "Great, will refresh for you";
	header('Refresh: 3; url = /index.php');
}
else{
	echo "Sorry, this username has been used, try again.";
	header('Refresh: 3; url = createLogin.php');
}

?>
