<?php
    class Router {
        private array $routes;

        public function __construct() {
            $this->routes = [
                'GET' => [
                    '/' => [
                        'class' => 'UserController',
                        'method' => 'signInPage'
                    ],
                    '/entrar' => [
                        'class' => 'UserController',
                        'method' => 'signInPage'
                    ],
                    '/sair' => [
                        'class' => 'UserController',
                        'method' => 'signOut'
                    ],
                    '/principal' => [
                        'class' => 'HomeController',
                        'method' => 'mainPage'
                    ],
                    '/alterar-cadastro' => [
                        'class' => 'UserController',
                        'method' => 'updateUserProfilePage'
                    ],
                    '/alterar-senha' => [
                        'class' => 'UserController',
                        'method' => 'updateUserPasswordPage'
                    ],
                    '/minhas-notas' => [
                        'class' => 'GradeController',
                        'method' => 'myGradesPage'
                    ],
                    '/usuarios' => [
                        'class' => 'UserController',
                        'method' => 'usersPage'
                    ],
                    '/materias' => [
                        'class' => 'GradeController',
                        'method' => 'subjectsPage'
                    ],
                    '/notas' => [
                        'class' => 'GradeController',
                        'method' => 'gradesPage'
                    ],
                    '/usuario' => [
                        'class' => 'UserController',
                        'method' => 'userPage'
                    ],
                    '/materia' => [
                        'class' => 'GradeController',
                        'method' => 'subjectPage'
                    ],
                    '/nota' => [
                        'class' => 'GradeController',
                        'method' => 'gradePage'
                    ]

                ],
                'POST' => [
                    '/entrar' => [
                        'class' => 'UserController',
                        'method' => 'signIn'
                    ],
                    '/usuario' => [
                        'class' => 'UserController',
                        'method' => 'upsertUser'
                    ],
                    '/materia' => [
                        'class' => 'GradeController',
                        'method' => 'createSubject'
                    ],
                    '/nota' => [
                        'class' => 'GradeController',
                        'method' => 'createGrade'
                    ]
                ],
                'PUT' => [
                    '/alterar-cadastro' => [
                        'class' => 'UserController',
                        'method' => 'updateUserProfile'
                    ],
                    '/alterar-senha' => [
                        'class' => 'UserController',
                        'method' => 'updateUserPassword'
                    ],
                    '/usuario' => [
                        'class' => 'UserController',
                        'method' => 'upsertUser'
                    ],
                    '/materia' => [
                        'class' => 'GradeController',
                        'method' => 'updateSubject'
                    ],
                    '/nota' => [
                        'class' => 'GradeController',
                        'method' => 'updateGrade'
                    ]
                ],
                'DELETE' => [
                    '/usuario' => [
                        'class' => 'UserController',
                        'method' => 'deleteUser'
                    ],
                    '/materia' => [
                        'class' => 'GradeController',
                        'method' => 'deleteSubject'
                    ],
                    '/nota' => [
                        'class' => 'GradeController',
                        'method' => 'deleteGrade'
                    ]
                ]
            ];
        }

        public function handleRequest(string $method, string $route): void {
            $route = explode('?', $route)[0];

            $routeData = !empty($this->routes[$method][$route]) ? $this->routes[$method][$route] : null;

            if (!$routeData) {
                header("HTTP/1.0 404 Not Found");
                exit();
            }

            $class = $routeData['class'];
            $method = $routeData['method'];

            require_once __DIR__ . '/../controllers/' . $class . '.php';
                                        
            (new $class)->$method();
        }
    }
?>