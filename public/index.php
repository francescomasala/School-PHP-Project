<?php
include '../businessLogic/Main.php';
include '../snippets/header.php';

$test = new Test();
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Test</h1>
            <p><?= $test->testClass(); ?></p>
            <a href="auth/signin.php">Login</a>
            <a href="auth/signup.php">Registrati </a>
        </div>
    </div>
</div>
