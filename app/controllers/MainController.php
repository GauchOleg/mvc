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
        $post = $model->findOne('1');
//        $data = $model->findBySql("SELECT * FROM {$model->table} ORDER BY id DESC LIMIT 2");
//        $data = $model->findBySql("SELECT * FROM {$model->table} WHERE name LIKE ?",['%Ол%']);
//        $data = $model->findLike('Сер','name');
//        debug($data);
//        debug($post);
//        debug($posts);
        $title = 'Все записи';
        $this->set(compact('title','posts','post'));
    }
    public function viewOneAction(){
        $id = ltrim($_SERVER['REQUEST_URI'],'/');
        $model = new Main();
        $post = $model->findOne($id);
        $this->set(compact('post'));
    }
}