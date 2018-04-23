<html>
    <head>
        <meta charset="utf-8">
        <title>Login | EAD</title>

        <style type="text/css">
            body{
                margin: 0;
                padding: 0;
                font-family: sans-serif;
            }
            form{
                width: 300px;
                height: 300px;
                background-color: #DDD;
                margin: auto;
                margin-top: 30px;
                padding: 20px;
                border-radius: 10px;
            }
            input{
                width: 300px;
                padding: 15px;
                font-size: 14px;
                border: 2px solid #CCC;
            }
            h2{
                text-align: center;
            }
            div.msg {
                margin-top: 20px;
                text-align: center;
                color: red;
            }
        </style>
    </head>

    <body>
        

        <form method="POST">
            <h2>Login</h2>
            <input type="email" name="email" placeholder="E-mail"/><br><br>

            <input type="password" name="senha" placeholder="******"/><br><br>

            <input type="submit" value="Entrar"/>

            <?php if (!empty($msg)) : ?>
                <div class="msg"><?= $msg ?></div>
            <?php endif ?>
        </form>

    </body>
</html>