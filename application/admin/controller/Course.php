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

class Course extends Common
{
    public function index()
    {
        return $this->fetch();
    }

    public function course_list()
    {

        return $this->fetch("admin/course_list");
    }

    public function course_add()
    {
        if(Request::instance()->isPost()){
            $data = input("post.");
            print_r($data);die;
        }
        return $this->fetch("admin/course_add");
    }

    public function teacher_list(){
        return $this->fetch("admin/teacher_list");
    }

    public function teacher_add()
    {
        return $this->fetch("admin/course_add");
    }

    //检查身份证是否存在相同
    public function tea_sid(){
        $data = input("post.tea_sid");
        $res = Db::table("teacher")->where("tea_sid",$data)->find();
        if($res){
            return false;
        }else{
            return true;
        }
    }
}
