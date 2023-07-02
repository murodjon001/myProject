<?php
session_start();
define('BASE_PATH', __DIR__ . '/../views/');
require BASE_PATH . '/../database.php';
require 'function.php';
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$php = '.php';
$notFound =  '404' . $php;
$header = BASE_PATH . 'includes/header' . $php;
$footer = BASE_PATH . 'includes/footer' . $php;
$routes = [
    '/' => 'home',
    '/home' => 'home',
    '/uy' => 'home',
    '/blog' => 'blog',
    '/login' => 'login',
    '/logout' => 'logout',
    '/signup' => 'signup',
    '/post/edit' => 'post_edit',
    '/about' => 'about',
    '/price' => 'price',
    '/post/create' => 'post_create'
];

if(arrayBormi($routes, $uri)){
    foreach ($routes as $route => $values){
    
        if ($route == $uri){
            require $header;
            require BASE_PATH . $values . $php;
            require $footer;
            
        }
    }
}else{
    require BASE_PATH . $notFound; 
}















// $regex_routes = [
//     '\/post\/(\d+)' => 'post'
// ];
// foreach($regex_routes as $key => $route) {
//     if(preg_match('#^'.$key.'$#', $uri, $matches)) {
//         require BASE_PATH.'views/'. $route . '.php';
//     }
// }

// if (file_exists(BASE_PATH.'views'.$uri.'.php')){
//     $php = '.php';
//     require BASE_PATH . 'views/includes/header'.$php;
//     require BASE_PATH . 'views'.$uri.$php;
//     require BASE_PATH . 'views/includes/footer' . $php;
  
// }


// function pretty_dump($variable) {
//     echo '<pre>';
//     print_r($variable);
//     echo '</pre>';
// }