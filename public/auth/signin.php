<?php
include '../../snippets/header.php';
?>
<!-- Main -->
<?php
session_start();
include "../../businessLogic/utils/Generators.php";
include '../../businessLogic/db/Connector.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = Generators::cleanInput($_POST['email']);
    $password = Generators::generateHash($_POST['password']);
    printf($password);

    $query = "SELECT * FROM utenti WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($db_conn, $query);
    $row = mysqli_fetch_array($result);

    if ($row['email'] == $email && $row['password'] == $password)  {
        session_start();
        error_log("Login riuscito");
        $_SESSION['userID'] = $row['id_utente'];
        $_SESSION['userType'] = $row['userType'];
        $_SESSION['nome'] = $row['nome'];
        $_SESSION['cognome'] = $row['cognome'];
        $_SESSION['email'] = $row['email'];
        session_commit();
        header("Location: index.php");
    } elseif ($_SESSION['userID'] && $_SESSION['userType']) {
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
        printf("Login non riuscito");
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
                <form action="signin.php" method="post" enctype="multipart/form-data">
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
