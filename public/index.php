<?php
session_start();

define('BASE_PATH', __DIR__ . '/../views/');
// require 'mail.php';
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
    '/post/create' => 'post_create',
    '/password/reset' => 'reset_password',
    '/404' => '404',
    '/password/send/mail' => 'password_reset_send_mail',
    
];
var_dump($_SESSION);
if(isset($_SESSION) and $_SESSION['uniqId'] == $uri){
    header('Location:/password/change');
    die;
}else{
    echo $uri;
}
if(arrayBormi($routes, $uri)){
    foreach ($routes as $route => $values){
    
        if ($route == $uri){
            // require $header;
            require BASE_PATH . $values . $php;
            require $footer;  
            break;
        }}
}else{
    require BASE_PATH . $notFound;
}




$regex_routes = [
    '\/post\/(\d+)' => 'post'
];
foreach($regex_routes as $key => $route) {
    if(preg_match('#^'.$key.'$#', $uri, $matches)) {   
        foreach (echo_id() as $id){
            if($id == $matches[1]){
                require $header;
                require BASE_PATH. $route . '.php';
                require $footer;  
                break;
            } 
        } 
    }else{
        // require $header;
        // require BASE_PATH . $notFound;
       
        // require $footer;
        
    }
}


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



// $regex_routes = [
//     '\/post\/(\d+)' => 'post'
//     ];
// if (strpos('post', $uri) !== false) {
//     foreach($regex_routes as $key => $route){
//         var_dump($regex_routes);
//         if (preg_match($pattern, $uri, $matches)){
//             $pattern = '#^'.$key.'$#';
//             foreach (echo_id() as $id){
//                 if($id == $matches[1]){
//                     require $header;
//                     require BASE_PATH. $route . '.php';
//                     require $footer;  
//                     break;
//                 }else{
//                     // require $header;
//                     // require BASE_PATH . $notFound;
//                     // require $footer;
//                     var_dump($pattern);
//                     break;                            
//                 }
//             }  
//         }
//     }   
// }
