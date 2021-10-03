<?php

class conexao
{

    private $host = 'localhost';
    private $dbname = 'mapa_backend2';
    private $user = 'root';
    private $pass = '';

    public function conectar()
    {
        try {

            $conexao = new PDO(
                "mysql:host=$this->host;dbname=$this->dbname",
                "$this->user",
                "$this->pass",
            );

            return $conexao;
        } catch (PDOException $e) {
            return '<p>' . $e->getMessage() . '</p>';
        }
    }
}
