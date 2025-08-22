<?php
require_once __DIR__ . '/../../app/core/Database.php';

class ResultadoHeces {
  private PDO $db;
  public function __construct() { $this->db = Database::getConnection(); }

  public function create(int $orden_id, array $d): int {
    $st = $this->db->prepare(
      "INSERT INTO resultados_heces(orden_id,color,consistencia,moco,sangre_visible,ph,leucocitos,hematies,restos_alimenticios,
      parasitos,observaciones)
       VALUES (?,?,?,?,?,NULLIF(?, ''),?,?,?,?,?)"
    );
    $st->execute([
      $orden_id,
      $d['color'] ?? null, $d['consistencia'] ?? null, $d['moco'] ?? null, $d['sangre_visible'] ?? null,
      $d['ph'] ?? (float)0, $d['leucocitos'] ?? null, $d['hematies'] ?? null, $d['restos_alimenticios'] ?? null,
      $d['parasitos'] ?? null, $d['observaciones'] ?? null
    ]);
    return (int)$this->db->lastInsertId();
  }

   
  public function findHeces(int $orden_id): ?array {
    $st = $this->db->prepare("SELECT * FROM resultados_heces WHERE orden_id=?");
    $st->execute([$orden_id]);
    $row = $st->fetch();
    return $row ?: null;
  }


  public function updateByOrdenHeces(int $orden_id, array $d): void {
    $sql = "UPDATE resultados_heces SET
      color=?, consistencia=?, moco=?, sangre_visible=?, ph=NULLIF(?, ''), leucocitos=?, hematies=?,
      restos_alimenticios=?, parasitos=?, observaciones=?
      WHERE orden_id=?";

    $st = $this->db->prepare($sql);
    $st->execute([
      $d['color'],
      $d['consistencia'],
      $d['moco'],            
      $d['sangre_visible'],
      $d['ph'],
      $d['leucocitos'],
      $d['hematies'],
      $d['restos_alimenticios'],
      $d['parasitos'],
      $d['observaciones'],
      $orden_id
    ]);
  }
}
