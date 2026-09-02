<?php
declare(strict_types=1);

$siglaEstado = "OP";

$frete = match($siglaEstado){
    "SP", "RJ", "MG", "ES" => "Frete de R$35,00",
    "PR", "SC", "RS" => "Frete de R$45,00",
    "BA", "CE", "PE" => "Frete R$60,00",
    default => "Frete de R$80,00"
};

echo "Para o estado $siglaEstado $frete";

