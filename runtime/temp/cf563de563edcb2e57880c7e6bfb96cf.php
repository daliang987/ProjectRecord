<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:71:"D:\xampp\htdocs\wdl\public/../application/index\view\record\charts.html";i:1585028492;s:54:"D:\xampp\htdocs\wdl\application\index\view\layout.html";i:1585028492;}*/ ?>
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
            <i class="fa fa-pie-chart"></i> 记录统计 </h1>
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
<form class="form-horizontal">
    <div class="form-group">
        <div class="row">
            <div class="col-md-2">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" id="time_cbox" <?php if(isset($start_time) or isset($end_time)): ?>
                            checked="checked" <?php endif; ?>> 按时间检索 </label> </div> </div> <div class="col-md-3">
                        <?php if(isset($start_time)): ?>
                        <input type="text" autocomplete="off" name="start_time" placeholder="开始时间" value="<?php echo $start_time; ?>"
                            class="form-control" id="date_timepicker_start"> <?php else: ?>
                        <input type="text" autocomplete="off" name="start_time" placeholder="开始时间" disabled="true"
                            class="form-control" id="date_timepicker_start"> <?php endif; ?>

                </div>
                <div class="col-md-3">
                    <?php if(isset($end_time)): ?>
                    <input type="text" autocomplete="off" name="end_time" placeholder="结束时间" value="<?php echo $end_time; ?>"
                        class="form-control" id="date_timepicker_end"> <?php else: ?>
                    <input type="text" autocomplete="off" name="end_time" placeholder="结束时间" disabled="true"
                        class="form-control" id="date_timepicker_end"> <?php endif; ?>

                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="person_cbox" <?php if(isset($support_person)): ?>
                                checked="checked" <?php endif; ?>> 按人员检索</label> </div> </div> <div class="col-md-3">
                            <?php if(isset($support_person)): ?>
                            <select name="support_person" class="form-control" id="select_person">
                                <?php if(is_array($user) || $user instanceof \think\Collection || $user instanceof \think\Paginator): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u): $mod = ($i % 2 );++$i;?>
                                <option value="<?php echo $u['username']; ?>" <?php if($u['username'] == $support_person): ?> selected
                                    <?php endif; ?>><?php echo $u['username']; ?> </option> <?php endforeach; endif; else: echo "" ;endif; ?> </select> <?php else: ?> <select
                                    name="support_person" class="form-control" id="select_person" disabled="true">
                                    <?php if(is_array($user) || $user instanceof \think\Collection || $user instanceof \think\Paginator): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u): $mod = ($i % 2 );++$i;?>
                                <option value="<?php echo $u['username']; ?>"><?php echo $u['username']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                            <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">检索</button>
            </div>
</form>


<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-title">支持总数</div>
            <table class="table table-striped table-hover table-bordered">
                <tr>
                    <th>支持次数</th>
                    <th>工作量(小时)</th>
                </tr>
                <tr>
                    <td id="total_count"></td>
                    <td id="total_work"></td>
                </tr>
            </table>

        </div>
    </div>
    <div class="col-md-6">
        <div class="tile">
            <div class="tile-title">按所属地区统计</div>
            <table class="table table-striped table-hover table-bordered">
                <tr>
                    <th>所属分公司</th>
                    <th>支持次数</th>
                    <th>工作量(小时)</th>
                </tr>
                <?php if(is_array($subcom_count) || $subcom_count instanceof \think\Collection || $subcom_count instanceof \think\Paginator): $i = 0; $__LIST__ = $subcom_count;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo $sub[0]; ?></td>
                    <td><?php echo $sub[2]; ?></td>
                    <td><?php echo $sub[1]; ?></td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </table>

        </div>
    </div>

    <div class="col-md-6">
        <div class="tile">
            <div class="tile-title">按支持类型统计</div>
            <table id="type_count" class="table table-striped table-hover table-bordered">
                <tr>
                    <th>支持类型</th>
                    <th>支持次数</th>
                    <th>工作量(小时)</th>
                </tr>
                <?php if(is_array($type_count) || $type_count instanceof \think\Collection || $type_count instanceof \think\Paginator): $i = 0; $__LIST__ = $type_count;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type): $mod = ($i % 2 );++$i;if($type[1]): ?>
                <tr>
                    <td><?php echo $type[0]; ?></td>
                    <td><?php echo $type[2]; ?></td>
                    <td><?php echo $type[1]; ?></td>
                </tr>
                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </table>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="tile">
            <div class="tile-title">按人员工作量统计</div>
            <table class="table table-striped table-hover table-bordered">
                <tr>
                    <th>人员</th>
                    <th>支持次数</th>
                    <th>工作量(小时)</th>
                </tr>
                <?php if(is_array($person_count) || $person_count instanceof \think\Collection || $person_count instanceof \think\Paginator): $i = 0; $__LIST__ = $person_count;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p): $mod = ($i % 2 );++$i;?>

                <tr>
                    <td><?php echo $p[0]; ?></td>
                    <td><?php echo $p[2]; ?></td>
                    <td><?php echo $p[1]; ?></td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </table>
        </div>
    </div>
</div>
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

        $('#person_cbox').click(function () {
            if (!$('#person_cbox').attr('checked')) {
                $('#person_cbox').attr('checked', 'checked');
                $('#select_person').removeAttr('disabled');
            } else {
                $('#person_cbox').removeAttr('checked');
                $('#select_person').attr('disabled', 'disabled');
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

        var total_count = 0;
        var total_work = 0;
        $("#type_count").find("tr").each(function(){
            if($(this).find('td')){
                $(this).find("td").each(function(i,el){
                    if(i==1){
                        total_count+=parseInt($(el).text());
                    }
                    if(i==2){
                        total_work+=parseInt($(el).text());
                    }
                    
                });
            }
            
        });
        



        if (total_count != 0 && total_count != 0) {
            $('#total_count').text(total_count);
            $('#total_work').text(total_work);
        }

    })
</script> 

        </main>
    </div>
</body>

<!-- <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script> -->
<!-- Main CSS-->
<link rel="stylesheet" type="text/css" href="/wdl/public/static/css/main.css">
<script src="/wdl/public/static/js/main.js"></script>

</html>