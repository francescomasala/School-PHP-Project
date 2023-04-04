<?php

class Labs extends Generic
{
    public function addLab(string $numeroAula, string $materia, string $postiDisponibili): bool
    {
        $numeroAula = $this->cleanInput($numeroAula);
        $materia = $this->cleanInput($materia);
        $postiDisponibili = $this->cleanInput($postiDisponibili);

        $query = "INSERT INTO laboratori (numero_aula, materia, postiDisponibili) VALUES ('$numeroAula', '$materia', '$postiDisponibili')";
        $result = mysqli_query($this->db_conn, $query);
        if (!$result) {
            return false;
        } else {
            return true;
        }
    }

    public function deleteLab(string $numeroAula): bool
    {
        $numeroAula = $this->cleanInput($numeroAula);

        $query = "DELETE FROM laboratori WHERE numero_aula = '$numeroAula'";
        $result = mysqli_query($this->db_conn, $query);
        if (!$result) {
            return false;
        } else {
            return true;
        }
    }

    public function updateLabSubject(string $numeroAula, string $materia): bool
    {
        $numeroAula = $this->cleanInput($numeroAula);
        $materia = $this->cleanInput($materia);

        $query = "UPDATE laboratori SET materia = '$materia' WHERE numero_aula = '$numeroAula'";
        $result = mysqli_query($this->db_conn, $query);
        if (!$result) {
            return false;
        } else {
            return true;
        }
    }

    public function updateLabSeats(string $numeroAula, string $postiDisponibili): bool
    {
        $numeroAula = $this->cleanInput($numeroAula);
        $postiDisponibili = $this->cleanInput($postiDisponibili);

        $query = "UPDATE laboratori SET postiDisponibili = '$postiDisponibili' WHERE numero_aula = '$numeroAula'";
        $result = mysqli_query($this->db_conn, $query);
        if (!$result) {
            return false;
        } else {
            return true;
        }
    }

    public function getLab(string $numeroAula): array
    {
        $numeroAula = $this->cleanInput($numeroAula);

        $query = "SELECT * FROM laboratori WHERE numero_aula = '$numeroAula'";
        $result = mysqli_query($this->db_conn, $query);
        if (!$result) {
            return [];
        } else {
            return mysqli_fetch_assoc($result);
        }
    }

    public function getLabs(): array
    {
        $query = "SELECT * FROM laboratori";
        $result = mysqli_query($this->db_conn, $query);
        if (!$result) {
            return [];
        } else {
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
    }

    public function getLabSubject(string $numeroAula): string
    {
        $numeroAula = $this->cleanInput($numeroAula);

        $query = "SELECT materia FROM laboratori WHERE numero_aula = '$numeroAula'";
        $result = mysqli_query($this->db_conn, $query);
        if (!$result) {
            return "";
        } else {
            return mysqli_fetch_assoc($result)['materia'];
        }
    }

    public function getLabSeats(string $numeroAula): string
    {
        $numeroAula = $this->cleanInput($numeroAula);

        $query = "SELECT postiDisponibili FROM laboratori WHERE numero_aula = '$numeroAula'";
        $result = mysqli_query($this->db_conn, $query);
        if (!$result) {
            return "";
        } else {
            return mysqli_fetch_assoc($result)['postiDisponibili'];
        }
    }
}
