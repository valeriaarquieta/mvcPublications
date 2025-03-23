<!-- <div class="container">
    <h2>Actualizar publicación</h2>
    <form action="<?= site_url('publication/edit') ?>" method="post">
        <div class="form-group">
            <input type="hidden" name="id" value="<?=$post['id']?>">
            <textarea class="form-control" name="content" rows="3" placeholder="Escribe algo"><?=$post['content']?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
    <br>
</div> -->

<div class="container">
    <h2>Actualizar publicación</h2>
    <form action="<?= site_url('publication/edit/' . $post['id']) ?>" method="post">
        <div class="form-group">
            <textarea class="form-control" name="content" rows="3" placeholder="Escribe algo"><?= htmlspecialchars($post['content'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>


