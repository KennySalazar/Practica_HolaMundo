<?php
require_once __DIR__ . '/../models/Paciente.php';

class PacienteController {
  public function index(): void {
    $modelo = new Paciente();
    $pacientes = $modelo->all();
    require __DIR__ . '/../views/paciente/index.php';
  }

  public function create(): void {
    require __DIR__ . '/../views/paciente/create.php';
  }

  public function store(): void {
    $m = new Paciente();
    $m->create($_POST);
    header('Location: index.php?entity=paciente&action=index');
  }

  public function edit(): void {
    $m = new Paciente();
    $paciente = $m->find((int)$_GET['id']);
    require __DIR__ . '/../views/paciente/edit.php';
  }

  public function update(): void {
    $m = new Paciente();
    $m->update((int)$_POST['id'], $_POST);
    header('Location: index.php?entity=paciente&action=index');
  }

  public function delete(): void {
    $m = new Paciente();
    $m->delete((int)$_POST['id']);
    header('Location: index.php?entity=paciente&action=index');
  }
}
