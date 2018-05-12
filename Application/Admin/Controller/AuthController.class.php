<?php
namespace Admin\Controller;
use Admin\Controller\CommonController;
class AuthController extends CommonController{
  public function __construct(){
    parent::__construct();
    // 保存模型，后面就可以使用 $this->AuthModel
    $this->AuthModel = D('Auth'); // 权限
  }
  // 列表页
  public function index(){
    // 获取所有的权限
    $AuthList = $this->AuthModel->field('auth_id id,auth_name,auth_pid pid,auth_controller,auth_action')->select();
    $this->AuthList = getTree( $AuthList );
    $this->display();
  }

  // 添加权限
  public function add(){
    // 判断如果有post数据
    if( IS_POST ){
      // 调用Auth模型的 create 方法接收post并验证
      if( !$this->AuthModel->create() ){
        $this->error('添加失败！错误：' . $this->AuthModel->getError() );die;
      }
      // 添加操作
      $res = $this->AuthModel->add();
      if( $res ){
        $this->success('添加权限成功！', U('index'), 3 );die;
      }else{
        $this->error('添加失败！错误：' . $this->AuthModel->getError() );die;
      }
    }
    // 获取所有的顶级权限，并赋值到模板中
    $this->topAuth = $this->AuthModel->getAuth();
    $this->display();
  }

    // 编辑权限
    public function edit(){
        $Auth_id = I('get.auth_id',0,'intval');
        $this->info = $this->AuthModel->where("auth_id='$Auth_id'")->select();
        if(IS_POST){
            //接收$_POST数据并帮我们验证
            if (!$this->AuthModel->create()) {
                $this->error($this->AuthModel->getError());
            }
            //添加数据到Agency表中
            $res = $this->AuthModel->save();
            if ($res !== false) {
                $this->success('修改成功。', U('index'));
                die();
            } else {
                $this->error('修改失败。');
            }
        }
    // 获取所有的顶级权限，并赋值到模板中
    $this->topAuth = $this->AuthModel->getAuth();
        $this->display();
    }
    // 删除角色
    public function del(){
        $Auth_id = I('get.auth_id',0,'intval');
        $res = $this->AuthModel->delete($Auth_id);
        if($res){
            $this->success('删除成功');die;
        }else{
            $this->error('删除失败');die;
        }
        $this->display();
  }

}