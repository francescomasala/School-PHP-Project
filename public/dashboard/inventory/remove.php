<?php
session_start();

if ($_SESSION['userID'] == null) {
    header("Location: /auth/signin.php");
}
include '../../../businessLogic/db/Connector.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM inventario WHERE id_oggetto = $id";
    $result = mysqli_query($db_conn, $query);
    if (!$result) {
        die("Query Failed.");
    } else {
        echo "Query Successful.";
    }
    header('Location: /inventory/labs/index.php');
}
