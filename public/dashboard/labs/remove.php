<?php
session_start();

if ($_SESSION['userID'] == null) {
    header("Location: /auth/signin.php");
}
include '../../../businessLogic/db/Connector.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM laboratori WHERE numero_aula = $id";
    $result = mysqli_query($db_conn, $query);
    if (!$result) {
        die("Query Failed.");
    } else {
        echo "Query Successful.";
    }
    header('Location: /dashboard/labs/index.php');
}
