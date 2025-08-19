<?php require __DIR__.'/../layouts/header.php'; ?>
<h2>Editar médico</h2>

<form method="POST" action="index.php?entity=medico&action=update" class="row">
  <input type="hidden" name="id" value="<?= (int)$medico['id'] ?>">

  <div><label>Colegiado
    <input name="colegiado" value="<?= htmlspecialchars($medico['colegiado'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
  </label></div>

  <div><label>Nombre
    <input name="nombre" required value="<?= htmlspecialchars($medico['nombre'], ENT_QUOTES, 'UTF-8') ?>">
  </label></div>

  <div><label>Apellido
    <input name="apellido" required value="<?= htmlspecialchars($medico['apellido'], ENT_QUOTES, 'UTF-8') ?>">
  </label></div>

  <div><label>Especialidad
    <input name="especialidad" value="<?= htmlspecialchars($medico['especialidad'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
  </label></div>

  <div><label>Teléfono
    <input name="telefono" value="<?= htmlspecialchars($medico['telefono'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
  </label></div>

  <div><label>Email
    <input type="email" name="email" value="<?= htmlspecialchars($medico['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
  </label></div>

  <div><button class="btn btn2" type="submit">Actualizar</button></div>
</form>

<?php require __DIR__.'/../layouts/footer.php'; ?>
