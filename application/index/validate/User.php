<?php
namespace app\index\validate;
use think\Validate;

class User extends Validate{

    protected $rule=[
        'username'=>'unique:userinfo|require|max:10|min:2',
        'password'=>'require|max:16|min:6',
        'repass'=>'require|confirm:password',
        'department'=>'require|in:质保一部,质保二部,质保三部',
        'isadmin'=>'require|in:0,1',
    ];

    protected $message=[
        'username.unique'=>'用户名已存在',
        'username.require'=>'用户名必须填写',
        'username.min'=>'用户名长度必须在2-10个字符内',
        'username.max'=>'用户名长度必须在2-10个字符内',
        'password.require'=>'密码必须填写',
        'password.min'=>'密码长度必须在6-16个字符内',
        'password.max'=>'密码长度必须在6-16个字符内',
        'repass.require'=>'确认密码必须填写',
        'repass.unique'=>'确认密码必须与密码相同',
        'department.require'=>'部门必须选择',
        'department.in'=>'部门选择出现错误',
        'isadmin.require'=>'是否管理员必须选择',
        'isadmin.in'=>'是否为管理员选择不正确',
    ];
}