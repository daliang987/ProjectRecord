<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:69:"D:\xampp\htdocs\wdl\public/../application/index\view\record\edit.html";i:1626858461;s:54:"D:\xampp\htdocs\wdl\application\index\view\layout.html";i:1593596695;}*/ ?>
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
                        <i class="app-menu__icon fa fa-id-card-o"></i>
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
            <i class="fa fa-dashboard"></i> 添加记录 </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">
            <i class="fa fa-home fa-lg"></i>
        </li>
        <li class="breadcrumb-item">
            <a href="#">个人记录</a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-md-6">
        <form role="form" method="POST">
            <div class="form-group has-feedback">
                <label for="area">所属区域</label>
                <select class="form-control" name="project_subcompany" id="area">
                    <option selected disabled>所属区域</option>
                    <?php if(is_array($_com) || $_com instanceof \think\Collection || $_com instanceof \think\Paginator): $i = 0; $__LIST__ = $_com;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$com): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo $com['com_name']; ?>" <?php if($data['project_subcompany']==$com['com_name']): ?> selected
                        <?php endif; ?>><?php echo $com['com_name']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
            <div class="form-group has-feedback">
                <label for="depart">申请部门</label>
                <select class="form-control" id="depart" name="apply_depart">
                    <option value="<?php echo $data['apply_depart']; ?>" selected><?php echo $data['apply_depart']; ?></option>
                </select>
                <span class="help-block">选择所属区域后，稍等片刻选择申请部门.</span>
            </div>
            <div class="form-group has-feedback">
                <label for="apply_person">申请人</label>
                <input type="text" class="form-control" id="apply_person" value="<?php echo $data['apply_person']; ?>"
                    name="apply_person" placeholder="请输入申请人">
                <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
                <span id="apply_person" class="sr-only">(success)</span>
                <span class="help-block">表单申请人姓名</span>
            </div>
            <div class="form-group">
                <label for="customer_manager">客户经理</label>
                <input type="text" class="form-control" id="customer_manager" value="<?php echo $data['customer_manager']; ?>"
                    name="customer_manager" placeholder="请输入客户经理">
                <span class="help-block">客户方经理姓名</span>
            </div>
            <div class="form-group">
                <label for="project_manager">项目经理</label>
                <input type="text" class="form-control" id="project_manager" value="<?php echo $data['project_manager']; ?>"
                    name="project_manager" placeholder="请输入项目经理">
                <span class="help-block">项目经理姓名</span>
            </div>
            <div class="form-group has-feedback">
                <label for="project_name">项目名称</label>
                <input type="text" class="form-control" id="project_name" value="<?php echo $data['project_name']; ?>"
                    name="project_name" placeholder="请输入项目名称">
                <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
                <span id="project_name" class="sr-only">(success)</span>
                <span class="text-danger">请填写项目标准名称 格式：单位+项目名称 如：新疆日报社石榴云平台项目</span>
            </div>
            <div class="form-group">
                <label for="support_type">支持内容</label>
                <select class="form-control" name="support_type" id="support_type">
                    <option value="性能测试" <?php if($data['support_type']=='性能测试'): ?> selected<?php endif; ?>>性能测试</option>
                    <option value="安全测试" <?php if($data['support_type']=='安全测试'): ?> selected<?php endif; ?>>安全测试</option>
                    <option value="功能测试" <?php if($data['support_type']=='功能测试'): ?> selected<?php endif; ?>>功能测试</option>

                    <option value="其他" <?php if($data['support_type'] != '性能测试' AND $data['support_type'] != '功能测试' AND $data['support_type'] != '安全测试'): ?> selected <?php endif; ?>>其他</option>
                </select>
            </div>

            <div class="form-group" id="other_support">
                <label for="other">其他支持</label>
                <input type="text" name="other" <?php if($data['support_type'] != '性能测试' AND $data['support_type'] != '功能测试' AND $data['support_type'] != '安全测试'): ?> value='<?php echo $data['support_type']; ?>' <?php endif; ?> id="other" class="form-control">
                <span class="help-block">其他类型支持时，填写此内容.</span>
            </div>

            <div class="form-group has-feedback">
                <label for="support_person">支持人</label>
                <input type="text" class="form-control" id="support_person" value="<?php echo $data['support_person']; ?>"
                    name="support_person" placeholder="请输入支持人">
                <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
                <span id="support_person" class="sr-only">(success)</span>
                <span class="help-block">支持人姓名.</span>
            </div>
            <div class="form-group">
                <label for="position">职位</label>
                <?php echo $data['position']; ?>
                <select class="form-control" name="position">
                    <option value="助理测试工程师" <?php if(in_array(($data['position']), explode(',',"助理工程师,助理测试工程师"))): ?> selected <?php endif; ?>>助理测试工程师
                    </option>
                    <option value="测试工程师" <?php if($data['position']=='测试工程师'): ?> selected <?php endif; ?>>测试工程师</option>
                    <option value="高级测试工程师" <?php if(in_array(($data['position']), explode(',',"高级工程师,高级测试工程师"))): ?> selected <?php endif; ?>>高级测试工程师
                    </option>
                    <option value="部门经理" <?php if(in_array(($data['position']), explode(',',"部门经理,经理"))): ?> selected <?php endif; ?>>部门经理</option>
                    <option value="其他" <?php if(!in_array(($data['position']), explode(',',"助理测试工程师,测试工程师,助理工程师,高级工程师,高级测试工程师,经理,部门经理"))): ?>
                        selected <?php endif; ?>>其他</option>
                </select>
                <span class="help-block">支持人职位</span>
            </div>
            <div class="form-group has-feedback">
                <label for="date_timepicker_start">实际开始时间</label>
                <input id="date_timepicker_start" autocomplete="off" name="start_time" class="form-control"
                    value="<?php echo $data['start_time']; ?>">
                <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
                <span id="date_timepicker_start" class="sr-only">(success)</span>
                <span class="help-block">支持的实际开始时间</span>
            </div>
            <div class="form-group">
                <label for="date_timepicker_end">实际结束时间</label>
                <input id="date_timepicker_end" autocomplete="off" name="end_time" class="form-control"
                    value="<?php echo $data['end_time']; ?>">
                <span class="help-block">支持的实际结束时间</span>
            </div>
            <div class="form-group has-feedback">
                <label for="work_time">总工作量(单位:小时)</label>
                <input type="text" class="form-control" name="work_time" value="<?php echo $data['work_time']; ?>" id="work_time"
                    placeholder="请输入工作量">
                <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
                <span id="work_time" class="sr-only">(success)</span>
                <span class="help-block">支持的总工作量，包括加班工作量，一共支持的时间，格式如:10 或 3*8</span>
            </div>
            <div class="form-group">
                <label for="name">其中加班量(单位:小时)</label>
                <input type="text" class="form-control" name="overtime" value="<?php echo $data['overtime']; ?>" placeholder="请输入加班量">
                <span class="help-block">支持的加班工作量</span>
            </div>

            <div class="form-group">
                <label for="status">当前状态</label>
                <select class="form-control" name="status">
                    <option value="进行中" <?php if($data['status']=='进行中'): ?> selected <?php endif; ?>>进行中</option>
                    <option value="已完成" <?php if($data['status']=='完成' or $data['status']=='已完成'): ?> selected <?php endif; ?>>已完成
                    </option>
                    <option value="测试中止" <?php if($data['status']=='测试中止'): ?> selected <?php endif; ?>>测试中止</option>
                </select>
            </div>

            <div class="form-group">
                <label for="out_work_way">支持方式</label>
                <select class="form-control" name="out_work_way">
                    <option value="市内外出支持" <?php if($data['out_work_way']=='市内外出支持'): ?> selected <?php endif; ?>>市内外出支持</option>
                    <option value="市外出差支持" <?php if($data['out_work_way']=='市外出差支持'): ?> selected <?php endif; ?>>市外出差支持</option>
                    <option value="远程支持" <?php if($data['out_work_way']=='远程支持'): ?> selected <?php endif; ?>>远程支持</option>
                </select>
            </div>
            <div class="form-group">
                <label for="support_result">支持成果描述</label>
                <textarea class="form-control" id="support_result" name="support_result"
                    placeholder="请输入支持成果描述"><?php echo $data['support_result']; ?></textarea>
                <span class="help-block">简要描述支持过程及结果</span>
            </div>
            <div class="form-group">
                <label for="report_document">相关文档</label>
                <textarea class="form-control" id="report_document" name="report_document"
                    placeholder="请输入相关文档"><?php echo $data['report_document']; ?></textarea>
                <span class="help-block">项目支持输出文档</span>
            </div>
            <div class="form-group">
                <label for="doc_folder">文档存放目录</label>
                <input type="text" class="form-control" id="doc_folder" value="<?php echo $data['doc_folder']; ?>" name="doc_folder"
                    placeholder="请输入文档存放目录">
                <span class="help-block">文档统一放在192.168.105.35上，此处填写文档保存地址，格式：\\192.168.105.35\项目资料（新）\2018\2018-02-11
                    贵州海云集约化平台性能测试项目</span>
            </div>
            <div class="form-group">
                <label for="remarks">备注</label>
                <textarea name="remarks" class="form-control" id="remarks" rows="5"><?php echo $data['remarks']; ?></textarea>
                <span class="help-block">其他说明</span>
            </div>
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            <button type="submit" class="btn btn-primary">提交</button>
            <a href="javascript:history.back()" class="btn btn-danger">返回</a>
        </form>
    </div>
