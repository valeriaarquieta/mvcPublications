<?php setlocale(LC_TIME, "esp"); ?>
<?php
// Verificar que haya un usuario en sesión, de lo contrario no se muestra el formulario
if (isset(session()->user)) {

?>
    <div class="container">
        <?php foreach ($posts as $item): ?>
        <div class="card bg-light mb-3">
            <div class="card-body">
                <strong>Usuario</strong>
                <small><?= strftime("%A, %d de %B de %Y %I:%M", strtotime($item['posted_time'])); ?></small>
                <p class="card-text"><?= $item['content']; ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php setlocale(LC_TIME, "esp"); ?>
    <div class="container">

        <form action="publication/add" method="post">
            <div class="form-group">
                <textarea class="form-control" name="content" rows="3" placeholder="Escribe algo"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Publicar</button>
        </form>
        <br>
        <?php foreach ($posts as $item):  ?>
    <div class="card bg-light mb-3">
        <div class="card-body">
        <strong><?= $item['user_name']; ?></strong>
            <small><?= strftime("%A, %d de %B de %Y %I:%M", strtotime($item['posted_time'])); ?></small>
            <p class="card-text"><?= $item['content']; ?></p>
            <?php
        // Comparamos el id en sesión y el id de la publicación
        // Solo el usuario que creó la publicación la puede modificar o borrar
        if (session()->user === $item['user']) {
        ?>
            <a class="btn btn-primary" href="publication/edit/<?= $item['id'] ?>" role="button">Editar</a>
            <a class="btn btn-danger" href="publication/delete/<?= $item['id'] ?>" role="button">Borrar</a>
        <?php } ?>
        </div>
    </div>
    <?php endforeach; ?>

    </div>
<?php } ?>