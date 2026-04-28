<?php

require_once 'ItemPedido.php';

class Pedido {
    private $id;
    private $itens = [];
    private $total = 0;
    private $desconto = 0;
    private $taxa = 5.00; // taxa de entrega fixa

    public function __construct($id) {
        $this->id = $id;
    }

    public function adicionarItem(ItemPedido $item) {
        $this->itens[] = $item;
        $this->calcularTotal();
    }

    public function getItens() { return $this->itens; }
    public function getTotal() { return $this->total; }
    public function getDesconto() { return $this->desconto; }
    public function getTaxa() { return $this->taxa; }

    public function aplicarDesconto($desconto) {
        $this->desconto = $desconto;
        $this->calcularTotal();
    }

    private function calcularTotal() {
        $subtotal = 0;
        foreach ($this->itens as $item) {
            $subtotal += $item->getSubtotal();
        }
        $this->total = $subtotal - $this->desconto + $this->taxa;
    }

    public function toArray() {
        $itensArray = [];
        foreach ($this->itens as $item) {
            $itensArray[] = [
                'produto' => $item->getProduto()->getNome(),
                'quantidade' => $item->getQuantidade(),
                'subtotal' => $item->getSubtotal()
            ];
        }
        return [
            'id' => $this->id,
            'itens' => $itensArray,
            'subtotal' => array_sum(array_column($itensArray, 'subtotal')),
            'desconto' => $this->desconto,
            'taxa' => $this->taxa,
            'total' => $this->total
        ];
    }
}

?>