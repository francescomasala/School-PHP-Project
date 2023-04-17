<?php

include '../../snippets/header.php';
?>
<!-- Main -->
<?php
include '../../businessLogic/database/Generic.php';
include '../../businessLogic/database/User.php';
include "../../businessLogic/utils/Generators.php";

if (isset($_COOKIE['user'])) {
    print('You are already logged in');
    header('Location: /dashboard.php');
} else {
    if (isset($_POST['login']) && isset($_POST['password'])) {
        $um = new User();
        if ($um->checkUser($_POST['login'])) {
            if ($um->loginUser($_POST['login'], $_POST['password'])) {
                setcookie('user', $um->loginUser($_POST['login'], $_POST['password']), time() + 3600, '/');
                header('Location: /dashboard.php');
            } else {
                print('Wrong password');
            }
        } else {
            print('User does not exist');
            header('Location: /auth/signup.php');
        }
    }
}
?>
<main class="container">
    <article class="">
        <div>
            <hgroup>
                <h1>Accedi</h1>
                <h2>Accedi al tuo account</h2>
            </hgroup>
            <form method="post" enctype="multipart/form-data" action="signin.php" >
                <input type="text" id="login" name="login" placeholder="Username" aria-label="Login"
                       autocomplete="nickname" required>
                <input type="password" id="password" name="password" placeholder="Password" aria-label="Password"
                       autocomplete="current-password" required>
                <fieldset>
                    <label for="remember">
                        <input type="checkbox" role="switch" id="remember" name="remember">
                        Ricordami
                    </label>
                </fieldset>
                <button type="submit" class="contrast">Accedi</button>
                <button type="submit" class="secondary outline">Registrati</button>
            </form>
        </div>
    </article>
</main>
<?php
include '../../snippets/footer.php';
?>
