<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>10  PRÁTICAS DE LABORATÓRIO – PHP</title>
</head>
<body>

<?php

// Criando um array associativo representando uma pessoa
$pessoa = array(
    "nome" => "Alissa",
    "idade" => 22,
    "cidade" => "Boa Viagem",
    "profissao" => "Desenvolvedora"
);

// Imprimindo 
echo "<h2>Dados da Pessoa:</h2>";
echo "<p><strong>Nome:</strong> " . $pessoa["nome"] . "</p>";
echo "<p><strong>Idade:</strong> " . $pessoa["idade"] . "</p>";
echo "<p><strong>Cidade:</strong> " . $pessoa["cidade"] . "</p>";
echo "<p><strong>Profissão:</strong> " . $pessoa["profissao"] . "</p>";

?>

</body>
</html>
