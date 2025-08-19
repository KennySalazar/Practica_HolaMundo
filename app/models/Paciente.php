<?php
require_once __DIR__ . '/../../app/core/Database.php';

class Paciente {
  private PDO $db;
  public function __construct() { $this->db = (new Database())->pdo(); }

  public function all(): array {
    return $this->db->query("SELECT * FROM pacientes WHERE activo=1 ORDER BY id DESC")->fetchAll();
  }

  public function find(int $id): ?array {
    $st = $this->db->prepare("SELECT * FROM pacientes WHERE id=?");
    $st->execute([$id]);
    $row = $st->fetch();
    return $row ?: null;
  }

  public function create(array $d): int {
    $st = $this->db->prepare("INSERT INTO pacientes(dpi,nombre,apellido,sexo,fecha_nacimiento,telefono,email) VALUES (?,?,?,?,?,?,?)");
    $st->execute([
      $d['dpi'] ?? null, 
      $d['nombre'], 
      $d['apellido'], 
      $d['sexo'],
      $d['fecha_nacimiento'] ?? null, 
      $d['telefono'] ?? null, 
      $d['email'] ?? null
    ]);
    return (int)$this->db->lastInsertId();
  }

public function update(int $id, array $d): void {
  $st = $this->db->prepare(
    "UPDATE pacientes
     SET dpi=?, nombre=?, apellido=?, sexo=?, fecha_nacimiento=?, telefono=?, email=?
     WHERE id=?"
  );
  $st->execute([
    $d['dpi'] ?: null,
    $d['nombre'], 
    $d['apellido'], 
    $d['sexo'],
    $d['fecha_nacimiento'] ?: null,
    $d['telefono'] ?: null,
    $d['email'] ?: null,
    $id
  ]);
}

  public function delete(int $id): void {
    $st = $this->db->prepare("UPDATE pacientes SET activo=0 WHERE id=?");
    $st->execute([$id]);
  }
}
