<!DOCTYPE html>
<html>
    <head>
        <title>Domino Tracker</title>
        <!--Links for font awesome, jquery UI, and bootstrap. also calls the index.css file in the css folder-->
        <link rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.min.css">
        <link rel='stylesheet prefetch' href="/bootstrap-3.3.7-dist/css/bootstrap.css">
        <link rel="stylesheet prefetch" href="/bootstrap-3.3.7-dist/css/bootstrap-theme.css">
        <link rel="stylesheet" href="css/index.css">
        
        <meta charset="utf-8">
        <div id="dominoStatsHead" class="container">
            <h1><a href="/playerCreation/index.php">Super Duper Domino Stats</a> <small>Player Card</small></h1>
        </div>
    </head>
    
    <body sytle="color: #FBFBD5">
        <?php
        $firstName = $_POST['fName'];
        $lastName = $_POST['lName'];
        
        echo "<h1 id='heading' style='text-align:center'>" . $firstName . " " . $lastName . "</h1><!--for whatever reason, the index.css isn't being loaded, so i have to do crappy inline stuff. sorry :(-->";
        echo "<hr>";
        
        function averager($query, $wVal, $lVal) {
            $valAvg = 0;
            $valInc = 0;
            while($r = mysqli_fetch_assoc($query)) {
                //if first name or last name is the person in said column
                global $firstName, $lastName; //not really sure why i had to do this. learn it derek!
                if ($r['wFirst'] == $firstName && $r['wLast'] == $lastName) {
                    $valAvg += $r["$wVal"];
                    $valInc++;
                }
                else if ($r['lFirst'] == $firstName && $r['lLast'] == $lastName) {
                    $valAvg += $r["$lVal"];
                    $valInc++;
                }
            }
            return $valAvg / $valInc; //!!!returns average here!!!
        }
        
        $servername = "localhost";
        $username = "phpmyadmin";
        $password = "dominoStatsYo";
        $dbname = "domino";
        $con = mysqli_connect($servername, $username, $password, $dbname);
        $playerGames = mysqli_query($con, "CALL PlayerGame('" . $lastName . "')");
        $con = mysqli_connect($servername, $username, $password, $dbname);
        $playerWinLoss = mysqli_query($con, "SELECT win, lost FROM player WHERE firstName='" . $firstName . "' AND lastName='" . $lastName . "'");
        
        echo "<div class='container'>";
        echo "<h3>Overview</h3>";
        echo "<br>";
        echo "<div class='row'>";
        echo "<div class='col-md-4'>";
        while ($row = mysqli_fetch_assoc($playerWinLoss)) {
            $totalGames = $row['win'] + $row['lost'];
            $winPercent = $row['win'] / $totalGames;
            
            echo "<strong>Wins: </strong>" . $row['win'] . " ";
            echo "<strong>Losses: </strong>" . $row['lost'];
            echo "</div>";
            echo "<div class='col-md-4'>";
            echo "<strong>Winning percentage: </strong>" . round($winPercent * 100) . "%";
            echo "</div>";
        }
        echo "<br>";
        echo "<hr>";
        echo "</div>";
        $scoreAvg = averager($playerGames, "wScore", "lScore");
        echo "<strong>Average Score: </strong>" . round($scoreAvg);
        echo "<hr>";
        
        $con = mysqli_connect($servername, $username, $password, $dbname);
        $playerGames = mysqli_query($con, "CALL PlayerGame('" . $lastName . "')");
        $totalFirstDowns = 0;
        $firstDownInc = 0;
        
        while ($row = mysqli_fetch_assoc($playerGames)) {
            if ($row['fDownLastName'] === $lastName) {
                $totalFirstDowns++;
            }
            $firstDownInc++;
        }
        $firstDownPercent = $totalFirstDowns / $firstDownInc;
        echo "<div class='row'>";
        echo "<div class='col-md-4'>";
        //echo "<div class='col-md-4'>";
        echo "<strong>First Downs: </strong>" . $totalFirstDowns;
        echo "</div>";
        //echo "</div>";
        //echo "<div class='col-md-4'>";
        echo "<div class='col-md-4'>";
        echo "<strong>First Down Percent: </strong>" . round($firstDownPercent * 100) . "%";
        echo "</div>";
        echo "</div>";
        echo "<br>";
        
        /*$servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "domino"; */
        $con = mysqli_connect($servername, $username, $password, $dbname);
        $players = mysqli_query($con, "SELECT * FROM player");
        ?>
        <h3>Stat comparison</h3>
        <select id="compare" class="form-control">
            <option selected="selected">Click me to choose a player to compare to!</option>
            <?php
            $servername = "localhost";
            $username = "phpmyadmin";
            $password = "dominoStatsYo";
            $dbname = "domino";
            $con = mysqli_connect($servername, $username, $password, $dbname);
            
            $players = mysqli_query($con, "SELECT firstName, lastName FROM player");
            $inc = 0;
            while ($row = $players->fetch_assoc()) {
                if($row['lastName'] !== $lastName) {
                    echo '<option value=' . $inc . '>' .$row['firstName'] . " " . $row['lastName'] . '</option>';
                $inc++;
                }
            }
            ?>
        </select>
        <br>
        <?php
	$tableInc = 0;
	$buttonInc = 0;
        $servername = "localhost";
        $username = "phpmyadmin";
        $password = "dominoStatsYo";
        $dbname = "domino";
        $con = mysqli_connect($servername, $username, $password, $dbname);
        $players = mysqli_query($con, "SELECT * FROM player");
        
        $inc = 0;
        while($row = mysqli_fetch_assoc($players)) {
            $con = mysqli_connect($servername, $username, $password, $dbname);
            $playerGames = mysqli_query($con, "CALL PlayerCompare('" . $lastName . "', '" . $row['lastName'] . "')" );
            
            if($row['lastName'] !== $lastName) {
                echo "<div id='compareDiv" . $inc . "'>";
                echo "<h3>Versus " . $row['lastName'] . "</h3>";
		$con = mysqli_connect($servername, $username, $password, $dbname);
        	$playerGames = mysqli_query($con, "CALL PlayerCompare('". $lastName . "', '" . $row['lastName'] . "')");

        $gamesWon = 0;
        $gamesLost = 0;
        $totalFirstDowns = 0;
        $firstDownInc = 0;
        while($a = mysqli_fetch_assoc($playerGames)){
            if($a['wLast'] === $lastName)
                $gamesWon++;  
            if($a['lLast'] === $lastName)
                $gamesLost++;
            if($a['fDownLastName'] === $lastName)
                $totalFirstDowns++;
            $firstDownInc++;
        }
        $firstDownPercent = ($totalFirstDowns / $firstDownInc) * 100;
        echo "<div class='col-md-4'>";
        echo "<strong> Games Won Vs " . $row['lastName'] . " : </strong>". $gamesWon;
        echo "<strong> Games Lost Vs " . $row['lastName'] . " : </strong>". $gamesLost;
        echo "<strong> First Down Percent: </strong>". round($firstDownPercent) . "%";
        echo "</div>";
        echo "<table id='blah" . $tableInc . "'  class='table'>";
        echo "<button id='hideGame" . $buttonInc . "' class='button'>Hide Games</button>";
        echo "<button id='showGame" . $buttonInc . "' class='button'>Show Games</button>";
	$buttonInc++;
	$tableInc++;
        echo "<tr><th>Winner Name</th><th>Loser Name</th><th>First Down</th><th>Winner Draw Times</th><th>Winner Bones</th><th>Loser Draw Times</th><th>Loser Bones</th><th>Loser Score</th><th>Date</th></tr>";
		$con = mysqli_connect($servername, $username, $password, $dbname);
        	$playerGames = mysqli_query($con, "CALL PlayerCompare('". $lastName . "', '" . $row['lastName'] . "')");
                while($r = mysqli_fetch_assoc($playerGames)) {
                    if($r['wFirst'] == null) //this doesn't seem to work
                        echo "No games here!";
                    else {
                        if ($r['wFirst'] !== $firstName) {
                            echo "<tr class='danger'>"; //makes row red b/c game was lost
                    }
                    else
                        echo "<tr class='success'>"; //start row where game was won
                    echo "<td>" . $r['wFirst'] . " " . $r['wLast'] . "</td>";
                    echo "<td>" . $r['lFirst'] . " " . $r['lLast'] . "</td>";
                    echo "<td>" . $r['fDownLastName'] . "</td>";
                    echo "<td>" . $r['wDrawTimes'] . "</td>";
                    echo "<td>" . $r['wBones'] . "</td>";
                    echo "<td>" . $r['lDrawTimes'] . "</td>";
                    echo "<td>" . $r['lBones'] . "</td>";
                    echo "<td>" . $r['lScore'] . "</td>";
		    echo "<td>" . $r['date'] . "</td>";
                    echo "</tr>"; //end row
                    }
                    
                }
                echo "</table>";
                echo "</div>";
                $inc++;
            }
        }
           echo "<p id='playerInc' hidden>" . $inc . "</p>";
	   echo "<p id='tableInc' hidden>" . $inc . "</p>";
	   echo "<p id='buttonInc' hidden>" . $inc . "</p>";
        ?>
                
        <?php
        echo "<h3>Draw Breakdown</h3>";
        
        echo "<h4>Win Draws</h4>";
        echo "<table class='table'>";
        echo "<tr><th>Draw Times</th><th>Bones</th></tr>";
        $con = mysqli_connect($servername, $username, $password, $dbname);
        $playerWinDraws = mysqli_query($con, "CALL PlayerWinDraws('" . $lastName . "')");
        while($row = mysqli_fetch_assoc($playerWinDraws)) {
            echo "<tr class='success'>";
            echo "<td>" . $row['wDrawTimes'] . "</td>";
            echo "<td>" . $row['wBones'] . "</td>";
            echo "</tr>"; //end row
        }
        echo "</table>";
        
        echo "<h4>Lose Draws</h4>";
        echo "<table class='table'>";
        echo "<tr><th>Draw Times</th><th>Bones</th></tr>";
        $con = mysqli_connect($servername, $username, $password, $dbname);
        $playerWinDraws = mysqli_query($con, "CALL PlayerLoseDraws('" . $lastName . "')");
        while($row = mysqli_fetch_assoc($playerWinDraws)) {
            echo "<tr class='danger'>";
            echo "<td>" . $row['lDrawTimes'] . "</td>";
            echo "<td>" . $row['lBones'] . "</td>";
            echo "</tr>"; //end row
        }
        echo "</table>";
        ?>        
        <script src="/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
        <script src="/bootstrap-3.3.7-dist/jquery-3.1.1.js"></script>
        <script src="js/playerGeneric.js"></script>
    </body>
</html>
