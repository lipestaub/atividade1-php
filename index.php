<?php
    require_once './services/Router.php';

    $method = $_SERVER['REQUEST_METHOD'];
    $route = $_SERVER['REQUEST_URI'];

    (new Router)->handleRequest($method, $route);
?>