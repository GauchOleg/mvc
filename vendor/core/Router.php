<?php
/**
 * Created by PhpStorm.
 * User: developer-pc
 * Date: 05.08.2017
 * Time: 0:48
 */

namespace vendor\core;

class Router{
    protected static $routes = []; // все маршруты (таблица маршрутов)
    protected static $route = []; // текущий маршрут

    public static function add($regexp, $route = []){
        self::$routes[$regexp] = $route;
    }

    public static function getRoutes(){
        return self::$routes;
    }

    public static function getRoute(){
        return self::$route;
    }
    public static function matchRoute($url){
        foreach (self::$routes as $pattern => $route){
            if (preg_match("#$pattern#i",$url,$matches)){
                foreach ($matches as $k => $v){
                    if (is_string($k))
                        $route[$k] = $v;
                }
                if (!isset($route['action']))
                    $route['action'] = 'index';
                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    // перенаправляет URL по корректному маршруту


    public static function dispatch($url){
        $url = self::removeQueryString($url);
        if (self::matchRoute($url)){
            $controller = 'app\controllers\\' . self::$route['controller'] . 'Controller';
            if (class_exists($controller)){
                $cObj = new $controller(self::$route);
                $action = self::lowerCamelCase(self::$route['action']) . 'Action';
                if (method_exists($cObj,$action)){
                    $cObj->$action();
                    $cObj->getView();
                }else{
                    echo "Метод <b>$action</b> контролерра <b>$controller</b> не найден";
                }
            }else{
                echo "Контроллер: <b>$controller</b> не найден или еще не создан";
            }
        }else{
            http_response_code(404);
            include '404.php';
        }
    }

    public static function upperCamelCase($string){
       return $string = str_replace(' ','', ucwords(str_replace('-',' ',$string)));
    }

    public static function lowerCamelCase($string){
        return lcfirst(self::upperCamelCase($string));
    }
    protected static function removeQueryString($url){
        if ($url){
            $params = explode('&',$url,2);
            if (false === strpos($params[0],'=')){
                return rtrim($params[0],'/');
            }else{
                return '';
            }
        }
        return $url;
}
}