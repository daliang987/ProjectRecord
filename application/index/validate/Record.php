<?php

namespace app\index\validate;

use think\Validate;

class Record extends Validate
{

    protected $regex = ['worktime' => '/(^\d+$)|(^\d+\*\d+$)/'];

    protected $rule = [
        'project_subcompany' => 'require',
        'apply_depart' => 'require',
        'apply_person' => 'require',
        'project_name' => 'require',
        'support_type' => 'require',
        'support_person' => 'require',
        'work_time' => 'require|regex:worktime',
        'overtime' => 'regex:worktime',
        'status' => 'require',
        'start_time' => 'dateFormat:Y-m-d',
        'end_time' => 'dateFormat:Y-m-d|egt:start_time|checkEndtime:start_time'

    ];

    protected $message = [
        'project_subcompany.require' => '所属分公司必须填写',
        'apply_depart.require' => '申请部门必须填写',
        'apply_person.require' => '申请人必须填写',
        'project_name.require' => '项目名称必须填写',
        'support_type.require' => '支持类型必须填写',
        'support_person.require' => '支持人必须填写',
        'work_time.require' => '工作量必须填写',
        'status.require' => '项目状态必须填写',
        'work_time.regex' => '总工作量格式不正确',
        'overtime.regex' => '加班工作量格式不正确',
        'start_time.dateFormat' => '开始时间格式不正确',
        'end_time.dateFormat' => '结束时间格式不正确',
        'end_time.egt' => '结束时间必须大于开始时间',
    ];

    protected function checkEndtime($value, $rule, $data)
    {

        $end_date = strtotime($value);
        $end_year = date('Y', $end_date);
        $start_date = strtotime($this->getDataValue($data, $rule));
        $start_year = date('Y', $start_date);

        if (intval($end_year) - intval($start_year) >= 1) {
            return '开始时间与结束时间不能跨年,请分开填写';
        } else {
            $start_month = intval(date('n', $start_date));
            $end_month = intval(date('n', $end_date));
            // halt($start_month_day < $date1);
            if ($start_month <= 3 &&  $end_month > 3) {
                return '开始时间与结束时间不能跨关键季度日期（3-31）,请分开填写';
            } else if ($start_month <= 9 &&  $end_month > 9) {
                return '开始时间与结束时间不能跨关键季度日期（9-30）,请分开填写';
            } else {
                return true;
            }
        }
    }
}
