<?php
/**
 * @Author: Marte
 * @Date:   2017-08-28 12:12:52
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-08-30 19:28:13
 */
function password($pwd,$salt){
    return sha1($salt.sha1($pwd).$salt);
}
function getTree($list,$pid=0,$level=0 ) {
    static $tree = array();  // static 表示声明一个静态变量, 静态变量在函数中会一直保存它的值
    foreach($list as $row) {
        if($row['pid']==$pid) {
            $row['level'] = $level;  // 这个level是原来数组没有的，用于表示缩进的次数，
            $tree[] = $row;
            getTree($list, $row['id'], $level + 1); // 递归操作，重新把当前id传入函数中，获取当前id对应的子分类
        }
    }
    return $tree;
}
