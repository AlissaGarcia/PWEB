<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>07 QUESTÕES PRÁTICAS DE LABORATÓRIO – PHP</title>
</head>
<body>

<?php

$verdadeiro = true;
$falso = false;

echo "Variáveis: verdadeiro = $verdadeiro, falso = $falso<br><br>";

echo "verdadeiro && falso: ";
var_dump($verdadeiro && $falso);

echo "verdadeiro && verdadeiro: ";
var_dump($verdadeiro && $verdadeiro);

echo "falso && falso: ";
var_dump($falso && $falso);

echo "<br>verdadeiro || falso: ";
var_dump($verdadeiro || $falso);

echo "verdadeiro || verdadeiro: ";
var_dump($verdadeiro || $verdadeiro);

echo "falso || falso: ";
var_dump($falso || $falso);

echo "<br>!verdadeiro: ";
var_dump(!$verdadeiro);

echo "!falso: ";
var_dump(!$falso);

echo "<br>!(verdadeiro && falso): ";
var_dump(!($verdadeiro && $falso));

echo "verdadeiro || (falso && verdadeiro): ";
var_dump($verdadeiro || ($falso && $verdadeiro));

?>

</body>
</html>
