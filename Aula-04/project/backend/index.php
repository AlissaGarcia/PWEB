<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, DELETE');
header('Access-Control-Allow-Headers: Content-Type');

require_once 'controllers/PedidoController.php';

$controller = new PedidoController();

$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['REQUEST_URI'];

if ($method === 'GET' && strpos($path, '/pedidos') !== false) {
    echo json_encode($controller->getPedidos());
} elseif ($method === 'POST' && strpos($path, '/pedidos') !== false) {
    $data = json_decode(file_get_contents('php://input'), true);
    echo json_encode($controller->criarPedido($data));
} elseif ($method === 'DELETE' && strpos($path, '/pedidos') !== false) {
    $id = basename($path);
    echo json_encode($controller->deletarPedido($id));
} else {
    http_response_code(404);
    echo json_encode(['error' => 'Endpoint not found']);
}

?>