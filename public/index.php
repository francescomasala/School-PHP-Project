<?php
include '../businessLogic/Main.php';
include '../snippets/header.php';

$test = new Test();
?>
<div class="hero">
    <?php
    include '../snippets/navbarUnlogged.php';
    ?>
    <center>
        <header class="container">
            <hgroup>
                <h1>Benvenuto su TechLab Manager</h1>
                <h2>Il tuo partner di fiducia per la gestione degli inventari in laboratorio.</h2>
            </hgroup>
            <p>
                <a href="mailto:mail@francescomasala.me" role="button">
                    Contattaci!
                </a>
            </p>
        </header>
    </center>
</div>

<main class="container">
    <div class="grid">
        <section>
            <hgroup>
                <h2>Ottimizza la gestione del tuo laboratorio con TechLab Manager</h2>
                <h3>
                    La soluzione completa per la gestione degli inventari e delle attrezzature tecnologiche
                </h3>
            </hgroup>
            <p>
                TechLab Manager è un software di gestione inventari all'avanguardia che ti aiuta a tenere traccia di
                tutte le attrezzature, gli strumenti e i materiali utilizzati durante le lezioni pratiche del tuo
                laboratorio tecnologico. Grazie alle sue funzionalità intuitive e personalizzabili, TechLab Manager ti
                consente di ottimizzare la gestione delle risorse, evitare sprechi e garantire che tutto sia sempre a
                portata di mano.
            </p>
        </section>
    </div>
    <div class="grid">
        <section>
            <hgroup>
                <h2>La soluzione per la gestione dei laboratori tecnologici adatta alle esigenze dei docenti</h2>
                <h3>
                    Gestisci il tuo laboratorio in modo efficiente ed efficace con TechLab Manager
                </h3>
            </hgroup>
            <p>
                TechLab Manager è la soluzione perfetta per i docenti e i responsabili di laboratorio che desiderano
                semplificare la gestione dei laboratori tecnologici. Grazie alle sue funzionalità intuitive e
                personalizzabili, TechLab Manager ti consente di tenere traccia di tutti gli strumenti e i materiali
                utilizzati durante le lezioni pratiche, evitare sprechi e garantire che tutto sia sempre a portata di
                mano. Inoltre, il software ti consente di pianificare le attività in laboratorio in modo efficace,
                risparmiando tempo e aumentando la produttività.
            </p>
        </section>
    </div>
</main>

<?php
include '../snippets/footer.php';
?>
