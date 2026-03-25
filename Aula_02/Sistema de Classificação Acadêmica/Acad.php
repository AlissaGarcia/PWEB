<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>AcadSIS</title>
</head>
<body>

<h1>Sistema de Classificação Acadêmica</h1>

<form method="post">
    <h2>Quantas Notas Deseja Inserir?</h2>
    <input type="number" name="quantidade" min="1" max="100" required>
    <button type="submit">Enviar</button>
</form>

<form method="post">

    <h3>Digite as notas dos alunos:</h3>

    <?php
    $quantidade = isset($_POST['quantidade']) ? $_POST['quantidade'] : 0;
    for ($i = 0; $i < $quantidade; $i++) {
        echo "Aluno " . ($i+1) . ": ";
        echo "<input type='text' name='notas[]'><br><br>";
    }
    ?>

    <button type="submit">Verificar</button>
</form>

<?php

function verificarSituacao($nota) {
    if ($nota >= 7 && $nota <= 10) {
        return "Aprovado";
    } elseif ($nota >= 5 && $nota < 7) {
        return "Recuperação";
    } elseif ($nota >= 0 && $nota < 5) {
        return "Reprovado";
    } else {
        return "Inválida";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $notas = $_POST['notas']; // vetor

    echo "<h2>Resultado Final</h2>";

    foreach ($notas as $index => $nota) {
        $situacao = verificarSituacao($nota);

        echo "Aluno " . ($index + 1) . "<br>";
        echo "Nota: $nota <br>";
        echo "Situação: $situacao <br><br>";
    }
}

?>

</body>
</html>