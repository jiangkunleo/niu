<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>商品添加</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <script language="JavaScript" src="/Public/Admin/js/jquery.js"></script>
</head>

<body>
    <div class="place">
        <span>位置：</span>
        <ul class="placeul">
            <li><a href="#">游戏后台</a></li>
            <li><a href="#">提成管理</a></li>
        </ul>
    </div>
    <div class="formbody">
        <div class="formtitle">
            <span class="current">设置规则</span>

        </div>
        <form action="<?php echo U('Commission/set');?>" method="post" enctype="multipart/form-data">
            <ul class="forminfo">

                <li>
                    <label>一级代理</label>
                    <select name="select" class="dfinput">
                    <option value="">请选择</option>}
                        <option value="10%">10%</option>
                        <option value="20%">20%</option>
                        <option value="30%">30%</option>
                        <option value="40%">40%</option>
                        <option value="50%">50%</option>
                        <option value="60%">60%</option>
                        <option value="70%">70%</option>
                        <option value="80%">80%</option>
                        <option value="90%">90%</option>
                        <option value="100%">100%</option>

                    </select>
                </li>

                <li>
                    <label>二级代理</label>
                    <select name="select1" class="dfinput">
                    <option value="">请选择</option>}
                        <option value="10%">10%</option>
                        <option value="20%">20%</option>
                        <option value="30%">30%</option>
                        <option value="40%">40%</option>
                        <option value="50%">50%</option>
                        <option value="60%">60%</option>
                        <option value="70%">70%</option>
                        <option value="80%">80%</option>
                        <option value="90%">90%</option>
                        <option value="100%">100%</option>

                    </select>
                </li>
                <li>
                    <label>三级代理</label>
                    <select name="select2" class="dfinput">
                    <option value="">请选择</option>}
                        <option value="10%">10%</option>
                        <option value="20%">20%</option>
                        <option value="30%">30%</option>
                        <option value="40%">40%</option>
                        <option value="50%">50%</option>
                        <option value="60%">60%</option>
                        <option value="70%">70%</option>
                        <option value="80%">80%</option>
                        <option value="90%">90%</option>
                        <option value="100%">100%</option>

                    </select>
                </li>
                <li>
                    <label>四级代理</label>
                    <select name="select3" class="dfinput">
                    <option value="">请选择</option>}
                        <option value="10%">10%</option>
                        <option value="20%">20%</option>
                        <option value="30%">30%</option>
                        <option value="40%">40%</option>
                        <option value="50%">50%</option>
                        <option value="60%">60%</option>
                        <option value="70%">70%</option>
                        <option value="80%">80%</option>
                        <option value="90%">90%</option>
                        <option value="100%">100%</option>

                    </select>
                </li>


            </ul>
            <ul>
                <li>
                    <label>&nbsp;</label>
                    <input id="btnSubmit" name="submit" type="submit" class="btn" value="确认保存" />
                </li>
            </ul>
        </form>
    </div>
</body>
</html>