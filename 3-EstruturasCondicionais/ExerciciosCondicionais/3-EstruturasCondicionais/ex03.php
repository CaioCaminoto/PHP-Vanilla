<?php
declare(strict_types=1);

$peso = 190;
$altura = 1.30;

$IMC = $peso / ($altura * $altura);

if ($IMC < 18.5){
    echo "Abaixo do peso";
} elseif ($IMC >= 18.5 && $IMC <= 24.9) {
    echo "Peso normal";
} elseif ($IMC >= 25 && $IMC <= 29.9) {
    echo "Sobrepeso";
} elseif ($IMC >= 30 && $IMC <= 34.9) {
    echo "Obesidade grau 1";
} else {
    echo "Obesidade grau 2 ou 3";
}


