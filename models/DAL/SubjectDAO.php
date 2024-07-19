<?php
    require_once 'Connection.php';

    class SubjectDAO {
        private PDO $connection;
        
        public function __construct() {
            $this->connection = (new Connection)->getConnection();
        }
    }
?>