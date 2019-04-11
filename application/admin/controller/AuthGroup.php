<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * 用户组
 * Date: 2019/4/11
 * Time: 9:58
 */

namespace app\admin\controller;
use app\admin\controller\Base;
use app\admin\model\AuthGroup as AuthGroupModel;
use app\admin\model\AuthRule as AuthRuleModel;
use think\Db;
use think\Request;

class AuthGroup extends Base
{

    public function authGroup_list(){
        $model = new AuthGroupModel();
        $arr   = $model->select();
        $this->assign("arr",$arr);
        return $this->fetch();
    }

    public function authGroup_add(){
        $model = new AuthGroupModel();
        $ruleModel = new AuthRuleModel();
        if(Request::instance()->isPost()){
            $data = input("post.");
            $data['rules'] = implode(",",$data['rules']);
            $res  = $model->insert($data);
            if($res){
                $this->success("成功",url("AuthGroup/authGroup_list"));
            }
            else{
                $this->error("失败");
            }
        }
        $arr   = $ruleModel->alist();
        $this->assign("arr",$arr);
        return $this->fetch();
    }

    public function authGroup_edit(){
        $model = new AuthGroupModel();
        $ruleModel = new AuthRuleModel();
        if(Request::instance()->isPost()){
            return ;
        }
        $id = input("param.id");
        $arrs = Db::table("think_auth_group")->where("id",$id)->select();

        $arr   = $ruleModel->alist();
        $this->assign("arr",$arr);
        $this->assign("arrs",$arrs);
        return $this->fetch();
    }




}
