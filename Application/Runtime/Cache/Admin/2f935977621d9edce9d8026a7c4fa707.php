<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>商品添加</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <script language="JavaScript" src="/Public/Admin/js/jquery.js"></script>
    <!-- 引入富文本编辑器 -->
    <script type="text/javascript" charset="utf-8" src="__ED__/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="__ED__/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="__ED__/lang/zh-cn/zh-cn.js"></script>
    <!-- 引入时间选择器 -->
    <script src="/Public/Admin/timer/calendar.js"></script>
    <link rel="stylesheet" href="/Public/Admin/timer/calendar.css" />
  <!--   <style>
        .textinput2{
            width: 800px;
            height: 300px;
            border: none;
        }
        .formtitle span.current{ /* 第一个span标签默认选中，有下边框 */
            border-bottom: solid 3px #66c9f3;
        }
        .formtitle span{
            position: static; /* 静态定位，position的默认值，也就是不定位了 */
            margin-right: 4px;
            border: none;
            cursor: pointer;
        }
        .forminfo{
            display: none;
        }
        .forminfo:first-child{
            display: block;
        }
        .calendar .nav{ /* 解决时间选择器的样式冲突 */
            float: none;
        }
        .forminfo .add, /* +号的样式 */
        .forminfo .div{ /* -号的样式 */
            font-size: 16px;
            margin-right: 10px;
            cursor: pointer;
        }
    </style> -->
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
        <form action="<?php echo U('add');?>" method="post" enctype="multipart/form-data">
            <ul class="forminfo">
                <li>
                    <label>游戏账号</label>
                    <input name="title" placeholder="请输入商品名称" type="text" class="dfinput" /><i></i></li>
                <li>
                    <label>游戏昵称</label>
                    <input name="goods_price" placeholder="请输入商品价格" type="text" class="dfinput" /><i></i></li>
                <li>
                    <label>代理属性</label>
                    <input name="goods_number" placeholder="请输入商品数量" type="text" class="dfinput" />
                </li>
                <li>
                    <label>&nbsp;邀请码：</label>
                    <input name="goods_weight" placeholder="请输入商品重量" type="text" class="dfinput" />
                </li>
                <li>
                    <label>真实姓名</label>
                    <input name="goods_weight" placeholder="请输入真实姓名" type="text" class="dfinput" />
                </li>
                <li>
                    <label>登陆时间</label>
                    <input name="created_time" placeholder="请输入最后登陆时间" id="created_time" type="datetime" class="dfinput" />
                </li>
                <li>
                    <label>当前状态</label>
                    <input name="created_time" placeholder="请输入个人状态" id="created_time" type="datetime" class="dfinput" />
                </li>
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
<!-- <script>
   // 实例化富文本编辑器
   var ue = UE.getEditor('goods_desc',{
        initialFrameWidth:800  //初始化编辑器宽度,默认1000
        ,initialFrameHeight:150  //初始化编辑器高度,默认320
        , toolbars: [[ // 工具栏的定制
            'fullscreen', 'source', '|', 'undo', 'redo', '|',
            'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
            'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
            'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
            'directionalityltr', 'directionalityrtl', 'indent', '|',
            'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
            'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',

            'horizontal', 'date', 'time', 'spechars', 'snapscreen', 'wordimage', '|',
             'preview',
        ]]
   });
   $('.formtitle span').click(function(){
       // 当前被点击的span 添加 current样式，其他的span兄弟 移除 current 样式
       $(this).addClass('current').siblings().removeClass('current');

       // alert( $(this).index() );  // 获取当前标签的序号
       // 让和当前被点击的标签序号对应的ul显示出来，然后其他的ul隐藏掉
       $('.forminfo').eq( $(this).index() ).show().siblings('.forminfo').hide();
   });
    // 时间选择器的配置
    Calendar.setup({
       inputField     :    "created_time",  // 要使用时间选择器的 表单项的ID值
       ifFormat       :    "%Y-%m-%d %H:%M:%S",  // 时间的格式
       showsTime      :    true,
       timeFormat     :    "12"                  // 时制[12,24]
    });

    // 使用jQ动态增加相册的文件上传框
    $('.goods_photos').on('click','.add',function(e){
        // 使用 e.target 获取到最初被点击的那个DOM元素
        $(e.target).parent()  // 找到 当前被点击的.add的父级元素li
                   .clone()   // 把父级元素li复制出来
                   // 把复制出来的li里面的span中的 加号 改成 - 号,并修改样式成 .div
                   .find('span').removeClass('add').addClass('div').html('[ - ]')
                   // 接下来还要把 span的父级元素找到，并追加到 相册中
                   .parent().appendTo('.goods_photos');
        // $(e.target).parent().clone().appendTo('.goods_photos');
    });

    // 使用jQ动态删除相册的文件上传框
    $('.goods_photos').on('click','.div',function(e){
        // console.log( $(e.target) );
        // 找到被点击的 .div ，然后找到 .div的父级元素，并使用remove移除掉。
        $(e.target).parent().remove();
    });

    // 当前选择对应的商品类型时，使用ajax到后台获取对应商品类型的属性
    $('select[name=type_id]').change(function(){
        var cur = $(this).val();  // 当前被选中的下拉选项的 type_id
        if( cur  == '0' ){
            return false;  // 阻止事件继续执行
        }
        $('.newItem').remove();
        // 保存被点击的select元素
        var _this = $(this);
        $.get("<?php echo U('Goods/getAttr');?>",{'type_id':cur},function(msg){
            var html = '';
            // 使用 $() 把接收到的json对象，转成 jQuery对象，否则无法使用jQuery的方法
            // each 相当于 php 里面的 foreach 专门循环 数组 、对象
            // key 是循环中的下标
            // value 是循环中的每一个值

            $(msg).each(function(key,value){
                if(value.attr_sel == 0 ){
                    // console.log('唯一属性，需要单行文本框录入');
                    html +="<li class='newItem'>";
                    html +="<label>" + value.attr_name + "</label>";
                    html +='<input type="hidden" name="attr_ids[]" value="'+ value.attr_id +'" />';
                    html +='<input name="attr_value[]" placeholder="请输入'+ value.attr_name +'" type="text" class="dfinput" /><i></i></li>';
                }else{
                    // 把单选属性中的参考值使用  split 进行分割成数组
                    var vals = value.attr_vals.split(',');
                    // console.log( vals );
                    html +="<li class='newItem'>";
                    html +='<input type="hidden" name="attr_ids[]" value="'+ value.attr_id +'" />';
                    html +='<label><span class="add">[+]</span>'+ value.attr_name +'</label>';
                    html +='<select name="attr_value[]" class="dfinput">';
                    for(var i = 0; i< vals.length; i++ ){
                        // value的可以是中文
                        html +='<option value="'+ vals[i] +'">'+ vals[i] +'</option>';
                    }
                    html +='</select>';
                    html +='</li>';
                }
            });

            _this.parent().after(html);
        },'json');

    });

    // 动态新增商品属性
    $('.goods_attr').on('click','.add',function(){
        // 复制当前span的父级元素li，并修改 span的class值和内容改成 - 号
        var newLi = $(this).parents('.newItem')
                           .clone()
                           .find('span')
                           .html('[-]')
                           .removeClass('add').addClass('div')
                           .parents('.newItem');
        $(this).parents('.newItem').after(newLi);
    });

    // 动态删除商品属性
    $('.goods_attr').on('click','.div',function(){
        // console.log( $(this).parents('li') );
        // 移除当前span的父级元素li
        $(this).parents('li').remove();
    });

</script> -->
</html>