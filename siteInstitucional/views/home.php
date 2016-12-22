<div class="home_sobre">
    <img src="" width="150" height="150" />
    <h4>Sobre</h4>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
</div>

<div class="home_portfolio">
    <h4>Meu Portfolio Recente</h4>
    <?php foreach ($portfolio as $item) : ?>
        <div class="portfolio_item">
            <img src="<?=BASE_URL?>/assets/portfolio/<?= $item['imagem'] ?>" />
        </div>
    <?php endforeach; ?>
    
    <div style="clear: both"></div>
</div>