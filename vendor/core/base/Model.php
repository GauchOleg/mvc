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
    protected $pk = 'id'; // primary key
    protected $done = 0;

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

    public function findOne($id, $field=''){
        if (empty($field))
            $field = $this->pk;
        $sql = "SELECT * FROM {$this->table} WHERE $field = ? LIMIT 1";
        return $this->pdo->query($sql, [$id]);
    }

    public function findBySql($sql,$params=[]){
        return $this->pdo->query($sql,$params);
    }

    public function findLike($like,$field,$table=''){
        $table = $table ?: $this->table;
        $sql = "SELECT * FROM $table WHERE $field LIKE ?";
        return $this->pdo->query($sql,['%' . $like .'%']);
    }

    public function setDone($id,$done=0){
        $result = self::findOne($id);
        if ($result['status'] == 0){
            $sql = "UPDATE $this->table SET status=? WHERE id=$?";
            $this->pdo->query($sql,[$done,$id]);
        }else{
            echo 'Значение обновлено';
        }
        return true;
    }

    public function addNewPost($name,$email,$text,$img){
        $sql = "INSERT INTO {$this->table} name,email,text,img VALUES (?,?,?,?)";
        $this->pdo->query($sql,[$name,$email,$text,$img]);
    }
}