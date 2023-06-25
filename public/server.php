<?php

    define('APPLICATION_PATH', dirname(__FILE__) . "/..");
    $config = new Yaf_Config_Ini(APPLICATION_PATH . '/conf/application.ini', ini_get('yaf.environ'));

    //加载自定义路由
    $routeConfig = include_once APPLICATION_PATH.'/routes/'.strtolower($config["application.modules"]).'.php';
    Yaf_Registry::set('route_config', $routeConfig);
    $application  = new Yaf_Application(APPLICATION_PATH . "/conf/application.ini");

    require __DIR__ . '/../vendor/autoload.php';

    //reactPHP
    $loop = \React\EventLoop\Loop::get();
    //渲染
    $server = new React\Http\HttpServer(function (Psr\Http\Message\ServerRequestInterface $request) use($application){
        //过滤index.php，用于路由正则匹配
        $request_uri = str_replace("/index.php", "", $request->getRequestTarget());
        //设置请求参数
        Yaf_Registry::set('react_request', $request);
        ob_start();
        $yaf_request = new Yaf_Request_Http($request_uri);
        $application->getDispatcher()->disableView();
        $application->getDispatcher()->setRequest($yaf_request);
        $application->bootstrap()->run();
        $data = ob_get_contents();
        ob_end_clean();

        //json返回
        return new React\Http\Message\Response(
            200, ['Content-Type' => 'application/json'], $data
        );
    });

    $socket = new React\Socket\SocketServer($config["react.host"].":".$config["react.port"],[],$loop);
    $server->listen($socket);
    $loop->run();


