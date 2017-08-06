<?php
/**
 * Created by PhpStorm.
 * User: developer-pc
 * Date: 05.08.2017
 * Time: 12:50
 */

namespace app\controllers;

use app\models\Main;

class MainController extends AppController {

    public function indexAction(){
        $model = new Main();
        $posts = $model->findAll();
//        debug($posts);
        $title = 'Все записи';
        $this->set(compact('title','posts'));
    }
}