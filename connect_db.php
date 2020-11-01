<?php
/*
* Define PostgreSQL database server connect parameters.
*/
define('PG_HOST', 'ec2-184-73-209-230.compute-1.amazonaws.com');
define('PG_PORT', 5432);
define('PG_DATABASE', 'd35915da8p1v65');
define('PG_USER', 'mtycxjjccxmeee');
define('PG_PASSWORD', 'f0dd25aaa62a3a7a83d3934915c681f6ddfac747814e5a3668945ea34017c6ce');
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
