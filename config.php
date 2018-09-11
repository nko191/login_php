<?php

$error1 = 'Problem connecting to Host';
$error2 = 'Problem connecting to MySQL';
$connect = mysql_connect ('127.0.0.1','','') or die($error1);
$db = mysql_select_db ('test') or die($error2);

?>