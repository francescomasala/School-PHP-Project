<?php
include '../../snippets/header.php';
?>
<!-- Main -->
<?php
include "../../businessLogic/utils/Generators.php";
include '../../businessLogic/db/Connector.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = Generators::cleanInput($_POST['nome']);
    $cognome = Generators::cleanInput($_POST['cognome']);
    $email = Generators::cleanInput($_POST['email']);
    $password = Generators::generateHash($_POST['password']);
    $userType = "D";
    $userID = Generators::generateUUID();
    printf($password);

    $query = "INSERT INTO utenti (id_utente, userType, nome, cognome, email, password) 
              VALUES ('$userID', '$userType', '$nome', '$cognome', '$email', '$password')";
    $result = mysqli_prepare($db_conn, $query);

    if (mysqli_stmt_execute($result)) {
        session_start();
        $_SESSION['userID'] = $userID;
        $_SESSION['userType'] = $userType;
        session_commit();
        header("Location: /dashboard/index.php");
    } else {
        ?>
        <main>
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Login non riuscito</h4>
                <p>Riprova a inserire password e nome utente, forse sarai piu' fortunato!</p>
                <hr>
            </div>
        </main>
        <?php
        printf("Autenticazione non riuscito");
        sleep(3);
        header("Location: signin.php");
    }
} else {
    ?>
    <main class="container">
        <article class="">
            <div>
                <hgroup>
                    <h1>Accedi</h1>
                    <h2>Accedi al tuo account</h2>
                </hgroup>
                <form action="signup.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" name="nome" id="nome">
                    </div>
                    <div class="mb-3">
                        <label for="cognome" class="form-label">Cognome</label>
                        <input type="text" class="form-control" name="cognome" id="cognome">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" id="email" class="form-control" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" name="check" id="check">
                        <label class="form-check-label" for="check">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </article>
    </main>
    <?php
}
?>

<?php
include '../../snippets/footer.php';
?>
