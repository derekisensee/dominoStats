<!DOCTYPE html>
<html>
    <head>
        <!--Links for font awesome, jquery UI, and bootstrap. also calls the index.css file in the css folder-->
        <link rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.min.css">
        <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
        <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css'>
        <link rel="stylesheet" href="css/index.css">
        
        <meta charset="utf-8">
    <div id="dominoStatsHead" class="container">
            <h1>Super Duper Domino Stats</h1>
</div>
    </head>
    
    <body>
        <p>Welcome to the place where the best domino players are on display</p>
        <p>Enter a name to find the player of your interest.</p>
        <form action="processData.php" method="post">
            firstName: <input type="text" name="firstName">
            lastName: <input type="text" name="lastName">
            win: <input type="number" name="win">
            lost: <input type="number" name="lost">
            <input type="submit">
        </form>
         <form action="processData.php" method="post">
            WinnerfirstName: <input type="text" name="wFirst">
            lastName: <input type="text" name="wLast">
            LoserfirstName: <input type="text" name="lFirst">
            lastNamel: <input type="text" name="Last">
            FirstDownLastName: <input type="text" name="fDownLastName">
            winnerDrawTimes: <input type="Number" name="wDrawTimes">
            winnerBones: <input type="number" name="wBones">
            winnerScore: <input type="number" name="wScore">
            loserDrawTimes: <input type="Number" name="lDrawTimes">
            loserBones: <input type="number" name="lBones">
            loserScore: <input type="number" name="lScore">
            
            <input type="submit">
        </form>
    <p> Or click here to make a new player</p>
        
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "domino";
    $con = mysqli_connect($servername, $username, $password, $dbname);
    $result = mysqli_query($con, "SELECT * FROM player");
        
    while ($row = mysqli_fetch_assoc($result)) 
    {
        echo "<strong>firstName: </strong>" . $row['firstName'];
		echo " <strong>lastName: </strong>" . $row['lastName'];
        echo " <strong>win: </strong>" . $row['win'];
        echo " <strong>lost: </strong>" . $row['lost'];
        echo "<br>";
    }

    
    ?>

  
    
    <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js'></script>
    <script src='js/index.js'></script>
    </body>
</html>