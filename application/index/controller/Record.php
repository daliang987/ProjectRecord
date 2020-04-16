<?php

namespace app\index\controller;

use think\Controller;

class Record extends Auth
{
    protected $db;

    protected $title = array(
        'A' => 'id',
        'B' => 'project_subcompany',
        'C' => 'apply_depart',
        'D' => 'apply_person',
        'E' => 'customer_manager',
        'F' => 'project_manager',
        'G' => 'project_name',
        'H' => 'support_type',
        'I' => 'support_person',
        'J' => 'position',
        'K' => 'out_work_way',
        'L' => 'start_time',
        'M' => 'end_time',
        'N' => 'work_time',
        'O' => 'overtime',
        'P' => 'status',
        'Q' => 'support_result',
        'R' => 'report_document',
        'S' => 'doc_folder',
        'T' => 'department',
        'U' => 'remarks',
    );

    protected function _initialize()
    {
        parent::_initialize();
        $this->db = new \app\index\model\Record();
    }

    public function index()
    {
        $project_name = input('get.project_name') ? input('get.project_name') : '';
        $start_time = input('get.start_time') ? input('get.start_time') : '';
        $end_time = input('get.end_time') ? input('get.end_time') : '';
        $support_person = session('username');
        $support_type = input('get.support_type') ? input('get.support_type') : '';

        $pageParam = ['query' => []];

        $record = db('record');

        if ($project_name) {
            $record->where('project_name', 'like', '%' . $project_name . '%');
            $this->assign('project_name', $project_name);
            $pageParam['query']['project_name'] = $project_name;
        }

        if ($start_time) {
            $record->where('start_time', 'egt', $start_time);
            $this->assign('start_time', $start_time);
            $pageParam['query']['start_time'] = $start_time;
        }

        if ($end_time) {
            $record->where('end_time', 'elt', $end_time);
            $this->assign('end_time', $end_time);
            $pageParam['query']['end_time'] = $end_time;
        }

        if ($support_person) {
            $record->where('support_person', 'eq', $support_person);
            $this->assign('support_person', $support_person);
            $pageParam['query']['support_person'] = $support_person;
        }

        if ($support_type) {
            if ($support_type == '其他支持') {
                $record->where('support_type', 'not in', ['功能测试', '安全测试', '性能测试']);
                $this->assign('support_type', '其他支持');
            } else {
                $record->where('support_type', 'eq', $support_type);
                $this->assign('support_type', $support_type);
            }

            $pageParam['query']['support_type'] = $support_type;
        }

        $record->where('delflag', 0);

        $data = $record->order('start_time desc')->paginate(20, false, $pageParam);
        $this->assign("_data", $data);
        return $this->fetch();
    }

    public function store()
    {
        $com = db('company')->where('com_pid', 0)->select();
        $this->assign("_com", $com);
        if (request()->isAjax()) {
            $depart = input('post.com');
            $depart_id = db('company')->where('com_name', $depart)->value('id');
            if ($depart_id) {
                $depart = db('company')->where('com_pid', $depart_id)->select();
            }
            return json_encode($depart);
        }

        if (request()->isPost()) {
            $data = input('post.');
            // halt($data);
            // 其他类型支持处理
            if ($data['support_type'] == '其他') {
                if ($data['other'] != '') {
                    $data['support_type'] = $data['other'];
                } else {
                    $data['support_type'] = '其他';
                }
            }
            $res = $this->db->store($data);
            if ($res['valid']) {
                $this->success($res['msg'], 'index');
            } else {
                $this->error($res['msg']);
                exit;
            }
        }

        return $this->fetch();
    }



