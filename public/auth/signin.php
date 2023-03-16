<?php

include '../../snippets/header.php';
?>
<!-- Main -->

<main class="container">
    <article class="">
        <div>
            <hgroup>
                <h1>Accedi</h1>
                <h2>Accedi al tuo account</h2>
            </hgroup>
            <form>
                <input type="text" id="login" name="login" placeholder="Username" aria-label="Login" autocomplete="nickname" required>
                <input type="password" id="password" name="password" placeholder="Password" aria-label="Password" autocomplete="current-password" required>
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
