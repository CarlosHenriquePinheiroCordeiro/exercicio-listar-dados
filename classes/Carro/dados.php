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

function montaCarros($consulta) {
    $carros = [];
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $carro = new Carro($linha['ID'], $linha['NOME'], $linha['VALOR'], $linha['KM'], $linha['DATAFABRICACAO']);
        $carros[] = $carro;
    }
    return $carros;
}