    public function validateExcel($data)
    {
        $fillB_record = array();
        $fillC_record = array();
        $fillD_record = array();
        $fillG_record = array();
        $fillH_record = array();
        $fillI_record = array();
        $fillN_record = array();
        $fillP_record = array();

        $stimeerror_record = array();
        $etimeerror_record = array();
        $formateerror_record = array();


        if (count($data) >= 2) {
            foreach ($data as $index => $record) {
                // 数据index=1时是表title，从2开始是数据
                if ($index > 1) {
                    if (!$data[$index]["B"]) {
                        array_push($fillB_record, "B" . $index);
                    }
                    else{

                        //获取所有子公司
                        $coms=db('company')->where('com_pid',0)->column('com_name');
                        //halt($coms);

                        //sql server 返回如下

                        /*  数组key 是数据 :(
                            array (size=8)
                            '北京总部' => string '1' (length=1)
                            '北京分公司' => string '2' (length=1)
                            '上海分公司' => string '3' (length=1)
                            '广州分公司' => string '4' (length=1)
                            '成都子公司' => string '5' (length=1)
                            '厦门子公司' => string '6' (length=1)
                            '金信网银' => string '7' (length=1)
                            '信科互动' => string '8' (length=1)
                        */


                        //mysql 返回如下：
                        /* value 是获取的数组值
                        array(8) {
                            [0] => string(12) "北京总部"
                            [1] => string(15) "北京分公司"
                            [2] => string(15) "上海分公司"
                            [3] => string(15) "广州分公司"
                            [4] => string(15) "成都子公司"
                            [5] => string(15) "厦门子公司"
                            [6] => string(12) "金信网银"
                            [7] => string(12) "信科互动"
                        }
                        */

                        if(!array_key_exists($data[$index]["B"],$coms) && !in_array($data[$index]["B"],$coms)){
                            array_push($fillB_record,"B".$index);
                        }
                    }

                    if (!$data[$index]["C"]) {
                        array_push($fillC_record, "C" . $index);
                    }
                    if (!$data[$index]["D"]) {
                        array_push($fillD_record, "D" . $index);
                    }
                    if (!$data[$index]["G"]) {
                        array_push($fillG_record, "G" . $index);
                    }
                    if (!$data[$index]["H"]) {
                        array_push($fillH_record, "H" . $index);
                    }
                    if (!$data[$index]["I"]) {
                        array_push($fillI_record, "I" . $index);
                    }
                    if (!$data[$index]["N"]) {
                        array_push($fillN_record, "N" . $index);
                    }
                    if (!$data[$index]["P"]) {
                        array_push($fillP_record, "P" . $index);
                    }

                    //检查工作量格式是否正确
                    if ($data[$index]['N']) {
                        if (!preg_match('/(^\d+$)|(^\d+\*\d+$)/', $data[$index]['N'])) {
                            array_push($formateerror_record, "N" . $index);
                        }
                    }
                    //检测开始与结束时间
                    if ($data[$index]['L']) {

                        if (date('Y/m/d', strtotime($data[$index]['L'])) == $data[$index]['L']) { //判断日期格式是否正确
                            $start_time = strtotime($data[$index]['L'] . ' 00:00:00');


                            //存在结束时间
                            if ($data[$index]['M']) {

                                if (date('Y-m-d', strtotime($data[$index]['M'])) == $data[$index]['M']) {
                                    $end_time = strtotime($data[$index]['M'] . ' 23:59:59');
                                    // 判断结束时间与开始时间
                                    if ($end_time <= $start_time) {
                                        array_push($etimeerror_record, "M" . $index);
                                    }
                                } else {
                                    array_push($etimeerror_record, "M" . $index);
                                }
                            }
                        }
                    } else {
                        die("error format");
                        array_push($stimeerror_record, "L" . $index);
                    }

                }
            }
        }

        if (count($fillB_record) > 0) {
            $this->error('Excel表格B列中，' . join(',', $fillB_record) . '检测有误，请填写严谨的组织架构名称，可到添加记录页面的所属区域下拉列表中查看', 'import', '', 10);
        }
        if (count($fillC_record) > 0) {
            $this->error('Excel表格C列中，' . join(',', $fillC_record) . '必填字段检测有误，请检查是否填写列', 'import', '', 8);
        }
        if (count($fillD_record) > 0) {
            $this->error('Excel表格D列中，' . join(',', $fillD_record) . '必填字段检测有误，请检查是否填写列', 'import', '', 8);
        }
        if (count($fillG_record) > 0) {
            $this->error('Excel表格G列中，' . join(',', $fillG_record) . '必填字段检测有误，请检查是否填写列', 'import', '', 8);
        }
        if (count($fillH_record) > 0) {
            $this->error('Excel表格H列中，' . join(',', $fillH_record) . '必填字段检测有误，请检查是否填写列', 'import', '', 8);
        }
        if (count($fillI_record) > 0) {
            $this->error('Excel表格I列中，' . join(',', $fillI_record) . '必填字段检测有误，请检查是否填写列', 'import', '', 8);
        }
        if (count($fillN_record) > 0) {
            $this->error('Excel表格N列中，' . join(',', $fillN_record) . '必填字段检测有误，请检查是否填写列', 'import', '', 8);
        }
        if (count($fillP_record) > 0) {
            $this->error('Excel表格P列中，' . join(',', $fillP_record) . '必填字段检测有误，请检查是否填写列', 'import', '', 8);
        }

        if (count($formateerror_record) > 0) {
            $this->error('Excel表格N列中' . join(',', $formateerror_record) . '工作时间（work_time）检测有误，请检查是否为数字或类似(8*3)格式！', 'import', '', 8);
        }

        if (count($stimeerror_record) > 0) {
            $this->error('Excel表格L列中' . join(',', $stimeerror_record) . '开始时间(start_time)检测有误，请检查是否填写日期格式(YYYY/MM/DD)！', 'import', '', 8);
        }

        if (count($etimeerror_record) > 0) {
            $this->error('Excel表格M列中' . join(',', $etimeerror_record) . '结束时间(end_time)检测有误，请检查日期格式(YYYY/MM/DD)并大于开始时间！', 'import', '', 8);
        }

    }

