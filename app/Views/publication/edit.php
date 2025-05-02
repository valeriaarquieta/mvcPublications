<?php
        // Comparamos el id en sesión y el id de la publicación
        // Solo el usuario que creó la publicación la puede modificar o borrar
        if (session()->user === $post['user']) {
        ?>

<div class="container">

    <div class="container">
    <h2>Actualizar publicación</h2>
    <form action="<?= site_url('publication/edit/' . $post['id']) ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <textarea class="form-control" name="content" rows="3" placeholder="Escribe algo"><?= htmlspecialchars($post['content'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
        </div>
        <div class="form-group">
            <label>Imagen actual:</label><br>
            <?php if (!empty($post['image'])): ?>
                <img src="<?= base_url($post['image']); ?>" class="img-fluid" alt="Imagen publicada" width="200"><br>
            <?php endif; ?>
            <input type="file" class="form-control" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>

</div>

<?php
}
?>
