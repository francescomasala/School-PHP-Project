<?php

class User extends Generic
{
    public function registerUser(string $name, string $surname, string $email, string $password): bool
    {
        $name = $this->cleanInput($name);
        $surname = $this->cleanInput($surname);
        $email = $this->cleanInput($email);
        $password = $this->cleanInput($password);
        $password = password_hash($password, PASSWORD_BCRYPT);

        $query = "INSERT INTO utenti (nome, cognome, email, password, isAdmin) VALUES ('$name', '$surname', '$email', '$password', 0)";
        $result = mysqli_query($this->db_conn, $query);
        if (!$result) {
            return false;
        } else {
            return true;
        }
    }

    public function loginUser(string $email, string $password): bool
    {
        $email = $this->cleanInput($email);
        $password = password_verify($password, PASSWORD_BCRYPT);
        $query = "SELECT * FROM utenti WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($this->db_conn, $query);
        if (!$result) {
            return false;
        } else {
            return true;
        }
    }

    public function checkUser(string $email): bool
    {
        $email = $this->cleanInput($email);
        $query = "SELECT * FROM utenti WHERE email = '$email'";
        $result = mysqli_query($this->db_conn, $query);
        if (!$result) {
            return false;
        } else {
            return true;
        }
    }

    public function changePassword(string $email, string $password): bool
    {
        $email = $this->cleanInput($email);
        $password = $this->cleanInput($password);
        $password = password_hash($password, PASSWORD_BCRYPT);
        $query = "UPDATE utenti SET password = '$password' WHERE email = '$email'";
        $result = mysqli_query($this->db_conn, $query);
        if (!$result) {
            return false;
        } else {
            return true;
        }
    }

    public function deleteUser(string $email): bool
    {
        $email = $this->cleanInput($email);
        $query = "DELETE FROM utenti WHERE email = '$email'";
        $result = mysqli_query($this->db_conn, $query);
        if (!$result) {
            return false;
        } else {
            return true;
        }
    }

    public function setAdmin(string $email): bool
    {
        $email = $this->cleanInput($email);
        $query = "UPDATE utenti SET isAdmin = 1 WHERE email = '$email'";
        $result = mysqli_query($this->db_conn, $query);
        if (!$result) {
            return false;
        } else {
            return true;
        }
    }

    public function unsetAdmin(string $email): bool
    {
        $email = $this->cleanInput($email);
        $query = "UPDATE utenti SET isAdmin = 0 WHERE email = '$email'";
        $result = mysqli_query($this->db_conn, $query);
        if (!$result) {
            return false;
        } else {
            return true;
        }
    }

    public function getUser(mixed $user)
    {
        $user = $this->cleanInput($user);
        $query = "SELECT * FROM utenti WHERE email = '$user'";
        $result = mysqli_query($this->db_conn, $query);
        if (!$result) {
            return false;
        } else {
            return mysqli_fetch_object($result);
        }
    }

    public function getAllUsers()
    {
        $query = "SELECT * FROM utenti";
        $result = mysqli_query($this->db_conn, $query);
        if (!$result) {
            return false;
        } else {
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
    }

    public function getAllAdmins()
    {
        $query = "SELECT * FROM utenti WHERE isAdmin = 1";
        $result = mysqli_query($this->db_conn, $query);
        if (!$result) {
            return false;
        } else {
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
    }

    public function getAllUsersExceptAdmins()
    {
        $query = "SELECT * FROM utenti WHERE isAdmin = 0";
        $result = mysqli_query($this->db_conn, $query);
        if (!$result) {
            return false;
        } else {
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
    }

    public function exportToCSV()
    {
        $query = "SELECT * FROM utenti";
        $result = mysqli_query($this->db_conn, $query);
        if (!$result) {
            return false;
        } else {
            $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $file = fopen('users.csv', 'w');
            fputcsv($file, array('Nome', 'Cognome', 'Email', 'Password', 'isAdmin'));
            foreach ($users as $user) {
                fputcsv($file, $user);
            }
            fclose($file);
            header('Content-Type: application/csv');
            header('Content-Disposition: attachment; filename=users.csv');
            readfile('users.csv');
            exit;
        }
    }

}
