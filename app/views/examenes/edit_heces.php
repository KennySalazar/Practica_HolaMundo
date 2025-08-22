<?php require __DIR__ . '/../layouts/header.php'; ?>
<h2>Editar resultados de Heces (#<?= (int)$orden['id'] ?>)</h2>

<form method="POST" action="index.php?entity=examen&action=update_heces" class="row">
  <input type="hidden" name="orden_id" value="<?= (int)$orden['id'] ?>">

  <div><label>Color <input name="color" value="<?= htmlspecialchars($resultado['color'] ?? '', ENT_QUOTES, 'UTF-8') ?>"></label></div>
  <div><label>Consistencia <input name="consistencia" value="<?= htmlspecialchars($resultado['consistencia'] ?? '', ENT_QUOTES, 'UTF-8') ?>"></label></div>
  <div><label>Moco<input name="moco" value="<?= htmlspecialchars($resultado['moco'] ?? '', ENT_QUOTES, 'UTF-8') ?>"></label></div>
  <div><label>Sangre Visible <input name="sangre_visible" value="<?= htmlspecialchars($resultado['sangre_visible'] ?? '', ENT_QUOTES, 'UTF-8') ?>"></label></div>
  <div><label>Ph <input name="ph" value="<?= htmlspecialchars($resultado['ph'] ?? '', ENT_QUOTES, 'UTF-8') ?>"></label></div>
  <div><label>Leucocitos <input name="leucocitos" value="<?= htmlspecialchars($resultado['leucocitos'] ?? '', ENT_QUOTES, 'UTF-8') ?>"></label></div>
  <div><label>Hematies <input name="hematies" value="<?= htmlspecialchars($resultado['hematies'] ?? '', ENT_QUOTES, 'UTF-8') ?>"></label></div>
  <div><label>Restos Alimenticios <input name="restos_alimenticios" value="<?= htmlspecialchars($resultado['restos_alimenticios'] ?? '', ENT_QUOTES, 'UTF-8') ?>"></label></div>
  <div><label>Parasitos <input name="parasitos" value="<?= htmlspecialchars($resultado['parasitos'] ?? '', ENT_QUOTES, 'UTF-8') ?>"></label></div>
  <label style="width:100%">Observaciones
    <textarea name="observaciones" rows="3"><?= htmlspecialchars($resultado['observaciones'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
  </label>

  <div><button class="btn btn2" type="submit">Guardar cambios</button></div>
</form>

<p style="margin-top:12px"><a class="btn" href="index.php?entity=examen&action=detalle_heces&id=<?= (int)$orden['id'] ?>">Volver al detalle</a></p>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
