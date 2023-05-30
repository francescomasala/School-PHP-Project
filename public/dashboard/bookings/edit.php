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

if ($_SESSION['userType'] != 'A' || $_SESSION['userType'] != 'T') {
    header("Location: /dashboard/bookings/error.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id_prenotazione'];
    $id_utente = $_POST['id_utente'];
    $id_tecnico = $_POST['id_tecnico'];
    $numero_aula = $_POST['numero_aula'];
    $data = $_POST['data'];
    $ora_inizio = $_POST['ora_inizio'];
    $ora_fine = $_POST['ora_fine'];


    $query = "UPDATE prenotazioni SET data = '$data', ora_fine = '$ora_fine', ora_inizio = '$ora_inizio' ,id_utente = '$id_utente', id_tecnico = '$id_tecnico', numero_aula = '$numero_aula', numero_aula = '$numero_aula' WHERE id_prenotazione = $id";
    $result = mysqli_query($db_conn, $query);
    if (!$result) {
        die("Query Failed.");
    } else {
        echo "Query Successful.";
    }
    header('Location: /dashboard/labs/index.php');
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];
    $query = "SELECT * FROM prenotazioni WHERE id_prenotazione = '$id'";
    $result = mysqli_query($db_conn, $query);
    if (!$result) {
        die("Query Failed.");
    } else {
        $row = mysqli_fetch_assoc($result);
        ?>

        <main class="flex">
            <div class="container-fluid">
                <div class="row">
                    <?php
                    include '../../../snippets/sidebar.php';
                    ?>
                    <div class="d-flex justify-content-center col-sm p-3 min-vh-100">
                        <div class="flex">
                            <form method="post" enctype="multipart/form-data" action="">
                                <input type="hidden" id="id" name="id" placeholder="<?= $row['id_prenotazione'] ?>">
                                <input type="hidden" id="user_id" name="id" placeholder="<?= $row['id_utente'] ?>">
                                <label for="numero_aula">Numero Aula</label>
                                <input type="text" class="form-control" id="numero_aula" name="numero_aula"
                                       placeholder="<?= $row['numero_aula'] ?>">
                                <label for="data">Data della prenotazione</label>
                                <input type="date" class="form-control" id="data" name="data"
                                       placeholder="<?= $row['data'] ?>">
                                <label for="ora_inizio">Ora inizio</label>
                                <input type="time" class="form-control" id="ora_inizio" name="ora_inizio"
                                       placeholder="<?= $row['ora_inizio'] ?>">
                                <label for="ora_fine">Ora Fine</label>
                                <input type="time" class="form-control" id="ora_fine" name="ora_fine"
                                       placeholder="<?= $row['ora_fine'] ?>">
                                <label for="id_tecnico">ID Tecnico</label>
                                <input type="text" class="form-control" id="id_tecnico" name="id_tecnico"
                                       placeholder="<?= $row['id_tecnico'] ?>">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
        </main>
        <?php
        include '../../../snippets/footer.php';
    }
}
?>
