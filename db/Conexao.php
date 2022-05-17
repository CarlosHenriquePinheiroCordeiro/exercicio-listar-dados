<?php
class Conexao {
    
    protected $Pdo;

    public static function getInstance() {
        if (!isset($this->Pdo)) {
            
        }
        return $this->Pdo;
    }


}