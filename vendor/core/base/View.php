<?php
/**
 * Created by PhpStorm.
 * User: developer-pc
 * Date: 06.08.2017
 * Time: 10:34
 */

namespace vendor\core\base;


class View{

    public $route = [];
    public $view;
    public $layout;

    public function __construct($route, $layout ='', $view =''){
        $this->route = $route;
        if ($layout === false){
            $this->layout = false;
        }else {
            $this->layout = $layout ?: LAYOUT;
        }
        $this->view = $view;
    }

    public function render($vars){
        if (is_array($vars)){
            extract($vars); // извелекает переменный из массива, создавая переменные из ключ => значение
        }
        $file_view = APP . '/views/' . $this->route['controller'] . '/' . $this->view . '.php';
        ob_start();
        if (is_file($file_view)){
            require $file_view;
        }else{
            echo "<p>Не найден файл вида <b>{$file_view}</b></p>";
        }
        $content = ob_get_clean();

        if (false !== $this->layout){
            $file_layout = APP . "/views/layout/{$this->layout}.php";
            if (is_file($file_layout)){
                require $file_layout;
            }else{
                echo "<p>Не найден файл шаблона <b>{$file_layout}</b></p>";
            }
        }
    }

}