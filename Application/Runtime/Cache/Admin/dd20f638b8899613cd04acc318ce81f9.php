<?php if (!defined('THINK_PATH')) exit();?>{include file="Public/header" title="导入产品"/}
    <!-- 主容器 start -->
    <div id="container" class="container-fluid">
      <div class="row-fluid">

<!-- 左侧导航栏 start -->
{include file="Public/sidebar"/}
<!-- 左侧导航栏 end -->
<style>
.tag .select_side{ float:left; width:200px } 
.tag select{ width:180px; height:120px } 
.tag .select_opt{ float:left; width:40px; height:100%; margin-top:60px } 
.tag .select_opt p{ width:26px; height:26px; margin-top:6px; background:url(images/admin/arr.gif) no-repeat; 
 cursor:pointer; text-indent:-999em } 
.tag .select_opt p#toright{ background-position:2px 0 } 
.tag .select_opt p#toleft{ background-position:2px -22px } 

</style>
<!-- 主内容 start -->
<div id="content" class="span10">
  <!-- 标题 start -->
  <div class="pageTit page-header">
    <h1>导入产品</h1>
    <div class="opt">
      <a class="btn btn-info" href="<?php echo U('admin/goods/index');?>">返回产品列表</a>
    </div>
  </div>
  <!-- 标题 end -->
  <!-- 内容区块 start -->
  <div class="formBox">
  <form id="addform" action="<?php echo U('admin/goods/upload');?>" method="post" enctype="multipart/form-data">
  <input name="id" type="hidden" value="<?php echo ($goods_info["id"]); ?>" />
        <div class="control-group">
          <label>Excel表格：</label>
                <input type="file" name="excelData" value=""  datatype="*4-50"  nullmsg="请填写产品！" errormsg="不能少于4个字符大于50个汉字"/>
                <span class="Validform_checktip"></span>
        </div>



        <div class="control-group">
          <img style="display:none;" src="images/loading.gif" />
          <input type="submit" class="btn btn-primary Sub" value="导入" />
        </div>
    </form>
  </div>
  <!-- 内容区块 end -->
</div>

<!-- 主内容 end -->
    <!-- 脚部 start -->
    <div id="footer">
    </div>
    <!-- 脚部 end -->
  </body>
</html>