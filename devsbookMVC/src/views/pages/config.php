<?= $render('header', ['loggedUser' => $loggedUser]) ?>

<section class="container main">

  <?= $render('sidebar',['activeMenu' =>'config']) ?>

  <section class="feed mt-10">
    <h1>Configurações</h1>

    <form action="<?=$base?>/config" method="POST" class="form-config">
      <?php if(!empty($flash)):?>
        <div class='flash'> <?php echo $flash;?></div>
      <?php endif;?> 
      <div class="form-config-file">
        <label>Novo Avatar:</label><br/>
        <input type="file" placeholder="Escolher arquivo" name="avatarFile"/><br/><br/>
        <label>Nova Capa:</label><br>
        <input type="file" placeholder="Escolher arquivo" name="coverFile"/>
      </div>
      <hr/>

      <div class="form-config-data">
        <label>Nome Completo</label><br/>
        <input type="text" name="name" id="name" value="<?=$loggedUser->name?>" /><br/>
        <label>Data de nascimento:</label><br/>
        <input type="text" name="birthdate" id="birthdate" value="<?=date('d/m/Y', strtotime($loggedUser->birthdate));  ?>" ><br/>
        <label>E-mail</label><br/>
        <input type="email" name="email" id="email" value="<?=$loggedUser->email;?>"/><br/>
        <label>Cidade:</label><br/>
        <input type="text" name="city" id="city" value="<?=$loggedUser->city;?>"/><br/>
        <label>Trabalho:</label><br/>
        <input type="text" name="work" id="work" value="<?=$loggedUser->work;?>"/><br/>
        <hr/><br/>
        <label>Nova Senha:</label><br/>                    
        <input type="password" name="password" id="password"/><br/>
        <label>Confirmar Nova Senha:</label><br/>
        <input type="password" name="newPassword" id="newPassword"/><br/>
        <input type="submit" class="button form-confir-input-submit" value="Salvar"/>
      </div>
    </form>
  </section>

</section>

<script src="https://unpkg.com/imask"></script>
<script>
  IMask(
    document.getElementById('birthdate'),
    {
      mask: '00/00/0000'
    }
  );
</script>

<?= $render('footer')?>;