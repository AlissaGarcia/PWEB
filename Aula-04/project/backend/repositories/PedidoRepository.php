<?php

require_once '../models/Pedido.php';

class PedidoRepository {
    private static $instance = null;
    private $pedidos = [];

    private function __construct() {
        // Carregar dados do JSON
        $this->loadFromJson();
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new PedidoRepository();
        }
        return self::$instance;
    }

    public function save(Pedido $pedido) {
        $this->pedidos[$pedido->getId()] = $pedido;
        $this->saveToJson();
    }

    public function findAll() {
        return $this->pedidos;
    }

    public function findById($id) {
        return isset($this->pedidos[$id]) ? $this->pedidos[$id] : null;
    }

    public function delete($id) {
        if (isset($this->pedidos[$id])) {
            unset($this->pedidos[$id]);
            $this->saveToJson();
        }
    }

    private function loadFromJson() {
        $file = __DIR__ . '/../data/pedidos.json';
        if (file_exists($file)) {
            $data = json_decode(file_get_contents($file), true);
            foreach ($data as $pedidoData) {
                $pedido = new Pedido($pedidoData['id']);
                // Reconstruir itens se necessário, mas para simplicidade, armazenar apenas dados
                $this->pedidos[$pedido->getId()] = $pedido;
            }
        }
    }

    private function saveToJson() {
        $file = __DIR__ . '/../data/pedidos.json';
        $data = [];
        foreach ($this->pedidos as $pedido) {
            $data[] = $pedido->toArray();
        }
        file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
    }
}

?>