<!DOCTYPE html>
<html>
     <style>
        html{height:100%;}
        body{
    background-color:  #36454f;
    background-image: url(Wildcats2.jpg);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: bottom center;
       
            color: white;
        }
    </style>
    <head>
        <link rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.min.css">
        <link rel='stylesheet prefetch' href="/bootstrap-3.3.7-dist/css/bootstrap.css">
        <link rel="stylesheet prefetch" href="/bootstrap-3.3.7-dist/css/bootstrap-theme.css">
        <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css'>
        <link rel="stylesheet" href="css/index.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        
        <div class="container">
            <h1><a href="/index.php">Super Duper Domino Stats</a> <small>StatTree</small></h1>
        </div>
    </head>
   
    <body>
    
        
        <select id="statSelect" class="form-control">
            <option value="drawAvg">Draw Time Average</option>
            <option value="winnersAndLosers">Wins / Total Games</option>
        </select>
        
        <div class="container" id="big">
            <?php
            $servername = "localhost";
            $username = "phpmyadmin";
            $password = "dominoStatsYo";
            $dbname = "domino";
            $con = mysqli_connect($servername, $username, $password, $dbname);
            $playerTable = mysqli_query($con, "SELECT * FROM player"); //note on the mysqli_queries: you have to redo the query like i did on line 35, otherwise the query won't execute. guess this has something to do with the connection to the database closing so you have to reopen it? not too sure.
            $gameTable = mysqli_query($con, "SELECT * FROM game");
            $playerInc = 0;
            $playersArr = array();
            
            //this puts player firstName and lastName in order.
            while ($r = mysqli_fetch_assoc($playerTable)) { 
                array_push($playersArr, $r['firstName']);
                array_push($playersArr, $r['lastName']);
            }
            
            $playerTable = mysqli_query($con, "SELECT * FROM player");
            //prints names
            while ($row = mysqli_fetch_assoc($playerTable)) {
                echo "<div class='bord col-md-4' id='player" . $playerInc . "'>";
                //echo "<span style='position:absolute;width:100%;height:100%;top:0;left: 0;z-index: 1;'></span>"; for future div clicking?
                echo "<strong>" . $row['firstName'] . " " . $row['lastName'] . "</strong>";
                $playerInc++;
                echo "</div>";
            }
            
            // loops through game table, looking for drawTimes if wFirst and wLast = $playersArr[a, then a+1]. does the same for loser field. 
            // Basically, goes through the table and looks for a specific player's stats in a certain field (in this case, DrawTimes).
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
                        $drawTimesTotal += $b['lDrawTimes'];
                        $drawGamesInc += 1;
                    }
                }
                array_push($drawTimesAvg, $drawTimesTotal/$drawGamesInc);
                //resets stuff. without this, the $gameTable sql query doesn't work for whatever reason.
                $gameTable = mysqli_query($con, "SELECT * FROM game");
                $drawTimesTotal = 0;
                $drawGamesInc = 0;
            }

            $inc = 0;
            foreach($drawTimesAvg as $avg) {
                echo "<p id=avg" . $inc . ">" . $avg . "</p>";
                $inc += 1;
            }
            echo "<p id='totAvg'>" . $inc . "</p>";
            ?>
        </div>
        
        <?php
            $servername = "localhost";
            $username = "phpmyadmin";
            $password = "dominoStatsYo";
            $dbname = "domino";
            $con = mysqli_connect($servername, $username, $password, $dbname);
            $playerTable = mysqli_query($con, "SELECT * FROM player");
            
            $winInc = 0;
            echo "<div class='container-fluid' id='winDiv'>";
            echo "<div class='row'>";
            while ($row = mysqli_fetch_assoc($playerTable)) {
                $totalGames = $row['win'] + $row['lost'];

                echo "<div class='container col-md-4' id='playerWin" . $winInc . "'>";
                echo "<strong>" . $row['firstName'] . " " . $row['lastName'] . "</strong>";
                echo "<br>";
                echo " <strong>W/L: </strong>" . $row['win'] . "/" . $row['lost'];
                echo "<br>";
                //the win/total games ratio, wins divided by total games
                echo "<strong>Ratio:</strong><p id='winRatio" . $winInc . "'>" . $row['win'] / $totalGames . "</p>";
                echo "<strong>Total Games: </strong>" . $totalGames;
                echo "</div>";
                $winInc++;
            }
            echo "<p id=winInc>" . $winInc . "</p>";
            echo "</div></div>";
            ?>
        
        <div id="treeDrawAvg">
        </div>
        
        <div id="winLossStat">
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.0/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js"></script>
        <script src="https://cdn.rawgit.com/nnattawat/flip/master/dist/jquery.flip.min.js"></script>
        <script src="js/index.js"></script>
    </body>
</html>
