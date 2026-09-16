<?php
declare(strict_types=1);

$busca = $_GET['busca'] ?? '';
$preco_maximo = $_GET['preco_maximo'] ?? '';

$produtos = [
    ['nome' => 'Teclado USB', 'categoria' => 'Eletrônicos', 'preco' => 80.00],
    ['nome' => 'Mouse sem fio', 'categoria' => 'Eletrônicos', 'preco' => 65.00],
    ['nome' => 'Caderno', 'categoria' => 'Papelaria', 'preco' => 25.00],
    ['nome' => 'Caneta azul', 'categoria' => 'Papelaria', 'preco' => 3.50],
    ['nome' => 'Monitor 24 polegadas', 'categoria' => 'Eletrônicos', 'preco' => 899.90],
    ['nome' => 'Ativador de AURA', 'categoria' => 'AURA', 'preco' => 67.67],
];

$produtos_filtrados = $produtos;

if ($busca !== '' || $preco_maximo !== '') {
    $produtos_filtrados = array_filter($produtos, function(array $produto) use ($busca, $preco_maximo): bool {
        $corresponde_nome = true;
        $corresponde_preco = true;

        if ($busca !== '') {
            $corresponde_nome = (stripos($produto['nome'], $busca) !== false);
        }

        if ($preco_maximo !== '') {
            $preco_float = filter_var($preco_maximo, FILTER_VALIDATE_FLOAT);
            if ($preco_float !== false) {
                $corresponde_preco = ($produto['preco'] <= $preco_float);
            }
        }

        return $corresponde_nome && $corresponde_preco;
    });
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Buscador de Produtos</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .campo { margin-bottom: 15px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>
    <h2>Catálogo de Produtos</h2>
    <form action="ex01_busca_produtos.php" method="GET">
        <div class="campo">
            <label>Nome do Produto:</label><br>
            <input type="text" name="busca" value="<?php echo htmlspecialchars($busca); ?>">
        </div>
        <div class="campo">
            <label>Preço Máximo (R$):</label><br>
            <input type="number" step="0.01" name="preco_maximo" value="<?php echo htmlspecialchars($preco_maximo); ?>">
        </div>
        <button type="submit">Filtrar</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Preço</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($produtos_filtrados)): ?>
                <tr><td colspan="3">Nenhum produto encontrado.</td></tr>
            <?php else: ?>
                <?php foreach ($produtos_filtrados as $prod): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($prod['nome']); ?></td>
                        <td><?php echo htmlspecialchars($prod['categoria']); ?></td>
                        <td>R$ <?php echo htmlspecialchars(number_format($prod['preco'], 2, ',', '.')); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
