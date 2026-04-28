<?php

class Produto {
    private $id;
    private $nome;
    private $preco;
    private $categoria;

    public function __construct($id, $nome, $preco, $categoria) {
        $this->id = $id;
        $this->nome = $nome;
        $this->preco = $preco;
        $this->categoria = $categoria;
    }

    public function getId() { return $this->id; }
    public function getNome() { return $this->nome; }
    public function getPreco() { return $this->preco; }
    public function getCategoria() { return $this->categoria; }
}

?>