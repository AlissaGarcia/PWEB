<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AcadSIS</title>
</head>
<body>
    <h1>Sistema de Classificação Acadêmica</h1>

     <?php
     echo "Bem-vindo ao Sistema de Classificação Acadêmica!<br>";
    
    $nota = readline("Digite sua nota: ");
    function verificarSituacao($nota) {
    if ($nota >= 7) {
        return "Aluno Aprovado";
    } elseif ($nota >= 5) {
        return "Aluno de Recuperação";
    } else {
        return "Aluno Reprovado";
    }
}
    
    $nota = isset($_GET['nota']) ? floatval($_GET['nota']) : 0;
    $situacao = verificarSituacao($nota);


    ?>

    <h2>Resultado Final</h2>

    <p><strong>Nota:</strong> <?php echo $nota; ?></p>
    <p><strong>Situação:</strong> <?php echo $situacao; ?></p>

    <h3>Notas de 0 até <?php echo $nota; ?>:</h3>
    <ul>
        <?php
        for ($i = 0; $i <= $nota; $i++) {
            echo "<li>$i</li>";
        }
        ?>
    </ul>


</body>
</html>