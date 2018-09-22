<?php
    include_once('components/config.php');
    $conn = mysql_connect($dbhost, $dbuser, $dbpass) or error_log ('Error connecting to database: ' . mysql_error());
    mysql_select_db($dbname) or error_log('Error selecting database: ' . mysql_error());
?>
