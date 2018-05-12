<?php
namespace Admin\Model;
use Think\Model;


class SetProbabModel extends Model{
	protected $tableName = 'set_probab'; 

    protected $_validate = array(
        //array('验证字段名','验证规则','验证失败以后的提示错误信息','附加验证规则')
        array('probab', 'require', '概率必须填写'),
        array('probab',), // 当值不为空的时候判断是否在一个范围内
    );

}