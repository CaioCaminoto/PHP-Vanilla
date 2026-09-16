<?php
declare(strict_types=1);

$valor_veiculo = $_POST['valor_veiculo'] ?? '';
$valor_entrada = $_POST['valor_entrada'] ?? '';
$numero_parcelas = $_POST['numero_parcelas'] ?? '';

$erro = '';
$memoria_calculo = null;
$opcoes_parcelas =;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $v_veiculo = filter_var($valor_veiculo, FILTER_VALIDATE_FLOAT);
    $v_entrada = filter_var($valor_entrada, FILTER_VALIDATE_FLOAT);
    $n_parcelas = filter_var($numero_parcelas, FILTER_VALIDATE_INT);

    $entrada_minima = $v_veiculo ? $v_veiculo * 0.20 : 0.0;

    if ($v_veiculo === false || $v_veiculo <= 0) {
        $erro = "Valor do veículo inválido.";
    } elseif ($v_entrada === false || $v_entrada < $entrada_minima) {
        $erro = "A entrada deve ser de pelo menos 20% do valor total do veículo (Mínimo: R$ " . number_format($entrada_minima, 2, ',', '.') . ").";
    } elseif ($n_parcelas === false || !in_array($n_parcelas, $opcoes_parcelas, true)) {
        $erro = "Número de parcelas inválido.";
    } else {
        $saldo_financiado = $v_veiculo - $v_entrada;
        $total_juros = $saldo_financiado * (0.015 * $n_parcelas);
        $total_com_juros = $saldo_financiado + $total_juros;
        $valor_parcela = $total_com_juros / $n_parcelas;

        $memoria_calculo = [
            'financiado' => $saldo_financiado,
            'juros' => $total_juros,
            'parcela' => $valor_parcela,
            'qtd' => $n_parcelas
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Simulador de Financiamento</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .campo { margin-bottom: 15px; }
        .erro { color: red; font-weight: bold; }
        .resultado { background: #f8f9fa; padding: 20px; border: 1px solid #e2e3e5; max-width: 500px; margin-top: 20px; }
    </style>
</head>
<body>
    <h2>Simulador de Financiamento Automotivo</h2>
    <?php if ($erro) echo "<p class='erro'>" . htmlspecialchars($erro) . "</p>"; ?>

    <form action="ex04_financiamento.php" method="POST">
        <div class="campo">
            <label>Valor do Veículo (R$):</label><br>
            <input type="number" step="0.01" name="valor_veiculo" value="<?php echo htmlspecialchars($valor_veiculo); ?>" required>
        </div>
        <div class="campo">
            <label>Valor de Entrada (R$):</label><br>
            <input type="number" step="0.01" name="valor_entrada" value="<?php echo htmlspecialchars($valor_entrada); ?>" required>
        </div>
        <div class="campo">
            <label>Número de Parcelas:</label><br>
            <select name="numero_parcelas" required>
                <option value="">Selecione...</option>
                <?php foreach ($opcoes_parcelas as $opcao): ?>
                    <option value="<?php echo $opcao; ?>" <?php if ((int)$numero_parcelas === $opcao) echo 'selected'; ?>>
                        <?php echo $opcao; ?>x
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit">Simular Financiamento</button>
    </form>

    <?php if ($memoria_calculo): ?>
        <div class="resultado">
            <h3>Memória de Cálculo</h3>
            <p><strong>Valor Financiado (Saldo):</strong> R$ <?php echo htmlspecialchars(number_format($memoria_calculo['financiado'], 2, ',', '.')); ?></p>
            <p><strong>Total de Juros (1.5% a.m. simples):</strong> R$ <?php echo htmlspecialchars(number_format($memoria_calculo['juros'], 2, ',', '.')); ?></p>
            <p><strong>Valor de Cada Parcela:</strong> <?php echo htmlspecialchars((string)$memoria_calculo['qtd']); ?>x de <strong>R$ <?php echo htmlspecialchars(number_format($memoria_calculo['parcela'], 2, ',', '.')); ?></strong></p>
        </div>
    <?php endif; ?>
</body>
</html>
