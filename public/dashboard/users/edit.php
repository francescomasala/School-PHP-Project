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
    header("Location: /dashboard/users/error.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userID = $_POST['id'];
    $userType = $_POST['userType'];
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $email = $_POST['email'];
    $password = Generators::generateHash($_POST['password']);

    $query = "INSERT INTO utenti (id_utente, userType, nome, cognome, email, password) 
              VALUES ('$userID', $userType, '$nome', '$cognome', '$email', '$password')";
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
                    <form method="post" action="add.php">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                            <label for="cognome">Cognome</label>
                            <input type="text" class="form-control" id="cognome" name="cognome"
                                   placeholder="Cognome">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                   placeholder="Email">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" id="password" name="password"
                                   placeholder="Password">
                            <label for="userType">Tipo Utente</label>
                            <select class="form-control" id="userType" name="userType">
                                <option value="D">Docente</option>
                                <option value="T">Tecnico</option>
                                <option value="A">Amministratore</option>
                            </select>
                            <input type="hidden" id="id" name="id" placeholder="<?= Generators::generateUUID() ?>">
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