    public function import()
    {
        Vendor('PHPExcel.PHPExcel');

        if (request()->isPost()) {
            $objPHPExcel = new \PHPExcel();
            $file = request()->file('excel');
            if(!$file){
                $this->error("请上传Excel记录文件");
            }
            $info = $file->validate(['ext' => 'xlsx,xls'])->move(ROOT_PATH . 'public' . DS . 'upload' . DS . 'excel');
            //获取文件名
            $exclePath = $info->getSaveName();

            // halt($exclePath);

            //上传文件的地址
            $filename = ROOT_PATH . 'public' . DS . 'upload' . DS . 'excel' . DS . $exclePath;

            //判断截取文件
            $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

            //区分上传文件格式
            if ($extension == 'xlsx') {
                $objReader = \PHPExcel_IOFactory::createReader('Excel2007');
                $objPHPExcel = $objReader->load($filename, $encode = 'utf-8');
            } elseif ($extension == 'xls') {
                $objReader = \PHPExcel_IOFactory::createReader('Excel5');
                $objPHPExcel = $objReader->load($filename, $encode = 'utf-8');
            }

            $currentSheet = $objPHPExcel->getsheet(0);   //转换为数组格式
            // $currentSheet->getDefaultRowDimension()->setRowHeight(15);
            // halt($excel_array);
            //不删除依此此来判断模板的标准
            // array_shift($excel_array);  //删除第一个数组(标题);
            // halt($excel_array);

            //获取总列数
            $allColumn = $currentSheet->getHighestColumn();
            //获取总行数
            $allRow = $currentSheet->getHighestRow();
            for ($currentRow = 1; $currentRow <= $allRow; $currentRow++) {
                //从哪列开始，A表示第一列
                for ($currentColumn = 'A'; $currentColumn <= $allColumn; $currentColumn++) {
                    //数据坐标
                    $address = $currentColumn . $currentRow;
                    
                    if ($currentRow <= 1) {
                        //读取到的数据，保存到数组$arr中
                        $data[$currentRow][$currentColumn] = strval($currentSheet->getCell($address)->getValue());
                    } else {

                        //读取到的数据，保存到数组$arr中
                        if ($currentColumn == "L" || $currentColumn == "M") {
                            if ($currentSheet->getCell($address)->getDataType() == \PHPExcel_Cell_DataType::TYPE_NUMERIC) {
                                $cellSytelFormat = $currentSheet->getCell($address)->getStyle()->getNumberFormat();
                                $formatCode = $cellSytelFormat->getFormatCode();
                                if (preg_match('/^(\[\$[A-Z]*-[0-9A-F]*\])*[hmsdy]/i', $formatCode)) {
                                    $data[$currentRow][$currentColumn] = gmdate("Y-m-d", \PHPExcel_Shared_Date::ExcelToPHP($currentSheet->getCell($address)->getValue()));
                                } else {
                                    $this->error('Excel第' . $currentRow . '行，开始时间(L列)或结束时间(M列)有误，请检查日期格式(YYYY/MM/DD)！', 'import', '', 8);
                                }
                            } else {
                                $this->error('Excel 第' . $currentRow . '行，开始时间(L列)或结束时间(M列)有误，请检查日期格式(YYYY/MM/DD)！', 'import', '', 8);
                            }
                        } else {
                            $data[$currentRow][$currentColumn] = strval($currentSheet->getCell($address)->getValue());
                        }
                        $data[$currentRow]['A'] = $currentRow - 1;
                    }
                }
            }

            unset($info); //释放资源才能删除上传的表格文件
            unlink($filename);

            //检测模版是否标准
            if ($this->title != $data[1]) {
                $this->error('您的模版不正确，请下载标准模版');
            }

            //对数据进行检测
            $this->validateExcel($data);


            session('excel', $data);

            //  halt($excel);
            $this->assign('data', $data);
        } else {
            $this->assign('data', [0 => $this->title]);
        }

        return $this->fetch();
    }




