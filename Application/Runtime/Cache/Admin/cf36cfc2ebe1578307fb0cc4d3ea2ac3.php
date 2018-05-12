<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>角色列表</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $(".click").click(function() {
            $(".tip").fadeIn(200);
        });

        $(".tiptop a").click(function() {
            $(".tip").fadeOut(200);
        });

        $(".sure").click(function() {
            $(".tip").fadeOut(100);
        });

        $(".cancel").click(function() {
            $(".tip").fadeOut(100);
        });

    });
    </script>
</head>

<body>
    <div class="place">
        <span>位置：</span>
        <ul class="placeul">
            <li><a href="#">首页</a></li>
            <li><a href="#">数据表</a></li>
            <li><a href="#">基本内容</a></li>
        </ul>
    </div>
    <div class="rightinfo">
        <div class="tools">
            <ul class="toolbar">
                <li><a href="<?php echo U('Role/add');?>"><span><img src="/Public/Admin/images/t01.png" /></span>添加</a></li>
            </ul>
        </div>
        <!-- <table class="tablelist">
            <thead>
                <tr>
                    <th>
                        <input name="" type="checkbox" value="" id="checkAll" />
                    </th>
                    <th>编号</th>
                    <th>角色</th>
                    <th>权限ids</th>
                    <th>权限ac</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php if(is_array($RoleList)): $i = 0; $__LIST__ = $RoleList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td>
                        <input name="" type="checkbox" value="<?php echo ($vo["role_id"]); ?>" />
                    </td>
                    <td><?php echo ($vo["role_id"]); ?></td>
                    <td><?php echo ($vo["role_name"]); ?></td>
                    <td><?php echo ($vo["role_auth_ids"]); ?></td>
                    <td><?php echo ($vo["role_auth_ac"]); ?></td>
                    <td>
                        <a href="<?php echo U('Role/setAuth',array('role_id'=>$vo['role_id']));?>" class="tablelink">分派权限</a>
                        <a href="<?php echo U('Role/edit',array('role_id'=>$vo['role_id']));?>" class="tablelink">查看编辑</a>
                        <a href="<?php echo U('Role/del',array('role_id'=>$vo['role_id']));?>" class="tablelink"> 删除</a>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table> -->
        <form action="<?php echo U('edit');?>" method="post">
            <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                    <!-- <label>角色名称</label> -->
                    <input name="role_id" placeholder="请输入角色名称" type="hidden" class="dfinput"  value="<?php echo ($vo["role_id"]); ?>" />
            </li>
            <ul class="forminfo">
                <li>
                    <label>角色名称</label>
                    <input name="role_name" placeholder="请输入角色名称" type="text" class="dfinput"  value="<?php echo ($vo["role_name"]); ?>" />
                </li>

                <li>
                    <label>权限ids</label>
                    <input name="role_auth_ids" placeholder="请输入角色名称" type="text" class="dfinput" value="<?php echo ($vo["auth_ids"]); ?>"  />
                </li>
                <li>
                    <label>权限ac</label>
                    <input name="role_auth_ac" placeholder="请输入角色名称" type="text" class="dfinput" value="<?php echo ($vo["auth_ac"]); ?>" />
                </li>
                <li>
                    <label>&nbsp;</label>
                    <input id="btnSubmit" type="button" class="btn" value="确认保存" />
                </li>
            </ul><?php endforeach; endif; else: echo "" ;endif; ?>
        </form>
    </div>
    <script type="text/javascript">
        $('.tablelist tbody tr:odd').addClass('odd');
    </script>
</body>
<script type="text/javascript">
//jQuery代码
$(function(){
    //给btnsubmit绑定点击事件
    $('#btnSubmit').on('click',function(){
        //表单提交
        $('form').submit();
    })
});
</script
</html>