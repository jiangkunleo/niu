<?php
namespace Admin\Controller;
use Admin\Controller\CommonController;

class SetProbabController extends CommonController {

	//档位概率设置列表页
	public function index() {
		$probab = D('SetProbab');
		$list = $probab->select();
		$this->assign('list',$list);
		$this->display();
	}


	//档位概率设置页
	public function edit() {
		if(IS_GET) {
			//接收ID用于查询当条数据
			$id = I('id');
			$probab = D('SetProbab');
			$current_data = $probab->find($id);
			//dump($current_data);die;
			$this->assign('current_data',$current_data);
			$this->display();

		}elseif(IS_POST) {
			//接收数据
			$data['id'] = I('post.id');
			$data['name'] = I('post.name');
			$data['modify_time'] = date('Y-m-d H:i:s',time());
			$data['probab'] = intval(addslashes(strip_tags(trim(I('post.probab')))),0);
			
		}
	}



}