</div>

<script>
    require(['hdjs'], function (hdjs) {

        function load_depart() {
            $('#depart').html('');
            com = $('#area').val();
            department="<?php echo $data['apply_depart']; ?>";
            if (com != null) {
                $.post('<?php echo url("store"); ?>', { com: com }, function (data) {
                    data = eval('(' + data + ')');
                    $.each(data, function (n, value) {
                        if(value.com_name==department){
                            $('<option value="' + value.com_name + '" selected>' + value.com_name + '</option>').appendTo("#depart");
                        }
                        else{
                            $('<option value=' + value.com_name + '>' + value.com_name + '</option>').appendTo("#depart");
                        }
                    });

                });
            }
        }

        load_depart();


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

        $('#area').change(function () {
            $('#depart').html('');
            com = $('#area').val();
            $.post('<?php echo url("store"); ?>', { com: com }, function (data) {
                data = eval('(' + data + ')');
                $.each(data, function (n, value) {
                    $('<option value=' + value.com_name + '>' + value.com_name + '</option>').appendTo("#depart");
                });

            });
        });


        $('#support_type').change(function () {
            if ($("#support_type option:selected").val() == '其他') {
                $('#other_support').show();
            } else {
                $('#other_support').hide();
            }
        });
    })


</script>


<?php if($data['support_type'] != '性能测试' AND $data['support_type'] != '功能测试' AND $data['support_type'] != '安全测试'): ?>
<script>
    require(['hdjs'], function (hdjs) {
        $('#other_support').show();
    });
</script>
<?php else: ?>
<script>
    require(['hdjs'], function (hdjs) {
        $('#other_support').hide();
    }); 
</script>
<?php endif; ?>



        </main>
    </div>
</body>

<!-- <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script> -->
<!-- Main CSS-->
<link rel="stylesheet" type="text/css" href="/wdl/public/static/css/main.css">
<script src="/wdl/public/static/js/main.js"></script>
<script>
    current_url = '<?php echo request()->url(); ?>';
    console.log(current_url)
    window.onload = function () {
        $('.treeview-menu').find('a').each(function () {
            console.log($(this).attr('href'));
            if ($(this).attr('href') == current_url) {
                $(this).parent().parent().parent().addClass('is-expanded')
                $(this).parent().addClass('select-menu')
            }
        })
    }
</script>
<style>
    .select-menu {
        border-width: 1px;
        border-style: dotted;
        border-color:#fff;
        background-color:black;
    }
</style>

</html>