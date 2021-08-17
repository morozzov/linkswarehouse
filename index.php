<?php

require_once './core/Router.php';

$url = $_SERVER['REQUEST_URI'];
$post = $_POST;

$router = new Router($url, $post);
$router->route();