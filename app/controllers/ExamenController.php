<?php
require_once __DIR__ . '/../models/Orden.php';
require_once __DIR__ . '/../models/ResultadoOrina.php';
require_once __DIR__ . '/../models/ResultadoHeces.php';
require_once __DIR__ . '/../models/Paciente.php';
require_once __DIR__ . '/../models/Medico.php';

class ExamenController {
  public function index(): void {
    $o = new Orden();
    $ordenes = $o->all();
    require __DIR__ . '/../views/examenes/index.php';
  }

  public function create_orina(): void {
    $pacM = new Paciente();
    $medM = new Medico();
    $pacientes = $pacM->all();
    $medicos = $medM->all();
    require __DIR__ . '/../views/examenes/create_orina.php';
  }

  public function store_orina(): void {
    $o = new Orden();
    $orden_id = $o->create((int)$_POST['paciente_id'], $_POST['medico_id'] ? (int)$_POST['medico_id'] : null, 'orina');

    $r = new ResultadoOrina();
    $r->create($orden_id, $_POST);

    header('Location: index.php?entity=examen&action=index');
  }


// ---------- Detalle ----------
public function detalle_orina(): void {
  $orden_id = (int)($_GET['id'] ?? 0);
  if (!$orden_id) { http_response_code(400); exit('Falta id'); }

  $o = new Orden();
  $r = new ResultadoOrina();

  $orden = $o->find($orden_id);
  if (!$orden) { http_response_code(404); exit('Orden no encontrada'); }

  $resultado = $r->find($orden_id); 
  require __DIR__ . '/../views/examenes/detalle_orina.php';
}

// ---------- Editar ----------
public function edit_orina(): void {
  $orden_id = (int)($_GET['id'] ?? 0);
  if (!$orden_id) { http_response_code(400); exit('Falta id'); }

  $o = new Orden();
  $r = new ResultadoOrina();

  $orden = $o->find($orden_id);
  if (!$orden) { http_response_code(404); exit('Orden no encontrada'); }

  $resultado = $r->find($orden_id); 
  require __DIR__ . '/../views/examenes/edit_orina.php';
}

// ---------- Update ----------
public function update_orina(): void {
  $orden_id = (int)($_POST['orden_id'] ?? 0);
  if (!$orden_id) { http_response_code(400); exit('Falta orden_id'); }

  $r = new ResultadoOrina();
  $r->updateByOrden($orden_id, $_POST);

  header('Location: index.php?entity=examen&action=detalle_orina&id=' . $orden_id);
}



    public function create_heces(): void {
    $pacM = new Paciente();
    $medM = new Medico();
    $pacientes = $pacM->all();
    $medicos = $medM->all();
    require __DIR__ . '/../views/examenes/create_heces.php';
  }

    public function store_heces(): void {
    $o = new Orden();
    $orden_id = $o->create((int)$_POST['paciente_id'], $_POST['medico_id'] ? (int)$_POST['medico_id'] : null, 'heces');

    $r = new ResultadoHeces();
    $r->create($orden_id, $_POST);

    header('Location: index.php?entity=examen&action=index');
  }

  // ---------- Detalle ----------
public function detalle_heces(): void {
  $orden_id = (int)($_GET['id'] ?? 0);
  if (!$orden_id) { http_response_code(400); exit('Falta id'); }

  $o = new Orden();
  $r = new ResultadoHeces();

  $orden = $o->find($orden_id);
  if (!$orden) { http_response_code(404); exit('Orden no encontrada'); }

  $resultado = $r->findHeces($orden_id); 
  require __DIR__ . '/../views/examenes/detalle_heces.php';
}

// ---------- Editar ----------
public function edit_heces(): void {
  $orden_id = (int)($_GET['id'] ?? 0);
  if (!$orden_id) { http_response_code(400); exit('Falta id'); }

  $o = new Orden();
  $r = new ResultadoHeces();

  $orden = $o->find($orden_id);
  if (!$orden) { http_response_code(404); exit('Orden no encontrada'); }

  $resultado = $r->findHeces($orden_id); 
  require __DIR__ . '/../views/examenes/edit_heces.php';
}

// ---------- Update ----------
public function update_heces(): void {
  $orden_id = (int)($_POST['orden_id'] ?? 0);
  if (!$orden_id) { http_response_code(400); exit('Falta orden_id'); }

  $r = new ResultadoHeces();
  $r->updateByOrdenHeces($orden_id, $_POST);

  header('Location: index.php?entity=examen&action=detalle_heces&id=' . $orden_id);
}



}
