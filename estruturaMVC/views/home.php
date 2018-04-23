<h1>Olá cliente: <?= $nome ?></h1>

<h3>Você tem <?= $quantidade ?> anúncios.</h3>

<ol>
    <?php foreach ($anuncios as $anuncio) : ?>
        <li><?= $anuncio['titulo'] ?></li>
    <?php endforeach ?>
</ol>

<img src="<?= BASE_URL ?>/assets/images/teste.png" alt="">