<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>商品添加</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <script language="JavaScript" src="/Public/Admin/js/jquery.js"></script>
</head>
<style type="text/css">
    .aaa{
        width:800px;
        border:1px solid #ccc;
        height:300px;
    }
</style>
<body>
    <div class="place">
        <span>位置：</span>
        <ul class="placeul">
            <li><a href="#">公告管理</a></li>
            <li><a href="#">添加公告</a></li>
        </ul>
    </div>
    <div class="formbody">
        <div class="formtitle">
            <span class="current">基本信息</span>

        </div>
        <form action="<?php echo U('Notice/adddata');?>" method="post" enctype="multipart/form-data">
            <ul class="forminfo">

                    <li>
                    <!-- <label>ID</label> -->
                    <input name="username" placeholder="" type="hidden" class="dfinput" />
                    </li>
                    <li>
                    <label>公告内容</label>
                    <textarea name="announcement" class="aaa"></textarea>
                    <!-- <input name="announcement" placeholder="" type="textarea" class="dfinput" class="aaa" /> -->
                    </li>

            </ul>
            <ul>
                <li>
                    <label>&nbsp;</label>
                    <input id="btnSubmit" type="submit" class="btn" value="确认保存" />
                </li>
            </ul>
        </form>
    </div>
</body>
</html>