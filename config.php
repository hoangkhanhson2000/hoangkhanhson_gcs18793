<?php

define('DB_SERVER', 'ec2-54-237-155-151.compute-1.amazonaws.com');
define('DB_USERNAME', 'ftxtbrrrwrfmsk');
define('DB_PASSWORD', '2e265ae16765ea38255ecaf9322289943b9a0eeaf72919ca800bcefb2e9a01cc');
define('DB_NAME', 'd85hc37qan32vh');
 
/* Attempt to connect to PostgreSQL database */
$link = pg_connect("host=".DB_SERVER." dbname=". DB_NAME ." user=" . DB_USERNAME . " password=" .DB_PASSWORD. "")
		or die('Could not connect1: ' . pg_last_error());
?>
