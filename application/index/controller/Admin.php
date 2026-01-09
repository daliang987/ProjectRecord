<?php

namespace app\index\controller;

use think\Controller;

class Admin extends Auth
{
    protected $userid;
    protected function _initialize()
    {
        parent::_initialize(); // 先保证已登录,不然session('userid')为NULL，依然可以获取到第一条数据。
        $userid = session('userid');
        // halt($userid);
        $admin = $this->isAdmin($userid);
        // halt($admin);
        if (!$admin) {
            $this->error('您的权限不足');
        }
    }

    public function isAdmin($userid)
    {
        if (empty($userid) || !is_numeric($userid)) {
            return false;
        }

        $user = db('userinfo')->where('id', intval($userid))->find();
        
        if (!$user) {
            return false;
        }

        return (bool)$user['isadmin'];
    }
}
