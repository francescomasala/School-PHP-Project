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
            <form>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </article>
</main>
<?php
include '../../snippets/footer.php';
?>
