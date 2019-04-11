<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Db;
use think\Session;
use app\admin\controller\Base;


class Admin extends Controller
{
    public function base(){
        return $this->fetch("layout/base");
    }

    public function index()
    {
        if(!Session::has("name")){return $this->fetch("admin/login");}
        return $this->fetch();
    }

    public function welcome(){
        $data = [
//            "remote_host"  => $_SERVER['REMOTE_HOST'],
            "server_adddr" => $_SERVER['SERVER_ADDR'],
            "server_name"  => $_SERVER['SERVER_NAME'],
            "remote_port"  => $_SERVER['REMOTE_PORT'],
            "server_software"=>$_SERVER['SERVER_SOFTWARE'],
            "server_sig"   => $_SERVER['SERVER_SIGNATURE']
        ];
        $this->assign("data",$data);
        return $this->fetch();
    }

    public function unlogin(){
        return Session::delete("name");
    }

    public function login(){

        if(Request::instance()->isPost()){
            $data = input("post.");
            $res = Db::table("std_admin")->where("admin_user",$data['admin_user'])
                ->where("admin_pwd",$data['admin_pwd'])
                ->find();
            if($res){
                Session::set("name",$res['admin_user']);
                Session::set("id",$res['admin_id']);
                return true;
            }
            else{
                return false;
            }
        }
        return $this->fetch();
    }


}
