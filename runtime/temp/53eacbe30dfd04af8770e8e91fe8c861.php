<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:71:"D:\xampp\htdocs\wdl\public/../application/index\view\record\search.html";i:1585028492;s:54:"D:\xampp\htdocs\wdl\application\index\view\layout.html";i:1585028492;}*/ ?>
<!DOCTYPE html>
<html lang="cn">

<head>
    <title>项目管理系统</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <script>
        window.hdjs = {};
        //组件目录必须绝对路径(在网站根目录时不用设置)
        window.hdjs.base = '/wdl/public/static/node_modules/hdjs';
        //上传文件后台地址
        window.hdjs.uploader = 'test/php/uploader.php?';
        //获取文件列表的后台地址
        window.hdjs.filesLists = 'test/php/filesLists.php?';
    </script>

    <script src="/wdl/public/static/node_modules/hdjs/static/requirejs/require.js"></script>
    <script src="/wdl/public/static/node_modules/hdjs/static/requirejs/config.js"></script>
</head>
<link rel="stylesheet" href="/wdl/public/static/node_modules/hdjs/dist/hdjs.css">

<body class="app sidebar-mini rtl">
    <div hd-cloak>
        <!-- Navbar-->
        <header class="app-header">
            <a class="app-header__logo" href="index.html">TRS</a>
            <!-- Sidebar toggle button-->
            <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
            <!-- Navbar Right Menu-->
            <ul class="app-nav">
                <!-- User Menu-->
                <li class="dropdown">
                    <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
                        <i class="fa fa-user-circle fa-lg"></i>&nbsp;&nbsp;&nbsp;<strong><?php echo session('username'); ?></strong>
                    </a>
                    <ul class="dropdown-menu settings-menu dropdown-menu-right">
                        <li>
                            <a class="dropdown-item" href="<?php echo url('index/index/pass'); ?>">
                                <i class="fa fa-cog fa-lg"></i> 修改密码</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?php echo url('index/index/logout'); ?>">
                                <i class="fa fa-sign-out fa-lg"></i> 注销</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </header>
        <!-- Sidebar menu-->
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <aside class="app-sidebar">
            <div class="app-sidebar__user">
                <img class="app-sidebar__user-avatar" src="/wdl/public/static/image/header.jpg" width="60" alt="User Image">
                <div>
                    <p class="app-sidebar__user-name"><?php echo session('username'); ?></p>
                    <p class="app-sidebar__user-designation"><?php echo session('department'); ?></p>
                </div>
            </div>
            <ul class="app-menu">
                <li>
                    <a class="app-menu__item" href="<?php echo url('index/record/person'); ?>">
                        <i class="app-menu__icon fa fa-dashboard"></i>
                        <span class="app-menu__label">主面板</span>
                    </a>
                </li>
                <li class="treeview">
                    <a class="app-menu__item" href="javascript:void(0)" data-toggle="treeview">
                        <i class="app-menu__icon fa fa-laptop"></i>
                        <span class="app-menu__label">个人记录</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a class="treeview-item" href="<?php echo url('index/record/index'); ?>">
                                <i class="icon fa fa-circle-o"></i> 所有记录</a>
                        </li>
                        <li>
                            <a class="treeview-item" href="<?php echo url('index/record/store'); ?>" rel="noopener">
                                <i class="icon fa fa-circle-o"></i> 添加记录</a>
                        </li>
                        <li>
                            <a class="treeview-item" href="<?php echo url('index/record/import'); ?>">
                                <i class="icon fa fa-circle-o"></i> 导入记录</a>
                        </li>

                        <li>
                            <a class="treeview-item" href="<?php echo url('index/record/trash'); ?>">
                                <i class="icon fa fa-circle-o"></i> 回收站</a>
                        </li>
                    </ul>
                </li>

                <li class="treeview">
                    <a class="app-menu__item" href="javascript:void(0)" data-toggle="treeview">
                        <i class="app-menu__icon fa fa-pie-chart"></i>
                        <span class="app-menu__label">记录分析</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a class="treeview-item" href="<?php echo url('index/record/search'); ?>">
                                <i class="icon fa fa-circle-o"></i> 记录查找</a>
                        </li>
                        <li>
                            <a class="treeview-item" href="<?php echo url('index/record/charts'); ?>" rel="noopener">
                                <i class="icon fa fa-circle-o"></i> 记录分析</a>
                        </li>

                    </ul>
                </li>
                <li class="treeview">
                    <a class="app-menu__item" href="javascript:void(0)" data-toggle="treeview">
                        <i class="app-menu__icon fa fa-edit"></i>
                        <span class="app-menu__label">人员管理</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a class="treeview-item" href="<?php echo url('index/user/index'); ?>">
                                <i class="icon fa fa-circle-o"></i> 所有人员</a>
                        </li>
                        <li>
                            <a class="treeview-item" href="<?php echo url('index/user/store'); ?>">
                                <i class="icon fa fa-circle-o"></i> 添加人员</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a class="app-menu__item" href="javascript:void(0)" data-toggle="treeview">
                        <i class="app-menu__icon fa fa-th-list"></i>
                        <span class="app-menu__label">其他管理</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a class="treeview-item" href="<?php echo url('index/company/index'); ?>">
                                <i class="icon fa fa-circle-o"></i> 组织管理</a>
                        </li>
                        <li>
                            <a class="treeview-item" href="<?php echo url('index/record/admintrash'); ?>">
                                <i class="icon fa fa-circle-o"></i> 删除记录管理</a>
                        </li>
                    </ul>
                </li>

                <li class="treeview">
                    <a class="app-menu__item" href="javascript:void(0)" data-toggle="treeview">
                        <i class="app-menu__icon fa fa-file-text"></i>
                        <span class="app-menu__label">帮助</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a class="treeview-item" href="<?php echo url('index/help/manual'); ?>">
                                <i class="icon fa fa-circle-o"></i> 填写说明</a>
                        </li>
                        <li>
                            <a class="treeview-item" href="<?php echo url('index/help/bug'); ?>">
                                <i class="icon fa fa-circle-o"></i> Bug反馈</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </aside>

        <main class="app-content">

            
