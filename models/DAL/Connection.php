<?php
    class Connection {
        private PDO $connection;

        public function __construct() {
            $this->connection = new PDO('mysql:host=localhost;dbname=school_management', 'root', '');
        }

        public function getConnection(): PDO {
            return $this->connection;
        }
    }
?>