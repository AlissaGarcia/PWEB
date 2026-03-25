<?php
session_start();

// proteção
if (!isset($_SESSION['logged_in'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Área Restrita</title>
</head>
<body>

<h1>Bem-vindo, <?php echo $_SESSION['usuario']; ?>!</h1>

<a href="logout.php">Sair</a>

</body>
</html>