<?php
session_start();

// proteção
if (!isset($_SESSION['logado'])) {
    header("Location: login.php");
    exit();
}

// função de validação 👇
function validar($nome, $email) {
    if (empty(trim($nome)) || empty(trim($email))) {
        return "Preencha todos os campos!";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Email inválido!";
    }
    return "";
}

// processar formulário
if (isset($_POST['nome']) && isset($_POST['email'])) {

    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $erro = validar($nome, $email);

    if ($erro == "") {
        $_SESSION['dados'][] = [
            "nome" => $nome,
            "email" => $email
        ];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Painel</title>
</head>
<body>

<h1>Bem-vindo ao Painel</h1>

<a href="logout.php">Sair</a>

<h2>Cadastrar Pessoa</h2>

<form method="post">
    Nome: <input type="text" name="nome"><br><br>
    Email: <input type="text" name="email"><br><br>
    <button type="submit">Cadastrar</button>
</form>

<?php
if (isset($erro) && $erro != "") {
    echo "<p style='color:red;'>$erro</p>";
}
?>

<h2>Registros Cadastrados</h2>

<?php
if (!empty($_SESSION['dados'])) {
    foreach ($_SESSION['dados'] as $index => $dado) {
        echo "Registro " . ($index + 1) . "<br>";
        echo "Nome: " . $dado['nome'] . "<br>";
        echo "Email: " . $dado['email'] . "<br><br>";
    }
} else {
    echo "Nenhum registro ainda.";
}
?>

</body>
</html>