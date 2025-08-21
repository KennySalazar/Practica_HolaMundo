<?php require __DIR__ . '/../layouts/header.php'; ?>

<h2>Reporte: Visitas por Paciente</h2>

<form method="GET" class="row" style="align-items:flex-end;gap:12px;margin:12px 0">
  <input type="hidden" name="entity" value="reporte">
  <input type="hidden" name="action" value="visitas">
  <label>Desde
    <input type="date" name="desde" value="<?= htmlspecialchars($_GET['desde'] ?? '') ?>">
  </label>
  <label>Hasta
    <input type="date" name="hasta" value="<?= htmlspecialchars($_GET['hasta'] ?? '') ?>">
  </label>
  <button class="btn">Aplicar</button>
  <button class="btn">
    <a href="index.php?entity=reporte&action=visitas">Limpiar</a>
  </button>
</form>

<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Paciente</th>
      <th>Visitas</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($rows as $r): ?>
      <tr>
        <td><?= (int)$r['id'] ?></td>
        <td><?= htmlspecialchars($r['apellido'].' '.$r['nombre']) ?></td>
        <td><strong><?= (int)$r['visitas'] ?></strong></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
