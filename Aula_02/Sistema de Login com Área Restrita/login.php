<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>LoginSIS</title>
</head>
<body>

<h1>Sistema de Login com Área Restrita</h1>

<form method="post">
    <h2>Faça seu Login</h2>

    Usuário:
    <input type="text" name="username" required><br><br>

    Senha:
    <input type="password" name="password" required><br><br>

    <button type="submit">Entrar</button>
</form>

<?php
if (isset($_POST['username']) && isset($_POST['password'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'admin' && $password === '1234') {
        $_SESSION['logged_in'] = true;
        $_SESSION['usuario'] = $username; // 👈 guarda o nome

        header('Location: area_restrita.php');
        exit();
    } else {
        echo "<p style='color:red;'>Usuário ou senha inválidos!</p>";
    }
}
?>

</body>
</html>