<div class="app-title">
    <div>
        <h1>
            <i class="fa fa-pie-chart"></i>记录查找</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">
            <i class="fa fa-home fa-lg"></i>
        </li>
        <li class="breadcrumb-item">
            <a href="#">记录分析</a>
        </li>
    </ul>
</div>
<link rel="stylesheet" href="/wdl/public/static/css/index.css">
<form class="form-horizontal">
    <div class="form-group">
        <div class="row">
            <div class="col-md-2">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" id="pname_cbox" <?php if(isset($project_name)): ?> checked="checked" <?php endif; ?>> 按项目名称检索 </label>
                </div>
            </div>
            <div class="col-md-6">
                <?php if(isset($project_name)): ?>
                <input type="text" name="project_name" value="<?php echo $project_name; ?>" placeholder="项目名称" class="form-control" id="project_name"> <?php else: ?>
                <input type="text" name="project_name" disabled="true" placeholder="项目名称" class="form-control" id="project_name"> <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-2">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" id="time_cbox" <?php if(isset($start_time) or isset($end_time)): ?> checked="checked" <?php endif; ?>> 按时间检索 </label>
                </div>
            </div>
            <div class="col-md-3">
                <?php if(isset($start_time)): ?>
                <input type="text" name="start_time" autocomplete="off" placeholder="开始时间" value="<?php echo $start_time; ?>" class="form-control" id="date_timepicker_start"> <?php else: ?>
                <input type="text" name="start_time" autocomplete="off" placeholder="开始时间" disabled="true" class="form-control" id="date_timepicker_start"> <?php endif; ?>

            </div>
            <div class="col-md-3">
                <?php if(isset($end_time)): ?>
                <input type="text" name="end_time" autocomplete="off" placeholder="结束时间" value="<?php echo $end_time; ?>" class="form-control" id="date_timepicker_end"> <?php else: ?>
                <input type="text" name="end_time" autocomplete="off" placeholder="结束时间" disabled="true" class="form-control" id="date_timepicker_end"> <?php endif; ?>

            </div>

        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-2">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" id="person_cbox" <?php if(isset($support_person)): ?> checked="checked" <?php endif; ?>> 按人员检索</label>
                </div>
            </div>
            <div class="col-md-3">
                <?php if(isset($support_person)): ?>
                <select name="support_person" class="form-control" id="select_person">
                    <?php if(is_array($user) || $user instanceof \think\Collection || $user instanceof \think\Paginator): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo $u['username']; ?>" <?php if($u['username'] == $support_person): ?> selected <?php endif; ?>><?php echo $u['username']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
                <?php else: ?>
                <select name="support_person" class="form-control" id="select_person" disabled="true">
                    <?php if(is_array($user) || $user instanceof \think\Collection || $user instanceof \think\Paginator): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo $u['username']; ?>"><?php echo $u['username']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">

            <div class="col-md-2">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" id="type_cbox" <?php if(isset($support_type)): ?> checked="checked" <?php endif; ?>> 按支持类型
                    </label>
                </div>
            </div>
            <div class="col-md-3">
                <?php if(isset($support_type)): ?>
                <select class="form-control" name="support_type" id="select_type">
                    <option value="功能测试" <?php if($support_type == '功能测试'): ?> selected <?php endif; ?>>功能测试</option>
                    <option value="性能测试" <?php if($support_type == '性能测试'): ?> selected <?php endif; ?>>性能测试</option>
                    <option value="安全测试" <?php if($support_type == '安全测试'): ?> selected <?php endif; ?>>安全测试</option>
                    <option value="其他支持" <?php if($support_type == '其他支持'): ?> selected <?php endif; ?>>其他支持</option>

                </select>
                <?php else: ?>
                <select class="form-control" name="support_type" id="select_type" disabled="true">
                    <option value="功能测试">功能测试</option>
                    <option value="性能测试">性能测试</option>
                    <option value="安全测试">安全测试</option>
                    <option value="其他支持">其他</option>
                </select>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <button class="btn btn-primary">检索</button>&nbsp;&nbsp;&nbsp;
        <a href="<?php echo url('index/record/export'); ?>?<?php echo $_SERVER['QUERY_STRING']; ?>" class="btn btn-danger">导出记录</a>
    </div>
