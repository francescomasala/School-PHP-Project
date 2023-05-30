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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descrizione = $_POST['descrizione'];
    $quantita = $_POST['quantita'];
    $dataAcquisto = $_POST['data_acquisto'];
    $numero_aula = $_POST['numero_aula'];
    $id_oggetto = Generators::generateUUID();


    $query = "INSERT INTO inventario (id_oggetto, nome, descrizione, quantita, data_acquisto, numero_aula) VALUES ('$id_oggetto','$nome', '$descrizione', '$quantita', '$dataAcquisto', '$numero_aula');";
    $result = mysqli_query($db_conn, $query);
    if (!$result) {
        die("Query Failed.");
    } else {
        echo "Query Successful.";
        header('Location: /dashboard/inventory/index.php');
    }

} else {


    ?>

    <main class="flex">
        <div class="container-fluid">
            <div class="row">
                <?php
                include '../../../snippets/sidebar.php';
                ?>
                <div class="d-flex justify-content-center col-sm p-3 min-vh-100">
                    <div class="flex">
                        <form method="post" enctype="application/x-www-form-urlencoded" action="add.php">
                            <input type="hidden" id="id" name="id" placeholder="<?= Generators::generateUUID() ?>">
                            <input type="hidden" id="user_id" name="id" placeholder="<?= $_SESSION['userID'] ?>">
                            <label for="numero_aula">Numero Aula</label>
                            <input type="text" class="form-control" id="numero_aula" name="numero_aula" placeholder="R34">
                            <label for="data">Data della prenotazione</label>
                            <input type="date" class="form-control" id="data" name="data"
                                   placeholder="11/09/2023">
                            <label for="ora_inizio">Ora inizio</label>
                            <input type="time" class="form-control" id="ora_inizio" name="ora_inizio"
                                   placeholder="7:50:00">
                            <label for="ora_fine">Ora Fine</label>
                            <input type="time" class="form-control" id="ora_fine" name="ora_fine"
                                   placeholder="8:40:00">
                            <label for="id_tecnico">ID Tecnico</label>
                            <input type="text" class="form-control" id="id_tecnico" name="id_tecnico"
                                   placeholder="ec..-...-...">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
    </main>
    <?php
    include '../../../snippets/footer.php';
}
?>
