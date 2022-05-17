<?php

function listarDados($filtro, $order, $valor) {
    $Cnx = Conexao::getInstance();
    $Cnx->query(montaSql($filtro, $order, $valor));
}

function montaSql($filtro, $order, $valor) {
    $sql = 'SELECT * '
        .    'FROM CARRO ';
    if ($filtro && $order && $valor) {
        $sql .= 'WHERE '.$filtro
            .   ' LIKE %'.$valor.'%'
            .  ' ORDER BY '.$filtro.' '.$order.' ';
    }
    return $sql;
}