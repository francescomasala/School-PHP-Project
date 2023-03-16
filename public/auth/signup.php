<?php

include '../../snippets/header.php';
?>
    <!-- Main -->

    <main class="container">
        <article class="">
            <div>
                <hgroup>
                    <h1>Registrati</h1>
                    <h2>Registra un nuovo account</h2>
                </hgroup>
                <form>
                    <input type="text" id="name" name="name" placeholder="Nome" aria-label="Nome" autocomplete="name" required>
                    <input type="text" id="surname" name="surname" placeholder="Cognome" aria-label="Cognome" autocomplete="surname" required>
                    <input type="email" id="email" name="email" placeholder="Indirizzo Email" aria-label="Email" autocomplete="email" required>
                    <input type="text" id="login" name="login" placeholder="Username" aria-label="Login" autocomplete="nickname" required>
                    <input type="password" id="password" name="password" placeholder="Password" aria-label="Password" autocomplete="current-password" required>
                    <button type="submit" class="contrast">Registrati</button>
                </form>
            </div>
        </article>
    </main>
<?php
include '../../snippets/footer.php';
?>
