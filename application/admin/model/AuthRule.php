<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/11
 * Time: 11:06
 */
namespace app\admin\model;
use think\Model;
use think\Db;

class AuthRule extends Model
{
    protected $name = "think_auth_rule";

    public function alist(){
        $model = new AuthRule();
        $arr = $model->select();
        $array = $this->list_arr($arr);
        return $array;
    }

    public function list_arr($data,$id=0){

        static $arrres = [];
        foreach ($data as $key=>$val){
            if($id == $val['pid'] ){

                 $arrres[] = $val;
                $this->list_arr($data,$val['id']);
            }

        }
        return $arrres;
    }

}
