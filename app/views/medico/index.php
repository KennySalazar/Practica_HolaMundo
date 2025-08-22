<?php require __DIR__.'/../layouts/header.php'; ?>
<h2>Médicos</h2>
<p><a class="btn" href="index.php?entity=medico&action=create">Nuevo médico</a></p>

<table>
  <thead>
    <tr><th>ID</th><th>Colegiado</th><th>Nombre</th><th>Especialidad</th><th>Teléfono</th><th>Email</th><th>Acciones</th></tr>
  </thead>
  <tbody>
  <?php foreach ($medicos as $m): ?>
    <tr>
      <td><?= (int)$m['id'] ?></td>
      <td><?= htmlspecialchars($m['colegiado'] ?? '') ?></td>
      <td><?= htmlspecialchars($m['nombre'].' '.$m['apellido']) ?></td>
      <td><?= htmlspecialchars($m['especialidad'] ?? '') ?></td>
      <td><?= htmlspecialchars($m['telefono'] ?? '') ?></td>
      <td><?= htmlspecialchars($m['email'] ?? '') ?></td>
      <td>
        <button class="btn">
        <a href="index.php?entity=medico&action=edit&id=<?= (int)$m['id'] ?>">Editar</a>
        </button>
        <form action="index.php?entity=medico&action=delete" method="POST" style="display:inline">
          <input type="hidden" name="id" value="<?= (int)$m['id'] ?>">
          <button class="btn" onclick="return confirm('¿Eliminar médico?')">Eliminar</button>
        </form>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
<?php require __DIR__.'/../layouts/footer.php'; ?>
