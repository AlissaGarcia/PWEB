<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>13 PRÁTICAS DE LABORATÓRIO – PHP</title>
</head>
<body>

<?php


$global = "GLOBAL";

function teste() {
    $local = "LOCAL";
    
    echo $local . "\n";   
    // echo $global;      // Erro, não acessa variável global direto
}

teste();

echo $global . "\n"; // Funciona (variável global fora da função)


?>


</body>
</html>
