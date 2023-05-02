<?php
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
    $materia = $_POST['materia'];
    $numero_aula = $_POST['numero_aula'];
    $tecnici = $_POST['tecnici'];
    $postiDisponibili = $_POST['postiDisponibili'];

    $query = "UPDATE laboratori SET materia = '$materia', numero_aula = '$numero_aula', tecnici = '$tecnici', postiDisponibili = '$postiDisponibili' WHERE id = $id";
    $result = mysqli_query($db_conn, $query);
    if (!$result) {
        die("Query Failed.");
    } else {
        echo "Query Successful.";
    }
    header('Location: /dashboard/labs/index.php');
    } elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];
    $query = "SELECT * FROM inventario WHERE id = $id";
    $result = mysqli_query($db_conn, $query);
    if (!$result) {
        die("Query Failed.");
    } else {
        echo "Query Successful.";
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
                    <form method="post" action="add.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="materia">Materia</label>
                            <input type="text" class="form-control" id="materia" name="materia" placeholder="Materia">
                            <label for="numero_aula">Numero Aula</label>
                            <input type="text" class="form-control" id="numero_aula" name="numero_aula"
                                   placeholder="Numero Aula">
                            <label for="tecnici">Tecnici</label>
                            <input type="text" class="form-control" id="tecnici" name="tecnici" placeholder="Tecnici">
                            <label for="postiDisponibili">Posti Disponibili</label>
                            <input type="text" class="form-control" id="postiDisponibili" name="postiDisponibili"
                                   placeholder="Posti Disponibili">
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
?>
