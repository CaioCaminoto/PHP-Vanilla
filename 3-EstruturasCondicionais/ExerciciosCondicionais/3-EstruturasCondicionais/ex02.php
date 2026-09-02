<?php
declare(strict_types=1);

$valorCompra = 99.99;

$statusFrete = ($valorCompra >= 250 )? "Frete gratís" : "Frete R$25,00";

echo $statusFrete;