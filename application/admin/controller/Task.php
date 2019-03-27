<?php
/**
 * Created by PhpStorm.
 * User: 作业模块
 * Date: 2019/3/27
 * Time: 16:31
 */

namespace app\admin\controller;


class Task extends Common
{
    public function index(){

    }

    public function article_list(){
        return $this->fetch("admin/article_list");
    }

}