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
    $quantità = $_POST['quantità'];
    $dataAcquisto = $_POST['data_acquisto'];
    $numero_aula = $_POST['numero_aula'];


    $query = "INSERT INTO inventario (nome, descrizione, quantità, data_acquisto, numero_aula) VALUES ('$nome', '$descrizione', '$quantità', '$dataAcquisto', '$numero_aula"
    $result = mysqli_query($db_conn, $query);
    if (!$result) {
        die("Query Failed.");
    } else {
        echo "Query Successful.";
    }
    header('Location: /dashboard/labs/index.php');
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
                    <form method="post" enctype="multipart/form-data" action="add.php">
                        <input type="hidden" id="id" name="id" placeholder="<?= Generators::generateUUID() ?>">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                        <label for="descrizione">Descrizione</label>
                        <input type="text" class="form-control" id="descrizione" name="descrizione"
                               placeholder="Descrizione">
                        <label for="quantità">Quantità</label>
                        <input type="number" class="form-control" id="quantità" name="quantità" placeholder="Quantità">
                        <label for="data_acquisto">Data Acquisto</label>
                        <input type="date" class="form-control" id="data_acquisto" name="data_acquisto"
                               placeholder="Data Acquisto">
                        <label for="numero_aula">Numero Aula</label>
                        <input type="text" class="form-control" id="numero_aula" name="numero_aula"
                               placeholder="Numero Aula">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
</main>
<?php
include '../../../snippets/footer.php';
?>
