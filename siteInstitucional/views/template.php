<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="<?=BASE_URL?>/assets/css/template.css"/>
        <title></title>
    </head>
    <body>
        <div class="topo">
            <div class="topo1"></div>
            <div class="banner"></div>
        </div>
        
        <div class="menu">
            <ul>
                <li><a href="<?=BASE_URL?>/">HOME</a></li>
                <li><a href="<?=BASE_URL?>/portfolio">PORTFOLIO</a></li>
                <li><a href="<?=BASE_URL?>/sobre">SOBRE</a></li>
                <li><a href="<?=BASE_URL?>/servicos">SERVIÇOS</a></li>
                <li><a href="<?=BASE_URL?>/contato">CONTATO</a></li>
            </ul>
        </div>

        <div class="container">
            <?php $this->loadViewInTemplate($viewName, $viewData) ?>
        </div>

        <div class="rodape">
            
        </div>
    </body>
</html>
