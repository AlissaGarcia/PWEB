<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>11 QUESTÕES PRÁTICAS DE LABORATÓRIO – PHP</title>
</head>
<body>

<?php

// Array com alunos e suas notas
$alunos = array(
    "João" => 8.5,
    "Maria" => 9.0,
    "Carolina" => 7.5,
    "Alissa" => 10
);

// A nota do João
echo "<h2>Nota:</h2>";
echo "<p>A nota do João é: " . $alunos["João"] . "</p>";

?>

</body>
</html>
