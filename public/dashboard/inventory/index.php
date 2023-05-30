<?php
include '../../../snippets/header.php';
?>
<!-- Main -->
<?php
include "../../../businessLogic/utils/Generators.php";
include '../../../businessLogic/db/Connector.php';
session_start();

if ($_SESSION['userID'] == null) {
    header("Location: /auth/signin.php");
}

if (!isset($_GET['id'])) {
    $query = "SELECT * FROM inventario";
    $result = mysqli_query($db_conn, $query);
    if (!$result) {
        die("Query Failed.");
    } else {
        $row = mysqli_fetch_array($result);
    }
} else if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM inventario WHERE id_oggetto = $id";
    $result = mysqli_query($db_conn, $query);
    if (!$result) {
        die("Query Failed.");
    } else {
        $row = mysqli_fetch_array($result);
    }
}

?>

<main class="flex">
    <div class="container-fluid">
        <div class="row">
            <?php
            include '../../../snippets/sidebar.php';
            ?>
            <div class="d-flex justify-content-center col-sm p-3 min-vh-100">
                <div class="flex">
                    <br>
                    <br>
                    <?php
                    $query = "SELECT * FROM inventario";
                    $result = mysqli_query($db_conn, $query);
                    if (!$result) {
                        die('Query Failed' . mysqli_error($db_conn));
                    } else {
                        for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                            $row = mysqli_fetch_assoc($result);
                            echo "<div class='card'>";
                            echo "<div class='card-body'>";
                            echo "<h5 class='card-title'>" . $row['nome'] . "</h5>";
                            echo "<h6 class='card-subtitle mb-2 text-muted'>" . $row['numero_aula'] . "</h6>";
                            echo "<p class='card-text'>" . $row['descrizione'] . "</p>";
                            echo "<p class='card-text text-muted'>" . "Quantità: " . $row['quantita'] . "</p>";
                            echo "<a href='edit.php?id=" . $row['id_oggetto'] . "' class='card-link'>Edit</a>";
                            echo "<a href='remove.php?id=" . $row['id_oggetto'] . "' class='card-link'>Delete</a>";
                            echo "</div>";
                            echo "</div>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
</main>
<?php
include '../../../snippets/footer.php';
?>
