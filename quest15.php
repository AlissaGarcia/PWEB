<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>15 PRÁTICAS DE LABORATÓRIO – PHP</title>
</head>
<body>

<?php
class Carro {
    public $marca;

    function mostrarInfo() {
        echo "Marca: " . $this->marca . "\n";
    }
}

// Objeto da classe Carro
$meuCarro = new Carro();

// Definindo valores
$meuCarro->marca = "Fiat";

// Chamando o método
$meuCarro->mostrarInfo();


?>


</body>
</html>
