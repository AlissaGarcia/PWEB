<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>18 PRÁTICAS DE LABORATÓRIO – PHP</title>
</head>
<body>

<?php

$a = "Texto";
$b = "";
$c = 0;
$d = null;

// isset() verifica se a variável não é null
echo "isset(a): " . (isset($a) ? "true" : "false") . "\n";
echo "isset(d): " . (isset($d) ? "true" : "false") . "\n";

// empty() verifica se está vazia
echo "empty(a): " . (empty($a) ? "true" : "false") . "\n";
echo "empty(b): " . (empty($b) ? "true" : "false") . "\n";
echo "empty(c): " . (empty($c) ? "true" : "false") . "\n";
echo "empty(d): " . (empty($d) ? "true" : "false") . "\n";

?>


</body>
</html>
