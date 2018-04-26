<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Meu Sistema</title>
        <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/style.css">
    </head>
    <body>
        
        <?php $this->loadViewInTemplate($viewName, $viewData) ?>
        
        <script src="<?= BASE_URL ?>/assets/js/jquery.min.js"></script>
        <script src="<?= BASE_URL ?>/assets/js/script.js"></script>
    </body>
</html>