    public function show()
    {
        $id = input('param.id');
        $data = db('record')->find($id);
        if ($data && ($data['support_person'] == session('username') || session('isadmin'))) {
            $this->assign('_data', $data);
            $user = db('userinfo')->where('username', $data['support_person'])->find();
            $this->assign('user_depart', $user['department']);
            return $this->fetch();
        } else {
            $this->error('没有该记录或无权访问');
        }
    }

    public function trash()
    {
        $data = db('record')->where('delflag', 1)->where('support_person', session('username'))->order('start_time desc')->paginate(10);
        $this->assign('_data', $data);
        return $this->fetch();
    }

    public function admintrash()
    {
        $data = db('record')->where('delflag', 1)->order('start_time desc')->paginate(10);
        $this->assign('_data', $data);
        return $this->fetch();
    }

    //软删除
    public function del()
    {
        $id = input('get.id');
        $record = db('record')->find($id);
        if ($record && ($record['support_person'] == session('username') || session('isadmin'))) {
            $res = $this->db->del($id);
            if ($res['valid']) {
                $this->success($res['msg'], 'index');
                exit;
            } else {
                $this->error($res['msg'], 'index');
                exit;
            }
        } else {
            $this->error('没有权限删除该记录');
            exit;
        }
    }

    //回收站还原
    public function restore()
    {
        $id = input('get.id');
        $record = db('record')->find($id);
        if ($record && $record['support_person'] != session('username')) {
            $this->error('没有权限还原该记录');
            exit;
        }
        $res = $this->db->restore($id);
        if ($res['valid']) {
            $this->success($res['msg'], 'index');
            exit;
        } else {
            $this->error($res['msg'], 'index');
            exit;
        }
    }

    //从回收站删除
    public function remove()
    {
        $id = input('get.id');
        $record = db('record')->find($id);
        if ($record && ($record['support_person'] == session('username') || session('isadmin'))) {
            $res = $this->db->remove($id);
            if ($res['valid']) {
                $this->success($res['msg'], 'index');
                exit;
            } else {
                $this->error($res['msg'], 'index');
                exit;
            }
        } else {
            $this->error('没有权限彻底删除该记录');
            exit;
        }
    }

    //修改记录
    public function edit()
    {
        $id = input('param.id');
        $data = db('record')->find($id);
        $com = db('company')->where('com_pid', 0)->select();
        $this->assign("_com", $com);

        if ($data && ($data['support_person'] == session('username') || session('isadmin'))) {
            $this->assign('data', $data);
        } else {
            $this->error('非法修改或找不到记录');
            exit;
        }

        if (request()->isPost()) {
            $data = input('post.');
            $record = db('record')->find($data['id']);
            if ($record && ($record['support_person'] == session('username') || session('isadmin'))) {
                if ($data['support_type'] == '其他') {
                    if ($data['other'] != '') {
                        $data['support_type'] = $data['other'];
                    } else {
                        $data['support_type'] = '其他';
                    }
                }

                $res = $this->db->edit($data);
                if ($res['valid']) {
                    $this->success($res['msg'], 'index');
                } else {
                    $this->error($res['msg']);
                    exit;
                }
            } else {
                $this->error('非法修改');
                exit;
            }
        }

        return $this->fetch();
    }

    // 从excel导入到数据库中
    public function excelToDb()
    {
        Vendor('PHPExcel.PHPExcel');
        $data = input('post.data/a'); //此为数据多选时的id数组。
        if(!$data){
            $this->error("导入的记录数不能为0");
        }

        // 当全选时，id数组中第一个为表头的标题名，应将此去除。
        /*
        array(6) {
            [0] => string(2) "id"
            [1] => string(1) "1"
            [2] => string(1) "2"
            [3] => string(1) "3"
            [4] => string(1) "4"
            [5] => string(1) "5"
          }
        */

        if($data[0]==="id"){
            array_shift($data);
        }

        // halt($data);

        $excelData = session('excel');
        foreach ($excelData as $k => $v) {
            if ($k >= 1) {
                $dataList[$k - 1]['id'] = $k - 1;
                $dataList[$k - 1]['project_subcompany'] = $v['B'];
                $dataList[$k - 1]['apply_depart'] = $v['C'];
                $dataList[$k - 1]['apply_person'] = $v['D'];
                $dataList[$k - 1]['customer_manager'] = $v['E'];
                $dataList[$k - 1]['project_manager'] = $v['F'];
                $dataList[$k - 1]['project_name'] = $v['G'];
                $dataList[$k - 1]['support_type'] = $v['H'];
                $dataList[$k - 1]['support_person'] = $v['I'];
                $dataList[$k - 1]['position'] = $v['J'];
                $dataList[$k - 1]['out_work_way'] = $v['K'];
                $dataList[$k - 1]['start_time'] =  $v['L'];
                $dataList[$k - 1]['end_time'] =  $v['M'];
                $dataList[$k - 1]['work_time'] = $v['N'];
                $dataList[$k - 1]['overtime'] = $v['O'];
                $dataList[$k - 1]['status'] = $v['P'];
                $dataList[$k - 1]['support_result'] = $v['Q'];
                $dataList[$k - 1]['report_document'] = $v['R'];
                $dataList[$k - 1]['doc_folder'] = $v['S'];
                $dataList[$k - 1]['department'] = $v['T'];
                $dataList[$k - 1]['remarks'] = $v['U'];
            }
        }

        // halt($dataList);

        //批量导入数组键名必须从0开始

        $i = 0;
        foreach ($dataList as $k => $v) {
            if (in_array($v['id'], $data)) {
                // halt($v);
                array_shift($v);
                $record = new \app\index\model\Record;
                $result = $record->save($v, false);
                if ($result) {
                    $i++;
                }
            }
        }

        if ($i > 0) {
            $this->success('保存成功' . $i . '条记录');
            exit;
        } else {
            $this->error('保存失败');
        }
    }


