<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
</head>





<style>
.alert-danger {
    color: #a94442;
    background-color: #f2dede;
    border-color: #ebccd1;
}
.alert {
    padding: 15px;
    margin-bottom: 20px;
    margin-left: 20px;
    margin-right: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
}
.tablelist{
    border: 1px solid ;
    border-collapse:collapse;
}
.tablelist td{
    border:1px solid;
    width:100px;
    text-align:center;
    font-size:12px;
}
.tablelist th{
    width:100%;
    text-align:center;
}
.odd{
    background:#F5F5F5;
    text-align:right;
}
.even{
    background:#FFFFFF;
    text-align:left;
}

</style>
<body>
    <div class="place">
        <span>代理信息</span>
    </div>
    <div class="alert alert-danger" role="alert" style="font-size:16px">从8月1号开始，将升级区域代理结算方案，代理商可以获得更高利润、更快结算，通过微信账号：luck789000可以了解更多详情。燎原投资入驻将会为公司带来更多产品，更好体验，也将一如既往的保障代理商利益，和代理商携手发展。</div>

<table class="tablelist">
    <thead>
        <tr class="" style="text-align:center;">
        <th colspan="6" rowspan="6" headers="" scope="">我的基本信息</th>
            <!-- <th>我的基本信息</th> -->
        </tr>
    </thead>
    <tbody>
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="even">
            <td>游戏账号ID：</td>
            <td><?php echo ($vo["game_id"]); ?></td>
            <td>游戏账号昵称：</td>
            <td><?php echo ($vo["username"]); ?></td>
            <td>真实姓名：</td>
            <td><?php echo ($vo["real_name"]); ?></td>
        </tr>
        <tr class="odd">
            <td>手机号：</td>
            <td><?php echo ($vo["mobile"]); ?></td>
            <td>微信：</td>
            <td><?php echo ($vo["wechat"]); ?></td>
            <td>元宝：</td>
            <td><?php echo ($vo["gold"]); ?></td>
        </tr>
        <tr class="even">
            <td>邀请码：</td>
            <td><?php echo ($vo["code"]); ?></td>
            <td>代理级别：</td>
            <td><?php echo ($vo["level"]); ?></td>
            <td>会员数：</td>
            <td><?php echo ($vo["member"]); ?></td>
        </tr>
        <tr class="odd">
            <td>注册代理时间：</td>
            <td><?php echo ($vo["create_time"]); ?></td>
            <td>上级代理邀请码：</td>
            <td><?php echo ($vo["p_code"]); ?></td>
            <td>上级代理用户昵称：</td>
            <td><?php echo ($vo["p_name"]); ?></td>
        </tr>
        <tr class="even">
            <td>最近登录时间：</td>
            <td><?php echo ($vo["login_time"]); ?></td>
            <td>最近登录IP：</td>
            <td><?php echo ($vo["login_ip"]); ?></td>
            <td>代理状态：</td>
            <td><?php echo ($vo["status"]); ?></td>
        </tr>
        <tr class="odd">
            <td>地址：</td>
            <td colspan="5" rowspan="5" headers=""><?php echo ($vo["address"]); ?></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
</table>


</body>

</html>