</form>
<hr>

<div class="all-column">
    <table class="table table-striped table-bordered">
        <tr>
            <th>删除</th>
            <th>id</th>
            <th>分公司</th>
            <th>申请部门</th>
            <th>申请人</th>
            <th>客户经理</th>
            <th>项目经理</th>
            <th>项目名称</th>
            <th>支持类型</th>
            <th>支持人</th>
            <th>职位</th>
            <th>支持方式</th>
            <th>开始时间</th>
            <th>结束时间</th>
            <th>工作量</th>
            <th>加班量</th>
            <th>状态</th>
            <th>支持成果</th>
            <th>报告文档</th>
            <th>备注</th>
            <th>文档存在目录</th>
            <th>支持部门</th>
        </tr>
        <?php if(is_array($record) || $record instanceof \think\Collection || $record instanceof \think\Paginator): $i = 0; $__LIST__ = $record;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($i % 2 );++$i;?>
        <tr>
            <td><a href="javascript:del(<?php echo $r['id']; ?>)">删除</a></td>
            <td><a href="<?php echo url('index/record/edit',['id'=>$r['id']]); ?>"><?php echo $r['id']; ?></a></td>
            <td><?php echo $r['project_subcompany']; ?></td>
            <td><?php echo $r['apply_depart']; ?></td>
            <td><?php echo $r['apply_person']; ?></td>
            <td><?php echo $r['customer_manager']; ?></td>
            <td><?php echo $r['project_manager']; ?></td>
            <td><?php echo $r['project_name']; ?></td>
            <td><?php echo $r['support_type']; ?></td>
            <td><?php echo $r['support_person']; ?></td>
            <td><?php echo $r['position']; ?></td>
            <td><?php echo $r['out_work_way']; ?></td>
            <td><?php echo $r['start_time']; ?></td>
            <td><?php echo $r['end_time']; ?></td>
            <td><?php echo $r['work_time']; ?></td>
            <td><?php echo $r['overtime']; ?></td>
            <td>
                <?php if($r['status'] != '已完成'): ?>
                <span class="text-danger"><b><?php echo $r['status']; ?></b></span>
                <?php else: ?>
                <?php echo $r['status']; endif; ?>
            </td>
            <td><?php echo $r['support_result']; ?></td>
            <td><?php echo $r['report_document']; ?></td>
            <td><?php echo $r['remarks']; ?></td>
            <td><?php echo $r['doc_folder']; ?></td>
            <td><?php echo $r['department']; ?></td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
