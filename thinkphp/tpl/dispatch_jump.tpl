{__NOLAYOUT__}
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>系统提示</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        :root {
            --primary: #00635a;
            --primary-light: #0a7d73;
            --danger: #c0392b;
            --bg: #f4f7f6;
            --text: #2c3e50;
            --muted: #7f8c8d;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            font-family: -apple-system, BlinkMacSystemFont, "Microsoft YaHei",
                         "Helvetica Neue", Helvetica, Arial, sans-serif;
            background: linear-gradient(135deg, #e6f2f1, #f9fbfb);
            display: flex;
            align-items: flex-start;
            justify-content: center;
            padding-top: 10%;
            color: var(--text);
        }

        .message-box {
            width: 90%;
            max-width: 420px;
            background: #fff;
            border-radius: 14px;
            padding: 36px 32px 32px;
            text-align: center;
            box-shadow: 0 18px 45px rgba(0, 99, 90, .18);
            animation: fadeIn .45s ease-out;
        }

        .icon {
            width: 88px;
            height: 88px;
            margin: 0 auto 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 42px;
            color: #fff;
        }

        .success .icon {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
        }

        .error .icon {
            background: linear-gradient(135deg, #e74c3c, var(--danger));
        }

        .title {
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 10px;
            letter-spacing: .5px;
        }

        .success .title {
            color: var(--primary);
        }

        .error .title {
            color: var(--danger);
        }

        .msg {
            font-size: 20px;
            line-height: 1.7;
            margin-bottom: 22px;
            color: #444;
            word-break: break-all;
        }

        .jump {
            font-size: 14px;
            color: var(--muted);
        }

        .jump b {
            color: var(--primary);
            padding: 0 2px;
        }

        .jump a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
        }

        .jump a:hover {
            text-decoration: underline;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(8px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>

<?php if ($code == 1): ?>
    <div class="message-box success">
        <div class="icon">✓</div>
        <div class="title">操作成功</div>
        <div class="msg"><?php echo strip_tags($msg); ?></div>
        <div class="jump">
            页面将在 <b id="wait"><?php echo $wait; ?></b> 秒后自动
            <a id="href" href="<?php echo $url; ?>">跳转</a>
        </div>
    </div>
<?php else: ?>
    <div class="message-box error">
        <div class="icon">!</div>
        <div class="title">操作失败</div>
        <div class="msg"><?php echo strip_tags($msg); ?></div>
        <div class="jump">
            页面将在 <b id="wait"><?php echo $wait; ?></b> 秒后自动
            <a id="href" href="<?php echo $url; ?>">返回</a>
        </div>
    </div>
<?php endif; ?>

<script>
    (function () {
        var wait = document.getElementById('wait');
        var href = document.getElementById('href').href;

        var timer = setInterval(function () {
            var time = --wait.innerHTML;
            if (time <= 0) {
                location.href = href;
                clearInterval(timer);
            }
        }, 1000);
    })();
</script>

</body>
</html>