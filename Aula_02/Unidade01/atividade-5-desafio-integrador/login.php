<?php
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {

    $user = $_POST['username'];
    $pass = $_POST['password'];

    if ($user === "admin" && $pass === "1234") {
        $_SESSION['logado'] = true;
        $_SESSION['dados'] = []; // array para armazenar os cadastros

        header("Location: painel.php");
        exit();
    } else {
        $erro = "Usuário ou senha inválidos!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h1>Login</h1>

<form method="post">
    Usuário: <input type="text" name="username" required><br><br>
    Senha: <input type="password" name="password" required><br><br>
    <button type="submit">Entrar</button>
</form>

<?php if (isset($erro)) echo "<p style='color:red;'>$erro</p>"; ?>

</body>
</html>