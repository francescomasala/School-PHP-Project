<?php
include '../../snippets/header.php';
?>
<!-- Main -->
<?php
include "../../businessLogic/utils/Generators.php";
session_start();

if ($_SESSION['userID'] == null) {
    header("Location: /auth/signin.php");
}

?>

<main class="flex">
    <div class="container-fluid">
        <div class="row">
            <?php
            include '../../snippets/sidebar.php';
            ?>
            <div class="d-flex justify-content-center col-sm p-3 min-vh-100">
                <div class="flex">
                    <article class="p-3">
                        <div>
                            <hgroup>
                                <center>
                                    <h1>Dashboard</h1>
                                </center>
                                <h2> <?= $_SESSION['nome']?> ecco la tua dashboard</h2>
                            </hgroup>
                        </div>
                        <div class="d-flex justify-content-center">
                            <form method="post" enctype="multipart/form-data" action="index.php">
                                <button type="submit" class="contrast">Logout</button>
                            </form>
                        <div
                    </article>
                </div>
            </div>
        </div>
    </div>

    <article class="">
        <div>
            <hgroup>
                <h1>Dashboard</h1>
                <h2>Benvenuto nella tua dashboard</h2>
            </hgroup>
            <form method="post" enctype="multipart/form-data" action="index.php">
                <button type="submit" class="contrast">Logout</button>
            </form>
        </div>
    </article>
</main>
<?php
include '../../snippets/footer.php';
?>
