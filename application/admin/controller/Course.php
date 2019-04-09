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
        $tea_id = input("param.tea_id");
        $arr    = Db::table("teacher")->delete($tea_id);
        if($arr){
            return true;
        }else{
            return false;
        }
    }

    //所有课程列表
    public function curr_list(){
        $arr = Db::table("teacher")
                    ->alias("tea")
                    ->join("teacher_list tea_list","tea.tea_id=tea_list.tea_id")
                    ->join("teacher_task tea_task","tea_task.tea_list_id=tea_list.tea_list_id","LEFT")
                    ->field("tea_list.*,tea.teacher_user,tea_task.tea_task_user,tea_task.tea_task_add,tea_task.tea_task_id,tea_task.tea_task_ans")
//                    ->fetchSql(true)
                    ->select();
        $this->assign("arr",$arr);
        return $this->fetch("admin/curr_list");
    }

    //课程添加
    public function curr_add(){
        if(Request::instance()->isAjax()){
            $data = input("post.");
            $res  = Db::table("teacher_list")->insert($data);
            if($res){
                return true;
            }else{
                return $msg = "提交失败";
            }
        }
        $arr = Db::table("teacher")->select();
        $this->assign("arr",$arr);
        return $this->fetch("admin/curr_add");
    }

    public function curr_del(){
        $id = input("param.id");
        if(!empty($id)){
            $arr  = Db::table("teacher_task")->where("tea_task_id",$id)->find();
            $filees = ROOT_PATH . 'public' . DS . 'uploads' . DS .$arr["tea_task_add"];
            if(!file_exists($filees)){
                $res = Db::table('teacher_task')->delete($id);
            }
            if(unlink($filees)) {
                $res = Db::table('teacher_task')->delete($id);
            }
            return $res;
        }
        else{
            return $msg = "您还没有添加作业呢~~~";
        }

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
