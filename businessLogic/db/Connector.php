<?php

$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'fM_270202';
$db_name = 'gestioneLaboratori';
global $db_conn;

try{
    $db_conn = @mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    if ($db_conn==null)
        throw new exception (mysqli_connect_error(). '[!] Error ='. mysqli_connect_errno());
    return $db_conn;
} catch (Exception $e){
    $error_message = $e->getMessage();
}

