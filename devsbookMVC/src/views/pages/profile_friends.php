<?= $render('header', ['loggedUser' => $loggedUser]) ?>

<section class="container main">

  <?= $render('sidebar', ['activeMenu' => 'friends']) ?>

  <section class="feed">

    <div class="row">
      <div class="box flex-1 border-top-flat">
        <div class="box-body">
          <div class="profile-cover" style="background-image: url('<?=$base?>/media/covers/<?=$user->cover?>');"></div>
          <div class="profile-info m-20 row">
            <div class="profile-info-avatar">
              <img src="<?=$base?>/media/avatars/<?=$user->avatar?>" />
            </div>
            <div class="profile-info-name">
              <div class="profile-info-name-text"><?= $user->name ?></div>
              <div class="profile-info-location"><?= $user->city ?></div>
            </div>
            <div class="profile-info-data row">
              <?php if ($user->id != $loggedUser->id) : ?>
                <div class="profile-info-item m-width-20">
                  <a href="<?=$base?>/perfil/<?=$user->id?>/follow" class="button">
                    <?= ($isFollowing) ? 'Deixar de seguir' : 'Seguir' ?>
                  </a>
                </div>
              <?php endif ?>
              <div class="profile-info-item m-width-20">
                <div class="profile-info-item-n"><?= count($user->followers) ?></div>
                <div class="profile-info-item-s">Seguidores</div>
              </div>
              <div class="profile-info-item m-width-20">
                <div class="profile-info-item-n"><?= count($user->followings) ?></div>
                <div class="profile-info-item-s">Seguindo</div>
              </div>
              <div class="profile-info-item m-width-20">
                <div class="profile-info-item-n"><?= count($user->photos) ?></div>
                <div class="profile-info-item-s">Fotos</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="column">

        <div class="box">
          <div class="box-body">

            <div class="tabs">
              <div class="tab-item" data-for="followers">
                Seguidores
              </div>
              <div class="tab-item active" data-for="following">
                Seguindo
              </div>
            </div>
            <div class="tab-content">
              <div class="tab-body" data-item="followers">

                <div class="full-friend-list">
                  <div class="friend-icon">
                    <a href="">
                      <div class="friend-icon-avatar">
                        <img src="media/avatars/avatar.jpg" />
                      </div>
                      <div class="friend-icon-name">
                        Bonieky
                      </div>
                    </a>
                  </div>

                  <div class="friend-icon">
                    <a href="">
                      <div class="friend-icon-avatar">
                        <img src="media/avatars/avatar.jpg" />
                      </div>
                      <div class="friend-icon-name">
                        Bonieky
                      </div>
                    </a>
                  </div>

                  <div class="friend-icon">
                    <a href="">
                      <div class="friend-icon-avatar">
                        <img src="media/avatars/avatar.jpg" />
                      </div>
                      <div class="friend-icon-name">
                        Bonieky
                      </div>
                    </a>
                  </div>

                  <div class="friend-icon">
                    <a href="">
                      <div class="friend-icon-avatar">
                        <img src="media/avatars/avatar.jpg" />
                      </div>
                      <div class="friend-icon-name">
                        Bonieky
                      </div>
                    </a>
                  </div>

                  <div class="friend-icon">
                    <a href="">
                      <div class="friend-icon-avatar">
                        <img src="media/avatars/avatar.jpg" />
                      </div>
                      <div class="friend-icon-name">
                        Bonieky
                      </div>
                    </a>
                  </div>

                  <div class="friend-icon">
                    <a href="">
                      <div class="friend-icon-avatar">
                        <img src="media/avatars/avatar.jpg" />
                      </div>
                      <div class="friend-icon-name">
                        Bonieky
                      </div>
                    </a>
                  </div>

                  <div class="friend-icon">
                    <a href="">
                      <div class="friend-icon-avatar">
                        <img src="media/avatars/avatar.jpg" />
                      </div>
                      <div class="friend-icon-name">
                        Bonieky
                      </div>
                    </a>
                  </div>

                  <div class="friend-icon">
                    <a href="">
                      <div class="friend-icon-avatar">
                        <img src="media/avatars/avatar.jpg" />
                      </div>
                      <div class="friend-icon-name">
                        Bonieky
                      </div>
                    </a>
                  </div>
                </div>

              </div>
              <div class="tab-body" data-item="following">

                <div class="full-friend-list">
                  <div class="friend-icon">
                    <a href="">
                      <div class="friend-icon-avatar">
                        <img src="media/avatars/avatar.jpg" />
                      </div>
                      <div class="friend-icon-name">
                        Bonieky
                      </div>
                    </a>
                  </div>

                  <div class="friend-icon">
                    <a href="">
                      <div class="friend-icon-avatar">
                        <img src="media/avatars/avatar.jpg" />
                      </div>
                      <div class="friend-icon-name">
                        Bonieky
                      </div>
                    </a>
                  </div>

                  <div class="friend-icon">
                    <a href="">
                      <div class="friend-icon-avatar">
                        <img src="media/avatars/avatar.jpg" />
                      </div>
                      <div class="friend-icon-name">
                        Bonieky
                      </div>
                    </a>
                  </div>

                  <div class="friend-icon">
                    <a href="">
                      <div class="friend-icon-avatar">
                        <img src="media/avatars/avatar.jpg" />
                      </div>
                      <div class="friend-icon-name">
                        Bonieky
                      </div>
                    </a>
                  </div>

                  <div class="friend-icon">
                    <a href="">
                      <div class="friend-icon-avatar">
                        <img src="media/avatars/avatar.jpg" />
                      </div>
                      <div class="friend-icon-name">
                        Bonieky
                      </div>
                    </a>
                  </div>

                  <div class="friend-icon">
                    <a href="">
                      <div class="friend-icon-avatar">
                        <img src="media/avatars/avatar.jpg" />
                      </div>
                      <div class="friend-icon-name">
                        Bonieky
                      </div>
                    </a>
                  </div>

                  <div class="friend-icon">
                    <a href="">
                      <div class="friend-icon-avatar">
                        <img src="media/avatars/avatar.jpg" />
                      </div>
                      <div class="friend-icon-name">
                        Bonieky
                      </div>
                    </a>
                  </div>

                  <div class="friend-icon">
                    <a href="">
                      <div class="friend-icon-avatar">
                        <img src="media/avatars/avatar.jpg" />
                      </div>
                      <div class="friend-icon-name">
                        Bonieky
                      </div>
                    </a>
                  </div>

                  <div class="friend-icon">
                    <a href="">
                      <div class="friend-icon-avatar">
                        <img src="media/avatars/avatar.jpg" />
                      </div>
                      <div class="friend-icon-name">
                        Bonieky
                      </div>
                    </a>
                  </div>

                  <div class="friend-icon">
                    <a href="">
                      <div class="friend-icon-avatar">
                        <img src="media/avatars/avatar.jpg" />
                      </div>
                      <div class="friend-icon-name">
                        Bonieky
                      </div>
                    </a>
                  </div>
                </div>

              </div>
            </div>

          </div>
        </div>

      </div>
    </div>

  </section>


</section>
<?= $render('footer') ?>