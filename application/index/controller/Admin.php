<?php
namespace app\index\controller;
use think\Controller;

class Admin extends Auth{
    protected $userid;
    protected function _initialize(){
        $userid=session('userid');
        $admin=$this->isAdmin($userid);
        // halt($admin);
        if(!$admin){
            $this->error('您的权限不足');
        }
    }

    public function isAdmin($userid){
        $user=db('userinfo')->find($userid);
        // halt($user);
        if($user['isadmin']){
            return true;
        }else{
            return false;
        }
    }
}