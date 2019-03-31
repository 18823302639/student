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
use think\Validate;
use think\Request;

class Common extends Controller
{
    public function uploadfile(){
        $tea_list_id = input("param.tea_list_id");
        $tea_id = input("param.tea_id");
        // 获取表单上传文件 例如上传了001.jpg
        $filename = $_FILES['file']['name'];
        $file = request()->file('file');
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->validate(['size'=>156780])->move(ROOT_PATH . 'public' . DS . 'uploads');
        if($info){
            $data['tea_task_user'] = $filename;
            $data['tea_list_id']   = $tea_list_id;
            $data['tea_id']        = $tea_id;
            $data['tea_task_add']  = $info->getSaveName();
            $res = Db::table("teacher_task")->insert($data);
            return $res ? true : false ;
        }else{
            // 上传失败获取错误信息
            return $file->getError();
        }
    }
}