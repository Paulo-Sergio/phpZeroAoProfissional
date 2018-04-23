<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>EAD</title>
        <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/template.css"/>
        <script type="text/javascript" src="<?= BASE_URL ?>/assets/js/jquery-3.1.0.min.js"></script>
        <script type="text/javascript" src="<?= BASE_URL ?>/assets/js/script.js"></script>
    </head>
    <body>

        <div class="topo">
            <a href="<?= BASE_URL ?>/login/logout">
                <div>Sair</div>
            </a>
            <div class="topo-usuario"><?= $viewData['info']->getNome() ?></div>
        </div>
        <?php $this->loadViewInTemplate($viewName, $viewData) ?>

    </body>
</html>
