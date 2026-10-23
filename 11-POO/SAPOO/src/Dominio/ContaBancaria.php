<?php
declare(strict_types=1);

abstract class ContaBancaria 
{
    protected float $saldo;

    public function __construct(
        public readonly string $agencia,
        public readonly string $numeroConta,
        public readonly Titular $titular,
        float $saldoInicial
    ) {
        if ($saldoInicial < 0.0) {
            throw new ValorInvalidoException($saldoInicial);
        }
        $this->saldo = $saldoInicial;
    }

    // Método obrigatório para o HTML consultar o saldo
    public function getSaldo(): float 
    {
        return $this->saldo;
    }

    // Método comum para depositar dinheiro
    public function depositar(float $valor): void 
    {
        if ($valor <= 0.0) {
            throw new ValorInvalidoException($valor);
        }
        $this->saldo += $valor;
    }

    // Contrato abstrato que força as filhas a criarem seu método sacar
    abstract public function sacar(float $valor): void;

    // Método de transferência polimórfica (saca da origem e deposita no destino)
    public function transferir(float $valor, ContaBancaria $contaDestino): void 
    {
        $this->sacar($valor);
        $contaDestino->depositar($valor);
    }
}
