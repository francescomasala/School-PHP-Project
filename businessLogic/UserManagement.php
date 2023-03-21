<?php

class UserManagement
{
    protected $db_host;
    protected $db_user;
    protected $db_pass;
    protected $db_name;
    protected $db_conn;

    public function __construct()
    {
        $this->db_host = 'localhost';
        $this->db_user = 'root';
        $this->db_pass = '';
        $this->db_name = 'techlabmanager';
        try{
            $db_conn = @mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
            if (!$db_conn) {
                throw new Exception('Errore di connessione al database');
            }

        } catch (Exception $e) {
            echo 'Errore : ', $e->getMessage(), "\n";
        }
    }

    public function registerUser(string $name, string $surname, string $email, string $password): bool
    {
        $name = $this->cleanInput($name);
        $surname = $this->cleanInput($surname);
        $email = $this->cleanInput($email);
        $password = $this->cleanInput($password);
        $password = password_hash($password, PASSWORD_DEFAULT);

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
        $password = password_verify($password, PASSWORD_DEFAULT);
        $query = "SELECT * FROM utenti WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($this->db_conn, $query);
        if (!$result) {
            return false;
        } else {
            return true;
        }
    }

    private function cleanInput(string $input): string
    {
        return ucwords(strtolower(trim(addslashes($input))));
    }

}
