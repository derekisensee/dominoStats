<?php
session_start();
session_destroy();
echo "You successfully logged out. Will refresh in 3 seconds.";
header('Refresh: 3; url = /index.php');
?>
