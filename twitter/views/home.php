<div class="feed">
    <form method="POST" action="<?= BASE_URL ?>/home/postagem">
        <textarea name="msg" class="textareapost"></textarea><br>
        <input type="submit" value="Postar Mensagem">
    </form>

    <?php foreach ($feed as $item): ?>
    <strong><?= $item['nome'] ?></strong> - <?= date('d/m/Y H:i', strtotime($item['data_post'])) ?><br>
        <?= $item['mensagem'] ?>
        <hr>
    <?php endforeach; ?>
</div>
<div class="rightside">
    <h4>Relacionamentos</h4>
    <div class="rs_meio"><?= $qtd_seguidores ?><br>Seguidores</div>
    <div class="rs_meio"><?= $qtd_seguidos ?><br>Seguindo</div>
    <div style="clear: both"></div>

    <h4>Sugestão de Amigos</h4>
    <table border="0" width="100%">
        <tr>
            <td width="80%"></td>
            <td></td>
        </tr>
        <?php foreach ($sugestao as $usuario) : ?>
            <tr>
                <td><?= $usuario['nome'] ?></td>
                <td>
                    <?php if ($usuario['seguido'] == '0'): ?>
                        <a href="<?= BASE_URL ?>/home/seguir/<?= $usuario['id'] ?>">Seguir</a>
                    <?php else: ?>
                        <a href="<?= BASE_URL ?>/home/deseguir/<?= $usuario['id'] ?>">Deseguir</a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>