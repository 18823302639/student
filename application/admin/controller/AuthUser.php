<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * 用户表
 * Date: 2019/4/11
 * Time: 16:29
 */

namespace app\admin\controller;
use app\admin\controller\Base;
use app\admin\model\AuthUser as AuthUserModel;
use think\Db;
use think\Request;

class AuthUser extends Base
{

    public function authUserList(){
        $arr = Db::table("think_auth_group_access")
                        ->alias("auth_access")
                        ->join("std_admin admin","auth_access.uid=admin.admin_id")
                        ->join("think_auth_group auth_group","auth_access.group_id=auth_group.id")
                        ->field("auth_access.*,admin.admin_user,admin.admin_id,admin.status,auth_group.title")
                        ->select();
//        $arr = Db::table("std_admin")->select();
        $this->assign("arr",$arr);
        return $this->fetch();
    }

    public function authUserAdd(){
        if(Request::instance()->isPost()){
            $data = input("post.");
            $adminDate['admin_user'] = $data['title'];
            $adminDate['admin_pwd'] = $data['pwd'];
            $adminDate['status'] = $data['status'];
            $uid = Db::table("std_admin")->insertGetId($adminDate);
            if(!$uid){
                $this->error("添加用户失败");
            }
            $u['group_id'] = input("post.group_id");
            $u['uid'] = $uid;
            $res = Db::table("think_auth_group_access")->insert($u);
            if($res){
                $this->success("添加成功",url("AuthUser/authUserList"));
            }
            else{
                $this->error("添加失败");
            }
        }
        $arr = Db::table("think_auth_group")->select();
        $this->assign("arr",$arr);
        return $this->fetch();
    }

}