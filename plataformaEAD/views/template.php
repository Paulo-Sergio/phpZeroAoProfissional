<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>EAD</title>
        <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/template.css"/>
    </head>
    <body>

        <div class="topo">
            <a href="<?= BASE_URL ?>login/logout">
                <div>Sair</div>
            </a>
            <div class="topo-usuario"><?= $viewData['info']->getNome() ?></div>
        </div>
        <?php $this->loadViewInTemplate($viewName, $viewData) ?>

    </body>
</html>
