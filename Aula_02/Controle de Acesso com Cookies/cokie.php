<?php
$nome = isset($_COOKIE['usuario']) ? $_COOKIE['usuario'] : null;

if (isset($_POST['nome'])) {
    $nome = $_POST['nome'];

    setcookie('usuario', $nome, time() + (7 * 24 * 60 * 60));

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>CookieSIS</title>
</head>
<body>

<h1>Sistema com Cookies</h1>

<?php if ($nome): ?>

    <h2>Bem-vindo de volta, <?php echo $nome; ?>!</h2>

<?php else: ?>

    <h2>Digite seu nome:</h2>

    <form method="post">
        <input type="text" name="nome" required>
        <button type="submit">Salvar</button>
    </form>

<?php endif; ?>

</body>
</html>