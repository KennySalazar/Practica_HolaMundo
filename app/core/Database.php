<?php
class Database {
    // 1. Propiedad estática donde guardaremos la única conexión PDO
    private static ?PDO $connection = null;

    // 2. Constructor privado para que nadie pueda hacer "new Database()"
    private function __construct() {}

    // 3. Método público y estático que devuelve la conexión única
    public static function getConnection(): PDO {
        // 4. Si todavía no se creó la conexión...
        if (self::$connection === null) {
            // 5. Leemos la configuración de database.php
            $config = require __DIR__ . '/../config/database.php';
            
            // 6. Creamos el DSN (dirección de conexión)
            $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";

            try {
                // 7. Creamos la conexión PDO
                self::$connection = new PDO($dsn, $config['user'], $config['pass']);

                // 8. Configuramos que PDO lance excepciones si hay error
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                // 9. Si falla, detenemos el script mostrando el error
                die("Error en la conexión: " . $e->getMessage());
            }
        }
        // 10. Retornamos siempre la misma conexión
        return self::$connection;
    }
    // 11. Método __clone privado para evitar que se clone la instancia Singleton

    // Clonador privado para evitar la clonación de la instancia Singleton
    private function __clone() {}

    // Método __wakeup privado para evitar la deserialización de la instancia Singleton
    //private function __wakeup() {}
}
