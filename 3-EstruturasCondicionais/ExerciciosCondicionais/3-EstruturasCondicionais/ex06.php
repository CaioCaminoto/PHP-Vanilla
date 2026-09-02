<?php
declare(strict_types=1);

$isEstudante = true;
$ingresso = 40;
$diaIngresso = "Quarta";

$diaSemana = match($diaIngresso){
    "Segunda","Terça" =>  $ingresso * 0.8,
    "Quarta" => $ingresso * 0.5,
    "Quinta", "Sexta", "Sabado", "Domingo" => $ingresso,
    default => "Dia não aceito" 
};

if ($isEstudante){
    $diaSemana = $diaSemana * 0.5;
}

echo "Preço do Ingresso: $diaSemana";
