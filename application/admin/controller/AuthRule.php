<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * 用户权限表（规则）
 * Date: 2019/4/11
 * Time: 10:07
 */
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Db;
use think\Request;
use app\admin\model\AuthRule as AuthRuleModel;

class AuthRule extends Base
{

    public function authRule_list(){
        $model = new AuthRuleModel();
        $arr   = $model->alist();
        $this->assign("arr",$arr);
        return $this->fetch();
    }

    public function auth_rule_add(){
        $model = new AuthRuleModel();
        if(Request::instance()->isPost()){
            $data = input("post.");
            $str  = Db::table("think_auth_rule")->where("id",$data['pid'])->field("level")->find();
            if($str){
                $data['level'] = $str['level']+1;
            }
            $res  = Db::table("think_auth_rule")->insert($data);
            if($res){
                $this->success("添加成功",url("authRule/authRule_list"));
            }
            else{
                $this->error("添加失败");
            }
        }
        $arr   = $model->alist();
        $this->assign("arr",$arr);
        return $this->fetch();
    }

}