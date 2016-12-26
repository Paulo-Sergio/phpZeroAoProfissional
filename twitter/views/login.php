<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2>Tela de Login</h2>
        <form method="POST">
            E-mail:<br>
            <input type="email" name="email"><br><br>

            Senha:<br>
            <input type="password" name="senha"><br><br>

            <input type="submit" value="Entrar">
            <a href="<?= BASE_URL ?>/login/cadastro">Cadastre-se</a>
        </form>
    </body>
</html>
