<?php
/**
 * Created by PhpStorm.
 * User: 教师模块
 * Date: 2019/3/28
 * Time: 11:37
 */

namespace app\admin\model;

use think\Model;
use think\Request;

class Teacher extends Model
{

    public function tea_edit()
    {
        $model = new Teacher;
        $arr = input("post.");
        $a = $model->where("tea_sid", $arr['tea_sid'])->find($arr['tea_id']);
        if (!$a) {
            $aa = $model->where("tea_sid", $arr['tea_sid'])->select();
            if ($aa) {
                return false;
            }
        }
        $rul = $model->save($arr, ["tea_id"=>$arr['tea_id']]);
        if ($rul) {
            return true;
        } else {
            return $msg = "提交失败";
        }
    }

    public function tea_del(){

    }

}

