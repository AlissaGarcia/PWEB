<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>16 PRÁTICAS DE LABORATÓRIO – PHP</title>
</head>
<body>

<?php


$numero = 5;

// Incremento
echo "Valor inicial: " . $numero . "\n";

echo "Pré-incremento (++\$numero): " . ++$numero . "\n"; // incrementa antes
echo "Pós-incremento (\$numero++): " . $numero++ . "\n"; // mostra primeiro, depois incrementa

echo "Depois do pós-incremento: " . $numero . "\n";

// Decremento
echo "Pré-decremento (--\$numero): " . --$numero . "\n"; // decrementa antes
echo "Pós-decremento (\$numero--): " . $numero-- . "\n"; // mostra primeiro, depois decrementa

echo "Valor final: " . $numero . "\n";


?>


</body>
</html>
