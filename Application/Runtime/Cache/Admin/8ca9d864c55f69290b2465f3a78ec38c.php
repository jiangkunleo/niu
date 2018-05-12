<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <script language="JavaScript" src="/Public/Admin/js/jquery.js"></script>
    <script type="text/javascript">
    $(function() {
        //顶部导航切换
        $(".nav li a").click(function() {
            $(".nav li a.selected").removeClass("selected")
            $(this).addClass("selected");
        })
    })
    </script>
</head>

<body style="background:url(/Public/Admin/images/topbg.gif) repeat-x;">
    <div class="topleft">
        <a href="<?php echo U('Index/index');?>" target="_parent"><img src="/Public/Admin/images/logo.png" title="系统首页" /></a>
    </div>
    <ul class="nav">
        <li>
            <a href="main.html" target="rightFrame" class="selected"><img src="/Public/Admin/images/icon01.png" title="首页" />
                <h2>个人中心</h2></a>
        </li>
        <li>
            <a href="<?php echo U('Agency/index');?>" target="rightFrame"><img src="/Public/Admin/images/icon06.png" title="用户" />
                <h2>用户管理</h2></a>
        </li>
        <li>
            <a href="<?php echo U('Order/remind');?>" target="rightFrame"><img src="/Public/Admin/images/111.jpg" title="用户" />
                <h2>提现通知</h2></a>
        </li>
        <li>
            <a href="<?php echo U('Order/done');?>" target="rightFrame"><img src="/Public/Admin/images/112.jpg" title="用户" />
                <h2>已完成账单</h2></a>
        </li>
    </ul>
    <div class="topright">
        <ul>
            <li>
            <a href="<?php echo U('Index/logout');?>" target="_parent">退出</a>
            <a href="<?php echo U('Index/register');?>" target="_parent">修改密码</a>
            <a href="<?php echo U('Index/supple');?>" target="_parent">完善信息</a>
            </li>
        </ul>
        <div class="user">
            <span>欢迎您，<?php echo (session('username')); ?></span>
        </div>
    </div>
</body>

</html>