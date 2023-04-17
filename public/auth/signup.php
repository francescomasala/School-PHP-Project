<?php

include '../../snippets/header.php';

if (isset($_COOKIE['user'])) {
    print('You are already logged in');
    header('Location: /dashboard.php');
} else {
    if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['password'])) {
        $um = new User();
        if ($um->checkUser($_POST['email'])) {
            print('User already exists');
        } else {
            if ($um->registerUser($_POST['name'], $_POST['surname'], $_POST['email'], $_POST['password'])) {
                setcookie('user', $um->loginUser($_POST['email'], $_POST['password']), time() + 3600, '/');
                header('Location: /dashboard.php');
            } else {
                print('Something went wrong');
            }
        }
    }
}

?>
    <!-- Main -->

    <main class="container">
        <article class="">
            <div>
                <hgroup>
                    <h1>Registrati</h1>
                    <h2>Registra un nuovo account</h2>
                    <?php print[$_COOKIE] ?>
                </hgroup>
                <form action="http://localhost:8080/public/auth/signup.php" enctype="multipart/form-data" method="post">
                    <input type="text" id="name" name="name" placeholder="Nome" aria-label="Nome" autocomplete="name" required>
                    <input type="text" id="surname" name="surname" placeholder="Cognome" aria-label="Cognome" autocomplete="surname" required>
                    <input type="email" id="email" name="email" placeholder="Indirizzo Email" aria-label="Email" autocomplete="email" required>
                    <input type="password" id="password" name="password" placeholder="Password" aria-label="Password" autocomplete="current-password" required>
                    <button type="submit" class="contrast">Registrati</button>
                </form>
            </div>
        </article>
    </main>
<?php
include '../../snippets/footer.php';
?>
