<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>AcadSIS</title>
</head>
<body>

<h1>Sistema de Classificação Acadêmica</h1>

<form method="post">
    <label>Digite a nota:</label><br>
    <input>
    <button type="submit">Verificar</button>
</form>

<?php

function verificarSituacao($nota) {
    if ($nota >= 7 && $nota <= 10) {
        return "Aluno Aprovado";
    } elseif ($nota >= 5 && $nota < 7) {
        return "Aluno de Recuperação";
    } elseif ($nota <= 0) {
        return "Aluno Reprovado";
    } else {
        return "Nota inválida";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nota = floatval($_POST['nota']);
    $situacao = verificarSituacao($nota);

    echo "<h2>Resultado Final</h2>";
    echo "<p><strong>Nota:</strong> $nota</p>";
    echo "<p><strong>Situação:</strong> $situacao</p>";
}

?>

</body>
</html>