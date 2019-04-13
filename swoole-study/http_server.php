<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 2019-04-13
 * Time: 10:39
 */

$http_server = new swoole_http_server('0.0.0.0',9555);

$http_server->on('request',function ($request,$response){
   list($controller,$action) = explode('/',trim($request->server['request_uri']),'/');
   echo $controller.':'.$action;
   $response->header('Content-Type','text/html; charset=utf-8');
   $response->end('<h1>hello swoole'.rand(0,100).$controller.':'.$action.'</h1>');
});

$http_server->start();