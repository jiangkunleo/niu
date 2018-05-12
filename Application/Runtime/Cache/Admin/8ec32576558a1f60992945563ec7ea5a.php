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
            <li><a href="#">用户管理</a></li>
            <li><a href="#">添加用户</a></li>
        </ul>
    </div>
    <div class="formbody">
        <div class="formtitle">
            <span class="current">基本信息</span>

        </div>
        <form action="<?php echo U('Agency/add');?>" method="post" enctype="multipart/form-data">
            <ul class="forminfo">
               <!--  <li>
                    <label>游戏账号</label>
                    <input name="game_id" placeholder="请输入游戏ID" type="text" class="dfinput" /><i></i></li> -->
                <li>
                    <label>提现方式</label>
                    <select name="role_id" class="dfinput sel">
                    <!-- <option value="">请选择</option> -->
                    <!-- <?php if(is_array($RoleList)): $i = 0; $__LIST__ = $RoleList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["role_id"]); ?>"><?php echo ($vo["role_name"]); ?></option>
                        <option value="<?php echo ($vo["role_id"]); ?>"><?php echo ($vo["role_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?> -->
                    <option value="">支付宝</option>
                    <option value="">银行卡</option>

                    </select>
                </li>

                <li>
                    <label>提现账号</label>
                    <input name="mobile" placeholder="请输入提现帐号" id="status" type="datetime" class="dfinput" />
                </li>
                <li>
                    <label>提款金额</label>
                    <input name="agency_id" placeholder="请输入提款金额" type="text" class="dfinput"  /><i>*必须为100或100的倍数*</i>
                </li>
                <li class="current">
                    <label>用户名</label>
                    <input name="p_name" placeholder="请输入支付宝账户用户名" type="text" class="dfinput"  /><i>*支付宝提现必填*</i>
                </li>
                 <li  class="current">
                    <label>银行卡类别</label>
                    <input name="login_ip" placeholder="请输入银行卡类别" type="text" class="dfinput"  /><i>*银行卡提现提现必填*</i>
                </li>

            <ul>
                <li>
                    <label>&nbsp;</label>
                    <input id="btnSubmit" type="submit" class="btn" value="提交" />
                </li>
            </ul>
        </form>
    </div>
    <script>
        $('.forminfo').click(function(){

        });
    </script>
</body>
</html>