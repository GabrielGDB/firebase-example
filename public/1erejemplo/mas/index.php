<?php
//Config
require_once __DIR__ . '/../app/Config.php';

//Controllers
require_once __DIR__ . '/../app/controllers/SiteController.php';
require_once __DIR__ . '/../app/controllers/UserController.php';

$map = array(
    'index' => array('controller' => 'SiteController', 'action' => 'actionIndex'),
    'contact' => array('controller' => 'SiteController', 'action' => 'actionContact'),
    'users' => array('controller' => 'UserController', 'action' => 'actionIndex'),
    'addUser' => array('controller' => 'UserController', 'action' => 'actionCreate'),
    'login' => array('controller' => 'SiteController', 'action' => 'actionLogin'),
);

if (isset($_GET['ctl'])) {
    if (isset($map[$_GET['ctl']])) {
        $ruta = $_GET['ctl'];
    } else {
        header('Status: 404 Not Found');
        echo '<html><body><h1>Error 404: No existe la ruta <i>' .
            $_GET['ctl'] .
            '</p></body></html>';
        exit;
    }
} else {
    $ruta = 'index';
}

$controlador = $map[$ruta];

if (method_exists($controlador['controller'], $controlador['action'])) {
    call_user_func(array(new $controlador['controller'], $controlador['action']));
} else {
    header('Status: 404 Not Found');
    echo '<html><body><h1>Error 404: El controlador <i>' .
        $controlador['controller'] .
        '->' .
        $controlador['action'] .
        '</i> no existe</h1></body></html>';
}