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
    $id_oggetto = $_POST['id_oggetto'];
    $id_tecnico = $_POST['id_tecnico'];
    $data = $_POST['data'];
    $descrizione = $_POST['descrizione'];


    $query = "INSERT INTO manutenzioni (id_manutenzione, id_oggetto, id_tecnico, data, descrizione) VALUES ('$id','$id_oggetto','$id_tecnico', '$data', '$descrizione');";
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
                            <label for="id_oggetto">ID Oggetto</label>
                            <input type="text" class="form-control" id="id_oggetto" name="id_oggetto" placeholder="Nome">
                            <label for="id_tecnico">ID Tecnico</label>
                            <input type="text" class="form-control" id="id_tecnico" name="id_tecnico"
                                   placeholder="Descrizione">
                            <label for="data">Data</label>
                            <input type="date" class="form-control" id="data" name="data"
                                   placeholder="11/09/2023">
                            <label for="descrizione">Descrizione</label>
                            <input type="date" class="form-control" id="descrizione" name="descrizione"
                                   placeholder="Questo oggetto è stato riparato per...">
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
