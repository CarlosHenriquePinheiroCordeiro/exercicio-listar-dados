<?php

abstract class Conexao {

    protected $Pdo;

    public static function getInstance() {
        if (!isset($this->Pdo)) {
            $this->Pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '');
            $this->Pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $Pdo;
    }


}

?>