<?php

require_once '../repositories/PedidoRepository.php';
require_once '../services/ProdutoFactory.php';
require_once '../services/DescontoStrategy.php';
require_once '../services/PedidoNotifier.php';
require_once '../models/ItemPedido.php';

class PedidoController {
    private $repository;
    private $notifier;

    public function __construct() {
        $this->repository = PedidoRepository::getInstance();
        $this->notifier = new PedidoSubject();
        $this->notifier->attach(new WhatsAppNotifier());
    }

    public function getPedidos() {
        $pedidos = $this->repository->findAll();
        $response = [];
        foreach ($pedidos as $pedido) {
            $response[] = $pedido->toArray();
        }
        return $response;
    }

    public function criarPedido($data) {
        $pedido = new Pedido(uniqid(), $data['cliente'] ?? null, $data['telefone'] ?? null);
        foreach ($data['itens'] as $itemData) {
            $produto = ProdutoFactory::criarProduto($itemData['produto']);
            $item = new ItemPedido($produto, $itemData['quantidade']);
            $pedido->adicionarItem($item);
        }
        // Aplicar desconto se houver
        if (isset($data['desconto'])) {
            $strategy = new DescontoValorFixo($data['desconto']);
            $desconto = $strategy->calcularDesconto($pedido->getTotal() - $pedido->getTaxa());
            $pedido->aplicarDesconto($desconto);
        }
        $this->repository->save($pedido);
        $this->notifier->notify($pedido);
        return $pedido->toArray();
    }

    public function getProdutos() {
        return [
            ['id' => 1, 'nome' => 'Pastel', 'preco' => 5.00, 'categoria' => 'salgado'],
            ['id' => 2, 'nome' => 'Caldo', 'preco' => 8.00, 'categoria' => 'salgado'],
            ['id' => 3, 'nome' => 'Refrigerante', 'preco' => 4.00, 'categoria' => 'bebida'],
            ['id' => 4, 'nome' => 'Suco', 'preco' => 3.00, 'categoria' => 'bebida']
        ];
    }
}

?>