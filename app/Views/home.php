<div class="container">
    <?php if(isset(session()->login_error)) { ?>
        <div class="alert alert-danger" role="alert">
            <?=session()->login_error?>
        </div>
    <?php } ?>
    <h1>Página de inicio</h1>

<div class="container">
  <h2>Iniciar sesión</h2>
  <form action="user/login" method="post">
    <div class="form-group">
      <label for="login">Nombre de usuario</label>
      <input class="form-control" name="login">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Entrar</button>
  </form>
</div>

