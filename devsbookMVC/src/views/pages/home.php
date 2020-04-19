<?= $render('header', ['loggedUser' => $loggedUser]) ?>

<section class="container main">

  <?= $render('sidebar', ['activeMenu' => 'home']) ?>

  <section class="feed mt-10">

    <div class="row">
      <div class="column pr-5">

        <?= $render('feed-editor', ['loggedUser' => $loggedUser]) ?>

        <?php foreach ($feed['posts'] as $feedItem): ?> 
          <?= $render('feed-item', ['data' => $feedItem, 'loggedUser' => $loggedUser]) ?>
        <?php endforeach; ?>

        <div class="feed-pagination">
          <?php for($i = 0; $i < $feed['pageCount']; $i++): ?>
            <a class="<?=($i == $feed['currentPage'] ? 'active' : '')?>" href="<?=$base?>/?page=<?=$i?>">
              <?= $i+1 ?>
            </a>
          <?php endfor; ?>
        </div>

      </div>

      <div class="column side pl-5">
        <?= $render('right-side') ?>
      </div>
    </div>

  </section>
</section>
  
<?= $render('footer') ?>