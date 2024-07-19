<?php
    require_once 'DAL/GradeDAO.php';

    class GradeModel {
        private ?int $id;
        private ?int $semester;
        private ?int $subject_id;
        private ?int $user_id;
        private ?float $value;

        public function __construct(
            ?int $id = null,
            ?int $semester = null,
            ?int $subject_id = null, 
            ?int $user_id = null,
            ?float $value = null
        ) {
            $this->id = $id;
            $this->semester = $semester;
            $this->subject_id = $subject_id;
            $this->user_id = $user_id;
            $this->value = $value;
        }

        public function getId(): ?int {
            return $this->id;
        }
    
        public function setId(?int $id): void {
            $this->id = $id;
        }
    
        public function getSemester(): ?int {
            return $this->semester;
        }
    
        public function setSemester(?int $semester): void {
            $this->semester = $semester;
        }
    
        public function getSubjectId(): ?int {
            return $this->subject_id;
        }
    
        public function setSubjectId(?int $subject_id): void {
            $this->subject_id = $subject_id;
        }
    
        public function getUserId(): ?int {
            return $this->user_id;
        }
    
        public function setUserId(?int $user_id): void {
            $this->user_id = $user_id;
        }
    
        public function getValue(): ?float {
            return $this->value;
        }
    
        public function setValue(?float $value): void {
            $this->value = $value;
        }
    }
?>