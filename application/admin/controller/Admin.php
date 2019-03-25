<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Db;



class Admin extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function login(){

        if(Request::instance()->isPost()){

            $data = input("post.");
            $res = Db::table("std_admin")->where("admin_user",$data['admin_user'])
                ->where("admin_pwd",$data['admin_pwd'])
                ->find();
            if($res){
                return true;
            }else{
                return false;
            }
        }
        return $this->fetch();
    }

    public function base(){
        return $this->fetch("layout/base");
    }
}
