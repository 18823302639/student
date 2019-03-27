<?php
/**
 * Created by PhpStorm.
 * User: 课程模块
 * Date: 2019/3/27
 * Time: 16:59
 */

namespace app\admin\controller;


class Course extends Common
{
    public function index()
    {
        return $this->fetch();
    }

    public function course_list()
    {

        return $this->fetch("admin/course_list");
    }

    public function course_add()
    {
        return $this->fetch("admin/course_add");
    }

    public function teacher_list(){
        return $this->fetch("admin/teacher_list");
    }

    public function teacher_add()
    {
        return $this->fetch("admin/course_add");
    }

}
