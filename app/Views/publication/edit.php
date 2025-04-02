<?php
        // Comparamos el id en sesión y el id de la publicación
        // Solo el usuario que creó la publicación la puede modificar o borrar
        if (session()->user === $post['user']) {
        ?>

<div class="container">
    <h2>Actualizar publicación</h2>
    <form action="<?= site_url('publication/edit/' . $post['id']) ?>" method="post">
        <div class="form-group">
            <textarea class="form-control" name="content" rows="3" placeholder="Escribe algo"><?= htmlspecialchars($post['content'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>

<?php
}
?>
