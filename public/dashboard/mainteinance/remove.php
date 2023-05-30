<?php
session_start();

if ($_SESSION['userID'] == null) {
    header("Location: /auth/signin.php");
}
include '../../../businessLogic/db/Connector.php';

if ($_SESSION['userType'] != 'A' || $_SESSION['userType'] != 'T') {
    header("Location: /dashboard/mainteinance/error.php");
}

if (isset($_GET['id'])) {
    $id = Generators::cleanInput($_GET['id']);
    $query = "DELETE FROM manutenzione WHERE id_manutenzione = '$id'";
    $result = mysqli_query($db_conn, $query);
    if (!$result) {
        die("Query Failed.");
    } else {
        echo "Query Successful.";
        header('Location: /inventory/labs/index.php');
    }
}
