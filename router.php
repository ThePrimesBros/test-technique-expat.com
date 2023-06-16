<?php

$routes = [
    '/' => 'HomeController@index',
    '/articles' => 'ArticleController@listAll',
    '/articles/{categoryId}' => 'ArticleController@listByCategory',
    '/article/create' => 'ArticleController@create',
];

return $routes;
