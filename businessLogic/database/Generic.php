<?php

class Generic
{
    protected string $db_host;
    protected string $db_user;
    protected string $db_pass;
    protected string $db_name;
    protected mysqli|false $db_conn;

    public function __construct()
    {
        $this->db_host = 'localhost';
        $this->db_user = 'root';
        $this->db_pass = '';
        $this->db_name = 'techlabmanager';
        try {
            $this->db_conn = @mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
            if (!$this->db_conn) {
                throw new Exception('Errore di connessione al database');
            }

        } catch (Exception $e) {
            echo 'Errore : ', $e->getMessage(), "\n";
        }
    }

    protected function cleanInput(string $input): string
    {
        return ucwords(strtolower(trim(addslashes($input))));
    }
}
