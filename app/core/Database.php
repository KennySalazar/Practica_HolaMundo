<?php
class Database {
    private static ?PDO $connection = null;

    private function __construct() {}

    public static function getConnection(): PDO {
        if (self::$connection === null) {
            
            $config = require __DIR__ . '/../config/database.php';
            
            $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";

            try {
                
                self::$connection = new PDO($dsn, $config['user'], $config['pass']);

                
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
               
                die("Error en la conexión: " . $e->getMessage());
            }
        }
        
        return self::$connection;
    }
    

    //EVITA QUE NO SE PUEDA CLONAR LA CONEXIÓN
    private function __clone() {}

}
