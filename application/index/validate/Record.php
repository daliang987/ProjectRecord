<?php
namespace app\index\validate;
use think\Validate;

class Record extends Validate{

    protected $regex=['worktime'=>'/(^\d+$)|(^\d+\*\d+$)/'];

    protected $rule=[
       'project_subcompany'=>'require',
       'apply_depart'=>'require',
       'apply_person'=>'require',
       'project_name'=>'require',
       'support_type'=>'require',
       'support_person'=>'require',
       'work_time'=>'require|regex:worktime',
       'overtime'=>'regex:worktime',
       'status'=>'require',
       'start_time'=>'dateFormat:Y-m-d',
       'end_time'=>'dateFormat:Y-m-d|egt:start_time'

    ];

    protected $message=[
        'project_subcompany.require'=>'所属分公司必须填写',
        'apply_depart.require'=>'申请部门必须填写',
        'apply_person.require'=>'申请人必须填写',
        'project_name.require'=>'项目名称必须填写',
        'support_type.require'=>'支持类型必须填写',
        'support_person.require'=>'支持人必须填写',
        'work_time.require'=>'工作量必须填写',
        'status.require'=>'项目状态必须填写',
        'work_time.regex'=>'总工作量格式不正确',
        'overtime.regex'=>'加班工作量格式不正确',
        'start_time.dateFormat'=>'开始时间格式不正确',
        'end_time.dateFormat'=>'结束时间格式不正确',
        'end_time.egt'=>'结束时间必须大于开始时间',
    ];
}