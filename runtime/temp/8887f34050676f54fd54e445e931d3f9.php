<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"D:\xampp5\htdocs\wdl\public/../application/index\view\help\manual.html";i:1528272459;s:55:"D:\xampp5\htdocs\wdl\application\index\view\layout.html";i:1539243946;}*/ ?>
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
            <i class="fa fa-pencil-square-o"></i> 填写说明 </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">
            <i class="fa fa-home fa-lg"></i>
        </li>
        <li class="breadcrumb-item">
            <a href="#">帮助</a>
        </li>
    </ul>
</div>


        </main>
    </div>
</body>

<!-- <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script> -->
<!-- Main CSS-->
<link rel="stylesheet" type="text/css" href="/wdl/public/static/css/main.css">
<script src="/wdl/public/static/js/main.js"></script>

</html>