</div>
<?php echo $record->render(); ?>


<script>
    require(['hdjs'], function (hdjs) {
        hdjs.datetimepicker('#date_timepicker_start', {
            format: 'Y-m-d',
            onShow: function (ct) {
                this.setOptions({
                    maxDate: jQuery('#date_timepicker_end').val() ? jQuery('#date_timepicker_end').val() : false
                })
            },
            timepicker: false
        });
        hdjs.datetimepicker('#date_timepicker_end', {
            format: 'Y-m-d',
            onShow: function (ct) {
                this.setOptions({
                    minDate: jQuery('#date_timepicker_start').val() ? jQuery('#date_timepicker_start').val() : false
                })
            },
            timepicker: false
        });

        $('#pname_cbox').click(function () {
            if (!$('#pname_cbox').attr('checked')) {
                $('#pname_cbox').attr('checked', 'checked');
                $('#project_name').removeAttr('disabled');
            } else {
                $('#pname_cbox').removeAttr('checked');
                $('#project_name').attr('disabled', 'disabled');
            }
        });

        $('#time_cbox').click(function () {
            if (!$('#time_cbox').attr('checked')) {
                $('#time_cbox').attr('checked', 'checked');
                $('#date_timepicker_start').removeAttr('disabled');
                $('#date_timepicker_end').removeAttr('disabled');
            } else {
                $('#time_cbox').removeAttr('checked');
                $('#date_timepicker_start').attr('disabled', 'disabled');
                $('#date_timepicker_end').attr('disabled', 'disabled');
            }
        });


        $('#person_cbox').click(function () {
            if (!$('#person_cbox').attr('checked')) {
                $('#person_cbox').attr('checked', 'checked');
                $('#select_person').removeAttr('disabled');
            } else {
                $('#person_cbox').removeAttr('checked');
                $('#select_person').attr('disabled', 'disabled');
            }
        });

        $('#type_cbox').click(function () {
            if (!$('#type_cbox').attr('checked')) {
                $('#type_cbox').attr('checked', 'checked');
                $('#select_type').removeAttr('disabled');
            } else {
                $('#type_cbox').removeAttr('checked');
                $('#select_type').attr('disabled', 'disabled');
            }
        })

    });
    function del(id) {
        require(['hdjs'], function (hdjs) {
            hdjs.confirm('确定删除吗?', function () {
                location.href="<?php echo url('del'); ?>"+"?id="+id;
            })
        });
    }

</script> 

        </main>
    </div>
</body>

<!-- <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script> -->
<!-- Main CSS-->
<link rel="stylesheet" type="text/css" href="/wdl/public/static/css/main.css">
<script src="/wdl/public/static/js/main.js"></script>

</html>