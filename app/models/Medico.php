<?php
require_once __DIR__ . '/../core/Database.php';

class Medico {
  private PDO $db;
  public function __construct() { $this->db = (new Database())->pdo(); }

  public function all(): array {
    return $this->db->query("SELECT * FROM medicos WHERE activo=1 ORDER BY id DESC")->fetchAll();
  }

  public function find(int $id): ?array {
    $st = $this->db->prepare("SELECT * FROM medicos WHERE id=?");
    $st->execute([$id]);
    $r = $st->fetch();
    return $r ?: null;
  }

  public function create(array $d): int {
    $st = $this->db->prepare(
      "INSERT INTO medicos(colegiado,nombre,apellido,especialidad,telefono,email)
       VALUES (?,?,?,?,?,?)"
    );
    $st->execute([
      $d['colegiado'] ?: null,
      $d['nombre'],
      $d['apellido'],
      $d['especialidad'] ?: null,
      $d['telefono'] ?: null,
      $d['email'] ?: null
    ]);
    return (int)$this->db->lastInsertId();
  }

  public function update(int $id, array $d): void {
    $st = $this->db->prepare(
      "UPDATE medicos
       SET colegiado=?, nombre=?, apellido=?, especialidad=?, telefono=?, email=?
       WHERE id=?"
    );
    $st->execute([
      $d['colegiado'] ?: null,
      $d['nombre'],
      $d['apellido'],
      $d['especialidad'] ?: null,
      $d['telefono'] ?: null,
      $d['email'] ?: null,
      $id
    ]);
  }

  public function delete(int $id): void {
    $this->db->prepare("UPDATE medicos SET activo=0 WHERE id=?")->execute([$id]);
  }
}
