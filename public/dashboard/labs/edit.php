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
    $materia = $_POST['materia'];
    $numero_aula = $_POST['id'];
    $tecnici = $_POST['tecnici'];
    $postiDisponibili = $_POST['postiDisponibili'];

    $query = "UPDATE laboratori SET materia = '$materia', tecnici = '$tecnici', postiDisponibili = '$postiDisponibili' WHERE numero_aula = $numero_aula";
    $result = mysqli_query($db_conn, $query);
    if (!$result) {
        die("Query Failed.");
    } else {
        echo "Query Successful.";
    }
    header('Location: /dashboard/labs/index.php');
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $numero_aula = $_GET['id'];
    $query = "SELECT * FROM laboratori WHERE numero_aula = '$numero_aula'";
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
                            <form method="post" action="edit.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="materia">Materia</label>
                                    <input type="text" class="form-control" id="materia" name="materia"
                                           placeholder="<?= $row['materia'] ?>">
                                    <label for="numero_aula">Numero Aula</label>
                                    <input type="text" class="form-control" id="numero_aula" name="numero_aula"
                                           placeholder="<?= $row['numero_aula'] ?>">
                                    <label for="tecnici">Tecnici</label>
                                    <input type="text" class="form-control" id="tecnici" name="tecnici"
                                           placeholder="<?= $row['tecnici'] ?>">
                                    <label for="postiDisponibili">Posti Disponibili</label>
                                    <input type="text" class="form-control" id="postiDisponibili"
                                           name="postiDisponibili"
                                           placeholder="<?= $row['postiDisponibili'] ?>">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
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
