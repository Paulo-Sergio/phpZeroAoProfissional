<h1>Meu Portfolio</h1>
<?php foreach ($portfolio as $item) : ?>
    <div class="portfolio_item">
        <img src="<?= BASE_URL ?>/assets/portfolio/<?= $item['imagem'] ?>" />
    </div>
<?php endforeach; ?>

<div style="clear: both"></div>
