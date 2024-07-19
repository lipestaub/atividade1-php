<?php
    require_once 'Connection.php';

    class GradeDAO {
        private PDO $connection;
        
        public function __construct() {
            $this->connection = (new Connection)->getConnection();
        }
    }
?>