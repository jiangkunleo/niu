<?php
/**
 * @Author: Marte
 * @Date:   2017-08-28 18:44:58
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-08-31 18:57:48
 */
namespace Admin\Model;
use Think\Model;
class JuniorModel extends Model{
    public function getList($firstRow,$listRows){
        return $this->where("agency_id='0'")->limit($firstRow.','.$listRows)->select();
     }

}