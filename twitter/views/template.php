<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/template.css"/>
        <script type="text/javascript" src="<?= BASE_URL ?>/assets/js/jquery-3.0.0.min.js"></script>
        <script type="text/javascript" src="<?= BASE_URL ?>/assets/js/script.js"></script>
        <title>TWITTER - Simulado</title>
    </head>
    <body>
        <div class="topo">
            <div class="topoint">
                <div class="topoleft">TWITTER</div>
                <div class="toporight"><?php echo "Nome" ?> - <a href="<?= BASE_URL ?>/login/logout">Sair</a></div>
                <div style="clear:both"></div>
            </div>
        </div>

        <div class="container">
            <?php $this->loadViewInTemplate($viewName, $viewData) ?>
        </div>
    </body>
</html>