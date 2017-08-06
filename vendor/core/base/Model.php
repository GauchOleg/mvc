<?php
/**
 * Created by PhpStorm.
 * User: developer-pc
 * Date: 06.08.2017
 * Time: 16:15
 */

namespace vendor\core\base;

use vendor\core\Db;


abstract class Model{
    protected $pdo;
    protected $table;

    public function __construct(){
        $this->pdo = Db::instance();
    }

    public function query($sql){
        return $this->pdo->execute($sql);
    }

    public function findAll(){
        $sql = "SELECT * FROM {$this->table}";
        return $this->pdo->query($sql);
    }

}