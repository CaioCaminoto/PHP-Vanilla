<?php
declare(strict_types=1);

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';
$erro = '';
$sucesso = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email_valido = filter_var($email, FILTER_VALIDATE_EMAIL);

    if ($email_valido === false) {
        $erro = "O e-mail informado não é válido.";
    } elseif (strlen($senha) < 6) {
        $erro = "A senha deve ter no mínimo 6 caracteres.";
    } else {
        if ($email === 'admin@senai.br' && $senha === 'senhaSegura123') {
            $sucesso = true;
        } else {
            $erro = "Credenciais inválidas";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Autenticação Segura</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .campo { margin-bottom: 15px; }
        .erro { color: red; font-weight: bold; }
        .card { background: #d1ecf1; color: #0c5460; padding: 20px; border: 1px solid #bee5eb; border-radius: 5px; max-width: 400px; }
    </style>
</head>
<body>
    <h2>Login Administrativo</h2>
    <?php if ($erro) echo "<p class='erro'>" . htmlspecialchars($erro) . "</p>"; ?>

    <?php if ($sucesso): ?>
        <div class="card">
            <h3>Bem-vindo ao Painel!</h3>
            <p>Autenticação realizada com sucesso para o usuário: <strong><?php echo htmlspecialchars($email); ?></strong></p>
        </div>
    <?php else: ?>
        <form action="ex03_login_seguro.php" method="POST">
            <div class="campo">
                <label>E-mail:</label><br>
                <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
            </div>
            <div class="campo">
                <label>Senha:</label><br>
                <input type="password" name="senha" required>
            </div>
            <button type="submit">Entrar</button>
        </form>
    <?php endif; ?>
</body>
</html>
