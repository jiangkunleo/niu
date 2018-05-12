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
    text-align:center;
}
.tablelist{
    border: 1px solid ;
    border-collapse:collapse;
}
.tablelist th,td{
    border:1px solid;
    width:50px;
    text-align:center;
    font-size:12px;
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
    <div class="alert alert-danger" role="alert" style="font-size:16px">提现管理</div>

<table class="tablelist">
    <thead>
        <tr>
            <th>UID</th>
            <th>提现方式</th>
            <th>用户名</th>
            <th>银行卡类别</th>
            <th>总金额</th>
            <th>提现金额</th>
            <th>剩余金额</th>
            <th>邀请码</th>
            <th>状态</th>
        </tr>
    </thead>
    <tbody>
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="even">
            <td><?php echo ($vo["id"]); ?></td>
            <td><?php echo ($vo["account_style"]); ?></td>
            <td><?php echo ($vo["alipay_name"]); ?></td>
            <td><?php echo ($vo["information"]); ?></td>
            <td><?php echo ($vo["account_number"]); ?></td>
            <td><?php echo ($vo["account_sum"]); ?></td>
            <td>&nbsp;</td>
            <td><?php echo ($vo["invitation_code"]); ?></td>
            <td class="btns">
            <a href="<?php echo U('Order/edit',array(id=>$vo['id'],status=>1));?>"><font color="green" class="btn1">同意</font></a>
            <a href="<?php echo U('Order/edit',array(id=>$vo['id'],status=>2));?>"><font color="red" class="btn2">拒绝</font></a>
            </td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>

    </tbody>
</table>
<!-- <script type="text/javascript">
    $('.btn1').click(function () {
        $('.btn1').html("已拒绝");
    });
</script> -->
 <div class="pagin">
            <div class="message">共<i class="blue"><?php echo ($count); ?></i>条记录，当前显示第&nbsp;<i class="blue"><?php echo ((isset($_GET['p']) && ($_GET['p'] !== ""))?($_GET['p']):1); ?>&nbsp;</i>页</div>
            <style>
                .paginList a,
                .paginList span{
                    float: left;
                    width: 31px;
                    height: 28px;
                    border: 1px solid #DDD;
                    text-align: center;
                    line-height: 30px;
                    border-left: none;
                    color: #3399d5;
                }
                .paginList .current{
                    background: #d5d5d5;
                    cursor: default;
                    color: #737373;
                }
            </style>
            <div class="paginList">
                <?php echo ($style); ?>

            </div>
        </div>

</body>

</html>