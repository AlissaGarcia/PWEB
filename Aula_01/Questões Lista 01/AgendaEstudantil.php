<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>|Agendinha <3|</title>
</head>
<body>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $compromisso = $_POST["compromisso"];

    echo "<div class='resultado'>";
    echo "<h3>Sua agenda do dia</h3>";
    echo "<p>Nome: $nome</p>";
    echo "<p>E-mail: $email</p>";
    echo "<p>Compromisso: $compromisso</p>";
    echo "</div>";
}
?>

<style>
body {
    font-family: Arial, sans-serif;
    background-color: #fdf6f9;
    text-align: center;
}

form {
    background: #ffffff;
    padding: 20px;
    border-radius: 10px;
    width: 300px;
    margin: auto;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

input {
    width: 90%;
    padding: 8px;
    margin-top: 5px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

input[type="submit"] {
    background-color: #f7c6d9;
    border: none;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #f4a6c1;
}

.resultado {
    background: #ffffff;
    padding: 15px;
    border-radius: 10px;
    width: 300px;
    margin: 20px auto;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}
</style>

<form method="post">
    <h2>Agenda Estudantil</h2>

    Nome:<br>
    <input type="text" name="nome"><br><br>

    E-mail:<br>
    <input type="email" name="email"><br><br>

    Compromisso:<br>
    <input type="text" name="compromisso"><br><br>

    <input type="submit" value="Salvar">
</form>
</body>
</html>