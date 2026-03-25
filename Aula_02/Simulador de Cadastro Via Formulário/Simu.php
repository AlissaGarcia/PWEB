<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SimuSIS</title>
</head>
<body>
    <h1>Sistema de Cadastro Via Formulário</h1>

<form method="post">
    <h2>Quantos Alunos você deseja cadastrar?</h2>
    <input type="number" name="quantidade" min="1" max="100" required>
    <button type="submit">Enviar</button>
</form>

<form method="post">

    <h3>Digite os dados dos alunos:</h3>

    <?php
    $quantidade = isset($_POST['quantidade']) ? $_POST['quantidade'] : 0;
    for ($i = 0; $i < $quantidade; $i++) {
        echo "Aluno " . ($i+1) . ": ";
        echo "<input type='text' name='alunos[]'><br><br>";
        echo "<input type='email' name='emails[]'><br><br>";
        echo "<input type='text' name='cursos[]'><br><br>";
        echo "<input type='text' name='turnos[]'><br><br>";
    }
    ?>

    <button type="submit">Enviar Formulário</button>

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $alunos = $_POST['alunos'];
        $emails = $_POST['emails'];
        $cursos = $_POST['cursos'];
        $turnos = $_POST['turnos'];

        echo "<h2>Dados dos Alunos Cadastrados</h2>";

        foreach ($alunos as $index => $aluno) {
            echo "Aluno " . ($index + 1) . "<br>";
            echo "Nome: $aluno <br>";
            echo "Email: " . $emails[$index] . "<br>";
            echo "Curso: " . $cursos[$index] . "<br>";
            echo "Turno: " . $turnos[$index] . "<br><br>";
        }
    }

</form>


</body>
</html>