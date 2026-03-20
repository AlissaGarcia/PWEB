<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>04 PRÁTICAS DE LABORATÓRIO – PHP</title>
</head>
<body>

<?php

$stringNumerica = "123.45";

// Conversão para int
$inteiro = (int) $stringNumerica;

// Conversão para float
$flutuante = (float) $stringNumerica;

// Conversão para bool
$booleano = (bool) $stringNumerica;

// Exibindo os valores e tipos
echo "String original: ";
var_dump($stringNumerica);

echo "Convertido para int: ";
var_dump($inteiro);

echo "Convertido para float: ";
var_dump($flutuante);

echo "Convertido para bool: ";
var_dump($booleano);

?>

</body>
</html>
