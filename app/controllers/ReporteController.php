<?php
require_once __DIR__ . '/../models/Orden.php';

class ReporteController {
  public function visitas(): void {
    $desde = $_GET['desde'] ?? null;
    $hasta = $_GET['hasta'] ?? null;

    $o = new Orden();
    $rows = $o->visitasPorPaciente($desde, $hasta);

    require __DIR__ . '/../views/reportes/visitas.php';
  }
}
