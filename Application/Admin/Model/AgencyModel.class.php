<?php
/**
 * @Author: Marte
 * @Date:   2017-08-28 10:25:29
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-09-01 16:51:08
 */
namespace Admin\Model;
use Think\Model;
class AgencyModel extends Model{

    //自动验证[二维数组，每一个字数组就是一个字段的验证规则集合]
    protected $_validate = array(
        //array('验证字段名','验证规则','验证失败以后的提示错误信息','附加验证规则')
        array('username', 'require', '游戏账号必须填写'),
        // array('level', 'require', '代理属性必须填写'),
        // array('code', 'require', '邀请码必须填写'),
        array('real_name', 'require', '真实姓名必须填写'),
        array('username', '', '该游戏昵称已经存在！', 1, 'unique', 1),
        array('password','require','密码不能为空！'),
        array('mobile','require','手机号不能为空'),
        array('mobile','/^1[0-9]{10}$/','手机号格式不对'),
    );
    //自动完成[二维数组，每一个字数组，就是一个字段的自动完成设设置]
    protected $_auto = array(
        array('create_time', 'mytime', 1, 'callback'),
        array('login_time', 'time', 1, 'callback'),
        array( 'salt','createSalt', 3,'callback'), // 使用回调方法 createSalt 生成盐值
        array( 'password' ,'password', 3,'callback'  ), // 使用回调方法 password   对密码加密
    );
    //mytime的回调函数
    protected function mytime($data=null)
    {
        if($data){
            return strtotime($data);
        }
        return time();
    }
    protected function time($data=null)
    {
        if($data){
            return strtotime($data);
        }
        return time();
    }
    // 生成盐值
    protected  function createSalt(){
        $salt = mt_rand(10000,99999); //随机生成的密钥
        $this->salt = $salt;
        return $salt;
    }

    function password($pwd,$salt){
        return sha1($salt.sha1($pwd).$salt);
    }
}