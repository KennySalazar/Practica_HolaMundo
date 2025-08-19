<?php require __DIR__ . '/../layouts/header.php'; ?>
<h2>Detalle examen de Heces #<?= (int)$orden['id'] ?></h2>
<p><strong>Paciente:</strong> <?= htmlspecialchars(($orden['paciente_nombre'] ?? '').' '.($orden['paciente_apellido'] ?? '')) ?></p>
<p><strong>Médico:</strong> <?= htmlspecialchars(($orden['medico_nombre'] ?? '').' '.($orden['medico_apellido'] ?? '')) ?></p>
<p><strong>Fecha:</strong> <?= htmlspecialchars($orden['fecha'] ?? '') ?></p>

<?php if (!$resultado): ?>
  <p>No hay resultados guardados.</p>
<?php else: ?>
  <table>
    <tbody>
      <tr><th>Color</th><td><?= htmlspecialchars($resultado['color'] ?? '') ?></td></tr>
      <tr><th>Consistencia</th><td><?= htmlspecialchars($resultado['consistencia'] ?? '') ?></td></tr>
      <tr><th>Moco</th><td><?= htmlspecialchars($resultado['moco'] ?? '') ?></td></tr>
      <tr><th>Sangre Visible</th><td><?= htmlspecialchars($resultado['sangre_visible'] ?? '') ?></td></tr>
      <tr><th>Ph</th><td><?= htmlspecialchars($resultado['ph'] ?? '') ?></td></tr>
      <tr><th>Leucocitos</th><td><?= htmlspecialchars($resultado['leucocitos'] ?? '') ?></td></tr>
      <tr><th>Hematies</th><td><?= htmlspecialchars($resultado['hematies'] ?? '') ?></td></tr>
      <tr><th>Restos Alimenticios</th><td><?= htmlspecialchars($resultado['restos_alimenticios'] ?? '') ?></td></tr>
      <tr><th>Parasitos</th><td><?= htmlspecialchars($resultado['parasitos'] ?? '') ?></td></tr>
      <tr><th>Observaciones</th><td><?= nl2br(htmlspecialchars($resultado['observaciones'] ?? '')) ?></td></tr>
    </tbody>
  </table>
<?php endif; ?>

<p class="row" style="gap:12px;margin-top:16px">
  <a class="btn" href="index.php?entity=examen&action=edit_heces&id=<?= (int)$orden['id'] ?>">✏️ Editar</a>
  <a class="btn" href="index.php?entity=examen&action=index">⬅️ Volver</a>
</p>
<?php require __DIR__ . '/../layouts/footer.php'; ?>
