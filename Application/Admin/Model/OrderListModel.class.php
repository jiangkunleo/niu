<?php
  namespace Admin\Model;
  use Think\Model;
  class OrderListModel extends Model{

    //自动验证[二维数组，每一个字数组就是一个字段的验证规则集合]
    protected $_validate = array(
        //array('验证字段名','验证规则','验证失败以后的提示错误信息','附加验证规则')
        array('account_number', 'require', '游戏账号必须填写'),
        array('account_sum','/^[1-9]\d*00$/','必须输入100的整数!',0,'regex',3),// 必填
    );

}