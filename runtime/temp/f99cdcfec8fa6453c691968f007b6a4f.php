<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:71:"D:\xampp\htdocs\wdl\public/../application/index\view\record\import.html";i:1585028492;s:54:"D:\xampp\htdocs\wdl\application\index\view\layout.html";i:1585028492;}*/ ?>
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
            <i class="fa fa-dashboard"></i> 导入记录 </h1>
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
<link rel="stylesheet" href="/wdl/public/static/css/index.css">
<div class="row">
    <form method="post" class="form-inline" enctype="multipart/form-data">

        <div class="form-group">
            <label for="file">文件选择：</label>
            <input type="file" class="form-control" name="excel" id="file">
        </div>
        <div class="col-md-2">
            <input type="submit" class="btn btn-primary" value="上传">
        </div>
        <div class="col-md-2">
            <a href="<?php echo url('index/record/downTemplete'); ?>" class="btn btn-primary">下载模板</a>
        </div>

    </form>
</div>
<hr>
<form method="post" action="<?php echo url('excelToDB'); ?>">
    <div class="all-column">

        <table class="table table-hover table-striped table-bordered">
            <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$dd): $mod = ($i % 2 );++$i;?>
            <tr>
                <td>
                    <input type="checkbox" name="data[]" value="<?php echo $dd['A']; ?>">
                </td>
                <td><?php echo $dd['A']; ?></td>
                <td><?php echo $dd['B']; ?></td>
                <td><?php echo $dd['C']; ?></td>
                <td><?php echo $dd['D']; ?></td>
                <td><?php echo $dd['E']; ?></td>
                <td><?php echo $dd['F']; ?></td>
                <td><?php echo $dd['G']; ?></td>
                <td><?php echo $dd['H']; ?></td>
                <td><?php echo $dd['I']; ?></td>
                <td><?php echo $dd['J']; ?></td>
                <td><?php echo $dd['K']; ?></td>
                <td><?php echo $dd['L']; ?></td>
                <td><?php echo $dd['M']; ?></td>
                <td><?php echo $dd['N']; ?></td>
                <td><?php echo $dd['O']; ?></td>
                <td><?php echo $dd['P']; ?></td>
                <td><?php echo $dd['Q']; ?></td>
                <td><?php echo $dd['R']; ?></td>
                <td><?php echo $dd['S']; ?></td>
                <td><?php echo $dd['T']; ?></td>
                <td><?php echo $dd['U']; ?></td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
    </div>
    <hr>
    <input type="submit" id="submitDB" value="提交到数据库" class="btn btn-primary">
</form>
<script>
    require(['hdjs'], function (hdjs) {

        //参考： attr和prop的区别
        function is_select_all() {
            is_all = true;
            $("tr:first").siblings().each(function () {
                if ($(this).find('input').prop('checked') == false) {
                    is_all = false;
                    return false;// 终止循环
                }
            })

            return is_all;
        }

        $("tr:first>td:first>input").click(function () {
            console.log( $(this).prop('checked'));
            console.log( is_select_all());
            console.log('------------------------');
            if (is_select_all()==true && $(this).prop('checked')==false) {
                $(this).find('input').removeAttr('checked');
                $("tr:first").siblings().each(function () {
                    $(this).find('td:first>input').removeAttr('checked');
                    $(this).find('input').prop('checked', false);
                })
            }

            if (is_select_all()==false && $(this).prop('checked')==true){
                $(this).find('input').attr('checked', 'checked');
                $("tr:first").siblings().each(function () {
                    $(this).find("input").attr('checked', 'checked');
                    $(this).find('input').prop('checked', true);
                })
            }
        })

        $("tr:first").siblings().each(function () {
            $(this).click(function () {

                if ($(this).find('td:first>input').attr('checked') == 'checked') {
                    $(this).find('td:first>input').removeAttr('checked');
                    $(this).find('td:first>input').prop('checked', false);
                } else {
                    $(this).find('td:first>input').attr('checked', 'checked');
                    $(this).find('td:first>input').prop('checked', true);
                }

                if (is_select_all()) {
                    $("tr:first>td:first").find("input").attr('checked', 'checked');
                    $("tr:first>td:first").find("input").prop('checked', true);
                } else {
                    $("tr:first>td:first").find("input").removeAttr('checked');
                    $("tr:first>td:first").find("input").prop('checked', false);
                }
            })
        });

        $('#submitDB').click(function(e){

            is_current=true;
            current_person="<?php echo session('username'); ?>";

            surpport_person=new Array();
            $('tr:first').siblings().each(function(){
                if($(this).find('input').attr('checked')=='checked'){
                    surpport_person.push($(this).find('td').eq(9).html().trim());
                }
            })

            for(var index in surpport_person){
                if(surpport_person[index]!==current_person){
                    is_current=false;
                    break;
                }
            }

            if(!is_current){
                if(!confirm('存在不是您支持的项目记录，导入后您无法查看这些记录，您是否要导入？')){
                    e.preventDefault();
                }
            }
        });
      
    });
</script> 

        </main>
    </div>
</body>

<!-- <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script> -->
<!-- Main CSS-->
<link rel="stylesheet" type="text/css" href="/wdl/public/static/css/main.css">
<script src="/wdl/public/static/js/main.js"></script>

</html>