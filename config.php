<?php

define('DB_SERVER', 'sql113.epizy.com');
define('DB_USERNAME', 'epiz_28345018');
define('DB_PASSWORD', 'yheegzjdf14g0uQ');
define('DB_NAME', 'epiz_28345018_users');

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>