<?php
require_once __DIR__ . '/../../app/core/Database.php';

class Orden {
  private PDO $db;
  public function __construct() { $this->db = Database::getConnection();}

  public function all(): array {
    $sql = "SELECT o.*, p.nombre AS paciente_nombre, p.apellido AS paciente_apellido,
                   m.nombre AS medico_nombre, m.apellido AS medico_apellido
            FROM ordenes o
            JOIN pacientes p ON p.id=o.paciente_id
            LEFT JOIN medicos m ON m.id=o.medico_id
            ORDER BY o.id DESC";
    return $this->db->query($sql)->fetchAll();
  }

  public function create(int $paciente_id, ?int $medico_id, string $tipo): int {
    $st = $this->db->prepare("INSERT INTO ordenes(paciente_id, medico_id, tipo) VALUES (?,?,?)");
    $st->execute([$paciente_id, $medico_id, $tipo]);
    return (int)$this->db->lastInsertId();
  }

    // Obtener una orden por id
  public function find(int $id): ?array {
    $sql = "SELECT o.*,
                   p.nombre  AS paciente_nombre, p.apellido AS paciente_apellido,
                   m.nombre  AS medico_nombre,   m.apellido AS medico_apellido
            FROM ordenes o
            JOIN pacientes p ON p.id = o.paciente_id
            LEFT JOIN medicos m ON m.id = o.medico_id
            WHERE o.id = ?
            LIMIT 1";
    $st = $this->db->prepare($sql);
    $st->execute([$id]);
    $row = $st->fetch();
    return $row ?: null;
  }

  public function visitasPorPaciente(?string $desde = null, ?string $hasta = null): array {
  $params = [];
  $where  = '';

  if ($desde && $hasta) {
    $where = 'WHERE o.fecha BETWEEN ? AND ?';
    $params[] = $desde;
    $params[] = $hasta;
  } elseif ($desde) {
    $where = 'WHERE o.fecha >= ?';
    $params[] = $desde;
  } elseif ($hasta) {
    $where = 'WHERE o.fecha <= ?';
    $params[] = $hasta;
  }

  $sql = "
    SELECT
      p.id,
      p.nombre,
      p.apellido,
      COUNT(o.id) AS visitas
    FROM pacientes p
    LEFT JOIN ordenes o ON o.paciente_id = p.id
    $where
    GROUP BY p.id, p.nombre, p.apellido
    ORDER BY visitas DESC, p.apellido ASC, p.nombre ASC
  ";

  $st = $this->db->prepare($sql);
  $st->execute($params);
  return $st->fetchAll();
}


  
}
