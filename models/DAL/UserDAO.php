<?php
    require_once 'Connection.php';

    class UserDAO {
        private PDO $connection;
        
        public function __construct() {
            $this->connection = (new Connection)->getConnection();
        }

        public function getUserByEmailAndPassword(string $email, string $password) {
            $query = "SELECT * FROM user WHERE email = :email AND password = SHA2(CONCAT(:password, created_at), 256);";

            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function getUserByEmail(string $email) {
            $query = "SELECT * FROM user WHERE email = :email";

            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function getUsers() {
            $query = "SELECT * FROM user;";

            $stmt = $this->connection->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getUserById(int $id) {
            $query = "SELECT * FROM user WHERE id = :id;";

            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function create(UserModel $user) {
            $query = "INSERT INTO user VALUES (null, :user_type_id, :name, :email, :password, null);";

            $stmt = $this->connection->prepare($query);
            $stmt->bindValue(':user_type_id', $user->getUserTypeId());
            $stmt->bindValue(':name', $user->getName());
            $stmt->bindValue(':email', $user->getEmail());
            $stmt->bindValue(':password', $user->getPassword());

            return $stmt->execute();
        }

        public function update(UserModel $user) {
            $query = "UPDATE user SET user_type_id = :user_type_id, name = :name, email = :email, password = :password WHERE id = :id;";

            $stmt = $this->connection->prepare($query);
            $stmt->bindValue(':id', $user->getId());
            $stmt->bindValue(':user_type_id', $user->getUserTypeId());
            $stmt->bindValue(':name', $user->getName());
            $stmt->bindValue(':email', $user->getEmail());
            $stmt->bindValue(':password', $user->getPassword());
            
            return $stmt->execute();
        }

        public function delete(int $id) {
            $query = "DELETE FROM user WHERE id = :id;";

            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }
    }
?>