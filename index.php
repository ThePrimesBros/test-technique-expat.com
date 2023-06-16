<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require './vendor/autoload.php';

$routes = require './router.php';
$uri = $_SERVER['REQUEST_URI'];

$uri = strtok($uri, '?');

if (array_key_exists($uri, $routes)) {
    $route = $routes[$uri];
    list($controller, $action) = explode('@', $route);
    $controller = 'App\\Controllers\\' . $controller;
    $controller = new $controller();
    $controller->$action();
} else {
    $matchedRoute = null;
    $matchedParams = [];

    foreach ($routes as $route => $handler) {
        $pattern = preg_replace('/\/{[^}]+}/', '/([^/]+)', $route);
        $pattern = str_replace('/', '\/', $pattern);

        if (preg_match('/^' . $pattern . '$/', $uri, $matches)) {
            $matchedRoute = $handler;
            $matchedParams = array_slice($matches, 1);
            break;
        }
    }

    if ($matchedRoute !== null) {
        list($controller, $action) = explode('@', $matchedRoute);
        $controller = 'App\\Controllers\\' . $controller;
        $controller = new $controller();
        $controller->$action(...$matchedParams);
    } else {
        echo '404 Not Found';
    }
}
