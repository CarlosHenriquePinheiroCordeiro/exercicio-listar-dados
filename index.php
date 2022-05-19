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
                <input type="radio" name="filtro" id="nome"  value="nome"   <?= $filtro == 'nome'  ? 'checked' : '' ?>>Nome
                <input type="radio" name="filtro" id="valor" value="valor"  <?= $filtro == 'valor' ? 'checked' : '' ?>>Valor
                <input type="radio" name="filtro" id="km"    value="km"     <?= $filtro == 'km'    ? 'checked' : '' ?>>Km
                <br>
                <label for="order">Ordem:</label>
                <input type="radio" name="order" id="asc"  value="asc"  <?= $order == 'asc'  ? 'checked' : '' ?>>Crescente
                <input type="radio" name="order" id="desc" value="desc" <?= $order == 'desc' ? 'checked' : '' ?>>Decrescente
                <br>
                <label for="valor">Valor:</label>
                <input type="text" name="valor" value=<?= $valor != false ? $valor : '' ?>>
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
                require_once 'classes/Carro/dados.php';
                foreach (listarCarros($filtro, $order, $valor) as $carro) {
                    echo $carro->toTable();
                }
            ?>
        </table>
    </body>
</html>