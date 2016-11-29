<?php
require './config.php';

if (isset($_POST['nome']) && !empty($_POST['nome'])) {
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $senha = md5(addslashes($_POST['senha']));
    
    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
    $pdo->query($sql);
    
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="POST">
            Nome:<br>
            <input type="text" name="nome"><br><br>

            E-mail:<br>
            <input type="text" name="email"><br><br>

            Senha:<br>
            <input type="password" name="senha"><br><br>

            <input type="submit" value="Cadastrar">
        </form>
    </body>
</html>
