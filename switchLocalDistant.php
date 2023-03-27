<?php

if( in_array( $_SERVER['REMOTE_ADDR'], array( '127.0.0.1', '::1' ) ) ) { // localhost ('127.0.0.1' IP in IPv4 and IPv6 formats)
    !defined('MY_LOG') && define('MY_LOG', 'myrootLog');
    !defined('MY_PWD') && define('MY_PWD', '');
    !defined('MY_DB') && define('MY_DB', 'lem');
    !defined('MY_IP') && define('MY_IP', 'localhost');
    $ip = MY_IP;
    $dbname = MY_DB;
}

if( !in_array( $_SERVER['REMOTE_ADDR'], array( '127.0.0.1', '::1' ) ) ) { // remote 
    !defined('MY_LOG') && define('MY_LOG', 'myrootLog');
    !defined('MY_PWD') && define('MY_PWD', 'xxxx');
    !defined('MY_DB') && define('MY_DB', 'mydb');
    !defined('MY_IP') && define('MY_IP', 'johndoe.com');
    $ip = MY_IP;
    $dbname = MY_DB;
}

try
{
    $dbh = new PDO("mysql:host=$ip;dbname=$dbname;charset=utf8", MY_ROOT, MY_LOG);
}
catch (PDOException $e)
{
    echo "Error...";
}

?>
