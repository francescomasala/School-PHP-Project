<?php

class Inventory extends Generic
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

    public function removeItemFromInventory(int $id): bool
    {
        $id = $this->cleanInput($id);
        $query = "DELETE FROM inventario WHERE id = '$id'";
        $result = mysqli_query($this->db_conn, $query);
        if (!$result) {
            return false;
        } else {
            return true;
        }
    }

    public function updateItemInInventory(int $id, string $nome, string $descrizione, string $quantita, string $dataAcquisto, int $numeroAula): bool
    {
        $id = $this->cleanInput($id);
        $nome = $this->cleanInput($nome);
        $descrizione = $this->cleanInput($descrizione);
        $quantita = $this->cleanInput($quantita);
        $dataAcquisto = $this->cleanInput($dataAcquisto);
        $numeroAula = $this->cleanInput($numeroAula);

        $query = "UPDATE inventario SET nome = '$nome', descrizione = '$descrizione', quantità = '$quantita', data_acquisto = '$dataAcquisto', numero_aula = '$numeroAula' WHERE id = '$id'";
        $result = mysqli_query($this->db_conn, $query);
        if (!$result) {
            return false;
        } else {
            return true;
        }
    }

    public function showItemsInInventory(): array
    {
        $query = "SELECT * FROM inventario";
        $result = mysqli_query($this->db_conn, $query);
        if (!$result) {
            return [];
        } else {
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
    }

    public function showItemInInventory(int $id): array
    {
        $id = $this->cleanInput($id);
        $query = "SELECT * FROM inventario WHERE id = '$id'";
        $result = mysqli_query($this->db_conn, $query);
        if (!$result) {
            return [];
        } else {
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
    }

    public function showItemsInInventoryByRoom(int $numeroAula): array
    {
        $numeroAula = $this->cleanInput($numeroAula);
        $query = "SELECT * FROM inventario WHERE numero_aula = '$numeroAula'";
        $result = mysqli_query($this->db_conn, $query);
        if (!$result) {
            return [];
        } else {
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
    }
    public function exportToCSV()
    {
        $query = "SELECT * FROM inventario";
        $result = mysqli_query($this->db_conn, $query);
        if (!$result) {
            return false;
        } else {
            $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $file = fopen('inventory.csv', 'w');
            fputcsv($file, array('id', 'nome', 'descrizione', 'quantità', 'data_acquisto', 'numero_aula'));
            foreach ($users as $user) {
                fputcsv($file, $user);
            }
            fclose($file);
            header('Content-Type: application/csv');
            header('Content-Disposition: attachment; filename=users.csv');
            readfile('inventory.csv');
            exit;
        }
    }
}
