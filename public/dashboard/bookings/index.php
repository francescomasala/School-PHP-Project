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

if (isset($_GET['id'])) {
    $id = Generators::cleanInput($_GET['id']);
    $query = "SELECT * FROM prenotazioni WHERE id_prenotazione = $id";
    $result = mysqli_query($db_conn, $query);
    if (!$result) {
        die("Query Failed.");
    } else {
        $row = mysqli_fetch_array($result);
    }
} else if (!isset($_GET['id'])) {
    $query = "SELECT * FROM prenotazioni";
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
                    <?php
                    $query = "SELECT * FROM prenotazioni";
                    $result = mysqli_query($db_conn, $query);
                    if (!$result) {
                        die('Query Failed' . mysqli_error($db_conn));
                    } else {
                        for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                            $row = mysqli_fetch_assoc($result);
                            echo "<div class='card'>";
                            echo "<div class='card-body'>";
                            echo "<h5 class='card-title'>" . $row['numero_aula'] . "</h5>";
                            echo "<h6 class='card-subtitle mb-2 text-muted'>" . $row['ora_inizio'] . "</h6>";
                            echo "<p class='card-text'>" . $row['data'] . "</p>";
                            echo "<p class='card-text text-muted'>" . "Quantità: " . $row['ora_fine'] . "</p>";
                            echo "<a href='edit.php?id=" . $row['id_prenotazione'] . "' class='card-link'>Edit</a>";
                            echo "<a href='remove.php?id=" . $row['id_prenotazione'] . "' class='card-link'>Delete</a>";
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
