<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

$entity = $_GET['entity'] ?? 'home';
$action = $_GET['action'] ?? 'index';

try {
  switch ($entity) {
    case 'paciente':
      require_once __DIR__ . '/../app/controllers/PacienteController.php';
      $c = new PacienteController();
      break;
    case 'examen':
      require_once __DIR__ . '/../app/controllers/ExamenController.php';
      $c = new ExamenController();
      break;
    case 'medico':
      require_once __DIR__ . '/../app/controllers/MedicoController.php';
      $c = new MedicoController(); break;

    case 'home':
    default:
      require __DIR__ . '/../app/views/layouts/header.php';
      echo "<h2>Laboratorio Clínico Químico-Biológo</h2><p>Usa el menú para navegar.</p>";
      require __DIR__ . '/../app/views/layouts/footer.php';
      exit;
  }

  if (!method_exists($c, $action)) { throw new Exception("Acción no encontrada: $action"); }
  $c->$action();

} catch (Throwable $e) {
  http_response_code(500);
  echo "Error: ".$e->getMessage();
}
