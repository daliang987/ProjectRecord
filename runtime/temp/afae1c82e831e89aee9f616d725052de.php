<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"D:\xampp5\htdocs\wdl\public/../application/index\view\index\login.html";i:1528972486;}*/ ?>
<!DOCTYPE html>
<html lang="cn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>用户登录</title>


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
    <link rel="stylesheet" href="/wdl/public/static/node_modules/hdjs/dist/hdjs.css">
</head>

<body>
    <div hd-cloak>
        <div class="container">
            <div class="col-md-12">
                <div class="page-header">
                    <h1>项目支持记录
                        <small>质保中心</small>
                    </h1>
                </div>
            </div>
            <div class="login-form">
                <h3>用户登录</h3>
                <hr>
                <form method="post">
                    <div class="form-group has-success">
                        <label for="">用户名</label>
                        <div class="input-group">
                            <span class="input-group-addon input-lg">
                                <span class="glyphicon glyphicon-user"></span>
                            </span>
                            <input type="text" name="username" class="form-control input-lg" placeholder="用户名">
                        </div>
                    </div>
                    <div class="form-group has-success">
                        <label for="">密码</label>
                        <div class="input-group">
                            <span class="input-group-addon input-lg">
                                <span class="glyphicon glyphicon-lock"></span>
                            </span>
                            <input type="password" name="password" class="form-control input-lg" placeholder="密码">
                        </div>
                    </div>
                    <hr>
                    <input type="submit" class="btn btn-success btn-lg btn-block" value="登录">
                </form>

            </div>

            <div id="myCarousel" class="carousel slide"  data-ride="carousel" >

                <!-- 轮播（Carousel）指标 -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>
                <!-- 轮播（Carousel）项目 -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="/wdl/public/static/image/a1.jpg" alt="First slide">
                    </div>
                    <div class="item">
                        <img src="/wdl/public/static/image/a2.jpg" alt="Second slide">
                    </div>
                    <div class="item">
                        <img src="/wdl/public/static/image/a3.jpg" alt="Third slide">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<link rel="stylesheet" href="/wdl/public/static/css/login.css">
<link rel="stylesheet" href="/wdl/public/static/css/common.css">

</html>