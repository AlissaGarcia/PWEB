<?php

interface DescontoStrategy {
    public function calcularDesconto($subtotal);
}

class DescontoPadrao implements DescontoStrategy {
    public function calcularDesconto($subtotal) {
        return 0; // sem desconto
    }
}

class Desconto10Porcento implements DescontoStrategy {
    public function calcularDesconto($subtotal) {
        return $subtotal * 0.10;
    }
}

class DescontoValorFixo implements DescontoStrategy {
    private $valor;

    public function __construct($valor) {
        $this->valor = $valor;
    }

    public function calcularDesconto($subtotal) {
        return min($this->valor, $subtotal);
    }
}

?>