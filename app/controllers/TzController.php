<?php
/**
 * Created by PhpStorm.
 * User: developer-pc
 * Date: 07.08.2017
 * Time: 20:29
 */

namespace app\controllers;


use app\models\Tz;

class TzController extends AppController {

    public function indexAction(){
        $model = new Tz();
        $post = $model->findAll();
        $title = 'Задние';
        $description = 'Подоробное описание требований';
        $this->set(compact('post','title','description'));
    }

}