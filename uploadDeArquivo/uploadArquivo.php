<?php
if (isset($_FILES['arquivo']) && !empty($_FILES['arquivo'])) {
    $arquivo = $_FILES['arquivo'];

    // gerando um nome aleatorio
    $nomeArquivo = md5(time() . rand(0, 99)) . '.jpg';
    move_uploaded_file($arquivo['tmp_name'], 'arquivos/' . $nomeArquivo);

    echo 'Arquivo enviado com sucesso!';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="POST" enctype="multipart/form-data">
            <input type="file" name="arquivo"><br><br>

            <input type="submit" value="Enviar">
        </form>
    </body>
</html>
