<?php
/**
 * Created by PhpStorm.
 * User: developer-pc
 * Date: 07.08.2017
 * Time: 21:18
 */

namespace app\models;


use vendor\core\base\Model;

class Task extends Model {

    public $file_name;

    public function saveImg(){
        if (isset($_FILES['photo'])){
            $myfile = $_FILES["photo"]["tmp_name"];
            $myfile_name = $_FILES["photo"]["name"];
            $error_flag = $_FILES["photo"]["error"];
            $f_name = $this->accessFile($myfile_name);
            if  ($f_name === false){
                return false;
            }
            if($error_flag == 0){
                $uploaddir = ROOT . "/public/img/";
                if(move_uploaded_file($myfile, $uploaddir . $this->file_name)){
                    return true;
                }else{
                    return false;
                }
            }
        }
    }

    public function accessFile($file){
        $start = strpos($file,'.');
        $type = substr($file,$start);
        if ($type == '.png' || $type == '.jpg' || $type == '.gif'){
            $this->file_name = rand(000000000,99999999) . $type;
        }else{
            return false;
        }
    }

}