<?php require __DIR__ . '/../layouts/header.php'; ?>
<h2>Pacientes</h2>
<p><a class="btn" href="index.php?entity=paciente&action=create">Nuevo paciente</a></p>
<table>
  <thead><tr><th>ID</th><th>DPI</th><th>Nombre</th><th>Sexo</th><th>Email</th><th>Acciones</th></tr></thead>
  <tbody>
  <?php foreach($pacientes as $p): ?>
    <tr>
      <td><?= $p['id'] ?></td>
      <td><?= htmlspecialchars($p['dpi']) ?></td>
      <td><?= htmlspecialchars($p['nombre'] . ' ' . $p['apellido']) ?></td>
      <td><?= $p['sexo'] ?></td>
      <td><?= htmlspecialchars($p['email']) ?></td>
      <td>
        <button class="btn">
        <a href="index.php?entity=paciente&action=edit&id=<?= $p['id'] ?>">Editar</a>
        </button>
        <form action="index.php?entity=paciente&action=delete" method="POST" style="display:inline">
          <input type="hidden" name="id" value="<?= $p['id'] ?>">
          <button class="btn" onclick="return confirm('¿Eliminar paciente?')">Eliminar</button>
        </form>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
<?php require __DIR__ . '/../layouts/footer.php'; ?>
