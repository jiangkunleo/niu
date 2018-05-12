<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>账单明细</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
    <!--引入时间选择器-->
    <script src="/Public/Admin/timer/calendar.js"></script>
    <link rel="stylesheet" href="/Public/Admin/timer/calendar.css" />
</head>





<style>


.tablelist{
    border: 1px solid ;
    border-collapse:collapse;
}
.tablelist td{
    border:1px solid;
    width:100px;
    height: 50px;
    text-align:center;
    font-size:12px;
}
.tablelist th{
    /* width:100px; */
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
.place span {
    line-height: 40px;
    font-size: 25px;
    font-weight: normal;
    padding: 0 auto;
    margin: 0 auto;
    margin-left: 12px;
    text-align: center;
}

.form-control{
    height: 33px;
    border: 1px solid #3994C8;
}
.col-lg-4{
    padding: 42px;
}
.input-group{
    margin:0 auto;
    padding: 42px;
    border: 1px solid;
}
.calendar .nav { /* 解决时间选择器的样式冲突 */
            float: none;
        }

</style>
<body>
    <div class="place">
        <span>账单明细</span>
       <!--  <form action="<?php echo U('Agency/export');?>" method="post" accept-charset="utf-8" class="" enctype="multipart/form-data">
        <span class="col-lg-4"><button class="btn btn-default" id="report" >excel 导 出</button></span>
        </form> -->
        <form action="<?php echo U('Agency/order');?>" method="post" accept-charset="utf-8" class="">
                            <span class="col-lg-4">开始时间&nbsp;&nbsp;<input class="form-control" style="width:210px" type="datatime-" name="begin_time" id="begin_time-" placeholder="&nbsp;&nbsp;&nbsp;&nbsp;开始时间" value=""></span>
                            <span class="col-lg-4">结束时间&nbsp;&nbsp;<input class="form-control" style="width:210px" type="datetime-" name="end_time" id="end_time" placeholder="&nbsp;&nbsp;&nbsp;&nbsp;结束时间" value=""></span>
        <span class="col-lg-4"><button class="btn btn-default" id="action_add" >查询</button></span>
        <!-- <input type="hidden" value="" name="p">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-btn" "=""><button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search">查询</i></button></span>
                        </div>
                    </div> -->
        </form>
 <!--        <form action="<?php echo U('Agency/order');?>" method="post" accept-charset="utf-8">


</form> -->

    </div>



<table class="tablelist">
    <thead>
        <tr class="" style="text-align:center;">
        <th>订单号</th>
        <th>UID</th>
        <th>用户名</th>
        <th>操作前</th>
        <th>操作后</th>
        <th>操作</th>
        <th>备注</th>
        <th>时间</th>
        <th>邀请码</th>
        </tr>
    </thead>
    <tbody>
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="even">
            <td><?php echo ($vo["id"]); ?></td>
            <td><?php echo ($vo["user_id"]); ?></td>
            <td><?php echo ($vo["user_name"]); ?></td>
            <td><?php echo ($vo["pre_amount"]); ?></td>
            <td><?php echo ($vo["after_amount"]); ?></td>
            <td><?php echo ($vo["price"]); ?></td>
            <td>&nbsp;</td>
            <td><?php echo ($vo["timestamp"]); ?></td>
            <td><?php echo ($vo["invitation_code"]); ?></td>
            <!-- <td>
            <a href="<?php echo U('Agency/show',array('game_id'=>$vo['game_id']));?>">查看</a>
            <a href="<?php echo U('Agency/edit',array('game_id'=>$vo['game_id']));?>">编辑</a>
            <a href="<?php echo U('Agency/del',array('game_id'=>$vo['game_id']));?>">删除</a>
            </td> -->
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
<script>
//时间选择器的配置
    Calendar.setup({
        inputField: "begin_time-",  //要使用时间选择器的表单项的ID值
        ifFormat: "%Y-%m-%d %H:%M:%S",  //时间的格式
        showsTime: true,
        timeFormat: '12'  //12小时或24小时制
    });
    Calendar.setup({
        inputField: "end_time",  //要使用时间选择器的表单项的ID值
        ifFormat: "%Y-%m-%d %H:%M:%S",  //时间的格式
        showsTime: true,
        timeFormat: '12'  //12小时或24小时制
    });
</script>

</html>