<?php


require_once('./vendor/autoload.php');


$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', '/public/admin/index.php');
    $r->addRoute('GET', '/logowanie', '/public/login.php');
    $r->addRoute('POST', '/logowanie', '/public/login.php');    
    $r->addRoute('GET', '/wyloguj', '/public/logout.php');        
    $r->addRoute('GET', '/nowy', '/public/admin/new.php');
    $r->addRoute('POST', '/nowy', '/public/admin/new.php');
    $r->addRoute('GET', '/edytuj/{id:[0-9]+}', '/public/admin/edit.php');
    $r->addRoute('POST', '/edytuj/{id:[0-9]+}', '/public/admin/edit.php');    
    $r->addRoute('GET', '/usun/{id:[0-9]+}', '/public/admin/delete.php');
    $r->addRoute('POST', '/usun/{id:[0-9]+}', '/public/admin/delete.php'); 

    // Domeny
    $r->addRoute('GET', '/domeny', '/public/domeny/index.php');
    $r->addRoute('GET', '/domeny/dodaj', '/public/domeny/new.php');
    $r->addRoute('POST', '/domeny/dodaj', '/public/domeny/new.php');    
    $r->addRoute('GET', '/domeny/edytuj/{id:[0-9]+}', '/public/domeny/edit.php');
    $r->addRoute('POST', '/domeny/edytuj/{id:[0-9]+}', '/public/domeny/edit.php');    
    $r->addRoute('GET', '/domeny/usun/{id:[0-9]+}', '/public/domeny/delete.php');
    $r->addRoute('POST', '/domeny/usun/{id:[0-9]+}', '/public/domeny/delete.php');         


    // Serwery
    $r->addRoute('GET', '/serwery', '/public/serwery/index.php');
    $r->addRoute('GET', '/serwery/dodaj', '/public/serwery/new.php');
    $r->addRoute('POST', '/serwery/dodaj', '/public/serwery/new.php');    
    $r->addRoute('GET', '/serwery/edytuj/{id:[0-9]+}', '/public/serwery/edit.php');
    $r->addRoute('POST', '/serwery/edytuj/{id:[0-9]+}', '/public/serwery/edit.php');    
    $r->addRoute('GET', '/serwery/usun/{id:[0-9]+}', '/public/serwery/delete.php');
    $r->addRoute('POST', '/serwery/usun/{id:[0-9]+}', '/public/serwery/delete.php');             


});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        echo 'not found';
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed

        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        // ... call $handler with $vars
        require __DIR__ . $handler;
        
        break;
}


