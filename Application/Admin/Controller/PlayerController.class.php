<?php
namespace Admin\Controller;
use Admin\Controller\CommonController;
class PlayerController extends CommonController {

    public function index(){
        $username = $_SESSION['username'];
        // $list = D('agency')->field('invitation_code')->select();
        // $difine = D('t_user_list')->query("UPDATE t_user_list SET invitation_code = '11111'");
        // dump($difine);
        // dump($list);die;
        if($username == 'root'){
            $PlayerList = D('t_user_list');
            //获取所有的玩家总数
            $count=$this->count = $PlayerList->count();
            //实例化分页类[分页数据的总数，每一页显示的数据量]
            $Page = new \Think\Page($count, 10);
            $this->style = $Page->show(); //分页样式的代码
            //获取分页的数据
            $this->PlayerList= $PlayerList->limit($Page->firstRow . ',' . $Page->listRows)->select();
            // dump($this->PlayerList);die;
            $this->display();
        }else{
            // $invitation_code = D('agency as a')->join('t_user_list as b on b.invitation_code = a.invitation_code')->where("invitation_code = '$invitation_code'")->select();
            $a_list = D('agency')->where("username = '$username'")->select();
            $a_invitation_code = $a_list[0]['invitation_code'];
            $u_list = D('t_user_list')->where("invitation_code = '$a_invitation_code'")->select();
            // dump($a_invitation_code);
            $u_invitation_code = $u_list[0]['invitation_code'];
            // dump($u_invitation_code);die;
            $PlayerList = D('t_user_list');

            //获取所有的玩家总数
            $count=$this->count = $PlayerList->where("invitation_code = '$u_invitation_code'")->count();
            // dump($count);die;
            //实例化分页类[分页数据的总数，每一页显示的数据量]
            $Page = new \Think\Page($count, 10);
            $this->style = $Page->show(); //分页样式的代码
            //获取分页的数据
            $this->PlayerList= $PlayerList->limit($Page->firstRow . ',' . $Page->listRows)->where("invitation_code = '$u_invitation_code'")->select();
            // dump($this->PlayerList);die;
            $this->display();
        }

    }


    public function search(){
        if(isset($_POST["id"])){
            $tuserlist = D('t_user_list');
            $id = I('post.id');
            $res = $tuserlist->where("id = '$id'" )->limit($Page->firstRow . ',' . $Page->listRows)->select();
            $count=$this->count = $tuserlist->where("id = '$id'")->limit($Page->firstRow . ',' . $Page->listRows)->count();
            $Page = new \Think\Page($count, 10);
            $this->style = $Page->show(); //分页样式的代码
            // dump($res);die;
            if($res){
                $this->list = $tuserlist->where("id = '$id'")->limit($Page->firstRow . ',' . $Page->listRows)->select();

            }
        }

        $this->display('search');
    }








}