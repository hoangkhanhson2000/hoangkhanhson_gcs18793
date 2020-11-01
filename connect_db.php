<?php
/*
* Define PostgreSQL database server connect parameters.
*/
define('PG_HOST', 'ec2-54-237-155-151.compute-1.amazonaws.com');
define('PG_PORT', 5432);
define('PG_DATABASE', 'd85hc37qan32vh');
define('PG_USER', 'ftxtbrrrwrfmsk');
define('PG_PASSWORD', '2e265ae16765ea38255ecaf9322289943b9a0eeaf72919ca800bcefb2e9a01cc');
define('ERROR_ON_CONNECT_FAILED', 'Connection failed!');

/*
* Merge connect string and connect db server with default parameters.
*/
function getDB() {
   return pg_pconnect(' host=' . PG_HOST .
                      ' port=' . PG_PORT .
                      ' dbname=' . PG_DATABASE .
                      ' user=' . PG_USER .
                      ' password=' . PG_PASSWORD
                     ) or die(ERROR_ON_CONNECT_FAILED);
}
?>
