<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>用户注册</title>
	<link rel="stylesheet" href="/Public/Admin/style/base.css" type="text/css">
	<link rel="stylesheet" href="/Public/Admin/style/global.css" type="text/css">
	<link rel="stylesheet" href="/Public/Admin/style/header.css" type="text/css">
	<link rel="stylesheet" href="/Public/Admin/style/login.css" type="text/css">
	<link rel="stylesheet" href="/Public/Admin/style/footer.css" type="text/css">
</head>
<body>


	<div style="clear:both;"></div>

	<div class="header w990 bc mt15">
		<div class="logo w990">
			<h2 class="fl"><a href="index.html"><img src="/Public/Admin/images/logo.png" alt="京西商城"></a></h2>
		</div>
	</div>

	<div class="login w990 bc mt10 regist">
		<div class="login_hd">
			<h2>修改密码</h2>
			<b></b>
		</div>
		<div class="login_bd">
			<div class="login_form fl">
				<form action="<?php echo U('register1');?>" method="post">
					<ul>
						<li>
							<label for="">用户名：</label>
							<input type="text" class="txt" name="username" />
							<p>请输入你的用户名</p>
						</li>
						<li>
							<label for="">原密码：</label>
							<input type="password" class="txt" name="pwd" />
							<p>请输入原密码</p>
						</li>
						<li>
							<label for="">新密码：</label>
							<input type="password" class="txt" name="password" />
							<p> <span>请输入新密码</p>
						</li>
						<li>
							<label for="">&nbsp;</label>
							<input type="checkbox" class="chb" checked="checked" /> 我已阅读并同意《用户注册协议》
						</li>
						<li>
							<label for="">&nbsp;</label>
							<input type="submit" value="" class="login_btn" />
						</li>
					</ul>
				</form>


			</div>


		</div>
	</div>

	<div style="clear:both;"></div>


</body>
</html>