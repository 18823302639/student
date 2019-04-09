<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/3
 * Time: 17:19
 */
namespace app\admin\model;
use think\Db;
use think\Model;

class Common extends Model
{

    protected $name = 'teacher_task';

    public function uploads($file,$data,$id=''){
        $User = new Common();
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->validate(['size'=>156780])->move(ROOT_PATH . 'public' . DS . 'uploads');
        if($info){
            $data['tea_task_add']  = $info->getSaveName();
            if($id == ''){
                $res = $User->save($data);
            }
            else{
                $res = $User->save($data,["tea_task_id"=>$id]);
            }
            return $res ? true : false ;
        }else{
            // 上传失败获取错误信息
            return $file->getError();
        }
    }

    public function upfiles($file,$data,$id=''){
        $User = new Common();
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->validate(['size'=>156780])->move(ROOT_PATH . 'public' . DS . 'uploads');
        if($info){
            $data['tea_ans_user']  = $info->getSaveName();
            if($id == ''){
                $res = $User->save($data);
            }
            else{
                $res = $User->save($data,["tea_task_id"=>$id]);
            }
            return $res ? true : false ;
        }else{
            // 上传失败获取错误信息
            return $file->getError();
        }
    }

}
