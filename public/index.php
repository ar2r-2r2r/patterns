<?php

/**
 * Composer
 */
require dirname(__DIR__) . '/vendor/autoload.php';

/**
 * Routing
 */
$router = new Core\Router();

// Add the routes
$router->add('', ['controller' => 'EmployeeController', 'action' => 'home']);
$router->add('add.php', ['controller' => 'EmployeeController', 'action' => 'add']);
$router->add('edit.php', ['controller' => 'EmployeeController', 'action' => 'edit']);
$router->add('delete.php', ['controller' => 'EmployeeController', 'action' => 'delete']);
$router->add('{controller}/{action}');

//Sorts
$router->add('sortAscByFN', ['controller' => 'EmployeeController', 'action' => 'sortAscByFN']);
$router->add('sortDescByFN', ['controller' => 'EmployeeController', 'action' => 'sortDescByFN']);
$router->add('sortAscByLN', ['controller' => 'EmployeeController', 'action' => 'sortAscByLN']);
$router->add('sortDescByLN', ['controller' => 'EmployeeController', 'action' => 'sortDescByLN']);
$router->add('sortAscByDOB', ['controller' => 'EmployeeController', 'action' => 'sortAscByDOB']);
$router->add('sortDescByDOB', ['controller' => 'EmployeeController', 'action' => 'sortDescByDOB']);
$router->add('sortAscByS', ['controller' => 'EmployeeController', 'action' => 'sortAscByS']);
$router->add('sortDescByS', ['controller' => 'EmployeeController', 'action' => 'sortDescByS']);

$router->dispatch($_SERVER['QUERY_STRING']);
