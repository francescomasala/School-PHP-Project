<?php

class DatabaseInventory extends DatabaseGeneric
{
    public function addItemToInventory(string $nome, string $descrizione, string $quantita, string $dataAcquisto, int $numeroAula): bool
    {
        $nome = $this->cleanInput($nome);
        $descrizione = $this->cleanInput($descrizione);
        $quantita = $this->cleanInput($quantita);
        $dataAcquisto = $this->cleanInput($dataAcquisto);
        $numeroAula = $this->cleanInput($numeroAula);

        $query = "INSERT INTO inventario (nome, descrizione, quantità, data_acquisto, numero_aula) VALUES ('$nome', '$descrizione', '$quantita', '$dataAcquisto', '$numeroAula')";
        $result = mysqli_query($this->db_conn, $query);
        if (!$result) {
            return false;
        } else {
            return true;
        }
    }
}
