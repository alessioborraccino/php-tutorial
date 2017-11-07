<?php
/**
 * Created by PhpStorm.
 * User: Alessio
 * Date: 30.06.17
 * Time: 16:05
 */

require_once __DIR__."/../vendor/autoload.php";

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\EventListener\ExceptionListener;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\HttpKernel;
use Symfony\Component\EventDispatcher\EventDispatcher;


use Canto\Controller\AdeleController;
use Canto\Framework;

$routeCollection = include __DIR__.'/../src/routes.php';
$requestStack = new RequestStack();

$request = Request::createFromGlobals();
$requestContext = new RequestContext();
$requestContext->fromRequest($request);
$urlMatcher = new UrlMatcher($routeCollection, $requestContext);
$controllerResolver = new HttpKernel\Controller\ControllerResolver();
$argumentResolver = new HttpKernel\Controller\ArgumentResolver();
$eventDispatcher = new EventDispatcher();
$eventDispatcher->addSubscriber(new HttpKernel\EventListener\RouterListener($urlMatcher, $requestStack));
$errorHandler = function (Symfony\Component\Debug\Exception\FlattenException $exception) {
    $msg = 'Something went wrong! ('.$exception->getMessage().')';

    return new Response($msg, $exception->getStatusCode());
};
$eventDispatcher->addSubscriber(new ExceptionListener($errorHandler));
$canto = new Framework\Canto($eventDispatcher, $controllerResolver, $requestStack, $argumentResolver);
$response = $canto->handle($request);
$response->send();
