<?php
    require_once 'DAL/UserDAO.php';

    class UserModel {
        private ?int $id;
        private ?int $user_type_id;
        private ?string $name;
        private ?string $email;
        private ?string $password;
        private ?string $created_at;

        public function __construct(
            ?int $id = null,
            ?int $user_type_id = null,
            ?string $name = null,
            ?string $email = null,
            ?string $password = null,
            ?string $created_at = null
        ) {
            $this->id = $id;
            $this->user_type_id = $user_type_id;
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
            $this->created_at = $created_at;
        }

        public function getId(): ?int {
            return $this->id;
        }
    
        public function setId(?int $id): void {
            $this->id = $id;
        }
    
        public function getUserTypeId(): ?int {
            return $this->user_type_id;
        }
    
        public function setUserTypeId(?int $user_type_id): void {
            $this->user_type_id = $user_type_id;
        }
    
        public function getName(): ?string {
            return $this->name;
        }
    
        public function setName(?string $name): void {
            $this->name = $name;
        }
    
        public function getEmail(): ?string {
            return $this->email;
        }
    
        public function setEmail(?string $email): void {
            $this->email = $email;
        }
    
        public function getPassword(): ?string {
            return $this->password;
        }
    
        public function setPassword(?string $password): void {
            $this->password = $password;
        }

        public function getCreatedAt(): ?string {
            return $this->created_at;
        }
    
        public function setCreatedAt(?int $created_at): void {
            $this->created_at = $created_at;
        }

        public function getUserByEmailAndPassword(string $email, string $password): UserModel|false {
            $user = (new UserDAO)->getUserByEmailAndPassword($email, $password);

            if ($user) {
                return new UserModel(
                    $user['id'],
                    $user['user_type_id'],
                    $user['name'],
                    $user['email'],
                    $user['password'],
                    $user['created_at']
                );
            }

            return false;
        }

        public function getUserByEmail(string $email): UserModel|false {
            $user = (new UserDAO)->getUserByEmail($email);

            if ($user) {
                return new UserModel(
                    $user['id'],
                    $user['user_type_id'],
                    $user['name'],
                    $user['email'],
                    $user['password'],
                    $user['created_at']
                );
            }

            return false;
        }

        public function getUsers() {
            $users = (new UserDAO)->getUsers();

            foreach ($users as &$user) {
                $user = new UserModel(
                    $user['id'],
                    $user['user_type_id'],
                    $user['name'],
                    $user['email'],
                    $user['password'],
                    $user['created_at']
                );
            }

            return $users;
        }

        public function getUserById(int $id) {
            $user = (new UserDAO)->getUserById($id);

            if ($user) {
                return new UserModel(
                    $user['id'],
                    $user['user_type_id'],
                    $user['name'],
                    $user['email'],
                    $user['password'],
                    $user['created_at']
                );
            }

            return false;
        }

        public function create() {
            return (new UserDAO)->create($this);
        }

        public function update() {
            return (new UserDAO)->update($this);
        }

        public function delete(int $id) {
            return (new UserDAO)->delete($id);
        }
    }
?>