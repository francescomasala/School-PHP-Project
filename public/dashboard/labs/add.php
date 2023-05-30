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
    $id = Generators::cleanInput($_POST['id']);
    $materia = Generators::cleanInput($_POST['materia']);
    $numero_aula = Generators::cleanInput($_POST['numero_aula']);
    $tecnici = Generators::cleanInput($_POST['tecnici']);
    $postiDisponibili = Generators::cleanInput($_POST['postiDisponibili']);

    $query = "INSERT INTO laboratori (materia, numero_aula, tecnici, postiDisponibili) VALUES ('$materia', '$numero_aula', '$tecnici', '$postiDisponibili')";
    $result = mysqli_query($db_conn, $query);
    if ($result != null) {
        echo "Query Okay";
        header('Location: /dashboard/labs/index.php');
    } else {
        die("Query Failed.");

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
?>
