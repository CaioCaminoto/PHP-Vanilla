<?php
declare(strict_types=1);

$nome_candidato = $_POST['nome_candidato'] ?? '';
$idade = $_POST['idade'] ?? '';
$curso_desejado = $_POST['curso_desejado'] ?? '';
$aceite_termos = isset($_POST['aceite_termos']);

$erros = [
    'nome' => '',
    'idade' => '',
    'curso' => '',
    'termos' => ''
];
$sucesso = false;
$cursos_permitidos = ['Desenvolvimento de Sistemas', 'Mecatrônica', 'Redes'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $valido = true;

    if (strlen(trim($nome_candidato)) < 5) {
        $erros['nome'] = "O nome deve ter pelo menos 5 caracteres.";
        $valido = false;
    }

    $idade_int = filter_var($idade, FILTER_VALIDATE_INT);
    if ($idade_int === false || $idade_int < 16) {
        $erros['idade'] = "A idade deve ser maior ou igual a 16 anos.";
        $valido = false;
    }

    if (!in_array($curso_desejado, $cursos_permitidos, true)) {
        $erros['curso'] = "Selecione um curso válido pertencente à lista.";
        $valido = false;
    }

    if (!$aceite_termos) {
        $erros['termos'] = "Você deve aceitar obrigatoriamente os termos.";
        $valido = false;
    }

    if ($valido) {
        $sucesso = true;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Inscrição SENAI</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .campo { margin-bottom: 15px; }
        .msg-erro { color: red; font-size: 14px; margin-top: 5px; font-weight: bold; }
        .sucesso { background: #d4edda; color: #155724; padding: 20px; border: 1px solid #c3e6cb; max-width: 500px; }
    </style>
</head>
<body>
    <h2>Inscrição em Processo Seletivo - SENAI</h2>

    <?php if ($sucesso): ?>
        <div class="sucesso">
            <h3>Inscrição Confirmada!</h3>
            <p>Parabéns <strong><?php echo htmlspecialchars($nome_candidato); ?></strong>, sua inscrição para o curso de <strong><?php echo htmlspecialchars($curso_desejado); ?></strong> foi processada.</p>
        </div>
    <?php else: ?>
        <form action="ex05_inscricao.php" method="POST">
            <div class="campo">
                <label>Nome do Candidato:</label><br>
                <input type="text" name="nome_candidato" value="<?php echo htmlspecialchars($nome_candidato); ?>">
                <?php if ($erros['nome']) echo "<div class='msg-erro'>" . htmlspecialchars($erros['nome']) . "</div>"; ?>
            </div>

            <div class="campo">
                <label>Idade:</label><br>
                <input type="number" name="idade" value="<?php echo htmlspecialchars($idade); ?>">
                <?php if ($erros['idade']) echo "<div class='msg-erro'>" . htmlspecialchars($erros['idade']) . "</div>"; ?>
            </div>

            <div class="campo">
                <label>Curso Desejado:</label><br>
                <select name="curso_desejado">
                    <option value="">Selecione...</option>
                    <?php foreach ($cursos_permitidos as $curso): ?>
                        <option value="<?php echo $curso; ?>" <?php if ($curso_desejado === $curso) echo 'selected'; ?>>
                            <?php echo $curso; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <?php if ($erros['curso']) echo "<div class='msg-erro'>" . htmlspecialchars($erros['curso']) . "</div>"; ?>
            </div>

            <div class="campo">
                <label>
                    <input type="checkbox" name="aceite_termos" value="1" <?php if ($aceite_termos) echo 'checked'; ?>>
                    Aceito os termos de inscrição
                </label>
                <?php if ($erros['termos']) echo "<div class='msg-erro'>" . htmlspecialchars($erros['termos']) . "</div>"; ?>
            </div>

            <button type="submit">Enviar Inscrição</button>
        </form>
    <?php endif; ?>
</body>
</html>
