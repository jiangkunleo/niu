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
            <li><a href="#">编辑用户</a></li>
        </ul>
    </div>
    <div class="formbody">
        <div class="formtitle">
            <span class="current">基本信息</span>
        </div>
       <form action="<?php echo U('Agency/edit');?>" method="post" >
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><ul class="forminfo">
                <li>
                    <input name="game_id" placeholder="请输入游戏ID" type="hidden" class="dfinput" value="<?php echo ($vo["game_id"]); ?>" /><i></i></li>
                <li>
                    <label>游戏昵称</label>
                    <input name="username" placeholder="请输入游戏昵称" type="text" class="dfinput" value="<?php echo ($vo["username"]); ?>" /></li>
                <li>
                    <label>代理属性</label>
                    <input name="level" placeholder="请输入代理属性" type="text" class="dfinput" value="<?php echo ($vo["level"]); ?>" /><i></i>
                </li>
                <li>
                    <label>&nbsp;邀请码：</label>
                    <input name="code" placeholder="请输入邀请码" type="text" class="dfinput"  value="<?php echo ($vo["code"]); ?>"/>
                </li>
                <li>
                    <label>真实姓名</label>
                    <input name="real_name" placeholder="请输入真实姓名" type="text" class="dfinput" value="<?php echo ($vo["real_name"]); ?>" />
                </li>

                <li>
                    <label>当前状态</label>
                    <input name="status" placeholder="请输入个人状态" id="status" type="datetime" class="dfinput" value="<?php echo ($vo["status"]); ?>" /><i></i>
                </li>
            </ul><?php endforeach; endif; else: echo "" ;endif; ?>
        </form>
    </div>
</body>

</html>