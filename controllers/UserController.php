<?php
    require_once 'models/UserModel.php';
    require_once 'models/UserTypeModel.php';

    class UserController {
        public function signInPage() {
            include_once 'views/login.php';
        }

        public function signIn() {
            $request_data = file_get_contents("php://input");
            parse_str($request_data, $data);

            $email = $data['email'];
            $password = $data['password'];

            $user = (new UserModel)->getUserByEmailAndPassword($email, $password);

            if ($user) {
                session_start();
                
                $_SESSION['user'] = serialize($user);
            }

            $userExists = !!$user;

            header('Content-Type: application/json');
            echo json_encode($userExists);
        }

        public function usersPage() {
            session_start();
                
            if (empty($_SESSION['user'])) {
                header('Location: /login');
                exit();
            }

            $user = unserialize($_SESSION['user']);

            if ($user->getUserTypeId() != 1) {
                header('Location: /principal');
                exit();
            }

            $users = (new UserModel)->getUsers();

            include_once 'views/users.php';
        }

        public function userPage() {
            session_start();
                
            if (empty($_SESSION['user'])) {
                header('Location: /login');
                exit();
            }

            $user = unserialize($_SESSION['user']);

            if ($user->getUserTypeId() != 1) {
                header('Location: /principal');
                exit();
            }

            $operation = 'Cadastrar';

            if (!empty($_GET['id'])) {
                $user_data = (new UserModel)->getUserById($_GET['id']);
                $operation = 'Editar';
            }

            $user_types = (new UserTypeModel)->getUserTypes();

            include_once 'views/user.php';
        }

        public function upsertUser() {
            $request_data = file_get_contents("php://input");
            parse_str($request_data, $data);

            $id = intval($data['id']);
            $user_type_id = $data['user_type_id'];
            $name = $data['name'];
            $email = $data['email'];

            if (!empty($data['id'])) {
                $user = (new UserModel)->getUserById($data['id']);
                
                if (empty($data['password'])) {
                    $data['password'] = $user->getPassword();
                }
            }

            $password = hash('sha256', $data['password']);
            
            if (empty($user) || $user->getEmail() != $email) {
                $emailExists = !!(new UserModel)->getUserByEmail($email);
                
                if ($emailExists) {
                    header('Content-Type: application/json');
                    echo json_encode(false);
                    return;
                }
            }

            $user = new UserModel($id, $user_type_id, $name, $email, $password, null);

            if (empty($id)) {
                $return = $user->create();
            }
            else {
                $return = $user->update();
            }
            
            header('Content-Type: application/json');
            echo json_encode($return);
        }

        public function deleteUser() {
            $request_data = file_get_contents("php://input");
            parse_str($request_data, $data);

            $id = intval($data['id']);

            (new UserModel)->delete($id);

            header('Content-Type: application/json');
            echo json_encode(true);
        }
    }
?>