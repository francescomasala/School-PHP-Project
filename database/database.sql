DROP
    DATABASE IF EXISTS `gestioneLaboratori`;
CREATE
    DATABASE `gestioneLaboratori` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE
    `gestioneLaboratori`;

CREATE TABLE `gestioneLaboratori`.`utenti`
(
    id_utente VARCHAR(36)  NOT NULL,
    userType  ENUM('D', 'T', 'A') NOT NULL,
    nome      VARCHAR(50)  NOT NULL,
    cognome   VARCHAR(50)  NOT NULL,
    email     VARCHAR(50)  NOT NULL,
    password  VARCHAR(512) NOT NULL,
    PRIMARY KEY (id_utente)
);

CREATE TABLE `gestioneLaboratori`.`laboratori`
(
    numero_aula      VARCHAR(4)  NOT NULL,
    materia          VARCHAR(50) NOT NULL,
    postiDisponibili VARCHAR(50) NOT NULL,
    tecnici          BOOLEAN     NOT NULL,
    PRIMARY KEY (numero_aula)
);

CREATE TABLE `gestioneLaboratori`.`prenotazioni`
(
    id_prenotazione INT         NOT NULL AUTO_INCREMENT,
    id_utente       VARCHAR(36) NOT NULL,
    id_tecnico      VARCHAR(36) NOT NULL,
    numero_aula     VARCHAR(4)  NOT NULL,
    data            DATE        NOT NULL,
    ora_inizio      TIME        NOT NULL,
    ora_fine        TIME        NOT NULL,
    PRIMARY KEY (id_prenotazione),
    FOREIGN KEY (id_utente) REFERENCES utenti (id_utente),
    FOREIGN KEY (id_tecnico) REFERENCES utenti (id_utente),
    FOREIGN KEY (numero_aula) REFERENCES laboratori (numero_aula)
);

CREATE TABLE `gestioneLaboratori`.`inventario`
(
    id_oggetto    VARCHAR(36) NOT NULL,
    nome          VARCHAR(50)  NOT NULL,
    descrizione   VARCHAR(256) NOT NULL,
    quantita      INT          NOT NULL,
    data_acquisto DATE         NOT NULL,
    numero_aula   VARCHAR(4)   NOT NULL,
    PRIMARY KEY (id_oggetto),
    FOREIGN KEY (numero_aula) REFERENCES laboratori (numero_aula)
);

CREATE TABLE `gestioneLaboratori`.`manutenzioni`
(
    id_manutenzione INT          NOT NULL AUTO_INCREMENT,
    id_oggetto      VARCHAR(256) NOT NULL,
    id_tecnico      VARCHAR(36)  NOT NULL,
    data            DATE         NOT NULL,
    descrizione     VARCHAR(256) NOT NULL,
    PRIMARY KEY (id_manutenzione),
    FOREIGN KEY (id_oggetto) REFERENCES inventario (id_oggetto),
    FOREIGN KEY (id_tecnico) REFERENCES utenti (id_utente)
);

CREATE TABLE `gestioneLaboratori`.`utilizzo`
(
    id_utilizzo INT          NOT NULL AUTO_INCREMENT,
    id_oggetto  VARCHAR(256) NOT NULL,
    id_utente   VARCHAR(36)  NOT NULL,
    data        DATE         NOT NULL,
    descrizione VARCHAR(256) NOT NULL,
    PRIMARY KEY (id_utilizzo),
    FOREIGN KEY (id_oggetto) REFERENCES inventario (id_oggetto),
    FOREIGN KEY (id_utente) REFERENCES utenti (id_utente)
);

/* Inserimento utente admin con utente: admin e password: password_123 */
INSERT INTO `gestioneLaboratori`.`utenti` (id_utente, userType, nome, cognome, email, password) VALUES ('af61b9fe-1280-4f31-805d-7abe8172e01e', 'A', 'admin', 'admin', 'admin@admin.ltd','e0e358049bf1f8564d672080df3f18a4cbe931e55df7b9439ee1b08165805366');

/* Inserimento Laboratorio */
INSERT INTO `gestioneLaboratori`.`laboratori` (numero_aula, materia, postiDisponibili, tecnici) VALUES ('A1', 'Chimica', '20', '1');

/* Inserimento Oggetto */
INSERT INTO `gestioneLaboratori`.`inventario` (id_oggetto, nome, descrizione, quantita, data_acquisto, numero_aula) VALUES ('0', 'Bunsen', 'Bunsen per laboratorio di chimica', '10', '2020-01-01', 'A1');

/* Inserimento Manutenzione */
INSERT INTO `gestioneLaboratori`.`manutenzioni` (id_manutenzione, id_oggetto, id_tecnico, data, descrizione) VALUES ('0', '1', '1', '2020-01-01', 'Manutenzione ordinaria');

/* Inserimento Utilizzo */
INSERT INTO `gestioneLaboratori`.`utilizzo` (id_utilizzo, id_oggetto, id_utente, data, descrizione) VALUES ('0', '1', '1', '2020-01-01', 'Utilizzo per laboratorio di chimica');

/* Inserimento Prenotazione */
INSERT INTO `gestioneLaboratori`.`prenotazioni` (id_prenotazione, id_utente, id_tecnico, numero_aula, data, ora_inizio, ora_fine) VALUES ('0', '1', '1', 'A1', '2020-01-01', '10:00:00', '12:00:00');
