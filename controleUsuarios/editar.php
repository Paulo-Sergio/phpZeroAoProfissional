<?php
require './config.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = addslashes($_GET['id']);
}

/**
 * RECUPERANDO USUARIO PELO ID
 */
$sql = "SELECT * FROM usuarios WHERE id = '$id'";
$sql = $pdo->query($sql);

if ($sql->rowCount() > 0) {
    $usuario = $sql->fetch();
} else {
    header("Location: index.php");
}

/**
 * SALVANDO ALTERAÇÃO DO USUARIO
 */
if (isset($_POST['nome']) && !empty($_POST['nome'])) {
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);

    $sql = "UPDATE usuarios SET nome = '$nome', email = '$email' WHERE id = '$id'";
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
            <input type="text" name="nome" value="<?= $usuario['nome'] ?>"><br><br>

            E-mail:<br>
            <input type="text" name="email" value="<?= $usuario['email'] ?>"><br><br>

            <input type="submit" value="Atualizar">
        </form>
    </body>
</html>