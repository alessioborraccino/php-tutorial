<?php

namespace Canto\Controller;
/**
 * Created by PhpStorm.
 * User: Alessio
 * Date: 30.06.17
 * Time: 17:18
 */
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class AdeleController {

    public function singAction(Request $request, string $name)  {

        return new Response(json_encode(["lyrics" => "hello ".$name." from the other side"]));
    }
}