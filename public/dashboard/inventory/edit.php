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
    header("Location: /dashboard/inventory/error.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descrizione = $_POST['descrizione'];
    $quantità = $_POST['quantità'];
    $dataAcquisto = $_POST['data_acquisto'];
    $numero_aula = $_POST['numero_aula'];


    $query = "UPDATE inventario SET nome = '$nome', descrizione = '$descrizione', quantità = '$quantità', data_acquisto = '$dataAcquisto', numero_aula = '$numero_aula' WHERE id = $id";
    $result = mysqli_query($db_conn, $query);
    if (!$result) {
        die("Query Failed.");
    } else {
        echo "Query Successful.";
    }
    header('Location: /dashboard/labs/index.php');
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];
    $query = "SELECT * FROM inventario WHERE id_oggetto = '$id'";
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
                                <input type="hidden" id="id" name="id" placeholder="<?= $row['id_oggetto'] ?>">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome"
                                       placeholder="<?= $row['nome'] ?>">
                                <label for="descrizione">Descrizione</label>
                                <input type="text" class="form-control" id="descrizione" name="descrizione"
                                       placeholder="<?= $row['descrizione'] ?>">
                                <label for="quantità">Quantità</label>
                                <input type="number" class="form-control" id="quantita" name="quantita"
                                       placeholder="<?= $row['quantita'] ?>">
                                <label for="data_acquisto">Data Acquisto</label>
                                <input type="date" class="form-control" id="data_acquisto" name="data_acquisto"
                                       placeholder="<?= $row['data_acquisto'] ?>">
                                <label for="numero_aula">Numero Aula</label>
                                <input type="text" class="form-control" id="numero_aula" name="numero_aula"
                                       placeholder="<?= $row['numero_aula'] ?>">
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
