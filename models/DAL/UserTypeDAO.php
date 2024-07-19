<?php
    require_once 'Connection.php';

    class UserTypeDAO {
        private PDO $connection;
        
        public function __construct() {
            $this->connection = (new Connection)->getConnection();
        }

        public function getUserTypes() {
            $query = "SELECT * FROM user_type;";

            $stmt = $this->connection->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>