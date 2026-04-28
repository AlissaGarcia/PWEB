<?php

require_once '../models/Produto.php';

class ProdutoFactory {
    public static function criarProduto($tipo) {
        switch ($tipo) {
            case 'pastel':
                return new Produto(1, 'Pastel', 5.00, 'salgado');
            case 'caldo':
                return new Produto(2, 'Caldo', 8.00, 'salgado');
            case 'refrigerante':
                return new Produto(3, 'Refrigerante', 4.00, 'bebida');
            case 'suco':
                return new Produto(4, 'Suco', 3.00, 'bebida');
            default:
                throw new Exception('Produto desconhecido');
        }
    }
}

?>