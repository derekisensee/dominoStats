<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.min.css">
        <link rel='stylesheet prefetch' href="bootstrap-3.3.7-dist/css/bootstrap.css">
        <link rel="stylesheet prefetch" href="bootstrap-3.3.7-dist/css/bootstrap-theme.css">
        <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css'>
        <link rel='stylesheet prefetch' href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.0/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="css/index.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <div class="container-fluid">
            <div class="row">
                <div class="pull-right"><a href="login/login.php">Login</a></div>
                <h1 class="col-md-8 col-md-offset-2">Super Duper Domino Stats <small>Home</small></h1>
            </div>
        </div>
    </head>
     
    <style>
        body { 
            
            background-image: url("Wildcats2.jpg");
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            color: orangered;
        }
        </style>
    <body>
        <div style="text-align:center;">
            <p>Click <a href="playerCreation/index.php">here</a> view players</p>
            <p>Or click <a href="gameCreation/index.php">here</a> to enter a game.</p>
	    <p><a href='http://10.55.246.5/mediawiki-1.27.1/index.php/Main_Page'>The dominoStats wiki</a></p>
            <p><a href="statTree/index.php">StatTree</a></p>
        </div>
        <div class="container">
            <h2>Latest games:</h2>
        </div>
        <div class="container-fluid">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Winner Name</th>
                    <th>Winner Draw Times</th>
                    <th>Winner Bones</th>
                    <th>Winner Score</th>
                    <th>Loser Name</th>
                    <th>Loser Draw Times</th>
                    <th>Loser Bones</th>
                    <th>Loser Score</th>
                </tr>
                    <?php
                    $servername = "localhost";
                    $username = "phpmyadmin";
                    $password = "dominoStatsYo";
                    $dbname = "domino";
                    $con = mysqli_connect($servername, $username, $password, $dbname);
                    
                    $game = mysqli_query($con, "SELECT * FROM game");
                    while ($row = $game->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['date'] . "</td>";
                        echo "<td>" . $row['wFirst'] . " " . $row['wLast'] . "</td>";
                        echo "<td>" . $row['wDrawTimes'] . "</td>";
                        echo "<td>" . $row['wBones'] . "</td>";
                        echo "<td>" . $row['wScore'] . "</td>";
                        echo "<td>" . $row['lFirst'] . " " . $row['lLast'] . "</td>";
                        echo "<td>" . $row['lDrawTimes'] . "</td>";
                        echo "<td>" . $row['lBones'] . "</td>";
                        echo "<td>" . $row['lScore'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
            </table>
        </div>
        
        <script src="/bootstrap-3.3.7-dist/jquery-3.1.1.js"></script>
        <script src="/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
        <script src="js/index.js"></script>
    </body>
</html>
