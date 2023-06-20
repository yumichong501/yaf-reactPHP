<?php
    //禁用错误报告
    //ini_set("display_errors", "On");
    //error_reporting(0);
    //error_reporting(E_ALL ^ E_NOTICE);
    ########################

    define('APPLICATION_PATH', dirname(__FILE__) . "/..");
    $config = new Yaf_Config_Ini(APPLICATION_PATH . '/conf/application.ini', ini_get('yaf.environ'));

    //加载自定义路由
    $routeConfig = include_once APPLICATION_PATH.'/routes/'.strtolower($config["application.modules"]).'.php';
    Yaf_Registry::set('route_config', $routeConfig);

    $loop = \React\EventLoop\Factory::create();

    $server = new React\Http\Server($loop, function ($request,$response) {
        $application  = new Yaf_Application(APPLICATION_PATH . "/conf/application.ini");
        $request_uri = str_replace("/index.php", "", $request->server['request_uri']);
        $yaf_request = new Yaf_Request_Http($request_uri);
        $application->getDispatcher()->setRequest($yaf_request);
        Yaf_Registry::set('react_request', $request);
        Yaf_Registry::set('react_response', $response);
        ob_start();
        $application->getDispatcher()->disableView();
        $application->bootstrap()->run();
        $data = ob_get_clean();
        $response->end($data);
    });

    $socket = new React\Socket\Server($config["react.host"]."/".$config["react.port"], $loop);
    $server->listen($socket);

    $loop->run();





    //创建react
    /*$loop = \React\EventLoop\Factory::create();

    $socket = new React\Socket\Server($loop);
    $http = new React\Http\Server($socket);

    $socket->listen($config["react.port"], $config["react.host"]);

    $http->on('request', function ($request, $response) use ($config){
        $application  = new Yaf_Application(APPLICATION_PATH . "/conf/application.ini");

        $request_uri = str_replace("/index.php", "", $request->server['request_uri']);

        $yaf_request = new Yaf_Request_Http($request_uri);
        $application->getDispatcher()->setRequest($yaf_request);

        Yaf_Registry::set('react_request', $request);
        Yaf_Registry::set('react_response', $response);

        // yaf 会自动输出脚本内容，因此这里使用缓存区接受交给swoole response 对象返回
        ob_start();
        $application->getDispatcher()->disableView();
        $application->bootstrap()->run();
        $data = ob_get_clean();
        $response->end($data);
    });


    $loop->run();*/

