<?php
if (isset($_FILES['arquivo']) && !empty($_FILES['arquivo'])) {

    $qtdArquivos = count($_FILES['arquivo']['tmp_name']);
    if ($qtdArquivos > 0) {
        for ($i = 0; $i < $qtdArquivos; $i++) {

            $nomeArquivo = md5($_FILES['arquivo']['name'][$i] . time()) . '.jpg';

            move_uploaded_file($_FILES['arquivo']['tmp_name'][$i], 'arquivos/'.$nomeArquivo);
        }
        echo "Arquivos enviados com sucesso";
    }
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
            Arquivo:<br>
            <input type="file" name="arquivo[]" multiple><br><br>

            <input type="submit" value="Enviar arquivos">
        </form>
    </body>
</html>
