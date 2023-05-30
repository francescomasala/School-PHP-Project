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
    $userID = $_POST['id'];
    $isAdmin = $_POST['isAdmin'];
    $isTecnico = $_POST['isTecnico'];
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $email = $_POST['email'];
    $password = Generators::generateHash($_POST['password']);

    $query = "UPDATE utenti SET isAdmin = '$isAdmin', isTecnico = '$isTecnico', nome = '$nome', cognome = '$cognome', email = '$email', password = '$password' WHERE id_utente = '$userID'";
    $result = mysqli_query($db_conn, $query);
    if (!$result) {
        die("Query Failed.");
    } else {
        echo "Query Successful.";
    }
    header('Location: /dashboard/labs/index.php');
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $userID = $_GET['id'];
    $query = "SELECT * FROM utenti WHERE id_utente = '$userID'";
    $result = mysqli_query($db_conn, $query);
    if (!$result) {
        die("Query Failed.");
    } else {
        $row = mysqli_fetch_array($result);
        $isAdmin = $row['isAdmin'];
        $isTecnico = $row['isTecnico'];
        $nome = $row['nome'];
        $cognome = $row['cognome'];
        $email = $row['email'];
        $password = $row['password'];

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
                        <form method="post" action="add.php">
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome"
                                       placeholder="<?= $nome ?>">
                                <label for="cognome">Cognome</label>
                                <input type="text" class="form-control" id="cognome" name="cognome"
                                       placeholder="<?= $cognome ?>">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                       placeholder="<?= $email ?>">
                                <label for="password">Password</label>
                                <input type="text" class="form-control" id="password" name="password"
                                       placeholder="Nuova Password">
                                <label for="isAdmin">isAdmin</label>
                                <input type="checkbox" class="form-control" id="isAdmin" name="isAdmin"
                                       placeholder="<?= $isAdmin ?>">
                                <label for="isTecnico">isTecnico</label>
                                <input type="checkbox" class="form-control" id="isTecnico" name="isTecnico"
                                       placeholder="<?= $isTecnico ?>">
                                <input type="hidden" id="id" name="id" placeholder="<?= $userID ?>">
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
