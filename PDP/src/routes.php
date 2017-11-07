<?php
/**
 * Created by PhpStorm.
 * User: Alessio
 * Date: 04.07.17
 * Time: 18:38
 */

use Symfony\Component\Routing;
use Canto\Controller;

$routeCollection = new Routing\RouteCollection();
$routeCollection->add(
    "adele",
    new Routing\Route(
        "/sing/adele/{name}",
        [
            "name" => "Adele",
            "_controller" => [
                new Controller\AdeleController(),
                "singAction",
            ],
        ]
    )
);

return $routeCollection;