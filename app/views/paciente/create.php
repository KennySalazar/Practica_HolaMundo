<?php require __DIR__ . '/../layouts/header.php'; ?>
<h2>Nuevo paciente</h2>
<form method="POST" action="index.php?entity=paciente&action=store" class="row">
  <div><label>DPI<input name="dpi"></label></div>
  <div><label>Nombre<input name="nombre" required></label></div>
  <div><label>Apellido<input name="apellido" required></label></div>
  <div>
    <label>Sexo
      <select name="sexo" required>
        <option value="Masculino">Masculino</option>
        <option value="Femenino">Femenino</option>
      </select>
    </label>
  </div>
  <div><label>Fecha nacimiento<input type="date" name="fecha_nacimiento"></label></div>
  <div><label>Teléfono<input name="telefono"></label></div>
  <div><label>Email<input type="email" name="email"></label></div>
  <div><button class="btn btn2" type="submit">Guardar</button></div>
</form>
<?php require __DIR__ . '/../layouts/footer.php'; ?>
