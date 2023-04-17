<?php
include '../../../businessLogic/database/Generic.php';
include '../../../businessLogic/database/Labs.php';

if (!isset($_COOKIE)) {
    print( 'You are not logged in' );
    header( 'Location: /auth/signin.php' );
} else {
    $lab = new User();
    $lab->exportToCSV();
}
?>


