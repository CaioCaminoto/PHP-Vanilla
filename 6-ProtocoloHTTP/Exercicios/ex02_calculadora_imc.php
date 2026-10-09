<?php
declare(strict_types=1);

$nome = $_POST['nome'] ?? '';
$peso = $_POST['peso'] ?? '';
$altura = $_POST['altura'] ?? '';
$erro = '';
$sucesso = '';

function calcularIMC(float $peso, float $altura): float {
    return round($peso / ($altura * $altura), 2);
}

function classificarIMC(float $imc): string {
    if ($imc < 18.5) return "Abaixo do peso";
    if ($imc < 25.0) return "Normal";
    if ($imc < 30.0) return "Sobrepeso";
    return "Obesidade";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = htmlspecialchars($nome);
    $peso_float = filter_var($peso, FILTER_VALIDATE_FLOAT);
    $altura_float = filter_var($altura, FILTER_VALIDATE_FLOAT);

    if ($peso_float === false || $peso_float < 20.0 || $peso_float > 300.0) {
        $erro = "Peso inválido! Deve ser um número positivo entre 20 e 300.";
    } elseif ($altura_float === false || $altura_float < 0.5 || $altura_float > 2.5) {
        $erro = "Altura inválida! Deve ser um número positivo entre 0.5 e 2.5.";
    } else {
        $imc = calcularIMC($peso_float, $altura_float);
        $classificacao = classificarIMC($imc);
        
        $cor = "verde";
        if ($classificacao === "Sobrepeso") $cor = "amarelo";
        if ($classificacao === "Obesidade") $cor = "vermelho";

        $sucesso = "<div class='resultado {$cor}'>Olá {$nome}! Seu IMC é {$imc} ({$classificacao}).</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de IMC</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .campo { margin-bottom: 15px; }
        .erro { color: red; font-weight: bold; }
        .verde { background: #d4edda; color: #155724; padding: 15px; border: 1px solid #c3e6cb; margin-bottom: 15px; }
        .amarelo { background: #fff3cd; color: #856404; padding: 15px; border: 1px solid #ffeeba; margin-bottom: 15px; }
        .vermelho { background: #f8d7da; color: #721c24; padding: 15px; border: 1px solid #f5c6cb; margin-bottom: 15px; }
    </style>
</head>
<body>
    <h2>Calculadora de IMC</h2>
    <?php 
    if ($erro) echo "<p class='erro'>" . htmlspecialchars($erro) . "</p>";
    if ($sucesso) echo $sucesso; 
    ?>
    <form action="ex02_calculadora_imc.php" method="POST">
        <div class="campo">
            <label>Nome:</label><br>
            <input type="text" name="nome" value="<?php echo htmlspecialchars($nome); ?>" required>
        </div>
        <div class="campo">
            <label>Peso (kg):</label><br>
            <input type="number" step="0.01" name="peso" value="<?php echo htmlspecialchars($peso); ?>" required>
        </div>
        <div class="campo">
            <label>Altura (m):</label><br>
            <input type="number" step="0.01" name="altura" value="<?php echo htmlspecialchars($altura); ?>" required>
        </div>
        <button type="submit">Calcular IMC</button>
    </form>
</body>
</html>
