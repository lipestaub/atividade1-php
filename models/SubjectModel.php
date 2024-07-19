<?php
    require_once 'DAL/SubjectDAO.php';

    class SubjectModel {
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
    }
?>