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

    $query = "INSERT INTO INSERT INTO utenti (id_utente, isAdmin, isTecnico, nome, cognome, email, password) 
              VALUES ('$userID', '0', '0', '$nome', '$cognome', '$email', '$password')";
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
                            <label for="isAdmin">isAdmin</label>
                            <input type="checkbox" class="form-control" id="isAdmin" name="isAdmin"
                                   placeholder="isAdmin">
                            <label for="isTecnico">isTecnico</label>
                            <input type="checkbox" class="form-control" id="isTecnico" name="isTecnico"
                                   placeholder="isTecnico">
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
