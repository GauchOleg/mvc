<?php
/**
 * Created by PhpStorm.
 * User: developer-pc
 * Date: 05.08.2017
 * Time: 0:38
 */

    error_reporting(-1);
    use vendor\core\Router;
    $query = rtrim($_SERVER['QUERY_STRING'], '/');

    define('WWW', __DIR__);
    define('CORE', dirname(__DIR__) . 'vendor/core');
    define('ROOT', dirname(__DIR__));
    define('APP', dirname(__DIR__) . '/app');
    define('LAYOUT', 'default');

//    require '../vendor/core/Router.php';
    require '../vendor/libs/functions.php';
//    require '../app/controllers/MainController.php';
//    require '../app/controllers/PostsController.php';
//    require '../app/controllers/PostsNewController.php';

    spl_autoload_register(function($class){
        $file = ROOT . '/' . str_replace('\\','/',$class) . '.php';
        if (is_file($file)){
            require_once $file;
        }
    });

    Router::add('^page/(?P<action>[a-z-]+)/(?P<alias>[a-z-]+)$', ['controller' => 'Page']);
    Router::add('^page/(?P<alias>[a-z-]+)$', ['controller' => 'Page', 'action' => 'view']);

    // default routs
    Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
    Router::add('^[a-z]{2}$', ['controller' => 'Tz']);
    Router::add('^[0-9]$', ['controller' => 'Main', 'action' => 'viewone']);
    Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');


    Router::dispatch($query);
