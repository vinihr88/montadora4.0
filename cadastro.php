<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome  = $conn->real_escape_string($_POST["nome"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO clientes (nome, telefone) VALUES ('$nome', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registo efetuado com sucesso!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Erro: " . $conn->error . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="login-page">

<div class="login-panel">
    <h2>Registro de Admin</h2>

    <form method="POST" style="flex-direction: column;">
        <input type="text" name="nome" placeholder="Usuario" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit" style="margin-top: 10px;">Registar</button>
    </form>
    
    <p><a href="index.php">⬅ Voltar ao Login</a></p>
</div>

</body>
</html>
