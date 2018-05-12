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
        <form action="<?php echo U('sup');?>" method="post" enctype="multipart/form-data">
            <ul class="forminfo">
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                    <input name="game_id" placeholder="请输入游戏ID" type="hidden" class="dfinput" value="<?php echo ($vo["game_id"]); ?>" /><i></i></li>
               <!--  <li>
                    <label>角色</label>
                    <select name="role_id" class="dfinput">
                    <option value="">请选择</option>}
                    <?php if(is_array($RoleList)): $i = 0; $__LIST__ = $RoleList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["role_id"]); ?>"><?php echo ($vo["role_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </li> -->

                <li>
                    <label>手机号</label>
                    <input name="mobile" placeholder="请输入手机号" id="status" type="datetime" class="dfinput" value="<?php echo ($vo["mobile"]); ?>" />
                </li>
                <li>
                    <input name="agency_id" placeholder="请输入代理级别" type="hidden" class="dfinput"  />
                </li>
                <li>
                    <input name="p_name" placeholder="请输入代理级别" type="hidden" class="dfinput"  />
                </li>
                <li>
                    <input name="login_ip" placeholder="请输入代理级别" type="hidden" class="dfinput"  />
                </li>
                <li>
                    <input name="level" placeholder="请输入代理级别" type="hidden" class="dfinput"  />
                </li>
                <li>
                    <input name="login_time" placeholder="请输入代理级别" type="hidden" class="dfinput"  />
                </li>
                <li>
                    <input name="create_time" placeholder="请输入邀请码" type="hidden" class="dfinput"  />
                </li>
                <li>
                    <label>微信号</label>
                    <input name="wechat" placeholder="请输入微信号" type="text" class="dfinput"  value="<?php echo ($vo["wechat"]); ?>"/><span>可选</span>
                </li>
               <!--  <li>
                    <input name="code" placeholder="请输入邀请码" type="hidden" class="dfinput"  />
                </li> -->
                <li>
                    <label>地址</label>
                    <input name="address" placeholder="请输入地址" type="text" class="dfinput"  value="<?php echo ($vo["address"]); ?>"/><span>可选</span>
                </li>
                <li>
                    <input name="p_code" placeholder="请输入上级邀请码" type="hidden" class="dfinput" />
                </li>
                <li>
                    <label>真实姓名</label>
                    <input name="real_name" placeholder="请输入真实姓名" type="text" class="dfinput" value="<?php echo ($vo["real_name"]); ?>"/>
                </li>
                 <li>
                    <label>游戏昵称</label>
                    <input name="username" placeholder="请输入游戏昵称" type="text" class="dfinput" value="<?php echo ($vo["username"]); ?>"/></li>
                <!--     <li>
                    <input name="salt" placeholder="请输入加密盐值" type="hidden" class="dfinput" /></li>
                 <li>
                <label>登陆密码</label>
                <input name="password" placeholder="请输入登陆密码" type="hidden" class="dfinput" /></li> --><?php endforeach; endif; else: echo "" ;endif; ?>
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