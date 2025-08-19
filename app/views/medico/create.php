<?php require __DIR__.'/../layouts/header.php'; ?>
<h2>Nuevo médico</h2>

<form method="POST" action="index.php?entity=medico&action=store" class="row">
  <div><label>Colegiado <input name="colegiado"></label></div>
  <div><label>Nombre <input name="nombre" required></label></div>
  <div><label>Apellido <input name="apellido" required></label></div>
  <div><label>Especialidad <input name="especialidad"></label></div>
  <div><label>Teléfono <input name="telefono"></label></div>
  <div><label>Email <input type="email" name="email"></label></div>
  <div><button class="btn btn2" type="submit">Guardar</button></div>
</form>

<?php require __DIR__.'/../layouts/footer.php'; ?>
