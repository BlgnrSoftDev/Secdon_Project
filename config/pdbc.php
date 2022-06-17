<?php

define('DB_HOST', 'sql203.epizy.com');
define('DB_USER', '');
define('DB_PASS', '');
define('DB_NAME', 'epiz_31976331_SecDon');

$conn =  mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);


if(mysqli_connect_errno())
{
    echo "Failed to connect to MySQL:" . mysqli_connect_error();
    exit();
}

?>