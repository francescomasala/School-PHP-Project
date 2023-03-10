DROP DATABASE IF EXISTS `gestioneLaboratori`;
CREATE DATABASE `gestioneLaboratori` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE `gestioneLaboratori`;

CREATE TABLE `gestioneLaboratori`.`utenti`
(
    id_utente INT         NOT NULL AUTO_INCREMENT,
    isAdmin   BOOLEAN     NOT NULL,
    nome      VARCHAR(50) NOT NULL,
    cognome   VARCHAR(50) NOT NULL,
    email     VARCHAR(50) NOT NULL,
    password  VARCHAR(50) NOT NULL,
    PRIMARY KEY (id_utente)
);

CREATE TABLE `gestioneLaboratori`.`laboratori`
(
    numero_aula      INT         NOT NULL AUTO_INCREMENT,
    materia          VARCHAR(50) NOT NULL,
    postiDisponibili VARCHAR(50) NOT NULL,
    tecnici          BOOLEAN     NOT NULL,
    PRIMARY KEY (numero_aula)
);

CREATE TABLE `gestioneLaboratori`.`tecnici`
(
    id_tecnico INT         NOT NULL AUTO_INCREMENT,
    nome       VARCHAR(50) NOT NULL,
    cognome    VARCHAR(50) NOT NULL,
    email      VARCHAR(50) NOT NULL,
    password   VARCHAR(50) NOT NULL,
    PRIMARY KEY (id_tecnico)
);

CREATE TABLE `gestioneLaboratori`.`prenotazioni`
(
    id_prenotazione INT  NOT NULL AUTO_INCREMENT,
    id_utente       INT  NOT NULL,
    id_tecnico      INT  NOT NULL,
    numero_aula     INT  NOT NULL,
    data            DATE NOT NULL,
    ora_inizio      TIME NOT NULL,
    ora_fine        TIME NOT NULL,
    PRIMARY KEY (id_prenotazione),
    FOREIGN KEY (id_utente) REFERENCES utenti (id_utente),
    FOREIGN KEY (id_tecnico) REFERENCES tecnici (id_tecnico),
    FOREIGN KEY (numero_aula) REFERENCES laboratori (numero_aula)
);

CREATE TABLE `gestioneLaboratori`.`inventario`
(
    id_oggetto INT         NOT NULL AUTO_INCREMENT,
    nome          VARCHAR(50) NOT NULL,
    descrizione   VARCHAR(256) NOT NULL,
    data_acquisto DATE NOT NULL,
    numero_aula   INT         NOT NULL,
    PRIMARY KEY (id_oggetto),
    FOREIGN KEY (numero_aula) REFERENCES laboratori (numero_aula)
);

CREATE TABLE `gestioneLaboratori`.`manutenzioni`
(
    id_manutenzione INT         NOT NULL AUTO_INCREMENT,
    id_oggetto      INT         NOT NULL,
    id_tecnico      INT         NOT NULL,
    data            DATE        NOT NULL,
    descrizione     VARCHAR(256) NOT NULL,
    PRIMARY KEY (id_manutenzione),
    FOREIGN KEY (id_oggetto) REFERENCES inventario (id_oggetto),
    FOREIGN KEY (id_tecnico) REFERENCES tecnici (id_tecnico)
);

CREATE TABLE  `gestioneLaboratori`.`utilizzo`
(
    id_utilizzo INT         NOT NULL AUTO_INCREMENT,
    id_oggetto  INT         NOT NULL,
    id_utente   INT         NOT NULL,
    data        DATE        NOT NULL,
    descrizione VARCHAR(256) NOT NULL,
    PRIMARY KEY (id_utilizzo),
    FOREIGN KEY (id_oggetto) REFERENCES inventario (id_oggetto),
    FOREIGN KEY (id_utente) REFERENCES utenti (id_utente)
);


