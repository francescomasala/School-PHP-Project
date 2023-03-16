<?php
include '../businessLogic/Main.php';
include '../snippets/header.php';

$test = new Test();
?>
<div class="hero">
    <?php
    include '../snippets/navbarUnlogged.php';
    ?>

    <header class="container">
        <hgroup>
            <h1>Benvenuto su TechLab Manager</h1>
            <h2>TechLab Manager è un sistema di Gestione Inventari Scolastici</h2>
        </hgroup>
        <p>
            <a href="mailto:mail@francescomasala.me" role="button">
                Contattaci!
            </a>
        </p>
    </header>
    <main class="container">
        <div class="grid">
            <section>
                <hgroup>
                    <h2>Perchè TechLab Manager?</h2>
                    <h3>
                        <span class="contrast">Perchè</span> TechLab Manager è un sistema di gestione inventari
                        per laboratori scolastici completamente gratuito, open source e conforme al GDPR
                    </h3>
                </hgroup>
                <p>
                    La soluzione perfetta per gestire gli inventari delle aule di laboratorio degli istituti tecnici
                    tecnologici. Con il nostro sistema facile da usare, potrai tenere traccia di tutte le attrezzature,
                    gli strumenti e i materiali utilizzati durante le lezioni pratiche, evitando sprechi e garantendo
                    che tutto sia sempre a portata di mano. Semplifica la tua vita da docente o responsabile di
                    laboratorio con il nostro software di gestione inventari all'avanguardia
                </p>
            </section>
        </div>
    </main>
</div>

<?php
include '../snippets/footer.php';
?>
