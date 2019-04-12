<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 2019-04-13
 * Time: 00:25
 */

$serv = new swoole_server("127.0.0.1",9501);

$serv->on('connect',function ($serv,$fd){
   echo "Client: connect.\n";
});

$serv->on('receive',function ($serv,$fd,$from_id,$data){
    $serv->send($fd,"server:".$data);
});

$serv->on('close',function ($serv,$fd){
    echo "Client: Close\n";
});

$serv->start();
?>