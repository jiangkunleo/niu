<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>修改档位概率</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <script language="JavaScript" src="/Public/Admin/js/jquery.js"></script>
</head>

<body>
    <div class="place">
        <span>位置：</span>
        <ul class="placeul">
            <li><a href="#">首页</a></li>
            <li><a href="#">修改档位概率</a></li>
        </ul>
    </div>
    <div class="formbody">
        <div class="formtitle"><span>基本信息</span></div>
        <form action="<?php echo U('SetProbab/edit');?>" method="post" >
            <ul class="forminfo">
                <li>
                    <label>档位id</label>
                    <input name="id" value="<?php echo ($current_data['id']); ?>" type="text" class="dfinput" readonly="readonly" /><i></i></li>
                <li>
                    <label>档位名称</label>
                    <input name="name" value="<?php echo ($current_data['name']); ?>"  type="text" class="dfinput" readonly="readonly" /><i></i></li>
                <li>
                    <label>档位概率</label>
                    <input name="probab" value="<?php echo ($current_data['probab']); ?>"  type="text" class="dfinput" /><i>请输入0-100以内的整数,单位为%</i>
                </li>
                <!--
                <li><label>是否审核</label><cite><input name="" type="radio" value="" checked="checked" />是&nbsp;&nbsp;&nbsp;&nbsp;<input name="" type="radio" value="" />否</cite></li>
                -->
                <li>
                    <label>&nbsp;</label>
                    <input name="" id="btnSubmit" type="submit" class="btn" value="确认修改" />
                </li>
            </ul>
        </form>
    </div>
</body>

</html>