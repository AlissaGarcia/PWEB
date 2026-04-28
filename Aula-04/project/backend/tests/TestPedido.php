<?php

require_once '../models/Produto.php';
require_once '../models/ItemPedido.php';
require_once '../models/Pedido.php';
require_once '../services/DescontoStrategy.php';

class TestPedido {
    public function testCalculoTotal() {
        $produto = new Produto(1, 'Pastel', 5.00, 'salgado');
        $item = new ItemPedido($produto, 2);
        $pedido = new Pedido(1);
        $pedido->adicionarItem($item);

        $expectedSubtotal = 10.00;
        $expectedTotal = $expectedSubtotal + 5.00; // taxa

        assert($pedido->getTotal() == $expectedTotal, "Total incorreto: esperado $expectedTotal, obtido " . $pedido->getTotal());
        echo "Teste cálculo total: PASSOU\n";
    }

    public function testAplicacaoDesconto() {
        $produto = new Produto(1, 'Pastel', 5.00, 'salgado');
        $item = new ItemPedido($produto, 2);
        $pedido = new Pedido(1);
        $pedido->adicionarItem($item);

        $pedido->aplicarDesconto(2.00);
        $expectedTotal = 10.00 - 2.00 + 5.00; // subtotal - desconto + taxa

        assert($pedido->getTotal() == $expectedTotal, "Desconto incorreto: esperado $expectedTotal, obtido " . $pedido->getTotal());
        echo "Teste aplicação desconto: PASSOU\n";
    }

    public function testDescontoStrategy() {
        $strategy = new Desconto10Porcento();
        $subtotal = 100.00;
        $desconto = $strategy->calcularDesconto($subtotal);

        assert($desconto == 10.00, "Desconto 10%: esperado 10.00, obtido $desconto");
        echo "Teste desconto strategy: PASSOU\n";
    }
}

// Executar testes
$test = new TestPedido();
$test->testCalculoTotal();
$test->testAplicacaoDesconto();
$test->testDescontoStrategy();

echo "Todos os testes passaram!\n";

?>