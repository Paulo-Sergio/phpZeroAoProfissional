<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Meu Sistema</title>
        <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/style.css">
        <script src="<?= BASE_URL ?>/assets/js/script.js"></script>
    </head>
    <body>
        <h3>Topo do meu site</h3>
        <a href="<?= BASE_URL ?>">Home</a>
        <a href="<?= BASE_URL ?>/galeria">Galeria</a>
        <hr>

        <?php $this->loadViewInTemplate($viewName, $viewData) ?>

        <hr>
        <h3>Rodapé do meu site</h3>
    </body>
</html>
