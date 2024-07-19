<?php
    require_once 'models/UserModel.php';

    class HomeController {
        public function mainPage() {
            session_start();
                
            if (empty($_SESSION['user'])) {
                header('Location: /login');
                exit();
            }

            $user = unserialize($_SESSION['user']);

            include_once 'views/main.php';
        }
    }
?>