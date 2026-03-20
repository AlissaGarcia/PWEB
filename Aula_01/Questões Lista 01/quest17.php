<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>17 PRÁTICAS DE LABORATÓRIO – PHP</title>
</head>
<body>

<?php
$bool = true;

// Conversões
$inteiro = (int) $bool;
$string  = (string) $bool;
$float   = (float) $bool;

echo "Booleano: " . ($bool ? "true" : "false") . "\n";
echo "Inteiro: " . $inteiro . "\n";
echo "String: " . $string . "\n";
echo "Float: " . $float . "\n";
?>


</body>
</html>
