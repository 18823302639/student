<?php
/**
 * Created by PhpStorm.
 * User: 课程模块
 * Date: 2019/3/27
 * Time: 16:59
 */

namespace app\admin\controller;
use think\Db;
use think\Request;
use app\admin\model\Teacher;

class Course extends Common
{

    public function index()
    {
        $model = new Teacher();
        $arr = $model->select();
        $this->assign("arr",$arr);
        return $this->fetch("admin/course_list");
    }


    public function course_add()
    {
        if(Request::instance()->isPost()){
            $data = input("post.");
            $data['teacher_pwd'] = md5($data['teacher_pwd']);
            $a = $this->tea_sid($data['tea_sid']);
            if($a){
                return $msg = "已存在该身份证，请重新填写";
            }
            $res = Db::table("teacher")->insert($data);
            if($res){
                return true;
            }else{
                return false;
            }
        }
        return $this->fetch("admin/course_add");
    }

    public function course_edit(){
        $model = new Teacher();
        if(Request::instance()->isAjax()){
            return $model->tea_edit();
        }
        $tea_id = input("param.tea_id");
        $data  = $model->find($tea_id);
        $this->assign("data",$data);
        return $this->fetch("admin/course_edit");
    }

    public function course_del(){

    }

    public function teacher_list(){
        return $this->fetch("admin/teacher_list");
    }

    public function teacher_add()
    {
        return $this->fetch("admin/course_add");
    }

    //修改时检查身份证是否存在相同
    public function tea_repe($data = []){
        $res = Db::table("teacher")->where($data)->find();
        return $res ? true : false ;
    }

    //添加时检查身份证是否存在相同
    public function tea_sid($tea_sid= ''){
        $data = $tea_sid;
        $res = Db::table("teacher")->where("tea_sid",$data)->find();
        return $res ? true : false ;
    }
}
