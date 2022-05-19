<?php
require_once './db/Conexao.php';
require_once 'Carro.php';

function listarCarros($filtro, $order, $valor) {
    try {
        return montaCarros(Conexao::getInstance()->query(montaSql($filtro, $order, $valor)));
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    
}

function montaSql($filtro, $order, $valor) {
    $sql = 'SELECT * '
        .    'FROM CARRO ';
    $sql = adicionaFiltro($sql, $filtro, $order, $valor);
    return $sql;
}

function adicionaFiltro($sql, $filtro, $order, $valor) {
    if ($filtro && $valor) {
        $sql .= 'WHERE '.$filtro
            .   ' LIKE \'%'.$valor.'%\'';
    }
    if ($filtro && $order) {
        $sql .= ' ORDER BY '.$filtro.' '.$order.' ';
    }
    return $sql;
}

function montaCarros($consulta) {
    $carros = [];
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $carro = new Carro($linha['ID'], $linha['NOME'], $linha['VALOR'], $linha['KM'], $linha['DATAFABRICACAO']);
        $carros[] = $carro;
    }
    return $carros;
}