    //统计记录
    public function charts()
    {
        if (!session('isadmin')) {
            $this->error('您没有权限');
            exit;
        }

        $start_time = input('get.start_time') ? input('get.start_time') : '';
        $end_time = input('get.end_time') ? input('get.end_time') : '';
        $support_person = input('get.support_person') ? input('get.support_person') : '';

        $all_type_count = $this->chartsByType('support_type', $start_time, $end_time, $support_person);

        $type_count = array();
        $type_other = array('其他支持', 0, 0);
        foreach ($all_type_count as $key => $value) {
            if ($value[0] != '功能测试' && $value[0] != '性能测试' && $value[0] != '安全测试' && $value[0] != '其他支持') {
                $type_other[1] += $value[1];
                $type_other[2] += $value[2];
            } else {
                $type_count[] = $value;
            }
        }
        $type_count[] = $type_other;

        $this->assign('type_count', $type_count);

        $subcom_count = $this->chartsByType('project_subcompany', $start_time, $end_time, $support_person);
        $this->assign('subcom_count', $subcom_count);

        $person_count = $this->chartsByType('support_person', $start_time, $end_time, $support_person);
        $this->assign('person_count', $person_count);


        return $this->fetch();
    }

    //根据时间，类型，人员统计参数进行统计方法
    public function chartsByType($type, $start_time, $end_time, $support_person)
    {
        $record = db('record')->where('delflag', 0);

        if ($start_time) {
            $record->where('start_time', 'egt', $start_time);
            $this->assign('start_time', $start_time);
            $pageParam['query']['start_time'] = $start_time;
        }

        if ($end_time) {
            $record->where('end_time', 'elt', $end_time);
            $this->assign('end_time', $end_time);
            $pageParam['query']['end_time'] = $end_time;
        }

        if ($support_person) {
            $record->where('support_person', 'eq', $support_person);
            $this->assign('support_person', $support_person);
            $pageParam['query']['support_person'] = $support_person;
        }


        $data = $record->select();

        $count = count($data);

        $person = db('userinfo')->where('forbidden', '0')->select();
        $this->assign('user', $person);

        $tongji = array();
        foreach ($data as $k => $v) {
            if (strpos($v['work_time'], '*')) {
                $w_arr = explode('*', $v['work_time']);
                $v['work_time'] = $w_arr[0] * $w_arr[1];
            }

            if (!in_array($v[$type], array_keys($tongji))) {
                $tongji[$v[$type]] = $v['work_time'];
            } else {
                $tongji[$v[$type]] = $tongji[$v[$type]] + $v['work_time'];
            }
        }

        arsort($tongji);

        $tongji2 = array();
        foreach ($tongji as $x => $time) {  // 北京=>230
            $tongji2[] = array($x, $time, 0); //$tongji2=array(['北京','230',0])
        }

        foreach ($tongji2 as $k => $v) {
            foreach ($data as $index => $fields) {
                if ($fields[$type] == $v[0]) { //如果字段的值==当前分类的类型如：记录中的北京分公司==当前分类的北京分公司
                    $v[2] = $v[2] + 1;
                }
            }
            $tongji2[$k] = $v;    //需要将v重新赋给tongji2
        }

        return $tongji2;
    }

