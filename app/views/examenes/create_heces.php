<?php require __DIR__ . '/../layouts/header.php'; ?>
<h2>Nuevo examen de heces</h2>

<form method="POST" action="index.php?entity=examen&action=store_heces">
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
    <div><label>Consistencia <input name="consistencia"></label></div>
    <div><label>Moco <input name="moco"></label></div>
    <div><label>Sangre Visible <input name="sangre_visible"></label></div>
    <div><label>pH <input name="ph"></label></div>
    <div><label>leucocitos <input name="leucocitos"></label></div>
    <div><label>Hematies <input name="hematies"></label></div>
    <div><label>Restos Alimenticios <input name="restos_alimenticios"></label></div>
    <div><label>Parasitos <input name="parasitos "></label></div>
  </div>
  <label>Observaciones
    <textarea name="observaciones" rows="3"></textarea>
  </label>

  <p><button class="btn btn2" type="submit">Guardar examen</button></p>
</form>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
