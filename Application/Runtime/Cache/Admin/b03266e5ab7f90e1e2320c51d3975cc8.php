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
.form-control{
    padding: 15px;
    margin:15px;
    width: 200px;
    line-height: 25px;
    font-size:25px;
    text-align: center;
    border: 0px;

}
.form-controls{
    border: 1px solid;
     padding: 15px;
    width: 200px;
    font-size:25px;
    height: 7px;
    text-align: center;
}

.test{
     padding: 15px;
    width: 200px;
    font-size:25px;
    text-align: center;
}
</style>
<body>
    <div class="place">
        <span>代理信息</span>
    </div>
    <div class="alert alert-danger" role="alert" style="font-size:16px">玩家列表</div>
    <form action="<?php echo U('Player/search');?>" method="post">


        <span class="test" style="padding-left: 50px;">ID：  <input type="text" class="form-controls" name="id" /></span>
        <button type="submit" class="btn btn-default">查询</button>
    </form>


<table class="tablelist">
    <thead>
        <tr>
            <th>UID</th>
            <th>玩家姓名</th>
            <th>注册时间</th>
            <th>邀请码</th>
        </tr>
    </thead>
    <tbody>
    <?php if(is_array($PlayerList)): $i = 0; $__LIST__ = $PlayerList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="even">
            <td><?php echo ($vo["id"]); ?></td>
            <td><?php echo ($vo["name"]); ?></td>
            <td><?php echo ($vo["register_timestamp"]); ?></td>
            <td><?php echo ($vo["invitation_code"]); ?></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>

    </tbody>
</table>

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