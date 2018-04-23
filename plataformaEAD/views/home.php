<h1>Seus Cursos</h1>

<?php foreach ($cursos as $curso) : ?>
    <a href="<?= BASE_URL ?>/cursos/entrar/<?= $curso['id_curso'] ?>"> 
        <div class="curso-item">
            <img src="<?= BASE_URL ?>/assets/images/cursos/<?= $curso['imagem'] ?>" width="260" height="150"><br><br>
            <strong><?= $curso['nome'] ?></strong>
            <?= $curso['descricao'] ?>
        </div>
    </a> 
<?php endforeach; ?>
