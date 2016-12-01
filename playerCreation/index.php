<!DOCTYPE html>
<html>
    <style>
        body { 
            background-image: url("Wildcats2.jpg");
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            color: white;
        }
    </style>
    <head>
        <title>Domino Tracker</title>
        <!--Links for font awesome, jquery UI, and bootstrap. also calls the index.css file in the css folder-->
        <link rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.min.css">
        <link rel='stylesheet prefetch' href="/bootstrap-3.3.7-dist/css/bootstrap.css">
        <link rel="stylesheet prefetch" href="/bootstrap-3.3.7-dist/css/bootstrap-theme.css">
        <link rel="stylesheet" href="css/index.css">
        
        <meta charset="utf-8">
        <div id="dominoStatsHead" class="container">
            <h1><a href="/index.php" class="">Super Duper Domino Stats</a> <small>Players</small></h1>
        </div>
    </head>
    
    <body>
        <?php
        $servername = "localhost";
        $username = "phpmyadmin";
        $password = "dominoStatsYo";
        $dbname = "domino";
        $con = mysqli_connect($servername, $username, $password, $dbname);
        $playerTable = mysqli_query($con, "SELECT * FROM player");
        $gameTable = mysqli_query($con, "SELECT * FROM game");
        $playersArr = array();
        
        while ($r = mysqli_fetch_assoc($playerTable)) { //this puts player firstName and lastName in order.
            array_push($playersArr, $r['firstName']);
            array_push($playersArr, $r['lastName']);
        }
        
        $playerInc = 0;
        $pictureInc = 0;
        $playerTable = mysqli_query($con, "SELECT * FROM player");
        /*echo "<div class='container'>";
        echo "<div class='row'>";
        while ($row = mysqli_fetch_assoc($playerTable)) {
            $totalGames = $row['win'] + $row['lost'];
            
            $pictureInc = $playerInc + 1;
            echo "<div class='container bord col-md-4' id=player" . $playerInc . ">";
            echo "<a href='players/player" . $pictureInc . ".php'><span style='position:absolute;width:100%;height:100%;top:0;left: 0;z-index: 1;'></span></a>";
            echo "<div class='col-md-8' id='playerP" . $playerInc . "'><strong>" . $row['firstName'] . " " . $row['lastName'] . "</strong>";
            echo "<br>";
            echo " <strong>W/L: </strong>" . $row['win'] . "/" . $row['lost'];
            echo "<br>";
            echo "<strong>Total Games: </strong>" . $totalGames . "</p>";
            echo "</div>";
            echo "<img class='col-md-4 img-responsive img-circle' width='200' height='200' src='profile" . $pictureInc . ".jpg'>";
            echo "</div>";
            
            $playerInc += 1;
        }
        echo "</div>";
        echo "</div>";*/
        
        //for playerGeneric.php 
        echo "<div class='container'>";
        echo "<div class='row'>";
        while ($row = mysqli_fetch_assoc($playerTable)) {
            $totalGames = $row['win'] + $row['lost'];
            
            $pictureInc = $playerInc + 1;
            
            echo "<form action='playerGeneric.php' method='post'>";
            echo "<input type='hidden' name='fName' value='" . $row['firstName'] . "'>";
            echo "<input type='hidden' name='lName' value='" . $row['lastName'] . "'>";
            
            
            echo "<div class='container bord col-md-4' id=player" . $playerInc . ">";
            echo "<button type='submit' class='btn btn-default'>Stats</button>";
            echo "</form>";
            //echo "<a href='players/player" . $pictureInc . ".php'><span style='position:absolute;width:100%;height:100%;top:0;left: 0;z-index: 1;'></span></a>";
            echo "<div class='col-md-8' id='playerP" . $playerInc . "'><strong>" . $row['firstName'] . " " . $row['lastName'] . "</strong>";
            echo "<br>";
            echo " <strong>W/L: </strong>" . $row['win'] . "/" . $row['lost'];
            echo "<br>";
            echo "<strong>Total Games: </strong>" . $totalGames . "</p>";
            echo "</div>";
            echo "<img class='col-md-4 img-responsive img-circle' width='200' height='200' src='profile" . $pictureInc . ".jpg'>";
            echo "</div>";
            
            $playerInc += 1;
        }
        echo "</div>";
        echo "</div>";
        
        // loops through game table, looking for drawTimes if wFirst and wLast = $playersArr[a, then a+1]. does the same for loser field. 
        //Basically, goes through the table and looks for a specific player's stats in a certain field (in this case, DrawTimes).
        $drawTimesTotal = 0;
        $drawGamesInc = 0;
        $drawTimesAvg = array();
        for($a=0; $a < count($playersArr); $a+=2) {
            while($b = mysqli_fetch_assoc($gameTable)) {
                if($b['wFirst'] === $playersArr[$a] && $b['wLast'] === $playersArr[$a+1]) {
                    $drawTimesTotal += $b['wDrawTimes'];
                    $drawGamesInc += 1;
                }
                if($b['lFirst'] === $playersArr[$a] && $b['lLast'] === $playersArr[$a+1]) {
                    $al += $b['lDrawTimes'];
                    $drawGamesInc += 1;
                }
            }
            if($drawTimesTotal == 0 || $drawGamesInc == 0)
                array_push($drawTimesAvg, 0);
            else
                array_push($drawTimesAvg, $drawTimesTotal/$drawGamesInc);
            //resets stuff. without this, the $gameTable sql query doesn't work for whatever reason.
            $gameTable = mysqli_query($con, "SELECT * FROM game");
            $drawTimesTotal = 0;
            $drawGamesInc = 0;
        }
        
        $inc = 0;
        foreach($drawTimesAvg as $avg) {
            //echo "<p id=avg" . $inc . ">" . $avg . "</p>";
            $inc += 1;
        }
        //echo "<p id='totAvg'>" . $inc . "</p>";
        ?>
        
        <div id="procedureDiv">
        
        </div>
        
        <a href="/login/createLogin.php"><button class="btn btn-link">Click here to create an account</button></a>
    
        <script src="/bootstrap-3.3.7-dist/jquery-3.1.1.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.0/themes/smoothness/jquery-ui.css">
        <script src='js/index.js'></script>
    </body>
</html>
