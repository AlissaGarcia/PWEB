<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>12 PRÁTICAS DE LABORATÓRIO – PHP</title>
</head>
<body>

<?php


$texto = "Alissa Garcia";

// Converter para maiúsculas
$maiusculo = strtoupper($texto);
echo "Maiúsculo: " . $maiusculo . "\n";

// Converter para minúsculas
$minusculo = strtolower($texto);
echo "Minúsculo: " . $minusculo . "\n";

// Tamanho da string
$tamanho = strlen($texto);
echo "Tamanho: " . $tamanho . "\n";

// Substituir parte do texto
$novoTexto = str_replace("Mundo", "PHP", $texto);
echo "Substituído: " . $novoTexto . "\n";

?>


</body>
</html>
