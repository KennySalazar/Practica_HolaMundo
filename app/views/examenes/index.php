<?php require __DIR__ . '/../layouts/header.php'; ?>
<h2>Órdenes y Exámenes</h2>
<p><a class="btn" href="index.php?entity=examen&action=create_orina">➕ Registrar examen de orina</a></p>
<br>
<p><a class="btn" href="index.php?entity=examen&action=create_heces">➕ Registrar examen de heces</a></p>
<table>
  <thead>
      <tr>
      <th>ID</th>
      <th>Fecha</th>
      <th>Tipo</th>
      <th>Paciente</th>
      <th>Médico</th>
      <th>Detalles</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($ordenes as $o): ?>
    <tr>
      <td><?= $o['id'] ?></td>
      <td><?= $o['fecha'] ?></td>
      <td><?= strtoupper($o['tipo']) ?></td>
      <td><?= htmlspecialchars($o['paciente_nombre'].' '.$o['paciente_apellido']) ?></td>
      <td><?= htmlspecialchars(($o['medico_nombre']??'').' '.($o['medico_apellido']??'')) ?></td>
      <td>
          <a href="index.php?entity=examen&action=<?= strtoupper($o['tipo']) === 'ORINA' ? 'detalle_orina' : 'detalle_heces' ?>&id=<?= $o['id'] ?>" 
            class="btn btn-info btn-sm">
            Ver detalle
          </a>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
<?php require __DIR__ . '/../layouts/footer.php'; ?>
