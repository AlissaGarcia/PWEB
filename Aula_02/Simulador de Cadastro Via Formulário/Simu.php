<?php
$quantidade = isset($_POST['quantidade']) ? $_POST['quantidade'] : 0;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>SimuSIS</title>
</head>
<body>

<h1>Sistema de Cadastro Via Formulário</h1>

<form method="post">
    <h2>Quantos Alunos você deseja cadastrar?</h2>
    <input type="number" name="quantidade" min="1" max="100" required>
    <button type="submit">Enviar</button>
</form>


<?php if ($quantidade > 0): ?>
<form method="post">
    <input type="hidden" name="quantidade" value="<?= $quantidade ?>">

    <h3>Digite os dados dos alunos:</h3>

    <?php for ($i = 0; $i < $quantidade; $i++): ?>
        Aluno <?= $i+1 ?> Nome:
        <input type="text" name="alunos[]" required><br><br>

        Email:
        <input type="email" name="emails[]" required><br><br>

        Curso:
        <input type="text" name="cursos[]" required><br><br>

        Turno:
        <input type="text" name="turnos[]" required><br><br>
    <?php endfor; ?>

    <button type="submit">Enviar Formulário</button>
</form>
<?php endif; ?>

<?php 
if (isset($_POST['alunos'])) {

    $alunos = $_POST['alunos'];
    $emails = $_POST['emails'];
    $cursos = $_POST['cursos'];
    $turnos = $_POST['turnos'];

    $erro = false;

    
    foreach ($alunos as $index => $aluno) {
        if (
            empty(trim($aluno)) ||
            empty(trim($emails[$index])) ||
            empty(trim($cursos[$index])) ||
            empty(trim($turnos[$index]))
        ) {
            $erro = true;
            break;
        }
    }

    if ($erro) {
        echo "<p style='color:red;'>Preencha todos os campos!</p>";
    } else {
        echo "<h2>Dados dos Alunos Cadastrados</h2>";

        foreach ($alunos as $index => $aluno) {
            echo "Aluno " . ($index + 1) . "<br>";
            echo "Nome: $aluno <br>";
            echo "Email: {$emails[$index]} <br>";
            echo "Curso: {$cursos[$index]} <br>";
            echo "Turno: {$turnos[$index]} <br><br>";
        }
    }
}
?>

</body>
</html>