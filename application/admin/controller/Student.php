<?php
/**
 * Created by PhpStorm.
 * User: 学生与作业模块
 * Date: 2019/3/27
 * Time: 16:31
 */

namespace app\admin\controller;
use app\admin\model\Student as ModelStudent;
use think\Db;
use think\Request;

class Student extends Common
{
    public function index(){
        return $this->fetch("admin/task_list");
    }

    //查看学生列表
    public function student_list(){
        $arr = Db::table("student_list")
                    ->alias("stud_list")
                    ->join("student stud","stud_list.stud_id=stud.stud_id")
                    ->join("teacher_list tea_list","stud_list.tea_list_id=tea_list.tea_list_id")
                    ->join("teacher tea","tea_list.tea_id=tea.tea_id")
                    ->join("teacher_task tea_task","tea_list.tea_list_id=tea_task.tea_list_id","LEFT")
                    ->field("stud.stud_id,stud.stud_user,tea.teacher_user,tea_list.list_user,tea_list.list_time,tea_task.tea_task_add,tea_task.tea_task_user,tea_task.tea_task_ans,tea_task.tea_ans_user")
                    ->select();
        $this->assign("arr",$arr);
        return $this->fetch("admin/student_list");
    }

    public function student_add(){
        if(Request::instance()->isAjax()){
            $data = input("post.");
            $data['stud_pwd'] = md5($data['stud_pwd']);
            $res = Db::table("student")->insert($data);
            if($res){
               return $msg = "添加成功";
            }
            else{
                return $msg = "添加失败";
            }
        }
        return $this->fetch("admin/student_add");

    }

    //添加学生报考课程
    public function stud_curr_list(){
        $arr = Db::table("teacher")
                        ->alias("tea")
                        ->join("teacher_list tea_list","tea.tea_id=tea_list.tea_id")
                        ->select();
        $arr2 = Db::table("student")->select();
        $this->assign("arr2",$arr2);
        $this->assign("arr",$arr);
        return $this->fetch("admin/stud_curr_add");
    }

    public function stud_curr_add(){
        if(Request::instance()->isAjax()){
            $data = input("post.");
            $res  = Db::table("student_list")->insert($data);
            if($res){
                return true;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }

    }

}