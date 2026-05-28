<?php
class Database {
    private static $instance = null;
    private $connection;

    private function __construct() {
        // Cấu hình thông số kết nối
        $dsn = "mysql:host=localhost;dbname=ecommerce_db;charset=utf8mb4"; [cite: 62]
        $username = "root"; // Thay đổi theo máy của bạn
        $password = "";     // Thay đổi theo máy của bạn

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, [cite: 63]
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, [cite: 64]
            PDO::ATTR_EMULATE_PREPARES   => false, [cite: 66]
        ];

        try {
            $this->connection = new PDO($dsn, $username, $password, $options);
        } catch (PDOException $e) {
            die("Kết nối thất bại: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Database(); [cite: 79]
        }
        return self::$instance; [cite: 83]
    }

    public function getConnection() {
        return $this->connection; [cite: 90]
    }
}
?>