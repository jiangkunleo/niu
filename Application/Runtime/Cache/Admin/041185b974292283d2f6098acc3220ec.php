<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>我的信息</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <script language="JavaScript" src="/Public/Admin/js/jquery.js"></script>
    <script src="/Public/Admin/js/cloud.js" type="text/javascript"></script>
    <script language="javascript">
    $(function() {
        $('.loginbox').css({
            'position': 'absolute',
            'left': ($(window).width() - 692) / 2
        });
        $(window).resize(function() {
            $('.loginbox').css({
                'position': 'absolute',
                'left': ($(window).width() - 692) / 2
            });
        })
    });
    </script>
</head>

<body style="background-color:#1c77ac; background-image:url(/Public/Admin/images/light.png); background-repeat:no-repeat; background-position:center top; overflow:hidden;">
    <div id="mainBody">
        <div id="cloud1" class="cloud"></div>
        <div id="cloud2" class="cloud"></div>
    </div>
    <div class="logintop">
        <span>欢迎登陆</span>
        <ul>
            <li><a href="<?php echo U('Index/index');?>" target="_blank">商城后台</a></li>
        </ul>
    </div>
    <style>
        /* .loginbox ul{
            margin-top: ;
        } */
        .verify{
            width: 100px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .code{
            width: 180px;
            vertical-align: top; /* 两个行内元素，顶部对齐 */
        }
       /*  .loginbtn{
            margin:;
        } */
    </style>
    <form action="" method="post">
        <div class="loginbody">
            <span class="systemlogo"></span>
            <div class="loginbox">
                <ul>
                    <li>
                        <input name="username" type="text" class="loginuser" placeholder="用户名" />
                    </li>
                    <li>
                        <input name="password" type="password" class="loginpwd" placeholder="密码" />
                    </li>
                   <!--  <li>
                        <input name="verify" type="text" class="loginpwd verify" placeholder="验证码" />
                        <img class="code" src="<?php echo U('Index/code');?>" onclick="this.src='<?php echo U('Index/code');?>?' + (new Date()-0)" alt="" />
                    </li> -->
                    <li>
                        <input name="" type="submit" class="loginbtn" value="登录" />
                        <!-- <label><a href="<?php echo U('Index/register1');?>">忘记密码？</a></label> -->
                    </li>
                </ul>
            </div>
        </div>
    </form>
</body>

</html>