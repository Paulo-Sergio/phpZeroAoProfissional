<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Meu Sistema</title>
        <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/style.css">
    </head>
    <body>
        <nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<a href="<?= BASE_URL ?>" class="navbar-brand">Classificados</a>
				</div>
				<ul class="nav navbar-nav navbar-right">
					<?php if(isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])): ?>
						<li><a href="<?= BASE_URL ?>/anuncios">Meus Anúncios</a></li>
						<li><a href="<?= BASE_URL ?>/login/sair">Sair</a></li>
					<?php else: ?>
						<li><a href="<?= BASE_URL ?>/cadastrar">Cadastre-se</a></li>
						<li><a href="<?= BASE_URL ?>/login">Login</a></li>
					<?php endif; ?>
				</ul>
			</div>
		</nav>

        <?php $this->loadViewInTemplate($viewName, $viewData) ?>
        
        <script src="<?= BASE_URL ?>/assets/js/jquery.min.js"></script>
        <script src="<?= BASE_URL ?>/assets/js/bootstrap.min.js"></script>
        <script src="<?= BASE_URL ?>/assets/js/script.js"></script>
    </body>
</html>
