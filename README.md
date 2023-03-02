# Progetto PHP Scolastico
## Autore: [Francesco Masala](https://github.com/FrancescoMasala)

## Descrizione
Questo progetto è stato realizzato per il corso d'informatica dell'anno scolastico 2022/23 presso l'Istituto Tecnico Tecnologico "M. Buonarroti" di Trento.

Lo scopo del progetto è quello di realizzare un sito web per la gestione del materiale presente nei vari laboratori diffusi in tutto l'istituto.

## Tecnologie utilizzate
- [PHP](https://www.php.net/)
- [Alpine.JS](https://alpinejs.dev/)
- [MariaDB](https://mariadb.org/)
- [Pico CSS](https://picocss.com/)
- [Caddy](https://caddyserver.com/)

## Requisiti per l'installazione
Per installare il progetto sono necessari i seguenti requisiti:
- PHP 8.0
- MariaDB 10.5
- Caddy 2.4 (opzionale)
- Linux (preferibilmente Rocky Linux 8.4 / Fedora 37 / CentOS 8) 
  - Oppure un sistema di shared hosting con PHP 8.0 e MariaDB 10.5
- Tanta pazienza
- Un po' di tempo libero
- Una tazza di caffè
- Un paio di biscotti

### Installazione su Shared Hosting
Per installare il progetto su un server di hosting condiviso è necessario:
- Creare un database MySQL
- Scaricare il progetto dal repository
- Importare il file `database.sql` presente nella cartella `database` del progetto
- Modificare il file `config.php` presente nella cartella `config` del progetto con i dati del database
- Caricare il progetto sul server di hosting

### Installazione su Linux
Buona fortuna.
