<?php
/**
 * Created by PhpStorm.
 * User: developer-pc
 * Date: 07.08.2017
 * Time: 21:12
 */

namespace app\controllers;


use app\models\Task;
use vendor\core\base\Controller;

class TaskController extends Controller {

    public function newAction(){
        $model = new Task();
        $result = $model->saveImg();
        $this->set(compact('result'));
    }
}