<?php
declare(strict_types=1);

final class ContaCorrente extends ContaBancaria {
    public const TARIFA_SAQUE = 1.50;

    public function __construct(
        string $agencia, 
        string $numeroConta, 
        Titular $titular, 
        float $saldoInicial,
        private float $limiteChequeEspecial = 500.00
    ) {
        // CORRIGIDO: Removido o 'return' que causava erro
        parent::__construct($agencia, $numeroConta, $titular, $saldoInicial);
    }

    #[Override]
    public function sacar(float $valor): void
    {
        if ($valor <= 0) {
            throw new ValorInvalidoException($valor);
        }
        $custoTotal = $valor + self::TARIFA_SAQUE;
        $saldoTotalDisponivel = $this->saldo + $this->limiteChequeEspecial;

        if ($custoTotal > $saldoTotalDisponivel) {
            throw new SaldoInsuficienteException($saldoTotalDisponivel, $custoTotal);
        }
        $this->saldo -= $custoTotal;
    }

    public function getLimiteChequeEspecial(): float {
        return $this->limiteChequeEspecial;
    }
}
