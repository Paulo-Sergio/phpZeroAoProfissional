<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2>Tela de Cadasro</h2>

        <strong>
            <?php
            if (!empty($aviso)) {
                echo $aviso;
            }
            ?>
        </strong>

        <form method="POST">
            Nome:<br>
            <input type="text" name="nome"><br><br>

            E-mail:<br>
            <input type="email" name="email"><br><br>

            Senha:<br>
            <input type="password" name="senha"><br><br>

            <input type="submit" value="Cadastrar">
        </form>
    </body>
</html>
