<?php
?>
<div class="sidebar">

</div>
<div class="flex-shrink-0 p-3 bg-white" style="width: 280px;">
    <a href="/dashboard" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
        <svg class="bi me-2" width="30" height="24">
            <use xlink:href="/assets/logo.php?img=default.svg"/></svg>
        <span class="fs-5 fw-semibold">TechLab</span>
    </a>
    <ul class="list-unstyled ps-0">
        <li class="mb-1">
            <div x-data="{ open: false }">
                <button class="btn btn-toggle align-items-center rounded collapsed" x-on:click="open = ! open">
                    Inventario
                </button>
                <div x-show="open" x-transition>
                    <ul class="btn-toggle-nav list-group-item-info fw-normal pb-1 small">
                        <li><a href="/dashboard/inventory/index.php" class="link-dark link-underline-light link-offset-1">Lista Oggetti</a></li>
                        <li><a href="/dashboard/inventory/add.php" class="link-dark link-underline-light link-offset-1">Aggiungi Oggetto</a></li>
                        <li><a href="#" class="link-dark link-underline-light link-offset-1">Esporta Oggetti</a></li>
                    </ul>
                </div>
            </div>
        </li>
        <li class="mb-1">
            <div x-data="{ open: false }">
                <button class="btn btn-toggle align-items-center rounded collapsed" x-on:click="open = ! open">
                    Laboratori
                </button>
                <div x-show="open" x-transition>
                    <ul class="btn-toggle-nav list-group-item-info fw-normal pb-1 small">
                        <li><a href="/dashboard/labs/index.php" class="link-dark link-underline-light link-offset-1">Lista Laboratori</a></li>
                        <li><a href="/dashboard/labs/add.php" class="link-dark link-underline-light link-offset-1">Aggiungi Laboratorio</a></li>
                        <li><a href="#" class="link-dark link-underline-light link-offset-1">Esporta Laboratori</a></li>
                    </ul>
                </div>
            </div>
        </li>
        <li class="mb-1">
            <div x-data="{ open: false }">
                <button class="btn btn-toggle align-items-center rounded collapsed" x-on:click="open = ! open">
                    Utenti
                </button>
                <div x-show="open" x-transition>
                    <ul class="btn-toggle-nav list-group-item-info fw-normal pb-1 small">
                        <li><a href="/dashboard/users/index.php" class="link-dark link-underline-light link-offset-1">Lista Utenti</a></li>
                        <li><a href="/dashboard/users/add.php" class="link-dark link-underline-light link-offset-1">Aggiungi Utente</a></li>
                        <li><a href="#" class="link-dark link-underline-light link-offset-1">Esporta Utenti</a></li>
                    </ul>
                </div>
            </div>
        </li>
        <li class="border-top my-3"></li>
        <li class="mb-1">
            <div x-data="{ open: false }">
                <button class="btn btn-toggle align-items-center rounded collapsed" x-on:click="open = ! open">
                    Account
                </button>
                <div x-show="open" x-transition>
                    <ul class="btn-toggle-nav list-group-item-info fw-normal pb-1 small">
                        <li><a href="#" class="link-dark link-underline-light link-offset-1"><?= $_SESSION['nome']?> <?= $_SESSION['cognome']?></a></li>
                        <li><a href="#" class="link-dark link-underline-light link-offset-1">Impostazioni</a></li>
                        <li><a href="/auth/logoff.php" class="link-dark link-underline-light link-offset-1">Logout</a></li>
                    </ul>
                </div>
            </div>
        </li>
    </ul>
</div>
