<?php

class Conexao {

    private static $Pdo;

    private function __construct() {
    }

    public static function getInstance() {
        if (!isset(self::$Pdo)) {
            self::$Pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '');
            self::$Pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$Pdo;
    }


}
