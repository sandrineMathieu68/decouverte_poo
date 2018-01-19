<?php
require 'vendor/autoload.php';


$router = new AltoRouter();


$loader = new Twig_Loader_Filesystem('./views');
$twig = new Twig_Environment($loader, array(
    'cache' => false,
));


$router->setBasePath('poo_mvc_route/');

$router->map( 'GET', '/', function() {
    
            global $twig;
    
            $params = ['nom'=> "Sandrine"];
    
            $template = $twig->load('test.html.twig');
            echo $template->render($params);
});


$router->map( 'GET', '/test', function() {
            global $twig;
    
            $params = ['nom'=> "Mohamed"];
    
            $template = $twig->load('test2.html.twig');
            echo $template->render($params);
});

















// match current request url
$match = $router->match();

// call closure or throw 404 status
if( $match && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] ); 
} else {
	// no route was matched
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}



?>