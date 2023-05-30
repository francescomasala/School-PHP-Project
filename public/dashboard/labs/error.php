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
?>

    <main class="flex">
        <div class="container-fluid">
            <div class="row">
                <?php
                include '../../../snippets/sidebar.php';
                ?>
                <div class="d-flex justify-content-center col-sm p-3 min-vh-100">
                    <div class="flex">
                        <h3>Errore</h3>
                        <p>Non sei autorizzato ad accedere a questa pagina</p>
                        <a href="index.php">Ritorna alla home</a>
                    </div>
                </div>
            </div>
    </main>
    <?php
    include '../../../snippets/footer.php';
?>
