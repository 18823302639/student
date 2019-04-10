<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/27
 * Time: 16:34
 */
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Request;
use app\admin\model\Common as CommonAdmin;

class Common extends Controller
{
    //上传作业
    public function uploadfile(){
        if(Request::instance()->isAjax()) {
            $tea_task_id = input("param.tea_task_id")  ;
            $tea_list_id = input("param.tea_list_id")  ;
            // 获取表单上传文件 接收参数
            $filename = $_FILES['file']['name'];
            $data['tea_task_user'] = $filename;
            $data['tea_list_id']   = $tea_list_id;
            $model = new CommonAdmin();
            $file = request()->file('file');
            if (!empty($tea_task_id)) {
                $data['tea_task_id']   = $tea_task_id;
                $res  = Db::table("teacher_task")->where("tea_task_id",$tea_task_id)->find();
                $filees = ROOT_PATH . 'public' . DS . 'uploads' . DS .$res["tea_task_add"];
                if(!file_exists($filees)){
                    $res = $model->uploads($file,$data,$res['tea_task_id']);
                    return $res;
                }
                if(unlink($filees)) {
                    $res = $model->uploads($file,$data,$res['tea_task_id']);
                    return $res;
                }
                else{
                    return $msg = "删除文件失败";
                }
            }
            else {
                $res = $model->uploads($file,$data);
                return $res;
            }
        }
    }

    //上传答案
    public function upfile(){
        if(Request::instance()->isAjax()) {
            $tea_task_id = input("param.tea_task_id")  ;
            $tea_list_id = input("param.tea_list_id")  ;
            // 获取表单上传文件 接收参数
            $filename = $_FILES['file']['name'];
            $data['tea_task_ans'] = $filename;
            $data['tea_task_id']   = $tea_task_id;
            $data['tea_list_id']   = $tea_list_id;
            $model = new CommonAdmin();
            $file = request()->file('file');
            if (!empty($tea_task_id)) {
                $res  = Db::table("teacher_task")->where("tea_task_id",$tea_task_id)->find();
                $filees = ROOT_PATH . 'public' . DS . 'uploads' . DS .$res["tea_task_add"];
                if(!file_exists($filees)){
                    $res = $model->upfiles($file,$data,$res['tea_task_id']);
                    return $res;
                }
                if(unlink($filees)) {
                    $res = $model->upfiles($file,$data,$res['tea_task_id']);
                    return $res;
                }
                else{
                    return $msg = "删除文件失败";
                }
            }
            else {
                $res = $model->upfiles($file,$data);
                return $res;
            }
        }
    }


}
