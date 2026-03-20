<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>14 PRÁTICAS DE LABORATÓRIO – PHP</title>
</head>
<body>

<?php
function contador() {
    static $numero = 0; // variável estática
    $numero++;
    echo $numero . "\n";
}

contador(); 
contador(); 
contador(); 


?>


</body>
</html>
