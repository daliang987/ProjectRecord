<?php
namespace app\index\validate;
use think\Validate;

class Company extends Validate{

    protected $rule=[
        'com_name'=>'require|max:15',
        'com_pid'=>'require|number',
    ];

    protected $message=[
        'com_name.require'=>'组织名称必须填写',
        'com_name.max'=>'组织名称不能超过15个字符',
        'com_pid.number'=>'父级必须是数字',
        'com_pid.require'=>'父级组织必须选择',
    ];
}