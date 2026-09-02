<?php
declare(strict_types=1);

$usuario = [
    "nome" => "Carlos Eduardo",
    "idade" => 28,
    "cidade" => "Americana",
    "estado" => "SP",
    "premium" => true
];

$estrela = "";
if ($usuario["premium"] === true) {
    $estrela = " ⭐";
}
?>

<div style="border: 1px solid #ccc; padding: 15px; width: 300px; border-radius: 8px;">

    <h2>
        <?php echo $usuario["nome"] . $estrela; ?>
    </h2>

    <p>
        <strong>Idade:</strong> 
        <?php echo $usuario["idade"]; ?> anos
    </p>

    <p>
        <strong>Localização:</strong> 
        <?php echo $usuario["cidade"] . " - " . $usuario["estado"]; ?>
    </p>

</div>
