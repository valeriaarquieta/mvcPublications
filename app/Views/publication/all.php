<?php setlocale(LC_TIME, "esp"); ?>
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
        <strong>Usuario</strong>
        <small><?= strftime("%A, %d de %B de %Y %I:%M", strtotime($item['posted_time'])); ?></small>
        <p class="card-text"><?= $item['content']; ?></p>
        <a class="btn btn-primary" href="publication/edit/<?= $item['id'] ?>" role="button">Editar</a>
        <a class="btn btn-danger" href="publication/delete/<?= $item['id'] ?>" role="button">Borrar</a>
    </div>
</div>
<?php endforeach; ?>

</div>