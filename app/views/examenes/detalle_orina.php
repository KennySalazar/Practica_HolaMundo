<?php require __DIR__ . '/../layouts/header.php'; ?>
<h2>Detalle examen de orina #<?= (int)$orden['id'] ?></h2>
<p><strong>Paciente:</strong> <?= htmlspecialchars(($orden['paciente_nombre'] ?? '').' '.($orden['paciente_apellido'] ?? '')) ?></p>
<p><strong>Médico:</strong> <?= htmlspecialchars(($orden['medico_nombre'] ?? '').' '.($orden['medico_apellido'] ?? '')) ?></p>
<p><strong>Fecha:</strong> <?= htmlspecialchars($orden['fecha'] ?? '') ?></p>

<?php if (!$resultado): ?>
  <p>No hay resultados guardados.</p>
<?php else: ?>
  <table>
    <tbody>
      <tr><th>Color</th><td><?= htmlspecialchars($resultado['color'] ?? '') ?></td></tr>
      <tr><th>Aspecto</th><td><?= htmlspecialchars($resultado['aspecto'] ?? '') ?></td></tr>
      <tr><th>pH</th><td><?= htmlspecialchars($resultado['ph'] ?? '') ?></td></tr>
      <tr><th>Densidad</th><td><?= htmlspecialchars($resultado['densidad'] ?? '') ?></td></tr>
      <tr><th>Glucosa</th><td><?= htmlspecialchars($resultado['glucosa'] ?? '') ?></td></tr>
      <tr><th>Proteínas</th><td><?= htmlspecialchars($resultado['proteinas'] ?? '') ?></td></tr>
      <tr><th>Cetonas</th><td><?= htmlspecialchars($resultado['cetonas'] ?? '') ?></td></tr>
      <tr><th>Bilirrubina</th><td><?= htmlspecialchars($resultado['bilirrubina'] ?? '') ?></td></tr>
      <tr><th>Sangre oculta</th><td><?= htmlspecialchars($resultado['sangre_oculta'] ?? '') ?></td></tr>
      <tr><th>Nitritos</th><td><?= htmlspecialchars($resultado['nitritos'] ?? '') ?></td></tr>
      <tr><th>Leucocitos</th><td><?= htmlspecialchars($resultado['leucocitos'] ?? '') ?></td></tr>
      <tr><th>Observaciones</th><td><?= nl2br(htmlspecialchars($resultado['observaciones'] ?? '')) ?></td></tr>
    </tbody>
  </table>
<?php endif; ?>

<p class="row" style="gap:12px;margin-top:16px">
  <a class="btn" href="index.php?entity=examen&action=edit_orina&id=<?= (int)$orden['id'] ?>">Editar</a>
  <a class="btn" href="index.php?entity=examen&action=index">Volver</a>
</p>
<?php require __DIR__ . '/../layouts/footer.php'; ?>
