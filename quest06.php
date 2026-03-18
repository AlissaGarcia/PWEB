<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>06 QUESTÕES PRÁTICAS DE LABORATÓRIO – PHP</title>
</head>
<body>

<?php

$a = 10;
$b = "10";

echo "Comparações entre $a (int) e '$b' (string):<br><br>";

echo "10 == '10': ";
var_dump($a == $b);

echo "10 === '10': ";
var_dump($a === $b);

echo "10 != '10': ";
var_dump($a != $b);

echo "10 !== '10': ";
var_dump($a !== $b);

?>

</body>
</html>
