<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<h2>Editar paciente</h2>

<form method="POST" action="index.php?entity=paciente&action=update" class="row">
  <input type="hidden" name="id" value="<?= (int)$paciente['id'] ?>">
  <input type="hidden" name="csrf" value="<?= htmlspecialchars($_SESSION['csrf'] ?? '', ENT_QUOTES, 'UTF-8') ?>">

  <div><label>DPI
    <input name="dpi" value="<?= htmlspecialchars($paciente['dpi'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
  </label></div>

  <div><label>Nombre
    <input name="nombre" required value="<?= htmlspecialchars($paciente['nombre'], ENT_QUOTES, 'UTF-8') ?>">
  </label></div>

  <div><label>Apellido
    <input name="apellido" required value="<?= htmlspecialchars($paciente['apellido'], ENT_QUOTES, 'UTF-8') ?>">
  </label></div>

  <div><label>Sexo
    <select name="sexo" required>
      <option value="Masculino" <?= ($paciente['sexo']==='Masculino'?'selected':'') ?>>Masculino</option>
      <option value="Femenino"  <?= ($paciente['sexo']==='Femenino'?'selected':'')  ?>>Femenino</option>
    </select>
  </label></div>

  <div><label>Fecha de nacimiento
    <input type="date" name="fecha_nacimiento" value="<?= htmlspecialchars($paciente['fecha_nacimiento'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
  </label></div>

  <div><label>Teléfono
    <input name="telefono" value="<?= htmlspecialchars($paciente['telefono'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
  </label></div>

  <div><label>Email
    <input type="email" name="email" value="<?= htmlspecialchars($paciente['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
  </label></div>

  <?php /* Descomenta si tu tabla tiene password
  <div><label>Contraseña (dejar vacío para no cambiar)
    <input type="password" name="password" id="password">
  </label></div>
  */ ?>

  <div><button class="btn btn2" type="submit">Actualizar</button></div>
</form>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
