<?php
/**
 * Created by PhpStorm.
 * User: developer-pc
 * Date: 06.08.2017
 * Time: 16:15
 */

namespace vendor\core;


class Db{

    protected $pdo;
    protected static $instance;

    protected function __construct(){
        $db = require ROOT . '/config/config_db.php';
        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, // вывод ошибок
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC // возвращает по умолчания ASSOC array
        ];
        $this->pdo = new \PDO($db['dsn'],$db['user'],$db['pass'],$options);
    }

    public static function instance(){
        if (self::$instance === null){
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __clone(){}

    // CREATE ...
    public function execute($sql){
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute();
    }

    // SELECT ...
    public function query($sql){
        $stmt = $this->pdo->prepare($sql);
        $res = $stmt->execute();
        if ($res !== false){
            return $stmt->fetchAll();
        }
        return [];
    }
}