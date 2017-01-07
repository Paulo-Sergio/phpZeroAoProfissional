<fieldset>
    <legend>Adicionar um Foto</legend>

    <form method="POST" enctype="multipart/form-data">
        Titulo:<br>
        <input type="text" name="titulo"><br><br>

        Foto:<br>
        <input type="file" name="arquivo"><br><br>

        <input type="submit" value="Enviar Foto"/>
    </form>
</fieldset>

<br><br>

<?php foreach ($fotos as $foto): ?>
    <img src="<?= BASE_URL ?>/assets/images/galeria/<?= $foto['url'] ?>" width="300" /><br>
    <?= $foto['titulo'] ?>
    <hr/>
<?php endforeach; ?>