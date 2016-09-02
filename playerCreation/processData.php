<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "domino";
	$id = Rand(0, 4000);
    $firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
    $con = mysqli_connect($servername, $username, $password, $dbname);
    
    //searches through database to confirm no other id of $id exists
    $result = mysqli_query($con, "SELECT id FROM player");
    while ($row = mysqli_fetch_assoc($result)) {
        if($row['id'] === $id)
            $id = Rand(0, 4000);
    }

    mysqli_query($con, "INSERT INTO player (id, firstName, lastName) VALUES ('$id', '$firstName','$lastName')");
?>
<!--This sends the browser back to the home page-->
<script>
    setTimeout(function() {
       window.location.href='/dominoStats/index.php';
    }, 1500);
</script>