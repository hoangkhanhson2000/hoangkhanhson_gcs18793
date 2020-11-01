<?php
/*
* Define PostgreSQL database server connect parameters.
*/
define('PG_HOST', 'ec2-50-17-197-184.compute-1.amazonaws.com');
define('PG_PORT', 5432);
define('PG_DATABASE', 'd9evuerg8cqfle');
define('PG_USER', 'vuegshccgpklsh');
define('PG_PASSWORD', '3aea04ac88596fa1500616727c3564ce57eec62b6e265eb51078727a5bf41127');
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