<?php
require './config.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Controle de Usuários</title>
    </head>
    <body>
        <a href="adicionar.php">Adicionar Novo Usuário</a>
        <table border="1" width="100%">
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Ações</th>
            </tr>
            <?php
            $sql = "SELECT * FROM usuarios";
            $sql = $pdo->query($sql);
            if ($sql->rowCount() > 0) :
                foreach ($sql->fetchAll() as $usuario) :
                    ?>
                    <tr>
                        <td><?= $usuario["nome"] ?></td>
                        <td><?= $usuario["email"] ?></td>
                        <td>
                            <a href="editar.php?id=<?= $usuario["id"] ?>">Editar</a> - 
                            <a href="excluir.php?id=<?= $usuario["id"] ?>">Excluir</a>
                        </td>
                    </tr>
                    <?php
                endforeach;
            endif;
            ?>
        </table>
    </body>
</html>