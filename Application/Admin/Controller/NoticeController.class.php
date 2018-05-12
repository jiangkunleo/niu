<?php
namespace Admin\Controller;
use Admin\Controller\CommonController;
class NoticeController extends CommonController {
    public function index(){
       $thall = D('t_hall');
       $this->list = $thall->select();
       // dump($this->list);die;
       $this->display();
    }

    public function add(){

        $this->display('add');
    }

    public function adddata(){
        $data['announcement'] = $_POST['announcement'];
        // dump($list);
        $res = D('t_hall')->add($data);
        if(!$res){
            $this->error('添加失败');
        }else{
            $this->success('添加成功',U('index'));die;
        }
    }

    public function edit(){
        $id = $_GET['id'];
        // dump($id);
        $thall = D('t_hall');
        $this->list = $thall->where("id = '$id'")->select();

        $this->display();
    }


    public function editdata(){
        $thall = D('t_hall');
        $data['id'] = $id = $_POST['id'];
        $data['announcement'] = $_POST['announcement'];
        if(IS_POST){
            $res = $thall->save($data);
            if ($res !== false) {
                $this->success('修改成功。', U('index'));
                die();
            } else {
                $this->error('修改失败。');die;
            }
        }
    }

    public function del(){
        $id = $_GET['id'];
        $thall = D('t_hall');
        $res = $thall ->delete($id);
        if(!$res){
            $this->error('删除失败,错误:' . $thall->getError());die;
        }else{
            $this->success('删除成功',U('index'));die;
        }
    }


}