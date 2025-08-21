<?php

    namespace system\core\Database;

    use PDO;
    use PDOException;

    class Database {
        private static $connection;

        protected function __construct() {

        }

        private function __clone(): void {

        }

        public static function getInstance(): PDO {
            if (empty(self::$connection)) {
                try {
                    self::$connection = new PDO('mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME, DB_USER, DB_PASS, [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                        PDO::ATTR_CASE => PDO::CASE_NATURAL
                    ]);
                } catch (PDOException $e) {
                    die('Erro de conexão: ' . $e->getMessage());
                }
            }

            return self::$connection;
        }
    }
?>