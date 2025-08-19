<?php
require_once __DIR__ . '/../../app/core/Database.php';

class ResultadoOrina {
  private PDO $db;
  public function __construct() { $this->db = (new Database())->pdo(); }

  public function create(int $orden_id, array $d): int {
    $st = $this->db->prepare(
      "INSERT INTO resultados_orina(orden_id,color,aspecto,ph,densidad,glucosa,proteinas,cetonas,bilirrubina,sangre_oculta,nitritos,leucocitos,observaciones)
       VALUES (?,?,?,NULLIF(?, ''),?,?,?,?,?,?,?,?,?)"
    );
    $st->execute([
      $orden_id,
      $d['color'] ?? null, $d['aspecto'] ?? null, $d['ph'] ?? (float)0, $d['densidad'] ?? null,
      $d['glucosa'] ?? null, $d['proteinas'] ?? null, $d['cetonas'] ?? null, $d['bilirrubina'] ?? null,
      $d['sangre_oculta'] ?? null, $d['nitritos'] ?? null, $d['leucocitos'] ?? null, $d['observaciones'] ?? null
    ]);
    return (int)$this->db->lastInsertId();
  }

    // OBTENER por orden
  public function find(int $orden_id): ?array {
    $st = $this->db->prepare("SELECT * FROM resultados_orina WHERE orden_id=?");
    $st->execute([$orden_id]);
    $row = $st->fetch();
    return $row ?: null;
  }

  // ACTUALIZAR 
  public function updateByOrden(int $orden_id, array $d): void {
    $sql = "UPDATE resultados_orina SET
      color=?, aspecto=?,  ph=NULLIF(?, ''), densidad=?, glucosa=?, proteinas=?, cetonas=?,
      bilirrubina=?, sangre_oculta=?, nitritos=?, leucocitos=?, observaciones=?
      WHERE orden_id=?";

    $st = $this->db->prepare($sql);
    $st->execute([
      $d['color'],
      $d['aspecto'],
      $d['ph'],            
      $d['densidad'],
      $d['glucosa'],
      $d['proteinas'],
      $d['cetonas'],
      $d['bilirrubina'],
      $d['sangre_oculta'],
      $d['nitritos'],
      $d['leucocitos'],
      $d['observaciones'],
      $orden_id
    ]);
  }
}
