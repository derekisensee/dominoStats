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
            Name: <input type="text" name="name">
            Wins: <input type="text" name="wins">
            Losses: <input type="text" name="losses">
            # of Times in Yard: <input type="text" name="yard">
            <input type="submit">
        </form>
    <p> Or click here to make a new player</p>
        
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "players";
    $con = mysqli_connect($servername, $username, $password, $dbname);
    $result = mysqli_query($con, "SELECT * FROM player");
        
    while ($row = mysqli_fetch_assoc($result)) 
    {
        echo "<strong>Name: </strong>" . $row['name'];
        echo " <strong>Wins: </strong>" . $row['wins'];
        echo " <strong>Losses: </strong>" . $row['losses'];
        echo " <strong>Times In Yard: </strong>" . $row['timesInYard'];
        echo "<br>";
    }
    ?>
        
    <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js'></script>
    <script src='js/index.js'></script>
    </body>
</html>