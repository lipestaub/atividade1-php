<?php
    require_once 'DAL/UserTypeDAO.php';

    class UserTypeModel {
        private ?int $id;
        private ?string $description;

        public function __construct(?int $id = null, ?string $description = null) {
            $this->id = $id;
            $this->description = $description;
        }
        public function getId(): ?int {
            return $this->id;
        }
    
        public function setId(?int $id): void {
            $this->id = $id;
        }
    
        public function getDescription(): ?string {
            return $this->description;
        }
    
        public function setDescription(?string $description): void {
            $this->description = $description;
        }

        public function getUserTypes() {
            $user_types = (new UserTypeDAO)->getUserTypes();

            foreach ($user_types as &$user_type) {
                $user_type = new UserTypeModel(
                    $user_type['id'],
                    $user_type['description']
                );
            }

            return $user_types;
        }
    }
?>