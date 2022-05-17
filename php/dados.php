<?php
require_once './db/Conexao.php';

function listarDados($filtro, $order, $valor) {
    try {
        return Conexao::getInstance()->query(montaSql($filtro, $order, $valor));
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    
}

function montaSql($filtro, $order, $valor) {
    $sql = 'SELECT * '
        .    'FROM CARRO ';
    adicionaFiltro($sql, $filtro, $order, $valor);
    return $sql;
}

function adicionaFiltro($sql, $filtro, $order, $valor) {
    if ($filtro && $order && $valor) {
        $sql .= 'WHERE '.$filtro
            .   ' LIKE %'.$valor.'%'
            .  ' ORDER BY '.$filtro.' '.$order.' ';
    }
}

function calculaMediaKmAno($km, $anoFabricacao) {

}

function calculaRevendaDesconto($km, $anoFabricacao) {

}