<?php
declare(strict_types=1);

$idade = 20;

if ($idade < 16) {
    echo "Voto Proibido";
} elseif ($idade >= 16 && $idade <= 17) {
    echo "Voto Facultativo";
} elseif ($idade >= 18 && $idade <= 69) {
    echo "Voto Obrigatório";
} else {
    echo "Voto Facultativo";
}





