<DOCTYPE html>
<html>
    <head>
        <link rel='stylesheet prefetch' href="/bootstrap-3.3.7-dist/css/bootstrap.css">
        <link rel="stylesheet prefetch" href="/bootstrap-3.3.7-dist/css/bootstrap-theme.css">
        <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css'>
        <link rel='stylesheet prefetch' href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.0/themes/base/jquery-ui.css">
        <link rel='stylesheet' href="css/login.css">
    </head>
    
    <body>
        <?php
        $servername = "localhost";
        $username = "phpmyadmin";
        $password = "dominoStatsYo";
        $dbname = "domino";
        $con = mysqli_connect($servername, $username, $password, $dbname);
        
        ?>
        <div class="container loginDiv">
            <form action="processLogin.php" method="post">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
        <h4><a href="createLogin.php">Create Account</a></h4>
        <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js'></script>
        <script src="js/index.js"></script>
    </body>
</html>
