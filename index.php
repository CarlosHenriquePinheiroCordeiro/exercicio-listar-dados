<?php
    $filtro = isset($_POST['filtro']) ? $_POST['filtro'] : false;
    $order  = isset($_POST['order'])  ? $_POST['order']  : false;
    $valor  = isset($_POST['valor'])  ? $_POST['valor']  : false;
?>
<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Exercício Listar Dados</title>
    </head>
    <body>
        <h1>Exercício Listar Dados</h1>
        <form method="post">
            <fieldset>
                <legend>Filtrar listagem</legend>
                <label for="filtro">Filtrar:</label>
                <input type="radio" name="filtro" id="nome" value="nome">Nome
                <input type="radio" name="filtro" id="valor" value="valor">Valor
                <input type="radio" name="filtro" id="km" value="km">Km
                <input type="radio" name="filtro" id="dataFabricacao" value="dataFabricacao">Data de Fabricação
                <br>
                <label for="order">Ordem:</label>
                <input type="radio" name="order" id="asc" value="asc">Crescente
                <input type="radio" name="order" id="desc" value="desc">Decrescente
                <br>
                <label for="valor">Valor:</label>
                <input type="text" name="valor">
                <br>
                <button type="submit">Filtrar</button>
            </fieldset>
        </form>
        <br>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Valor</th>
                <th>Km</th>
                <th>Data de Fabricação</th>
                <th>Anos de uso</th>
                <th>Média Km/Ano</th>
                <th>Revenda c/ Desconto</th>
            </tr>
            <?php
                require_once 'php/dados.php';
                $consulta = listarDados($filtro, $order, $valor);
                while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    echo '<tr>';
                    echo    '<td>'.$consulta['ID'].'</td>';
                    echo    '<td>'.$consulta['NOME'].'</td>';
                    echo    '<td>'.$consulta['VALOR'].'</td>';
                    echo    '<td>'.$consulta['KM'].'</td>';
                    echo    '<td>'.$consulta['DATAFABRICACAO'].'</td>';
                    //echo    '<td>'..'</td>';
                    //echo    '<td>'..'</td>';
                    //echo    '<td>'..'</td>';
                    echo '</tr>';
                }
            ?>
        </table>
    </body>
</html>