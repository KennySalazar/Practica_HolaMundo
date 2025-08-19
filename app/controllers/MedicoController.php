<?php
require_once __DIR__ . '/../models/Medico.php';

class MedicoController {
  public function index(): void {
    $modelo = new Medico();
    $medicos = $modelo->all();
    require __DIR__ . '/../views/medico/index.php';
  }

  public function create(): void {
    require __DIR__ . '/../views/medico/create.php';
  }

  public function store(): void {
    $m = new Medico();
    $m->create($_POST);
    header('Location: index.php?entity=medico&action=index');
  }

  public function edit(): void {
    $m = new Medico();
    $medico = $m->find((int)$_GET['id']);
    require __DIR__ . '/../views/medico/edit.php';
  }

  public function update(): void {
    $m = new Medico();
    $m->update((int)$_POST['id'], $_POST);
    header('Location: index.php?entity=medico&action=index');
  }

  public function delete(): void {
    $m = new Medico();
    $m->delete((int)$_POST['id']);
    header('Location: index.php?entity=medico&action=index');
  }
}
