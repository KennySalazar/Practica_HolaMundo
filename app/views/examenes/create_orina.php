<?php require __DIR__ . '/../layouts/header.php'; ?>
<h2>Nuevo examen de orina</h2>

<form method="POST" action="index.php?entity=examen&action=store_orina">
  <div class="row">
    <div>
      <label>Paciente
        <select name="paciente_id" required>
          <option value="">-- seleccione --</option>
          <?php foreach($pacientes as $p): ?>
            <option value="<?= $p['id'] ?>"><?= htmlspecialchars($p['nombre'].' '.$p['apellido']) ?></option>
          <?php endforeach; ?>
        </select>
      </label>
    </div>
    <div>
      <label>Médico (opcional)
        <select name="medico_id">
          <option value="">-- ninguno --</option>
          <?php foreach($medicos as $m): ?>
            <option value="<?= $m['id'] ?>"><?= htmlspecialchars($m['nombre'].' '.$m['apellido']) ?></option>
          <?php endforeach; ?>
        </select>
      </label>
    </div>
  </div>

  <h3>Parámetros</h3>
  <div class="row">
    <div><label>Color <input name="color"></label></div>
    <div><label>Aspecto <input name="aspecto"></label></div>
    <div><label>pH <input name="ph"></label></div>
    <div><label>Densidad <input name="densidad"></label></div>
    <div><label>Glucosa <input name="glucosa"></label></div>
    <div><label>Proteínas <input name="proteinas"></label></div>
    <div><label>Cetonas <input name="cetonas"></label></div>
    <div><label>Bilirrubina <input name="bilirrubina"></label></div>
    <div><label>Sangre oculta <input name="sangre_oculta"></label></div>
    <div><label>Nitritos <input name="nitritos"></label></div>
    <div><label>Leucocitos <input name="leucocitos"></label></div>
  </div>
  <label>Observaciones
    <textarea name="observaciones" rows="3"></textarea>
  </label>

  <p><button class="btn btn2" type="submit">Guardar examen</button></p>
</form>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