    // 搜索记录
    public function search()
    {
        if (!session('isadmin')) {
            $this->error('您没有权限导出记录');
            exit;
        }

        $project_name = input('get.project_name') ? input('get.project_name') : '';
        $start_time = input('get.start_time') ? input('get.start_time') : '';
        $end_time = input('get.end_time') ? input('get.end_time') : '';
        $support_person = input('get.support_person') ? input('get.support_person') : '';
        $support_type = input('get.support_type') ? input('get.support_type') : '';

        $person = db('userinfo')->where('forbidden', '0')->select();
        $this->assign('user', $person);

        $pageParam = ['query' => []];

        $record = db('record');

        if ($project_name) {
            $record->where('project_name', 'like', '%' . $project_name . '%');
            $this->assign('project_name', $project_name);
            $pageParam['query']['project_name'] = $project_name;
        }

        if ($start_time) {
            $record->where('start_time', 'egt', $start_time);
            $this->assign('start_time', $start_time);
            $pageParam['query']['start_time'] = $start_time;
        }

        if ($end_time) {
            $record->where('end_time', 'elt', $end_time);
            $this->assign('end_time', $end_time);
            $pageParam['query']['end_time'] = $end_time;
        }

        if ($support_person) {
            $record->where('support_person', 'eq', $support_person);
            $this->assign('support_person', $support_person);
            $pageParam['query']['support_person'] = $support_person;
        }

        if ($support_type) {
            if ($support_type == '其他支持') {
                $record->where('support_type', 'not in', ['功能测试', '安全测试', '性能测试']);
                $this->assign('support_type', '其他支持');
            } else {
                $record->where('support_type', 'eq', $support_type);
                $this->assign('support_type', $support_type);
            }

            $pageParam['query']['support_type'] = $support_type;
        }

        $record->where('delflag', 0);

        $data = $record->alias('r')->join('userinfo u', 'r.support_person=u.username')->field('r.id,project_subcompany,apply_depart,apply_person,customer_manager,
        project_manager,project_name,support_type,support_person,position,start_time,end_time,
        work_time,overtime,out_work_way,status,support_result,report_document,doc_folder,u.department,remarks')->order('start_time', 'desc')->paginate(20, false, $pageParam);
        $this->assign('record', $data);
        return $this->fetch();
    }


    // 下载导入模板
    public function downTemplete()
    {
        $attach_path = 'excel/moban.xlsx';
        $attach_name = 'moban.xlsx';
        $filepath = ROOT_PATH . 'public' . DS . 'static' . DS . $attach_path;
        if (is_file($filepath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . ($attach_name ? $attach_name : basename($filepath)));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath));
            readfile($filepath);
        } else {
            $this->error('无法获取该附件');
            exit;
        }
    }

    //导出记录
    public function export()
    {
        if (!session('isadmin')) {
            $this->error('您没有权限导出记录');
            exit;
        }

        $project_name = input('get.project_name') ? input('get.project_name') : '';
        $start_time = input('get.start_time') ? input('get.start_time') : '';
        $end_time = input('get.end_time') ? input('get.end_time') : '';
        $support_person = input('get.support_person') ? input('get.support_person') : '';
        $support_type = input('get.support_type') ? input('get.support_type') : '';

        $person = db('userinfo')->where('forbidden', '0')->select();
        $this->assign('user', $person);

        $pageParam = ['query' => []];

        $record = db('record');

        if ($project_name) {
            $record->where('project_name', 'like', '%' . $project_name . '%');
            $this->assign('project_name', $project_name);
            $pageParam['query']['project_name'] = $project_name;
        }

        if ($start_time) {
            $record->where('start_time', 'egt', $start_time);
            $this->assign('start_time', $start_time);
            $pageParam['query']['start_time'] = $start_time;
        }

        if ($end_time) {
            $record->where('end_time', 'elt', $end_time);
            $this->assign('end_time', $end_time);
            $pageParam['query']['end_time'] = $end_time;
        }

        if ($support_person) {
            $record->where('support_person', 'eq', $support_person);
            $this->assign('support_person', $support_person);
            $pageParam['query']['support_person'] = $support_person;
        }

        if ($support_type) {
            if ($support_type == '其他支持') {
                $record->where('support_type', 'not in', ['功能测试', '安全测试', '性能测试']);
                $this->assign('support_type', '其他支持');
            } else {
                $record->where('support_type', 'eq', $support_type);
                $this->assign('support_type', $support_type);
            }

            $pageParam['query']['support_type'] = $support_type;
        }

        $record->where('delflag', 0);

        // halt(session('exportdata')->field('id,project_subcompany,apply_depart,apply_person,customer_manager,
        // project_manager,project_name,support_type,support_person,position,start_time,end_time,
        // work_time,overtime,out_work_way,status,support_result,report_document,doc_folder,department,remarks')->select());
        $export = $record->alias('r')->join('userinfo u', 'r.support_person=u.username')->field('r.id,project_subcompany,apply_depart,apply_person,customer_manager,
        project_manager,project_name,support_type,support_person,position,out_work_way,start_time,end_time,
        work_time,overtime,status,support_result,report_document,doc_folder,u.department,remarks')->order('project_name asc','apply_person asc','support_person asc','start_time asc','work_time desc')->select();
        $fileHeader = array(
            '编号', '所属子公司', '申请部门', '申请人', '客户经理',
            '项目经理', '项目名称', '支持类型', '支持人', '职位', '支持方式', '实际开始时间', '实际结束时间',
            '工作量', '加班量', '完成状态', '支持成果', '报告文档', '文档所在文件夹', '支持部门', '备注'
        );


        $newdata=[];
        

        // 格式化工作量时间为数字
        foreach($export as $row){
           
            foreach($row as $column=>$value){
                
                if($column=="work_time" and count(explode('*',$value))==2){
                    
                    $num1=intval(explode('*',$value)[0]);
                    $num2=intval(explode('*',$value)[1]);
                    $row[$column]=strval($num1*$num2);
                    
                }
                if($column=="overtime" and count(explode('*',$value))==2){
                    
                    $num1=intval(explode('*',$value)[0]);
                    $num2=intval(explode('*',$value)[1]);
                    $row[$column]=strval($num1*$num2);    
                }

            }

            $newdata[]=$row;
        }




        $tongji = array(['编号', '名称', '工作量', '支持次数', '占比']);


        //分公司支持统计
        $subcom_count = $this->chartsByType('project_subcompany', $start_time, $end_time, $support_person);

        //计算总量
        $all_work = 0;
        $all_count = 0;
        foreach ($subcom_count as $key => $value) {
            if ($value[1]) {
                $all_work += (int) $value[1];
            }

            if ($value[2]) {
                $all_count += (int) $value[2];
            }
        }

        array_push($tongji, array('1', '总计', $all_work, $all_count, '100%'));
        array_push($tongji, array('', '', '', '', ''));

        array_push($tongji, array('编号', '按所属分公司统计', '工作量', '支持次数', '工作量占比'));
        $i = 1;
        foreach ($subcom_count as $key => $value) {
            array_unshift($value, $i++);
            array_push($value, round(($value[2] / $all_work) * 100, 2) . '%');
            array_push($tongji, $value);
        }

        //空出一行来进行分类
        array_push($tongji, array('', '', '', '', ''));

        //支持类型统计，需要将一些支持归类到其他支持中

        array_push($tongji, array('编号', '按支持类型统计', '工作量', '支持次数', '工作量占比'));
        $k = 1;
        $all_type_count = $this->chartsByType('support_type', $start_time, $end_time, $support_person);

        $type_count = array();
        $type_other = array('其他支持', 0, 0);
        foreach ($all_type_count as $key => $value) {
            if ($value[0] != '功能测试' && $value[0] != '性能测试' && $value[0] != '安全测试' && $value[0] != '其他支持') {
                $type_other[1] += $value[1];
                $type_other[2] += $value[2];
            } else {
                $type_count[] = $value;
            }
        }
        $type_count[] = $type_other;

        $j = 1;
        foreach ($type_count as $key => $value) {
            array_unshift($value, $j++);
            array_push($value, round(($value[2] / $all_work) * 100, 2) . '%');
            array_push($tongji, $value);
        }


        

        //支持人统计
        array_push($tongji, array('', '', '', '', ''));
        array_push($tongji, array('编号', '按支持人统计', '工作量', '支持次数', '工作量占比'));
        $person_count = $this->chartsByType('support_person', $start_time, $end_time, $support_person);
        $k = 1;
        foreach ($person_count as $key => $value) {
            array_unshift($value, $k++);
            array_push($value, round(($value[2] / $all_work) * 100, 2) . '%');
            array_push($tongji, $value);
        }

        $this->exportExcel($newdata, $tongji, '支持记录', $fileHeader, '项目支持记录');
    }


    public function exportExcel($data, $tongji, $savefile, $fileheader, $sheetname)
    {
        // halt($data);
        Vendor('PHPExcel.PHPExcel');
        Vendor('PHPExcel.PHPExcel.Reader.Excel2007');
        //或者excel5，用户输出.xls，不过貌似有bug，生成的excel有点问题，底部是空白，不过不影响查看。
        //new一个PHPExcel类，或者说创建一个excel，tp中“\”不能掉
        $excel = new \PHPExcel();
        if (is_null($savefile)) {
            $savefile = time();
        } else {
            //防止中文命名，下载时ie9及其他情况下的文件名称乱码
            iconv('UTF-8', 'GB2312', $savefile);
        }
        //设置excel属性
        $objActSheet = $excel->getActiveSheet();
        //根据有生成的excel多少列，$letter长度要大于等于这个值
        $letter = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U');
        //设置当前的sheet
        $excel->setActiveSheetIndex(0);
        //设置sheet的name
        $objActSheet->setTitle($sheetname);
        //设置表头
        for ($i = 0; $i < count($fileheader); $i++) {
            //单元宽度自适应,1.8.1版本phpexcel中文支持勉强可以，自适应后单独设置宽度无效
            //$objActSheet->getColumnDimension("$letter[$i]")->setAutoSize(true);
            //设置表头值，这里的setCellValue第二个参数不能使用iconv，否则excel中显示false
            $objActSheet->setCellValue("$letter[$i]1", $fileheader[$i]);
            //设置表头字体样式
            $objActSheet->getStyle("$letter[$i]1")->getFont()->setName('微软雅黑');
            //设置表头字体大小
            $objActSheet->getStyle("$letter[$i]1")->getFont()->setSize(11);
            //设置表头字体是否加粗
            $objActSheet->getStyle("$letter[$i]1")->getFont()->setBold(true);
            //设置表头文字垂直居中
            $objActSheet->getStyle("$letter[$i]1")->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            //设置文字上下居中
            $objActSheet->getStyle($letter[$i])->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            //设置表头外的文字垂直居中
            $excel->setActiveSheetIndex(0)->getStyle($letter[$i])->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
        }

        //单独设置D列宽度为15
        // $objActSheet->getColumnDimension('D')->setWidth(15);
        //这里$i初始值设置为2，$j初始值设置为0，自己体会原因
        for ($i = 2; $i <= count($data) + 1; $i++) {
            $j = 0;
            array_pop($data[$i - 2]); //将sql server数据库自带数据中最后一列row_number 去掉
            foreach ($data[$i - 2] as $key => $value) {
                //excel表格从A2开始,第一行为标题fileheader,上面已经设置，data从0开始
                $objActSheet->setCellValue("$letter[$j]$i", $value);
                $j++;
            }
            //设置单元格高度，暂时没有找到统一设置高度方法
            $objActSheet->getRowDimension($i)->setRowHeight('80px');
        }


        $excel->createSheet();

        $excel->setActiveSheetIndex(1);
        $sheet2 = $excel->getActiveSheet();
        $sheet2->setTitle('统计');
        $tongji_letter = array('A', 'B', 'C', 'D', 'E');

        // halt($tongji);

        for ($m = 1; $m <= count($tongji); $m++) { // 行坐标
            $n = 0;
            foreach ($tongji[$m - 1] as $key => $value) { //每行数据
                $sheet2->setCellValue("$tongji_letter[$n]$m", $value);
                $n++;
            }
        }

        $excel->setActiveSheetIndex(0); //默认打开excel为记录详情页


        header('Content-Type: application/vnd.ms-excel');
        //下载的excel文件名称，为Excel5，后缀为xls，不过影响似乎不大
        header('Content-Disposition: attachment;filename="' . $savefile . '.xlsx"');
        header('Cache-Control: max-age=0');

        // 用户下载excel
        $objWriter = \PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $objWriter->save('php://output');
    }


    public function person()
    {
        $start_time = input('get.start_time') ? input('get.start_time') : '';
        $end_time = input('get.end_time') ? input('get.end_time') : '';
        $support_person = session('username');

        $subcom_count = $this->chartsByType('project_subcompany', $start_time, $end_time, $support_person);
        $this->assign('subcom_count', $subcom_count);

        $person_count = $this->chartsByType('support_person', $start_time, $end_time, $support_person);
        $this->assign('person_count', $person_count);

        $all_type_count = $this->chartsByType('support_type', $start_time, $end_time, $support_person);

        $type_count = array();
        $type_other = array('其他支持', 0, 0);
        foreach ($all_type_count as $key => $value) {
            if ($value[0] != '功能测试' && $value[0] != '性能测试' && $value[0] != '安全测试' && $value[0] != '其他支持') {
                $type_other[1] += $value[1];
                $type_other[2] += $value[2];
            } else {
                $type_count[] = $value;
            }
        }
        $type_count[] = $type_other;

        $this->assign('type_count', $type_count);
        return $this->fetch();
    }
}
