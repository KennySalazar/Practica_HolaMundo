<?php require __DIR__ . '/../layouts/header.php'; ?>
<h2>Editar resultados de orina (#<?= (int)$orden['id'] ?>)</h2>

<form method="POST" action="index.php?entity=examen&action=update_orina" class="row">
  <input type="hidden" name="orden_id" value="<?= (int)$orden['id'] ?>">

  <div><label>Color <input name="color" value="<?= htmlspecialchars($resultado['color'] ?? '', ENT_QUOTES, 'UTF-8') ?>"></label></div>
  <div><label>Aspecto <input name="aspecto" value="<?= htmlspecialchars($resultado['aspecto'] ?? '', ENT_QUOTES, 'UTF-8') ?>"></label></div>
  <div><label>pH <input name="ph" value="<?= htmlspecialchars($resultado['ph'] ?? '', ENT_QUOTES, 'UTF-8') ?>"></label></div>
  <div><label>Densidad <input name="densidad" value="<?= htmlspecialchars($resultado['densidad'] ?? '', ENT_QUOTES, 'UTF-8') ?>"></label></div>
  <div><label>Glucosa <input name="glucosa" value="<?= htmlspecialchars($resultado['glucosa'] ?? '', ENT_QUOTES, 'UTF-8') ?>"></label></div>
  <div><label>Proteínas <input name="proteinas" value="<?= htmlspecialchars($resultado['proteinas'] ?? '', ENT_QUOTES, 'UTF-8') ?>"></label></div>
  <div><label>Cetonas <input name="cetonas" value="<?= htmlspecialchars($resultado['cetonas'] ?? '', ENT_QUOTES, 'UTF-8') ?>"></label></div>
  <div><label>Bilirrubina <input name="bilirrubina" value="<?= htmlspecialchars($resultado['bilirrubina'] ?? '', ENT_QUOTES, 'UTF-8') ?>"></label></div>
  <div><label>Sangre oculta <input name="sangre_oculta" value="<?= htmlspecialchars($resultado['sangre_oculta'] ?? '', ENT_QUOTES, 'UTF-8') ?>"></label></div>
  <div><label>Nitritos <input name="nitritos" value="<?= htmlspecialchars($resultado['nitritos'] ?? '', ENT_QUOTES, 'UTF-8') ?>"></label></div>
  <div><label>Leucocitos <input name="leucocitos" value="<?= htmlspecialchars($resultado['leucocitos'] ?? '', ENT_QUOTES, 'UTF-8') ?>"></label></div>
  <label style="width:100%">Observaciones
    <textarea name="observaciones" rows="3"><?= htmlspecialchars($resultado['observaciones'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
  </label>

  <div><button class="btn btn2" type="submit">Guardar cambios</button></div>
</form>

<p style="margin-top:12px"><a class="btn" href="index.php?entity=examen&action=detalle_orina&id=<?= (int)$orden['id'] ?>">⬅️ Volver al detalle</a></p>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
