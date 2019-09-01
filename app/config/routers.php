<?php
/**
 * Created by PhpStorm.
 * User: georgericardo
 * Date: 16/06/19
 * Time: 15:42
 */

namespace routers;
use Phalcon\Mvc\Router;

$router = new Router();

// Define a route
$router->add(
    "/",
    [
        "controller" => "index",
        "action"     => "index",
    ]
);

$router->add(
    "/jeronimo",
    [
        "controller" => "jeronimo",
        "action"     => "index",
    ]
);

$router->add(
    "/servicos",
    [
        "controller" => "jeronimo",
        "action"     => "index",
    ]
);

$router->add(
    "/blog",
    [
        "controller" => "blog",
        "action"     => "index",
    ]
);

return $router;